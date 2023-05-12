<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class PersonalDataListController extends Controller {

    protected $year_type;

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            return view('frontend.personal.index');
        }
        return redirect()->route('admin_login');
    }

    public function list(Request $request) {
        if (Auth::user()) {
            $precedents = '';
            $segment = $request->segment(3);
            if (!$segment) {
                $segment = $request->filter;
            }
            $user = \DB::table('users')->select('id', 'name', 'last_name', 'role_id', 'date_of_birth', 'created_at', 'note', 'acceptance_date')->where('id', '!=', 1)
                    ->where('role_id','like','%1%');

            if ($segment == 'Current year') {
                $user->where(function($q) {
                    $q->whereYear('acceptance_date', date('Y'))->where('acceptance_date', '!=', NULL);
                });
            }
            if ($segment == 'Last year') {
                $user->where(function($q) {
                    $q->whereYear('acceptance_date', date('Y', strtotime('-1 year')));
                });
            }
            if ($segment == 'Previous') {
                $user->where(function($q) {
                    $q->whereYear('acceptance_date','!=',date('Y'))
                      ->where('acceptance_date' , '=',NULL, 'or');
                });
//                $user->whereYear('acceptance_date','!=',date('Y'))
//                ->where('acceptance_date' , '=',NULL, 'or');
            }
//            if(!$this->year_type){
//                return false;
//            }
            $user = $user->orderBy('id', 'desc')->get();
            if ($request->ajax()) {
                return DataTables::of($user)
                                ->addIndexColumn()
                                ->editColumn('name', function ($row) {
                                    return $row->name;
                                })
                                ->editColumn('last_name', function ($row) {
                                    return $row->last_name;
                                })
                                ->editColumn('date_of_birth', function ($row) {
                                    return $row->date_of_birth;
                                })
                                ->editColumn('created_at', function ($row) {
                                    return $row->created_at;
                                })
                                ->addColumn('note', function ($row) {
                                    return $row->note;
                                })
                                ->editColumn('action', function ($row) use ($segment) {
                                    return $this->accept_date($row, $segment);
                                })
                                ->rawColumns(['note', 'action'])
                                ->make(true);
            }
            return view('frontend.personal.personal_data_list')->with('user', $user)->with('segment', $segment);
        }
        return redirect()->route('admin_login');
    }

    public function accept_date($row, $segment) {
        $return = '<a href="' . route('user.view',$row->id) . '" class="badge badge-info">View</a> ';
        if($segment =='Previous'){
            $pos = explode(',', $row->role_id);
            if ((in_array(1, $pos))) {
                $return .= '<a href="' . route('user.edit', ['id' => $row->id, 'action' => 'accept_user']) . '" class="badge badge-primary">Accept User</a>';
            }
            return $return;
        }else{
            $return .= '<a href="' . route('user.edit', ['id' => $row->id, 'action' => 'add_event']) . '" class="badge badge-primary">Add To Event</a> ';
            return $return;
        }
    }

}
