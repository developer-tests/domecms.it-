<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;


class OperatorController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            $user = User::all();
            if ($request->ajax()) {
                return DataTables::of($user)
                                ->addIndexColumn()
                                ->editColumn('name', function ($row) {
                                    return $row->name;
                                })
                                ->editColumn('last_name', function ($row) {
                                    return $row->last_name;
                                })
                                ->editColumn('created_at', function ($row) {
                                    return $row->date_of_birth;
                                })
                                ->editColumn('updated_at', function ($row) {
                                    return $row->created_at;
                                })
                                ->rawColumns(['note', 'name'])
                                ->make(true);
            }
            return view('frontend.operator.index')->with('user',$user);
        }
        return redirect()->route('admin_login');
    }
//    public function user(Request $request) {
//        if (Auth::user()) {
//            $user = User::all();
//            if ($request->ajax()) {
//                return DataTables::of($user)
//                                ->addIndexColumn()
//                                ->editColumn('name', function ($row) {
//                                    return $row->name;
//                                })
//                                ->editColumn('last_name', function ($row) {
//                                    return $row->last_name;
//                                })
//                                ->editColumn('created_at', function ($row) {
//                                    return $row->date_of_birth;
//                                })
//                                ->editColumn('updated_at', function ($row) {
//                                    return $row->created_at;
//                                })
//                                ->addColumn('action', function ($row) {
//                                    return '<a href="'.route('operator.edit',$row->id).'" class="badge badge-primary">Edit</a>';
//                                })
//                                ->rawColumns(['note','action'])
//                                ->make(true);
//            }
//            return view('frontend.operator.user')->with('user',$user);
//        }
//        return redirect()->route('admin_login');
//    }
//    public function edit($id){
//        if($id){
//        $situation = User::find($id);
//        return view('frontend.operator.edit',compact('user'));
//        }
//    }
}
