<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;


class IntranceController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            $test =[];
            if ($request->ajax()) {
                return DataTables::of($test)
                                ->addIndexColumn()
                                ->editColumn('Receipt number', function ($row) {
                                    return 'test name';
                                })
                                ->editColumn('Operation Date', function ($row) {
                                    return 'test date';
                                })
                                ->editColumn('Payment Type', function ($row) {
                                    return 'test payment';
                                })
                                ->editColumn('Entrance', function ($row) {
                                    return 'test entrance';
                                })
                                ->editColumn('Exit', function ($row) {
                                    return 'test exit';
                                })
                                ->addColumn('Causal', function ($row) {
                                    return 'test causal';
                                })
                               
                                ->rawColumns(['Causal'])
                                ->make(true);
            }
            return view('frontend.intrance.index');
        }
        return redirect()->route('admin_login');
    } 
}
