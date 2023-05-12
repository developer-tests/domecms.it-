<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;


class ExportController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            return view('frontend.export.index');
        }
        return redirect()->route('admin_login');
    }
}
