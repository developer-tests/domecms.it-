@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')
<style>
    .add-f{
        font-family: inherit;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.25;
        display: inline-block;
        /*width: 100%;*/
        /*margin: 0;*/
        margin: 0.5rem 0;
        /*padding: 1.5rem;*/
        cursor: pointer;
        text-align: left;
        vertical-align: middle;
        text-decoration: none;
        color: #32325d;
        border: 0;
        border-radius: 0.375rem;
        /*background-color: #f6f9fc;*/
    }
    .add-f i{
        font-size: 1.5rem;
        box-sizing: content-box;
        vertical-align: middle;
        color: #5e72e4;
    }
    .red{
        color:red;
    }
</style>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{__('New') }} </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('user.update')}}" autocomplete="off" id="update_form">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        @if($action=='accept_user')

                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <a class="col-12 mb-0" href="#" data-toggle="modal" data-target="#accept_year">{{__('Accept for the year 2023') }}</a>
                                            </div><br>
                                        </div><hr>
                                        @endif
                                        @if($action=='add_event')

                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <a class="col-12 mb-0" href="#" data-toggle="modal" data-target="#payment">{{__('Register for Event') }}</a>
                                            </div><br>
                                        </div><hr>
                                        @endif
                                        <div class="card-header bg-white border-0" >
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Add Role') }}</h3>
                                            </div><br>
                                            <div class="row role-container">
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <select type="text" class="form-control select-role">
                                                            @foreach($roles as $role)
                                                            <option value="{{$role->id}}" @if($initial_role->id ==$role->id ) selected="selected" @endif>
                                                                {{$role->getTranslation('name', (\Session::get('locale_mod') == 'en')? 'en' :'nl' ,false)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @if($user_roles->role_id)
                                                <input type="hidden" value="[{{$implode_user_role}}]" id="role_ides" name="role_ids[]" class="role_ids" />
                                                @foreach($multiple_role as $ky=>$rol)
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6 @if($ky) add-user @endif">
                                                    <div class="col-md-4 add-user-div" style="max-width:100% !important">
                                                        <div class="alert alert-info alert-dismissible fade show " role="alert">
                                                            <div class="p-3 mb-2 text-white users" data-i="{{$rol->id}}">
                                                                <!--@if(\Session::get('locale_mod') == 'en') {{$initial_role->name}} @else {{$initial_role->name}} @endif<br>!-->
                                                                {{$rol->name}} <br>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <script>
                                                    var initial = "{{$implode_user_role}}";
                                                    var spli = initial.split(',');
                                                    var glob_role = [];
                                                    for (var u = 0; u < spli.length; u++) {
                                                        glob_role.push(spli[u]);
                                                    }
                                                </script>
                                                @else
                                                <input type="hidden" value="{{$initial_role->id}}" name="role_ids[]" class="role_ids" />
                                                <div class="col-md-6 add-user">
                                                    <div class="col-md-4 add-user-div" style="max-width:100% !important">
                                                        <div class="alert alert-info alert-dismissible fade show " role="alert">
                                                            <div class="p-3 mb-2 text-white users" data-i="{{$initial_role->id}}">
                                                                <!--@if(\Session::get('locale_mod') == 'en') {{$initial_role->name}} @else {{$initial_role->name}} @endif<br>!-->
                                                                {{$initial_role->name}} <br>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    var initial = "{{$initial_role->id}}";
                                                    var glob_role = [initial];
                                                </script>
                                                @endif
                                                <input type="hidden" value="{{ Request::segment(3) }}" name="edit_id" />

                                            </div>
                                        </div><hr>
                                        <div id="tutor_div">
                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Tutors') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group custom-control-inline" style="width:100%">
                                                            <input type="text" class="form-control tutor_input" name="tutor[]" list="items" placeholder="{{__('Legal guardian') }}">
                                                            <input type="hidden" id="restriction" name="restriction" value="solo_maggiorenni"/>
                                                            <div class="add-f" id="plus_tutor_input">
                                                                <i class="ni ni-fat-add"></i>
                                                            </div>
                                                            <datalist id="items" >

                                                            </datalist>
                                                            <input type="hidden" name="hidden_user_id" id="hidden_user_id" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-md-4" style="max-width:100% !important">
                                                            <div class="alert alert-info alert-dismissible fade show " role="alert">
                                                                <div class="p-3 mb-2 text-white users" data-i="{{$data->phy->id}}">
                                                                    {{$data->phy->first_name.' '.$data->phy->last_name}}<br> 
                                                                </div>
                                                                <button type='button' class='btn close'data-dismiss='alert' id='remove_user' aria-label='Close'>
                                                                    <span aria-hidden='true'>×</span>
                                                                </button>
                                                            </div>
                                                        </div><br>
                                                    </div>

                                                </div>
                                            </div><hr>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Registry') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                @if($data->initial_role == 1)
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="tutor" type="checkbox" name="tutor_check" >
                                                        <label class="custom-control-label" for="tutor">{{__('Tutor') }}</label>
                                                    </div>
                                                </div>
                                                @endif
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('First Name') }}</label><br>
                                                        <input type="text" class="form-control" name="first_name"  placeholder="{{__('First Name') }}" value="{{$data->phy->first_name}}">
                                                        @if ($errors->has('first_name'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Last Name') }}</label><br>
                                                        <input type="text"  class="form-control" name="last_name" placeholder="{{__('Last Name') }}" value="{{$data->phy->last_name}}"/>
                                                        @if ($errors->has('last_name'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('CF') }}</label><br>
                                                        <input type="text"  class="form-control" name="cf" placeholder="{{__('CF') }}" value="{{$data->phy->cf}}">
                                                        @if ($errors->has('cf'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('cf') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="gender" id="customRadioInline1"  class="custom-control-input" @if($data->sex == 1) checked="checked" @endif>
                                                        <label class="custom-control-label" for="customRadioInline1">{{__('Male') }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="gender" id="customRadioInline2" class="custom-control-input" @if($data->sex == 0) checked="checked" @endif>
                                                        <label class="custom-control-label" for="customRadioInline2">{{__('Female') }}</label>
                                                    </div>
                                                    @if ($errors->has('gender'))
                                                    <span class="red" role="alert">
                                                        <strong>{{ $errors->first('gender') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    @if($data->initial_role == 1)
                                                    <label for="exampleFormControlFile1">{{__('Registered relatives') }}</label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="registered_relative" id="registered_relative" value="1" class="custom-control-input" @if($data->register_relative == 1) checked="checked" @endif>
                                                        <label class="custom-control-label" for="registered_relative">{{__('Yes') }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="registered_relative" id="registered_relative1" value="0" class="custom-control-input" @if($data->register_relative == 1) checked="checked" @endif>
                                                        <label class="custom-control-label" for="registered_relative1">{{__('No') }}</label>
                                                    </div>
                                                    @if ($errors->has('registered_relative'))
                                                    <span class="red" role="alert">
                                                        <strong>{{ $errors->first('registered_relative') }}</strong>
                                                    </span>
                                                    @endif
                                                    @endif    
                                                </div>
                                            </div>
                                        </div><hr>

                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Place and date of birth') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('City of Birth') }}</label><br>
                                                        <input type="text" class="form-control" list="places_of_birth" id="city_of_birth" name="city_of_birth" placeholder="{{__('City of Birth') }}" value="{{$data->city_of_birth}}">
                                                        @if ($errors->has('city_of_birth'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('city_of_birth') }}</strong>
                                                        </span>
                                                        @endif
                                                        <datalist id="places_of_birth" >

                                                        </datalist>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Cuntry of Birth') }}</label><br>
                                                        <input type="text"  class="form-control" name="country_of_birth" placeholder="{{__('County of birth') }}" value="{{$data->country_of_birth}}"/>
                                                        @if ($errors->has('country_of_birth'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('country_of_birth') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Country') }}</label><br>
                                                        <input type="text" class="form-control" name="country" placeholder="{{__('Country') }}" value="{{$data->country}}">
                                                        @if ($errors->has('country'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('country') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Date of Birth') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                <input type="text" name="DOB" class="form-control datepicker" value='{{$data->date_of_birth}}'>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('DOB'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('DOB') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Residence') }}</h3>
                                            </div><br>
                                            <div class='import'>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input class="custom-control-input" id="import_tutor_check" type="checkbox" name="import_tutor_check" >
                                                            <label class="custom-control-label" for="import_tutor_check">{{__('Import from Tutor') }}</label>
                                                        </div>
                                                    </div>
                                                </div><br></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency City') }}</label><br>
                                                        <input type="text" class="form-control" list="residence_list" id="residence_city" name="residence_city" placeholder="{{__('City') }}" value="{{$data->residence_city}}">
                                                        @if ($errors->has('residence_city'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('residence_city') }}</strong>
                                                        </span>
                                                        @endif
                                                        <datalist id="residence_list"></datalist>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Resicency Province') }}</label><br>
                                                        <input type="text"  class="form-control" id='residence_province' name="residence_province" placeholder="{{__('Province') }}" value="{{$data->residence_province}}"/>
                                                        @if ($errors->has('residence_province'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('residence_province') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency Potal Code') }}</label><br>
                                                        <input type="text" class="form-control" id='residence_postal_code' name="residence_postal_code" placeholder="{{__('POSTAL CODE') }}" value="{{$data->residence_postal}}">
                                                        @if ($errors->has('residence_postal_code'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('residence_postal_code') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency Street') }}</label><br>
                                                        <input type="text"  class="form-control" id='residence_street' name="residence_street" placeholder="{{__('Street') }}" value="{{$data->residence_street}}"/>
                                                        @if ($errors->has('residence_street'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('residence_street') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Residency Country') }}</label><br>
                                                        <input type="text" class="form-control" id="residence_country" name="residence_country" placeholder="{{__('Country') }}" value="{{$data->residence_country}}">
                                                        @if ($errors->has('residence_country'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('residence_country') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Home') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home City') }}</label><br>
                                                        <input type="text" class="form-control" id="domicile_city" list="domicile_list" name="home_city" placeholder="{{__('City') }}" value="{{$data->home_city}}">
                                                        @if ($errors->has('home_city'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('home_city') }}</strong>
                                                        </span>
                                                        @endif
                                                        <datalist id="domicile_list"></datalist>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home Province') }}</label><br>
                                                        <input type="text"  class="form-control" name="home_province" placeholder="{{__('Province') }}" value="{{$data->home_province}}"/>
                                                        @if ($errors->has('domicile_province'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('home_province') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home Postal Code') }}</label><br>
                                                        <input type="text" class="form-control" name="home_postal_code" placeholder="{{__('POSTAL CODE') }}" value="{{$data->home_postal}}">
                                                        @if ($errors->has('domicile_postal_code'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('home_postal_code') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home Street') }}</label><br>
                                                        <input type="text"  class="form-control" name="home_street" placeholder="{{__('Street') }}" value="{{$data->home_street}}"/>
                                                        @if ($errors->has('home_street'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('home_street') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Home Country') }}</label><br>
                                                        <input type="text" class="form-control" name="home_country" placeholder="{{__('Country') }}" value="{{$data->home_country}}">
                                                        @if ($errors->has('home_country'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('home_country') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-header bg-white border-0" id="fa-fa-contain">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Delivery') }}</h3>
                                            </div><br>

                                            @php $phone = explode(', ',$data->delivery_phone);@endphp
                                            @foreach($phone as $k=>$ex)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label >{{__('Phone') }}</label><br>
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text" class="form-control" name="delivery_phone[]" placeholder="{{__('Phone') }}" value="{{$ex}}">
                                                        <div class="add-f" id="plus_icn_phone">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            @php $cell = explode(', ',$data->delivery_cellphone);@endphp
                                            @foreach($cell as $k=>$ex)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label >{{__('Cell Phone') }}</label><br>
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text"  class="form-control" name="delivery_cell_phone[]" placeholder="{{__('Cell phone') }}" value="{{$ex}}"/>
                                                        <div class="add-f" id="plus_icn_cell_phone">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            @php $mail = explode(', ',$data->delivery_mail);@endphp
                                            @foreach($mail as $k=>$ex)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label >{{__('Mail') }}</label><br>
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text" class="form-control" name="delivery_mail[]" placeholder="{{__('Mail') }}" value="{{$ex}}">
                                                        <div class="add-f" id="plus_icn_mail">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            @php $pec = explode(', ',$data->delivery_pec);@endphp
                                            @foreach($pec as $k=>$ex)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label >{{__('PEC') }}</label><br>
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text"  class="form-control" name="delivery_pec[]" placeholder="{{__('PEC') }}" value="{{$ex}}"/>
                                                        <div class="add-f" id="plus_icn_pec">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            @php $fax = explode(', ',$data->delivery_fax);@endphp
                                            @foreach($fax as $k=>$ex)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label >{{__('Fax') }}</label><br>
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text" class="form-control" name="delivery_fax[]" placeholder="{{__('Fax') }}" value="{{$ex}}">
                                                        <div class="add-f" id="plus_icn_fax">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Note') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Note') }}</label><br>
                                                        <input type="text" class="form-control" name="note" placeholder="{{__('Note') }}" value="{{$data->delivery_note}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(isset($cm[0]))
                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Last CM') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Delivery date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                <input type="text" name="delivery_date" class="form-control datepicker" value="{{$cm[0]->delivery_date}}">
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('delivery_date'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('delivery_date') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Date of issue') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                <input type="text" name="date_of_issue" class="form-control datepicker" value="{{$cm[0]->date_of_issue}}">
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('delivery_date'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('date_of_issue') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Expiry date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                <input type="text" name="expiration_date" class="form-control datepicker" value="{{$cm[0]->expiration_date}}">
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('expiry_date'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('expiry_date') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Note') }}</label><br>
                                                        <input type="text" class="form-control" name="cm_note" placeholder="{{__('Note') }}" value="{{$cm[0]->note}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($action =='accept_payment_for_event')
                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Active Event') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label >{{__('Event') }}</label><br>
                                                        <a class="col-12 mb-0" href="{{route('user.accept_payment',['user_id'=>$data->phy->user_id,'event_id'=>$event_id_fs])}}" >{{__('Accept Payment') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">Save</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="accept_year" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('User Acceptance')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control datepicker" name="accept_date"  type="text" value="{{date('m/d/Y')}}" >
                    <select type="text" class="form-control" name="accept_date_name" id="accept_user_id">
                        <option value="{{$data->phy->user_id}}">{{$data->phy->first_name.' '.$data->phy->last_name}}</option>
                    </select>
                    <div class="custom-control custom-checkbox mb-3">
                        <input class="custom-control-input" id="mail_receipt" name="mail_receipt"  type="checkbox">
                        <label class="custom-control-label" for="mail_receipt">{{__('Send receipt by email') }}</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">{{__('Reset')}}</button>
                    <button type="button" class="btn btn-primary" id="confirmation">{{__('Confirmation')}}</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Event registration box')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control event_input" name="event" list="event_list" placeholder="{{__('Event') }}">
                        <datalist id="event_list" >
                        </datalist>
                        <input type='hidden' name='event_id' id="event_id"/>
                    </div>
                    <input class="form-control datepicker" name="accept_date"  type="text" value="{{date('m/d/Y')}}" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">{{__('Reset')}}</button>
                    <button type="button" class="btn btn-primary" id="confirmation_of_event">{{__('Confirmation')}}</button>
                </div>
            </div>
        </div>
    </div>
    <link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
    <script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            var glob_count = 0;
            var glob_user = [];

            $('#reset').on('click', function () {
                $("#role").val($("#role option:first").val());
            })
            $('.language').css('display', 'none');
            $('#tutor_div').css('display', 'none');
            $('.import').css('display', 'none');
            $('#tutor').on('click', function () {
                if ($(this).is(':checked')) {
                    $('#tutor_div').css('display', 'block');
                    $('.import').css('display', 'block');
                } else {
                    $('#tutor_div').css('display', 'none');
                    $('.import').css('display', 'none');
                }
            });

            $('#plus_icn_phone').on('click', function () {
                var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_phone[]' class='form-control'  placeholder='{{__('Phone') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
                $('#fa-fa-contain').append(apnd);
            });
            $('#plus_icn_cell_phone').on('click', function () {
                var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_cell_phone[]' class='form-control' placeholder='{{__('Cell Phone') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
                $('#fa-fa-contain').append(apnd);
            });
            $('#plus_icn_mail').on('click', function () {
                var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_mail[]' class='form-control' placeholder='{{__('Mail') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
                $('#fa-fa-contain').append(apnd);
            });
            $('#plus_icn_pec').on('click', function () {
                var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_pec[]' class='form-control' ' placeholder='{{__('PEC') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
                $('#fa-fa-contain').append(apnd);
            });
            $('#plus_icn_fax').on('click', function () {
                var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='delivery_fax[]' class='form-control'  placeholder='{{__('Fax') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
                $('#fa-fa-contain').append(apnd);
            });
            var data_items_i = 0;
            $('#plus_tutor_input').on('click', function () {

                var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='tutor[]' list='items_" + data_items_i + "' class='form-control tutor_input'  placeholder='{{__('Tutor') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div><datalist id='items_" + data_items_i + "'></datalist></div></div></div>";
                $('#fa-fa-contain_tutor').append(apnd);
                data_items_i++;
            });
            $('body').on('click', '.remove-fa-fa', function () {
                $(this).parent().parent().parent().remove();
            });
            $('body').on('keyup', '.tutor_input', function () {
                if ($(this).val().length > 1) {
                    var restriction = $('#restriction').val();
                    var tutor = $(this).val();
                    var ts = $(this);
                    var options = '';
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('user.tutor') }}",
                        data: {"_token": "{{ csrf_token() }}", restriction: restriction, tutor: tutor},
                        success: function (data) {
                            if (data.length > 0) {
                                for (var i = 0; i < data.length; i++) {
                                    if (data[i].id) {
                                        options += '<option data-hi-d="' + data[i].id + '">' + data[i].first_name + ' ' + data[i].last_name + ' (' + data[i].date_of_birth + ')' + '</option>';
                                    }
                                }
                                $('#items').empty();
                                $(ts).parent().find('datalist').empty();
                                $(ts).parent().find('datalist').append(options);
                            }
                        }
                    });
                }
            });
            var gb_ar = [];
            var gb_ar_tutor = [];
            $("body").on('input', '.tutor_input', function () {
                //var val = this.value;
                var userText = $(this).val();
                var ths = $(this);

                $(ths).parent().find("datalist").find("option").each(function () {
                    if ($(this).val() == userText) {
                        if (!gb_ar.includes(userText)) {
                            $("#tutor_ids").remove();
                            $('#hidden_user_id').val($(this).attr('data-hi-d'));
                            gb_ar.push(userText);
                            gb_ar_tutor.push($(this).attr('data-hi-d'));
                        } else {
                            ths.val('');
                        }
                    } else {
                        var index = gb_ar_tutor.indexOf($(this).attr('data-hi-d'));
                        if (index !== -1) {
                            gb_ar_tutor.splice(index, 1);
                        }
                        var index1 = gb_ar.indexOf($(this).val());
                        if (index1 !== -1) {
                            gb_ar.splice(index, 1);
                        }

                    }
                    $('#tutor_ids').remove();
                    var element = document.createElement('input');
                    element.type = 'hidden';
                    element.value = gb_ar_tutor;
                    element.id = 'tutor_ids';
                    element.name = 'tutor_ids';
                    $('#update_form').append(element);
                });
            });

            $('#city_of_birth').on('keyup', function () {
                if ($(this).val().length > 2) {
                    var key = $(this).val();
                    var options;

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('user.place') }}",
                        data: {"_token": "{{ csrf_token() }}", key: key},
                        success: function (data) {
                            if (data) {
                                for (var i = 0; i < data.length; i++) {
                                    options += '<option data-p="' + data[i].provinces.name + '">' + data[i].name + ' (' + data[i].provinces.name + ')' + '</option>';
                                }
                                $('#places_of_birth').empty();
                                $('#places_of_birth').append(options);
                            }
                        }
                    });
                }
            });
            $("#city_of_birth").on('input', function () {
                var val = this.value;
                var userText = $(this).val();

                $("#places_of_birth").find("option").each(function () {
                    if ($(this).val() == userText) {
                        $('input[name=country_of_birth]').empty();
                        $('input[name=country]').empty();
                        $('input[name=country_of_birth]').val($(this).attr('data-p'));
                        $('input[name=country]').val('ITALIA');
                    }
                });
            });

            $('#residence_city').on('keyup', function () {
                var id = $('#hidden_user_id').val();
                if (!id) {
                    var key = $(this).val();
                    var options = '';
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('user.place') }}",
                        data: {"_token": "{{ csrf_token() }}", key: key},
                        success: function (data) {
                            if (data) {
                                for (var i = 0; i < data.length; i++) {
                                    options += '<option data-p="' + data[i].provinces.name + '" data-pc="' + data[i].postal_code + '">' + data[i].name + ' (' + data[i].provinces.name + ')' + '</option>';
                                }
                                $('#residence_list').empty();
                                $('#residence_list').append(options);
                            }
                        }
                    });
                }
            });
            $("#residence_city").on('input', function () {
                var val = this.value;
                var userText = $(this).val();

                $("#residence_list").find("option").each(function () {
                    if ($(this).val() == userText) {
                        $('input[name=residence_province]').empty();
                        $('input[name=residence_country]').empty();
                        $('input[name=residence_postal_code]').empty();
                        $('input[name=residence_province]').val($(this).attr('data-p'));
                        $('input[name=residence_postal_code]').val($(this).attr('data-pc'));
                        $('input[name=residence_country]').val('ITALIA');
                    }
                });
            });

            $('#domicile_city').on('keyup', function () {
                if ($(this).val().length > 2) {
                    var key = $(this).val();
                    var options;

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('user.place') }}",
                        data: {"_token": "{{ csrf_token() }}", key: key},
                        success: function (data) {
                            if (data) {
                                for (var i = 0; i < data.length; i++) {
                                    options += '<option data-p="' + data[i].provinces.name + '" data-pc="' + data[i].postal_code + '">' + data[i].name + ' (' + data[i].provinces.name + ')' + '</option>';
                                }
                                $('#domicile_list').empty();
                                $('#domicile_list').append(options);
                            }
                        }
                    });
                }
            });
            $("#domicile_city").on('input', function () {
                var val = this.value;
                var userText = $(this).val();

                $("#domicile_list").find("option").each(function () {
                    if ($(this).val() == userText) {
                        $('input[name=domicile_province]').empty();
                        $('input[name=domicile_country]').empty();
                        $('input[name=domicile_postal_code]').empty();
                        $('input[name=domicile_province]').val($(this).attr('data-p'));
                        $('input[name=domicile_postal_code]').val($(this).attr('data-pc'));
                        $('input[name=domicile_country]').val('ITALIA');
                    }
                });
            });

//    $('.plus_role').on('click',function(){
//    var locale = "{{\Session::get('locale_mod')}}";
//    if(locale == 'en'){
//        var apnd = "<div class='col-md-6 remove_role_div'><div class='form-group custom-control-inline' style='width:100%'><select type='text' class='select-role form-control' name='role[]'>";
//    }else{
//        var apnd = "<div class='col-md-6 remove_role_div'><div class='form-group custom-control-inline' style='width:100%'><select type='text' class='select-role form-control' name='role[]'><option value='2'>Iscritto</option><option value='3'>Collaborator</option><option value='4'>Tutore</option><option value='5'>Ente</option><option value='6'>Azienda</option><option value='7'>Rappresentante legale</option><option value='8'>Istruttore legale</option></select><div class='add-f remove-role' ><i class='ni ni-fat-delete'></i></div></div></div>";
//    }
//    $('.role-container').append(apnd);
//    });

            $('body').on('change', '.select-role', function () {
                if (!glob_role.includes($(this).val())) {
                    glob_role.push($(this).val());
                    console.log(glob_role);
                    var apnd = "<div class='alert alert-info alert-dismissible fade show ' role='alert'><div class='p-3 mb-2 text-white users' data-i='" + $(this).find(":selected").val() + "'>" + $(this).find(":selected").text() + "<br></div> <button type='button' class='btn close'data-dismiss='alert' id='remove_user' aria-label='Close'><span aria-hidden='true'>×</span></button></div>";
                    var role_ids = glob_role;
                    $(".role_ids").val('[' + role_ids.join(',') + ']');
                    $('.add-user-div').append(apnd);
                }
            });
//    $('body').on('click','.add-user-div',function(){
//        $(this).find('remove_role_div').remove();
//    });

            $('body').on('click', '#confirmation', function () {
                var accept_date = $('input[name=accept_date]').val();
                var accept_user_id = $('#accept_user_id').val();
                var mail_receipt = $('#mail_receipt').val();
                if(accept_user_id){
                    $.ajax({
                        type: 'post',
                        url: "{{ route('user.useraccept') }}",
                        data: {"_token": "{{ csrf_token() }}", accept_date: accept_date, accept_user_id: accept_user_id, mail_receipt: mail_receipt},
                        success: function (data) {
                            if (data) {
                                var route = "{{route('user.user_pdf',$data->phy->user_id)}}"
                                window.open(route, '_blank');
                                window.location = "{{route('user.view',$data->phy->user_id)}}"
                            }
                        }
                    });
                }
            }); 
        });
        $("#import_tutor_check").on('click', function () {
            if ($("#import_tutor_check").is(':checked')) {
                var id = $('#hidden_user_id').val();
                if (id) {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('user.getuser') }}",
                        data: {"_token": "{{ csrf_token() }}", id: id},
                        success: function (data) {
                            if (data) {
                                $('#residence_city').val(data.residence_city);
                                $('#residence_province').val(data.residence_province);
                                $('#residence_postal_code').val(data.residence_postal);
                                $('#residence_street').val(data.residence_street);
                                $('#residence_country').val(data.residence_country);

                            }
                        }
                    });
                }
            } else {
                $('#residence_city').val('');
                $('#residence_province').val('');
                $('#residence_postal_code').val('');
                $('#residence_street').val('');
                $('#residence_country').val('');
            }

        });
        
        $('body').on('keyup', '.event_input', function () {
        if ($(this).val().length > 1) {
            var search = $(this).val();
            var options ='';
            $.ajax({
                type: 'POST',
                url: "{{ route('user.getevent') }}",
                data: {"_token": "{{ csrf_token() }}", search: search},
                success: function (data) {
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            options += '<option data-e="' + data[i].id + '">' + data[i].name + '</option>';
                        }
                        $('#event_list').empty();
                        $('#event_list').append(options);
                    }
                }
            });
        }
    });
    $(".event_input").on('input', function () {
                var val = this.value;
                var userText = $(this).val();

                $("#event_list").find("option").each(function () {
                    if ($(this).val() == userText) {
                        $('#event_id').empty();
                        $('#event_id').val($(this).attr('data-e'));console.log($('#event_list option').attr('data-e'));
                        
                    }
                });
            });
     $('body').on('click', '#confirmation_of_event', function () {
                var event_id = $('input[name=event_id]').val();
                var user_id = "{{$data->phy->user_id}}"
                if(event_id){
                    $.ajax({
                        type: 'post',
                        url: "{{ route('user.event_register') }}",
                        data: {"_token": "{{ csrf_token() }}", event_id: event_id,user_id:user_id},
                        success: function (data) {
                            data = JSON.parse(data);
                            if (data.success) {
                                var acc = "{{route('user.edit',['id'=>$data->phy->user_id,'action'=>'accept_payment_for_event'])}}"
                                window.location = acc;
                            }else{
                                alert("Event alredy Register");
                            }
                        }
                    });
            }
            });
            
             
    </script>
    @endsection