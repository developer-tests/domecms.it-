<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Ticket;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TicketController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            $users = Ticket::where('to_user',Auth::id())->orWhere('from_user',Auth::id())->groupBy('from_user')->with('user')->get();
            $first_user = Ticket::orderBy('id','asc')->get();
            $msgs=[];
            if(count($first_user)>0){
                $first_user = $first_user[0];
                $msgs = Ticket::where('to_user',$first_user->from_user)
                        ->orWhere('from_user',$first_user->from_user)->orderBy('id','asc')->get(); 
            }
            
            return view('frontend.ticket.index',compact('msgs','users'));
        }
        return redirect()->route('admin_login');
    }
    public function msg(Request $request){
        $msgs = Ticket::where('from_user',Auth::id())->where('to_user',$request->user)
                ->orWhere('to_user',Auth::id())->where('from_user',$request->user)
                ->orderBy('id','asc')->get(); 
        return response()->json($msgs);
    }
    public function send(Request $request){
        $tr = new GoogleTranslate();
        $msg = $tr->setSource('en')->setTarget('it')->translate($request->send);  
        \App::setLocale(session()->get('locale'));
        $ticket = new Ticket();
        $ticket->to_user = $request->to_user;
        $ticket->from_user = Auth::id();
        $ticket->setTranslation('msg', 'en', $request->send)->setTranslation('msg', 'nl', $msg);
        return $ticket->save();
    }
    public function search(Request $request){
         $search = $request->search;
        if($search){
        $users = User::where(\DB::raw("CONCAT(`name`, ' ', `last_name`)"),"LIKE","%".$search."%")
                ->orWhere(\DB::raw("CONCAT(`last_name`, ' ', `name`)"),"LIKE","%".$search."%")->get();
        return response()->json($users);
        }
    }
}
