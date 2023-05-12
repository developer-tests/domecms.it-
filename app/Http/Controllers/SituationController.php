<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\SituationCm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class SituationController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            return view('frontend.situation.index');
        }
        return redirect()->route('admin_login');
    }
    
    public function form(Request $request){
        $situation = [];
//        if($request->situation_type == 'All'){
//            $situation = SituationCm::where('status',1)->with('user')->get();
//        }else if($request->situation_type == 'Expired'){
//            $situation = SituationCm::where('expiration_date','<',now())->where('status',1)->with('user')->get(); 
//        }else if($request->situation_type == 'Not delivered'){
//            $situation = SituationCm::where('expiration_date','<',now())->where('status',1)->with('user')->get();
//        }else if($request->situation_type == 'Expiring'){
//            $situation = SituationCm::where('expiration_date','<',now())->where('status',1)
//                    ->with(['user' => function($q)  {
//                    $q->where('acceptance_date', '<', now()); 
//        }])->get();
        
//        }
        $situation = SituationCm::where('expiration_date','>',now())->where('status',1)->with('user')->get();
        
            if ($request->ajax()) {
                return DataTables::of($situation)
                                ->addIndexColumn()
                                ->editColumn('first name', function ($row) {
                                    return  ($row->user[0]->name)? $row->user[0]->name.' '.$row->user[0]->last_name:'';
                                })
                                ->editColumn('delivery date cm', function ($row) {
                                    return $row->delivery_date;
                                })
                                ->editColumn('expiry date cm', function ($row) {
                                    return $row->expiration_date;
                                })
                                ->editColumn('issue date cm', function ($row) {
                                    return $row->date_of_issue;
                                })
                                ->addColumn('action', function ($row) {
                                    return '<a href="'.route('situation.edit',$row->id).'" class="badge badge-primary">View</a>
<a href="'.route('situation.add',$row->id).'" class="badge badge-info">Add</a>';
                                })
                                ->rawColumns(['action'])
                                ->make(true);
            }
            return view('frontend.situation.list')->with('user', $situation);
    }
    public function edit($id){
        if($id){
        $situation = SituationCm::find($id);
        $user = User::find($situation->user_id);
        return view('frontend.situation.edit',compact('situation','user'));
        }
    }
    public function save(Request $request){
        if(isset($request->id)){
        SituationCm::where('id',$request->id)->update(
                ['date_of_issue'=>date("Y-m-d", strtotime($request->date_of_issue)),
                    'expiration_date'=>date("Y-m-d", strtotime($request->expiration_date)),
                    'delivery_date'=>date("Y-m-d", strtotime($request->delivery_date)),
                    'note'=>$request->note]);
        
        }else{
             \App::setLocale(session()->get('locale'));
            $validator = Validator::make($request->all(), [
             'user'   =>'required',
            'date_of_issue' => 'required',
            'expiration_date' => 'required',
            'delivery_date'    =>'required'

        ]);
   
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
          $situation = new SituationCm();
          $situation->user_id = $request->user;
          $situation->date_of_issue = date("Y-m-d", strtotime($request->date_of_issue));
          $situation->expiration_date = date("Y-m-d", strtotime($request->expiration_date));
          $situation->delivery_date = date("Y-m-d", strtotime($request->delivery_date));
          $situation->note = $request->note;
          $situation->status = 1;
          $situation->save();
        }
        return redirect()->route('situation.list');
    }
    public function add(){
        $users = User::all();//dd($users);
        return view('frontend.situation.add')->with('users',$users);
    }
}
