<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\UserInfo;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\PhysicalBasicTest;
use App\Models\Location;
use Illuminate\Support\Str;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Association;
use App\Created\PDF;
use App\Models\Event;
use App\Models\EventRegister;
use App\Models\SituationCm;

class NewUserController extends Controller {

    public function __construct() {
        if (!Auth::check()) {
            return redirect()->route('admin_login');
        }
    }

    public function index() {
        if (Auth::user()) {
            $roles = Role::all();
            return view('frontend.add_user', compact('roles'));
        }
        return redirect()->route('admin_login');
    }

    public function form(Request $request) {
        $role = Role::find($request->role);
        if ($role == null) {
            $role = Role::find(1);
        }
        return view('frontend.form', compact('role', 'request'));
    }

    public function save(Request $request) {
//        echo $request->tutor->translatable();die;
        \App::setLocale(session()->get('locale'));
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'gender' => 'required',
                    'city_of_birth' => 'required',
                    'country_of_birth' => 'required',
                    'country' => 'required',
                    'DOB' => 'required',
                    'residence_city' => 'required',
                    'residence_province' => 'required',
                    'residence_postal_code' => 'required',
                    'residence_street' => 'required',
                    'residence_country' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput($request->all());
        }
        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('storage/upload/profile'), $imageName);
            $logo = $imageName;
            $photo = 'upload/about/' . $logo;
        }
