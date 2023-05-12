<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use App\Models\Event;
use App\Models\SituationCm;
use App\Models\User;
use App\Models\Clipboard;
class DashboardController extends Controller
{
    public function __construct(){
        
    }
    public function index()
    {
        if(Auth::user()){
            $total_event = Event::select('*')->count();
            $sedule_today = Event::select('*')->where('end_date',date('Y-m-d'))->count();
            $in_progress = Event::select('*')->where('end_date','>',date('Y-m-d'))->count();
            
            $total_situaltion = SituationCm::select('*')->count();
            $expired_situaltion = SituationCm::select('*')->where('expiration_date','>',date('Y-m-d'))->count();
            $expired_situaltion_month =  SituationCm::select('*')->where('expiration_date',date('m'))->count();
            
            $user =User::count();
            
            $clipboard = Clipboard::first();
            return view('frontend.dashboard',compact('total_event','sedule_today','in_progress','total_situaltion','expired_situaltion','expired_situaltion_month','user','clipboard'));
        }
        return redirect()->route('admin_login');
       
        
    }
    public function clipboard(Request $request){
        $clipboard = new Clipboard();
        $clipboard->truncate();
        $clipboard->msg = $request->msg;
        $clipboard->save();
        return true;
    }

}
