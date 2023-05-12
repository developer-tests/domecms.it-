<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;



class ChangePasswordController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            return view('frontend.change.index');
        }
        return redirect()->route('admin_login');
    }
    public function save(Request $request){
        \App::setLocale(session()->get('locale'));
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'

        ]);
        
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find(Auth::id());
        $user->update(['password'=>\Hash::make($request->password)]);
        \Session::flash('status', 'Password has been changed'); 
        return redirect()->route('user.change');
    }
}