//        dd($request->all());
        $user = new User();
        $user->name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = '';
        $user->password = '';
        $user->role_id = $request->initial_role;
        $user->remember_token = '';
        $user->date_of_birth = date('Y-m-d', strtotime($request->DOB));
        $user->note = '';
        $user->deleted_at = date('y-m-d H:i:s');
        $user->save();

        $phy = new PhysicalBasicTest();
        $phy->first_name = $request->first_name;
        $phy->last_name = $request->last_name;
        $phy->notes = $request->note;
        $phy->date_of_birth = date('Y-m-d', strtotime($request->DOB));
        $phy->profile = (isset($photo)) ? $photo : '';
        $phy->cf = $this->generateRandomString();
        $phy->user_id = $user->id;
        $phy->save();

        $userinfo = new UserInfo();
        $userinfo->sex = ($request->gender == 'on') ? '1' : '0';
        $userinfo->phy_id = $phy->id;
        $userinfo->register_relative = ($request->registered_relative) ? $request->registered_relative : '';
        $userinfo->city_of_birth = $request->city_of_birth;
        $userinfo->country_of_birth = $request->country_of_birth;
        $userinfo->country = $request->country;
        $userinfo->date_of_birth = date('Y-m-d', strtotime($request->DOB));
        $userinfo->residence_city = $request->residence_city;
        $userinfo->residence_province = $request->residence_province;
        $userinfo->residence_postal = $request->residence_postal_code;
        $userinfo->residence_street = $request->residence_street;
        $userinfo->residence_country = $request->residence_country;
        $userinfo->home_city = $request->domicile_city;
        $userinfo->home_province = $request->domicile_province;
        $userinfo->home_postal = $request->domicile_postal_code;
        $userinfo->home_street = $request->domicile_street;
        $userinfo->home_country = $request->domicile_country;

        $userinfo->delivery_phone = implode(', ', $request->delivery_phone);
        $userinfo->delivery_cellphone = implode(', ', $request->delivery_cell_phone);
        $userinfo->delivery_mail = implode(', ', $request->delivery_mail);
        $userinfo->delivery_pec = implode(', ', $request->delivery_pec);
        $userinfo->delivery_fax = implode(', ', $request->delivery_fax);
        $userinfo->delivery_note = $request->note;
        $userinfo->tutor_id = implode(', ',$request->tutor_ids);//implode(', ', $request->tutor_ids);
        $userinfo->initial_role = $request->initial_role;
        $userinfo->user_id = $user->id;
        $userinfo->save();
        return redirect()->route('user.view', $userinfo->user_id);
    }

    public function tutor(Request $request) {
        $physicalTest = $return = array();
        $physicalTest = \DB::table('users as u')->select('p.*', 'u.id', 'u.role_id')
//                        ->where('u.role_id',4)
                        ->where(\DB::raw("CONCAT(`p`.`first_name`, ' ', `p`.`last_name`)"), "LIKE", "%" . $request->tutor . "%")
                        ->orWhere(\DB::raw("CONCAT(`p`.`last_name`, ' ', `p`.`first_name`)"), "LIKE", "%" . $request->tutor . "%")
                        ->leftjoin('physical_basic_tests as p', 'p.user_id', '=', 'u.id')
                        ->limit(4)->get();
       
        if (count($physicalTest) > 0) {
            foreach($physicalTest as $k=>$value){
                if(strstr($value->role_id,"4")){
                    $return[] = $value; 
                }
            }
            return response()->json($return);
        }
    }

    public function getuser(Request $request) {
        $user = UserInfo::where('user_id', $request->id)->get();
        if (count($user) > 0) {
            $user = $user[0];
        }
        return response()->json($user);
    }

    public function place(Request $request) {
        $result = Location::where('name', 'LIKE', "%" . $request->key . "%")->orderByraw('CHAR_LENGTH(name) ASC')->with('provinces')->get();
        if (count($result) > 0) {
            return $result;
        } else {
            return;
        }
    }

    public function searchbyname($name) {
        $user = User::where(\DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), "LIKE", "%" . $request->name . "%")
                        ->orWhere(\DB::raw("CONCAT(`last_name`, ' ', `first_name`)"), "LIKE", "%" . $request->tutor . "%")->limit(4)->get();
        return $user[0];
    }

    public function display($id) {
        $data = UserInfo::where('user_id', $id)->with('phy')->get();
        if ($data) {
            $data = $data[0];
        }
        $cm = SituationCm::where('user_id',$id)->get();
        return view('frontend.display', compact('data','cm'));
    }

    public function edit($id, $action = '') {
        $data = UserInfo::with('phy')->where('user_id', $id)->get()[0];
        $roles = Role::all();
        $user_roles = User::find($id);
        $implode_user_role = '';
        $multiple_role = array();
        if ($user_roles->role_id) {
            $explodes = explode(',', $user_roles->role_id);
            $implode_user_role = implode(',', $explodes);
            foreach ($explodes as $explode) {
                $multiple_role[] = Role::find($explode);
            }
        }
        $event_id_fs ='';
        if($action == 'accept_payment_for_event'){
            $event_id_fs = \Session::get('event_register_id');
        }
        $initial_role = Role::find($data->initial_role);
        $cm = SituationCm::where('user_id',$id)->get();
        return view('frontend.edit', compact('data', 'roles', 'initial_role', 'action', 'multiple_role', 'user_roles', 'implode_user_role','event_id_fs','cm'));
    }

    public function update(Request $request) {
        \App::setLocale(session()->get('locale'));
        if (isset($request->tutor_check)) {
            $registered_relative = "'registered_relative' => 'required',";
        } else {
            $registered_relative = '';
        }
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'cf' => 'required',
                    'gender' => 'required',
                    ($registered_relative) ? $registered_relative : '',
                    'city_of_birth' => 'required',
                    'country_of_birth' => 'required',
                    'country' => 'required',
                    'DOB' => 'required',
                    'residence_city' => 'required',
                    'residence_province' => 'required',
                    'residence_postal_code' => 'required',
                    'residence_street' => 'required',
                    'residence_country' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput($request->all());
        }
        $str = str_replace('[', '', $request->role_ids);
        $role_ids = str_replace(']', '', $str);

        //insert into user table
        $user = [
            'name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => '',
            'password' => '',
            'role_id' => implode(', ', $role_ids),
            'remember_token' => '',
            'date_of_birth' => $request->DOB,
            'note' => $request->note,
            'deleted_at' => date('y-m-d H:i:s')];
        User::where('id', $request->edit_id)->update($user);

        $userinfo = ['sex' => ($request->gender == 'on') ? '1' : '0',
            'register_relative' => $request->registered_relative,
            'city_of_birth' => $request->city_of_birth,
            'country_of_birth' => $request->country_of_birth,
            'country' => $request->country,
            'date_of_birth' => date("Y-m-d", strtotime($request->DOB)),
            'residence_city' => $request->residence_city,
            'residence_province' => $request->residence_province,
            'residence_postal' => $request->residence_postal_code,
            'residence_street' => $request->residence_street,
            'residence_country' => $request->residence_country,
            'home_city' => $request->domicile_city,
            'home_province' => $request->domicile_province,
            'home_postal' => $request->domicile_postal_code,
            'home_street' => $request->domicile_street,
            'home_country' => $request->domicile_country,
            'delivery_phone' => implode(', ', $request->delivery_phone),
            'delivery_cellphone' => implode(', ', $request->delivery_cell_phone),
            'delivery_mail' => implode(', ', $request->delivery_mail),
            'delivery_pec' => implode(', ', $request->delivery_pec),
            'delivery_fax' => implode(', ', $request->delivery_fax),
            'delivery_note' => $request->note,
            'tutor_id' => ($request->tutor_check == 'on') ? $request->tutor_ids : '',
//        'initial_role' => $request->initial_role
        ];
        UserInfo::where('user_id', $request->edit_id)->update($userinfo);
        $userinfo = UserInfo::where('user_id', $request->edit_id)->get()[0];
        //phy table update
        //dd($request->all());
        $phy = ['first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'cf' => $request->cf,
            'notes' => $request->note,
            'date_of_birth' => $request->DOB
        ];
        PhysicalBasicTest::where('id', $userinfo->phy_id)->update($phy);
        $cm = [ 
            'date_of_issue'=>$request->date_of_issue,
            'delivery_date'=>$request->delivery_date,
            'expiration_date'=>$request->expiration_date,
            'note'=>$request->cm_note,
            
        ];
        SituationCm::where('user_id',$request->edit_id)->update($cm);
        return redirect()->route('user.view', $userinfo->user_id);
    }

    public function generateRandomString($length = 16) {
        return strtoupper(substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length));
    }

    public function user_accept(Request $request) {
        return User::where('id',$request->accept_user_id)->update(['acceptance_date'=> date('Y-m-d', strtotime($request->accept_date))]);
    }

    public function user_pdf($id) {
        $user = PhysicalBasicTest::where('user_id', $id)->with('userinfo')->with('mainUser')->first();
        $assoc = Association::where('user_id', Auth::id())->with('assoc_data')->first();
        $fpdf = new PDF('L');
        $fpdf->assoc($assoc);
        ///
        $title = "Ricevuta " . $user->first_name . " del: ";
        $fpdf->SetTitle($title);
        $fpdf->AliasNbPages();
        $fpdf->AddPage();
        $fpdf->Ln(6);
        $fpdf->SetFont('Arial', '', 11);

        $x = $fpdf->Getx();
        $y = $fpdf->Gety();
        $fpdf->Setxy($x - 10, $y);
        $cell = "Ricevuta nr: ";
        $fpdf->Cell(135, 1, $cell, 0, 1, "R");
        $fpdf->Setxy(297 - 135 - $x, $y);
        $fpdf->Cell(135, 1, $cell, 0, 1, "R");
        $fpdf->Ln(6);
        
//        $assoc = Association::where('user_id', $id)->with('assoc_data')->first();
        $x = $fpdf->Getx();
        $y = $fpdf->Gety();
        $luogo_nascita = $user->userinfo->city_of_birth . " (" . $user->userInfo->residence_province . ")";

        $fpdf->MultiCell(135, 5, "Il/la " . iconv('UTF-8', 'windows-1252', $user->first_name) . " genitore/tutore del socio junior " . iconv('UTF-8', 'windows-1252', $user->first_name) . ", nato a " . iconv('UTF-8', 'windows-1252', $luogo_nascita) . " il " . $user->mainUser[0]->date_of_birth . " (CF: " . $user->cf . ")"
                . ", ha versato in data odierna la quota associativa per l'anno " . $user->acceptance_date . " pari a " . $assoc->assoc_data->membership_fee
                . " euro", 0, "J");
        $fpdf->Setxy(297 - 135 - $x, $y);
        $fpdf->MultiCell(135, 5, "Il/la " . iconv('UTF-8', 'windows-1252', $user->first_name) . " genitore/tutore del socio junior " . iconv('UTF-8', 'windows-1252', $user->first_name) . ", nato a " . iconv('UTF-8', 'windows-1252', $luogo_nascita) . " il " . $user->mainUser[0]->date_of_birth . " (CF: " . $user->cf . ")"
                . ", ha versato in data odierna la quota associativa per l'anno " . $user->acceptance_date . " pari a " . $assoc->assoc_data->membership_fee
                . " euro", 0, "J");
        ///

        $fpdf->Output();

        exit;
    }
    
    public function get_event(Request $request){
        $event = Event::where('name','like','%'.$request->search.'%')->where('end_date','>',date('Y-m-d'))->get();
        return json_decode($event);
    }
    public function event_register(Request $request){
        $exist_event = EventRegister::where('event_id',$request->event_id)->where('user_id',$request->user_id)->get();
        if(count($exist_event)>0){
            return json_encode(['error'=>'Exist']);
        }
        $event_register = new EventRegister();
        $event_register->event_id = $request->event_id;
        $event_register->user_id = $request->user_id;
        $event_register->registration_status = 'Registration';
        $event_register->operator_id = Auth::id();
        $event_register->status = 1;
        User::where('id',$request->accept_user_id)->update(['acceptance_date'=> date('Y-m-d', strtotime($request->accept_date))]);
        $return = $event_register->save();
        \Session::put('event_register_id',$request->event_id);
        return json_encode(['success'=>$return]);
    }
    
    public function accept_payment($user_id,$event_id){
        $event = Event::find($event_id);
        $user = User::with('phyTest')->find($user_id);//dd($user);
        return view('frontend.event.pay',compact('event','user'));
    }
    public function event_pdf($id) {
        $user = PhysicalBasicTest::where('user_id', $id)->with('userinfo')->with('mainUser')->first();
        $assoc = Association::where('user_id', Auth::id())->with('assoc_data')->first();
        $fpdf = new PDF('L');
        $fpdf->assoc($assoc);
        ///
        $title = "Ricevuta " . $user->first_name . " del: ";
        $fpdf->SetTitle($title);
        $fpdf->AliasNbPages();
        $fpdf->AddPage();
        $fpdf->Ln(6);
        $fpdf->SetFont('Arial', '', 11);

        $x = $fpdf->Getx();
        $y = $fpdf->Gety();
        $fpdf->Setxy($x - 10, $y);
        $cell = "Ricevuta nr: ";
        $fpdf->Cell(135, 1, $cell, 0, 1, "R");
        $fpdf->Setxy(297 - 135 - $x, $y);
        $fpdf->Cell(135, 1, $cell, 0, 1, "R");
        $fpdf->Ln(6);

//        $assoc = Association::where('user_id', $id)->with('assoc_data')->first();
        $x = $fpdf->Getx();
        $y = $fpdf->Gety();
        $luogo_nascita = $user->userinfo->city_of_birth . " (" . $user->userInfo->residence_province . ")";

        $fpdf->MultiCell(135, 5, "Il/la " . iconv('UTF-8', 'windows-1252', $user->first_name) . " genitore/tutore del socio junior " . iconv('UTF-8', 'windows-1252', $user->first_name) . ", nato a " . iconv('UTF-8', 'windows-1252', $luogo_nascita) . " il " . $user->mainUser[0]->date_of_birth . " (CF: " . $user->cf . ")"
                . ", ha versato in data odierna la quota associativa per l'anno " . $user->acceptance_date . " pari a " . $assoc->assoc_data->membership_fee
                . " euro", 0, "J");
        $fpdf->Setxy(297 - 135 - $x, $y);
        $fpdf->MultiCell(135, 5, "Il/la " . iconv('UTF-8', 'windows-1252', $user->first_name) . " genitore/tutore del socio junior " . iconv('UTF-8', 'windows-1252', $user->first_name) . ", nato a " . iconv('UTF-8', 'windows-1252', $luogo_nascita) . " il " . $user->mainUser[0]->date_of_birth . " (CF: " . $user->cf . ")"
                . ", ha versato in data odierna la quota associativa per l'anno " . $user->acceptance_date . " pari a " . $assoc->assoc_data->membership_fee
                . " euro", 0, "J");
        ///

        $fpdf->Output();

        exit;
    }
   
}

