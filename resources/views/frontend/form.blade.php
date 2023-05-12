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
                        <h3 class="col-12 mb-0">{{__('New') }} {{$role->getTranslation('name', (\Session::get('locale_mod') == 'en')? 'en' :'nl' ,false)}} </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('user.save')}}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div id="tutor_div">
                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Tutors') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group custom-control-inline" style="width:100%">
                                                            <input type="text" class="form-control tutor_input" name="tutor[]" list="items" placeholder="{{__('Tutor') }}">
                                                            <input type="hidden" id="restriction" name="restriction" value="solo_maggiorenni"/>
                                                            <input type="hidden" id="tutor_ids" name="tutor_ids[]" />
                                                            <div class="add-f" id="plus_tutor_input">
                                                                <i class="ni ni-fat-add"></i>
                                                            </div>
                                                            <datalist id="items" >

                                                            </datalist>
                                                            <input type="hidden" name="hidden_user_id" id="hidden_user_id" />
                                                            <input type="hidden" name="initial_role" id="initial_role" value="@if($role->id){{$role->id}}@endif" />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div><hr>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Registry') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                @if($request->role == 1 || old('role') ==1)
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="hidden" name="role" value="{{$request->role}}">
                                                        <input class="custom-control-input" id="tutor" type="checkbox" name="tutor_check" >
                                                        <label class="custom-control-label" for="tutor">{{__('Tutor') }}</label>
                                                    </div>
                                                </div>
                                                @endif
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="first_name"  placeholder="{{__('First Name') }}" value="{{old('first_name')}}">
                                                        @if ($errors->has('first_name'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" name="last_name" placeholder="{{__('Last Name') }}" value="{{old('last_name')}}"/>
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
                                                        <input type="text"  class="form-control" name="cf" placeholder="{{__('CF') }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="gender" id="customRadioInline1"  class="custom-control-input" @if(old('gender')=='on') checked='checked' @endif>
                                                        <label class="custom-control-label" for="customRadioInline1">{{__('Male') }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="gender" id="customRadioInline2" class="custom-control-input" @if(old('gender')=='off') checked='checked' @endif>
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
                                                @if($request->role == 1 || old('role') ==1)
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlFile1">{{__('Registered relatives') }}</label><br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="registered_relative" id="registered_relative" value="1" class="custom-control-input" >
                                                        <label class="custom-control-label" for="registered_relative">{{__('Yes') }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="registered_relative" id="registered_relative1" value="0" class="custom-control-input" checked="checked">
                                                        <label class="custom-control-label" for="registered_relative1">{{__('No') }}</label>
                                                    </div>
                                                    @if ($errors->has('registered_relative'))
                                                    <span class="red" role="alert">
                                                        <strong>{{ $errors->first('registered_relative') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div><hr>

                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Place and date of birth') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" list="places_of_birth" id="city_of_birth" name="city_of_birth" placeholder="{{__('City of Birth') }}">
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
                                                        <input type="text"  class="form-control" name="country_of_birth" placeholder="{{__('County of birth') }}" />
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
                                                        <input type="text" class="form-control" name="country" placeholder="{{__('Country') }}">
                                                        @if ($errors->has('country'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('country') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                            <input class="form-control datepicker" name="DOB" placeholder="{{__('Date of birth')}}" type="text" >
                                                            @if ($errors->has('DOB'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('DOB') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
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
                                                        <input type="text" class="form-control" list="residence_list" id="residence_city" name="residence_city" placeholder="{{__('City') }}">
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
                                                        <input type="text"  class="form-control" id='residence_province' name="residence_province" placeholder="{{__('Province') }}" />
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
                                                        <input type="text" class="form-control" id='residence_postal_code' name="residence_postal_code" placeholder="{{__('POSTAL CODE') }}">
                                                        @if ($errors->has('residence_postal_code'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('residence_postal_code') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" id='residence_street' name="residence_street" placeholder="{{__('Street') }}" />
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
                                                        <input type="text" class="form-control" id="residence_country" name="residence_country" placeholder="{{__('Country') }}">
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
                                                        <input type="text" class="form-control" id="domicile_city" list="domicile_list" name="domicile_city" placeholder="{{__('City') }}">
                                                        @if ($errors->has('domicile_city'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('domicile_city') }}</strong>
                                                        </span>
                                                        @endif
                                                        <datalist id="domicile_list"></datalist>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" name="domicile_province" placeholder="{{__('Province') }}" />
                                                        @if ($errors->has('domicile_province'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('domicile_province') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="domicile_postal_code" placeholder="{{__('POSTAL CODE') }}">
                                                        @if ($errors->has('domicile_postal_code'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('domicile_postal_code') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" name="domicile_street" placeholder="{{__('Street') }}" />
                                                        @if ($errors->has('domicile_street'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('domicile_street') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="domicile_country" placeholder="{{__('Country') }}">
                                                        @if ($errors->has('domicile_country'))
                                                        <span class="red" role="alert">
                                                            <strong>{{ $errors->first('domicile_country') }}</strong>
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text" class="form-control" name="delivery_phone[]" placeholder="{{__('Phone') }}">
                                                        <div class="add-f" id="plus_icn_phone">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text"  class="form-control" name="delivery_cell_phone[]" placeholder="{{__('Cell phone') }}" />
                                                        <div class="add-f" id="plus_icn_cell_phone">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text" class="form-control" name="delivery_mail[]" placeholder="{{__('Mail') }}">
                                                        <div class="add-f" id="plus_icn_mail">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text"  class="form-control" name="delivery_pec[]" placeholder="{{__('PEC') }}" />
                                                        <div class="add-f" id="plus_icn_pec">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text" class="form-control" name="delivery_fax[]" placeholder="{{__('Fax') }}">
                                                        <div class="add-f" id="plus_icn_fax">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Note') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="note" placeholder="{{__('Note') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">{{__('Profile Photo')}}</label>
                                                        <input type="file" class="form-control" name="file" placeholder="{{__('Photo') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    $('#plus_tutor_input').on('click', function () {
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='tutor[]' list='items' class='form-control tutor_input'  placeholder='{{__('Tutor') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div><datalist class='items'></datalist></div></div></div>";
        $('#fa-fa-contain_tutor').append(apnd);
    });
    $('body').on('click', '.remove-fa-fa', function () {
        $(this).parent().parent().parent().remove();
    });
    $('body').on('keyup', '.tutor_input', function () {
        if ($(this).val().length > 1) {
            var restriction = $('#restriction').val();
            var tutor = $(this).val();
            var options;
            $.ajax({
                type: 'POST',
                url: "{{ route('user.tutor') }}",
                data: {"_token": "{{ csrf_token() }}", restriction: restriction, tutor: tutor},
                success: function (data) {
//                    data = JSON.parse(data);console.log(data);
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            options += '<option data-hi-d="' + data[i].id + '">' + data[i].first_name + ' ' + data[i].last_name + ' (' + data[i].date_of_birth + ')' + '</option>';
                        }
                        $('#items').empty();
                        $('#items').append(options);
                    }
                }
            });
        }
    });
    var gb_ar = [];var gb_ids =[];
    $("body").on('input', '.tutor_input', function () {
        var val = this.value;
        var userText = $(this).val();
        var ths = $(this);

        $("#items").find("option").each(function () {
            if ($(this).val() == userText) {
                if (!gb_ar.includes(userText)) {
                    $('#hidden_user_id').val($(this).attr('data-hi-d'));
                    gb_ar.push(userText);
                    gb_ids.push($(this).attr('data-hi-d'));
                } else {
                    ths.val('');
                }
                $('#tutor_ids').val(gb_ids);
            }
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
    </script>
    @endsection