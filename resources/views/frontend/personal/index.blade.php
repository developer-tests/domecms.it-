@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ __('Member registry list') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="get"  action="{{route('personal.list')}}" autocomplete="off">
                       

                        <div class="pl-lg-4">

                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Filter') }}</label>

                                        <select name="filter" id="filter" class="form-control form-control-alternative{{ $errors->has('role') ? ' is-invalid' : '' }}">
                                            
                                            <option value="{{__('Current Year') }}">{{__('Current Year') }}</option>
                                            <option value="{{__('Last Year') }}">{{__('Last Year') }}</option>
                                            <option value="{{__('Previous') }}">{{__('Previous') }}</option>
                                            
                                        </select> 
                                        @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>     
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Find') }}</button>
                                    <input type="button" id="reset" class="btn btn-success mt-4" value="{{ __('Reset') }}">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
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
    $("#role").val($("#role option:first").val());
  })
});
</script>
@endsection