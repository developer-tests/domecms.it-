<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\SystemLogs;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;


class LogController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::User()) {
            $user = SystemLogs::all();
            if ($request->ajax()) {
                return DataTables::of($user)
                                ->addIndexColumn()
                                ->editColumn('Updated By', function ($row) {
                                    return User::find($row->user_id)['name'];
                                })
                                ->editColumn('Updated Module', function ($row) {
                                    return $row->module_name;
                                })
                                ->editColumn('Action', function ($row) {
                                    return $row->action;
                                })
                                ->editColumn('New Value', function ($row) { 
                                    if($row->new_value){
                                    foreach(json_decode($row->new_value,true) as $k=>$v){
                                        if($k != 'updated_at'){
                                            $value = $v;
                                            $key = $k;
                                        }
                                    }
                                    return $key .' = '. $value;
                                    }else{
                                        return;
                                    }
//                                    return $row->new_value;
                                })
                                ->editColumn('Ip Address', function ($row) {
                                    return $row->ip_address;
                                })
                                
                                ->editColumn('Updated At', function ($row) {
                                    return $row->created_at;
                                })
                               
//                                ->rawColumns(['note', 'name'])
                                ->make(true);
            }
            return view('frontend.log.index');
        }
        return redirect()->route('admin_login');
    }
}
