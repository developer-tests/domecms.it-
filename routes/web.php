<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleSocialiteController;
use App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('clear-compiled');
    Artisan::call('config:cache');
    Artisan::call('optimize');

    return "Cache is cleared";
});
Route::get('/updateapp', function () {
    Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});

Route::get('set-locale/{locale}', 'LocalitionController@index')->name('locale.setting');

Auth::routes();
    Route::get('/', 'LoginController@index')->middleware('guest')->name('admin_login');
    Route::get('/', 'LoginController@index')->name('admin_login');
 
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('/clipboard', 'DashboardController@clipboard')->name('clipboard');
    
    //add user
    Route::group(['prefix'=>'user','as'=>'user.'],function(){
        Route::get('/add', 'NewUserController@index')->name('add');
        Route::match(['post','get'],'/form', 'NewUserController@form')->name('form');
        Route::post('/save', 'NewUserController@save')->name('save');
        Route::post('/tutor', 'NewUserController@tutor')->name('tutor');
        Route::post('/getuser', 'NewUserController@getuser')->name('getuser');
        Route::get('/view/{id}', 'NewUserController@display')->name('view');
        Route::get('/edit/{id}/{action?}', 'NewUserController@edit')->name('edit');
        Route::post('/update', 'NewUserController@update')->name('update');
        Route::post('/place', 'NewUserController@place')->name('place');
        Route::get('/change', 'ChangePasswordController@index')->name('change');
        Route::post('/savepassword', 'ChangePasswordController@save')->name('savepassword');
        Route::post('/useraccept', 'NewUserController@user_accept')->name('useraccept');
        Route::get('/user_pdf/{id?}', 'NewUserController@user_pdf')->name('user_pdf');
        Route::post('/getevent', 'NewUserController@get_event')->name('getevent');
        Route::post('/event_register', 'NewUserController@event_register')->name('event_register');
        Route::get('/accept_payment/{user_id}/{event_id}', 'NewUserController@accept_payment')->name('accept_payment');
    });
    //personal data list
    
    Route::group(['prefix'=>'personal','as'=>'personal.'],function(){
        Route::get('/data', 'PersonalDataListController@index')->name('data');
        Route::get('/list/{type?}/', 'PersonalDataListController@list')->name('list');
    });
    //events
    Route::group(['prefix'=>'event','as'=>'event.'],function(){
        Route::get('/addEvent', 'EventController@index')->name('addEvent');
        Route::get('/calender', 'EventController@calender')->name('calender');
        Route::post('/save', 'EventController@save')->name('save');
        Route::get('/eventList', 'EventController@list')->name('eventList');
        Route::get('/eventDisplay/{id}', 'EventController@display')->name('eventDisplay');
        Route::get('/edit/{id}', 'EventController@edit')->name('edit');
        Route::post('/update', 'EventController@update')->name('update');
        Route::get('/delete/{id}', 'EventController@delete')->name('delete');
        Route::post('/instructor', 'EventController@instructor')->name('instructor');
    });
    
    //situation
    Route::group(['prefix'=>'situation','as'=>'situation.'],function(){
    Route::get('/index', 'SituationController@index')->name('index');
    Route::get('/add', 'SituationController@add')->name('add');
    Route::match(['get','post'],'list', 'SituationController@form')->name('list');
    Route::get('/edit/{id}', 'SituationController@edit')->name('edit');
    Route::post('/save', 'SituationController@save')->name('save');
    });
    
    //Manage Association data
    Route::group(['prefix'=>'association','as'=>'association.'],function(){
        Route::get('/index', 'AssociationController@index')->name('index');
        Route::get('/edit/{id}', 'AssociationController@edit')->name('edit');
        Route::post('/save', 'AssociationController@save')->name('save');
        Route::post('/search', 'AssociationController@search')->name('search');
        Route::post('/council_member', 'AssociationController@council_member')->name('council_member');
        Route::post('/council_member_remove', 'AssociationController@council_member_remove')->name('council_member_remove');
    });
    
    
    //free recepit
    Route::group(['prefix'=>'recepit','as'=>'recepit.'],function(){
        Route::get('/index/{id?}', 'RecepitController@index')->name('index');
        Route::post('/save', 'RecepitController@save')->name('save');
        Route::get('/pdf/{id?}', 'RecepitController@pdf')->name('pdf');
    });
    
    //Propose changes
    Route::group(['prefix'=>'proposed','as'=>'proposed.'],function(){
        Route::get('/index', 'ProposeChangesController@index')->name('index');
    });
    
     //Intrance/Exit
    Route::get('/intrance', 'IntranceController@index')->name('intrance');
    
    //ticket
    Route::group(['prefix'=>'ticket','as'=>'ticket.'],function(){
    Route::get('/index', 'TicketController@index')->name('index');
    Route::post('/msg', 'TicketController@msg')->name('msg');
    Route::post('/send', 'TicketController@send')->name('send');
    Route::post('/search', 'TicketController@search')->name('search');
    });
    
    // export
    Route::get('/export', 'ExportController@index')->name('export');
    
    //log
      Route::group(['prefix'=>'log','as'=>'log.'],function(){
        Route::get('/index', 'LogController@index')->name('index');
    });
   
     // operator manage
    Route::group(['prefix'=>'operator','as'=>'operator.'],function(){
        Route::get('/index', 'OperatorController@index')->name('index');
        Route::get('/edit/{id}', 'OperatorController@edit')->name('edit');
    });
    //make access
    Route::group(['prefix'=>'access','as'=>'access.'],function(){
        Route::get('/set', 'AccessController@index')->name('set');
        Route::post('/save', 'AccessController@save')->name('save');
    });
    
//<div class="col-sm-12 form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
//                                <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
//                                <textarea name="description" id="input-description" class="form-control summernote form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}">{{old('description')}}</textarea>
//                                @if ($errors->has('description'))
//                                    <span class="invalid-feedback" role="alert">
//                                        <strong>{{ $errors->first('description') }}</strong>
//                                    </span>
//                                @endif
//                            </div>
















