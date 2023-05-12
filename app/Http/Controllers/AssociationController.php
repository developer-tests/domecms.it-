<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Association;
use App\Models\AssociationOption;
use App\Models\AssocData;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AssociationController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            $assoc = Association::where('user_id',Auth::id())->with('user')->with('assoc_data')->first();
            return view('frontend.association.index',compact('assoc'));
        }
        return redirect()->route('admin_login');
    }
    public function edit($id){
        if($id){
            $assoc = Association::where('id',$id)->with('user')->with('assoc_data')->first();
            $assoc['id'] = $id;            
            $users = [];
            $i=0;
            $option = AssociationOption::where('association_id',$assoc->id)->get();
            foreach($option as $v){
                if($v->meta == 'user_id'){
                    $user = User::select('name','last_name','date_of_birth','id')->find($v->value);
                }
                if($user){
                   $users[$i] = $user;
                   $users[$i]['member_option'] = $v->option_value;
                   $i++;
                }
            }
            return view('frontend.association.edit',compact('assoc','users'));
        }
        
    }
    public function save(Request $request){
        $update_assoc = [
            'name'=>$request->name,
            'name_asso_rid' =>$request->name_asso_rid,
            'cf' =>$request->cf,
            'vat_number' =>$request->vat_number,
            'vat' =>$request->vat,
            'city' =>$request->city,
            'cap' =>$request->cap,
            'country' =>$request->country,
            'province' =>$request->province,
            'text_privacy' =>$request->text_privacy,
            'text_deduction' =>$request->text_deduction,
            'text_received_fee' =>$request->text_received_fee
            
        ];
        $update_assoc_data = [
            'mail'=>$request->mail,
            'cel'=>$request->cel,
            'fax'=>$request->fax,
            'pec'=>$request->pec,
            'web'=>$request->web,
            'membership_fee'=>$request->membership_fee,
            'ticket'=>$request->ticket,
            'start_year'=>$request->start_year,
            
        ];
        
        Association::where('id',$request->where_id)->update($update_assoc);
        AssocData::where('association_id',$request->where_id)->update($update_assoc_data);
        \Session::flash('status', 'Data Updated!'); 
        return redirect()->route('association.index'); 
    }
    public function search(Request $request){
        $search = $request->search;
        if($search){
        $users = User::where(\DB::raw("CONCAT(`name`, ' ', `last_name`)"),"LIKE","%".$search."%")
                ->orWhere(\DB::raw("CONCAT(`last_name`, ' ', `name`)"),"LIKE","%".$search."%")->get();
        return response()->json($users);
        }
    }
    public function council_member(Request $request){
        $id = $request->id;
        $user = $id;
        $option = new AssociationOption();
        $option->meta = 'user_id';
        $option->value = $user;
        $option->association_id = $request->edit_id;
        $option->option_value = $request->member_option;
        $option->save();

    }
    public function council_member_remove(Request $request){
        return $option = AssociationOption::where('association_id',$request->edit_id)->where('value',$request->id)->where('meta','user_id')->delete();
    }
    
}
