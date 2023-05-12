<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\PaymentMethod;
use App\Models\FeeReceipt;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class RecepitController extends Controller {

    public function __construct() {
//        if(!Auth::check()) {
//            return redirect()->route('admin_login'); 
//        }
    }

    public function index(Request $request) {
        if (Auth::user()) {
            $methods = PaymentMethod::all();
            return view('frontend.recepit.index',compact('methods'));
        }
        return redirect()->route('admin_login');
    }
    public function save(Request $request){
        \App::setLocale(session()->get('locale'));
        $validator = Validator::make($request->all(), [
            'accountholder' => 'required',
            'amount' => 'required',

        ]);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $feereceipt = new FeeReceipt();
        $feereceipt->user_id = $request->accountholder_id;
        $feereceipt->amount = $request->amount;
        $feereceipt->payment_method = $request->payment_method;
        $feereceipt->note = $request->note;
//        $feereceipt->save();
                
        \Session::flash('status', 'Data Added!');
        return redirect()->route('recepit.index'); 
    }
   
    public function pdf($id) {
        $user = PhysicalBasicTest::where('user_id', $id)->with('userinfo')->with('mainUser')->first();
        $assoc = Association::where('user_id', Auth::id())->with('assoc_data')->first();
        $fpdf = new PDF('L');
        $fpdf->assoc($assoc);
        ///
        $title = "Ricevuta " . $user->first_name . " del: ";
        $fpdf->SetTitle($title);
        $fpdf->AliasNbPages();
        $fpdf->AddPage();
        $fpdf->Ln(6);
        $fpdf->SetFont('Arial', '', 11);

        $x = $fpdf->Getx();
        $y = $fpdf->Gety();
        $fpdf->Setxy($x - 10, $y);
        $cell = "Ricevuta nr: ";
        $fpdf->Cell(135, 1, $cell, 0, 1, "R");
        $fpdf->Setxy(297 - 135 - $x, $y);
        $fpdf->Cell(135, 1, $cell, 0, 1, "R");
        $fpdf->Ln(6);
        
//        $assoc = Association::where('user_id', $id)->with('assoc_data')->first();
        $x = $fpdf->Getx();
        $y = $fpdf->Gety();
        $luogo_nascita = $user->userinfo->city_of_birth . " (" . $user->userInfo->residence_province . ")";

        $fpdf->MultiCell(135, 5, "Il/la " . iconv('UTF-8', 'windows-1252', $user->first_name) . " genitore/tutore del socio junior " . iconv('UTF-8', 'windows-1252', $user->first_name) . ", nato a " . iconv('UTF-8', 'windows-1252', $luogo_nascita) . " il " . $user->mainUser[0]->date_of_birth . " (CF: " . $user->cf . ")"
                . ", ha versato in data odierna la quota associativa per l'anno " . $user->acceptance_date . " pari a " . $assoc->assoc_data->membership_fee
                . " euro", 0, "J");
        $fpdf->Setxy(297 - 135 - $x, $y);
        $fpdf->MultiCell(135, 5, "Il/la " . iconv('UTF-8', 'windows-1252', $user->first_name) . " genitore/tutore del socio junior " . iconv('UTF-8', 'windows-1252', $user->first_name) . ", nato a " . iconv('UTF-8', 'windows-1252', $luogo_nascita) . " il " . $user->mainUser[0]->date_of_birth . " (CF: " . $user->cf . ")"
                . ", ha versato in data odierna la quota associativa per l'anno " . $user->acceptance_date . " pari a " . $assoc->assoc_data->membership_fee
                . " euro", 0, "J");
        ///

        $fpdf->Output();

        exit;
    }
}
