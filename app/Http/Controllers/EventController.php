<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use App\Models\PhysicalBasicTest;

class EventController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            return view('frontend.event.index');
        }
        return redirect()->route('admin_login');
    }
    
    public function save(Request $request){
        if (Auth::user()) {
            \App::setLocale(session()->get('locale'));
            $validator = Validator::make($request->all(), [
            'name' => 'required',
            'event_start_date' => 'required',
            'event_end_date'    =>'required',
            'event_start_time' => 'required',
            'event_end_time'    =>'required',

        ]);
   
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        $operator_ids = implode(',', $request->instructor);
        $event = new Event();
            $event->name = $request->name;
            $event->start_date = date('Y-m-d H:i:s', strtotime($request->event_start_date));  
            $event->end_date = date('Y-m-d H:i:s', strtotime($request->event_end_date));  
            $event->start_time = $request->event_start_time;   
            $event->end_time = $request->event_end_time;    
            $event->note = $request->note;    
            $event->description = $request->description;    
            $event->max_no_subscription = $request->max_no_subscription;    
            $event->weekly_pay = $request->pay_weekly;    
            $event->monthly_pay = $request->pay_monthly;    
            $event->bimonthly_pay = $request->pay_bimonthly;   
            $event->quaterly_pay = $request->quaterly_pay; 
            $event->sixmonth_pay = $request->pay_six;    
            $event->annual_pay = $request->pay_annual;    
            $event->sixmonth_pay = $request->pay_tantum;    
            $event->family_discount = $request->family_discount;   
            $event->operator_id = $operator_ids; 
            $event->state = 1;
            $event->save();
        redirect()->route('event.addEvent');
        }
        return redirect()->route('admin_login');
    }
    public function list(Request $request){
       if (Auth::user()) {
             $event = Event::latest();
            if ($request->ajax()) {
                return DataTables::of($event)
                                ->addIndexColumn()
                                ->addColumn('Instructor', function ($row) {
//                                    return $row->name;
                                })
                                ->editColumn('Event Name', function ($row) {
                                    return $row->name;
                                })
                                ->editColumn('Description', function ($row) {
                                    return $row->description;
                                })
                                ->editColumn('Maximum number of subscribers', function ($row) {
                                    return $row->max_no_subscription;
                                })
                                ->addColumn('status', function($row){
                                    if($row->active){
                                       return '<span class="badge badge-primary">Active</span>';
                                    }else{
                                       return '<span class="badge badge-danger">Deactive</span>';
                                    }
                                })
                                ->filter(function ($instance) use ($request) {
                                    if ($request->get('status') == '0' || $request->get('status') == '1') {
                                        $instance->where('active', $request->get('status'));
                                    }
                                })
                                 ->addColumn('action', function($row){
                                    return '<a href="'.route('event.eventDisplay',$row->id).'" class="badge badge-primary">View</a>
<a href="#" class="badge badge-info">Add Subscriber</a>';
                 })
                                ->rawColumns(['status','action'])
                                ->make(true);
                
            }
            return view('frontend.event.list');
        }
        return redirect()->route('admin_login'); 
    }
    
    public function display($id){
        $event = Event::find($id);
        return view('frontend.event.display',compact('event'));
    }
    
    public function edit($id){
        $event = Event::find($id);
        $operator = explode(',',$event->operator_id);
        $users = array();
        foreach($operator as $ev){
            $user = PhysicalBasicTest::find($ev);
            if($user){
                $users[]=$user;
            }
        }
        return view('frontend.event.edit',compact('event','users'));
    }
    public function update(Request $request){
        \App::setLocale(session()->get('locale'));
            $validator = Validator::make($request->all(), [
            'name' => 'required',
            'event_start_date' => 'required',
            'event_end_date'    =>'required',
            'event_start_time' => 'required',
            'event_end_time'    =>'required',

        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
//        dd($request->all());
        $operator_ids = implode(',', $request->instructor_user_id);
        $event = [
            'name' => $request->name,
            'start_date'=> date('Y-m-d H:i:s', strtotime($request->event_start_date)), 
            'end_date' => date('Y-m-d H:i:s', strtotime($request->event_end_date)), 
            'start_time' => $request->event_start_time,
            'end_time' => $request->event_end_time,    
            'note' => $request->note,  
            'description' => $request->description,    
            'max_no_subscription' => $request->max_no_subscription,   
            'weekly_pay' => $request->pay_weekly,  
            'monthly_pay' => $request->pay_monthly,   
            'bimonthly_pay' => $request->pay_bimonthly,   
            'quaterly_pay' => $request->quaterly_pay,   
            'sixmonth_pay' => $request->pay_six,    
            'annual_pay' => $request->pay_annual,    
            'sixmonth_pay' => $request->pay_tantum,    
            'family_discount' => $request->family_discount,  
            'operator_id' => $operator_ids, 
            'state' => 1];
            Event::where('id',$request->event_id)->update($event);
        return redirect()->route('event.eventList');
    }
    public function delete($event_id){
        Event::where('id',$event_id)->delete();
        return redirect()->route('event.eventList');
    }
    public function instructor(Request $request){
        $return = array();
        $user = \DB::table('users as u')->select('p.*', 'u.id', 'u.role_id')
                        ->where(\DB::raw("CONCAT(`p`.`first_name`, ' ', `p`.`last_name`)"), "LIKE", "%" . $request->instructor . "%")
                        ->orWhere(\DB::raw("CONCAT(`p`.`last_name`, ' ', `p`.`first_name`)"), "LIKE", "%" . $request->instructor . "%")
                        ->leftjoin('physical_basic_tests as p', 'p.user_id', '=', 'u.id')
                        ->limit(4)->get();
         if (count($user) > 0) {
            foreach($user as $k=>$value){
                if(strstr($value->role_id,"8")){
                    $return[] = $value; 
                }
            }
            return response()->json($return);
        }
    }
    
    
//    public function calender(){
//       return view('frontend.event.calender'); 
//    }
}
