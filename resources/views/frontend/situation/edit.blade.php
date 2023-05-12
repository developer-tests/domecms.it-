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
        clolor:red;
    }


</style>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{__('View CM data') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">

                            @if(Session::has('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    <form method="post" enctype="multipart/form-data" action="{{route('situation.save')}}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div id="tutor_div">
                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Required Information') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Users') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <select  name="user" class="form-control" >
                                                                    <option value="{{$user->id}}" selected="selected">{{$user->first.' '.$user->last_name}}</option>
                                                                </select>
                                                            </div>
                                                            @if ($errors->has('user'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('user') }}</strong>
                                                                </span>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Date of issue') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                    </div>
                                                                <input type="text" name="date_of_issue" class="form-control datepicker" value='{{date("m/d/Y", strtotime($situation->date_of_issue))}}'>
                                                                </div>
                                                                <input type="hidden" name="id" value="{{$situation->id}}"/>
                                                                @if ($errors->has('date_of_issue'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('date_of_issue') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Expiry date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                                <input type="text" name="expiration_date" class="form-control datepicker" value='{{date("m/d/Y", strtotime($situation->expiration_date))}}' >
                                                                </div>
                                                                @if ($errors->has('expiration_date'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('expiration_date') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Delivery date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                                <input type="text" name="delivery_date" class="form-control datepicker" value='{{date("m/d/Y", strtotime($situation->delivery_date))}}'>
                                                                </div>
                                                                @if ($errors->has('delivery_date'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('delivery_date') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Note') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" name="note" class="form-control tutor_input" value="{{$situation->note}}" >
                                                                @if ($errors->has('note'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('note') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div><hr>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{__('Submit')}}</button>
                                        <input type="button" id="reset" class="btn btn-success mt-4" value="{{ __('Reset') }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>s
        </div>
    </div>
    <link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
    <script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
    <script>
$(document).ready(function () {
  $('#reset').on('click',function(){
    $("input").val('');
  })
});

</script>
    @endsection