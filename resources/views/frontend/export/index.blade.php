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
</style>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{__('Export Members') }} </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Fields to export') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control" id="tutor" name="tutor_check" >
                                                            <option>{{__('First Name') }}</option>
                                                            <option>{{__('Last Name') }}</option>
                                                            <option>{{__('CF') }}</option>
                                                            <option>{{__('Gender') }}F-M</option>
                                                            <option>{{__('City of Birth') }}</option>
                                                            <option>{{__('Country of Birth') }}</option>
                                                            <option>{{__('Country') }}</option>
                                                            <option>{{__('Date of birth') }}</option>
                                                            <option>{{__('Residence - City') }}</option>
                                                            <option>{{__('Residence - Country') }}</option>
                                                            <option>{{__('Residence - Province') }}</option>
                                                            <option>{{__('Residence - CAP') }}</option>
                                                            <option>{{__('Residence - Via') }}</option>
                                                            <option>{{__('Domicile - City') }}</option>
                                                            <option>{{__('Domicile - Province') }}</option>
                                                            <option>{{__('Domicile - CAP') }}</option>
                                                            <option>{{__('Domicile - Street') }}</option>
                                                            <option>{{__('Domicile - Country') }}</option>
                                                            <option>{{__('Phone') }}</option>
                                                            <option>{{__('Cell phone') }}</option>
                                                            <option>{{__('Mail') }}</option>
                                                            <option>{{__('PEC') }}</option>
                                                            <option>{{__('FAX') }}</option>
                                                            <option>{{__('Note') }}</option>
                                                            <option>{{__('Acceptance Date') }}</option>
                                                            <option>{{__('Personal Data') }}</option>
                                                            <option>{{__('Register Relatives(Y/N)') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><br>
                                        </div><hr>
                                        
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0"></h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="city_of_birth" placeholder="{{__('Posted By') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" name="country_of_birth" placeholder="{{__('To the') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="country" placeholder="{{__('Accepted From') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="country" placeholder="{{__('To the') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>  
                                        </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{__('confirmation') }}</button>
                                        <input type="button" class="btn btn-success mt-4" value="{{__('Reset') }}" id="reset">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
<script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
@endsection