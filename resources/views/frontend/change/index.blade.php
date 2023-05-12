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
                        <h3 class="col-12 mb-0">{{__('Change password')}} </h3>
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
                    <form method="post"  action="{{route('user.savepassword')}}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0"></h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="password" placeholder="{{__('New Password') }}">
                                                        @if ($errors->has('password'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="confirm_password" placeholder="{{__('Repeat Password') }}">
                                                        @if ($errors->has('confirm_password'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('confirm_password') }}</strong>
                                                            </span>
                                                        @endif
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
 <script>
$(document).ready(function () {
  $('#reset').on('click',function(){
    $("input").val('');
  })
});

</script>
@endsection