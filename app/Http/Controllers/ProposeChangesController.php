<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Event;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Input;

class ProposeChangesController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
           
            $event =[] ;//Event::select('*')->with('physicaltest')->with('parent');
            if ($request->ajax()) {
                return DataTables::of($event)
                                ->addIndexColumn()
                                ->addColumn('Socio', function ($row) {
                                    return (isset($row->physicaltest->first_name))?$row->physicaltest->first_name.' '.$row->physicaltest->last_name:'';
                                })
                                ->editColumn('By Event', function ($row) {
                                    return ($row->name)?$row->name:'';
                                })
                                ->editColumn('The Event', function ($row) {
                                    return (isset($row->parent->name))?$row->parent->name:'';
                                })
                                ->editColumn('Proposal Date', function ($row) {
                                    return date('Y-m-d',strtotime($row->created_at));
                                })
                                ->addColumn('action', function($row){
                                    
                                })
                                ->filter(function ($instance) use ($request) {
                                    if ($request->get('state')) {
                                        $instance->where('state', $request->get('state'));
                                    }
                                })
//                                ->rawColumns(['note', 'name'])
                                ->make(true);
            }
            return view('frontend.proposed.index');
        }
        return redirect()->route('admin_login');
    }
    
}
