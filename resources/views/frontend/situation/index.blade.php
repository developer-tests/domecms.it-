@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ __('CM status - expired') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post"  action="{{route('situation.list')}}" autocomplete="off">
                        @csrf

                        
                        <div class="col-12 text-right">
                            <a href="{{route('dashboard')}}" class="btn btn-sm btn-primary">{{__('Back') }}</a>
                        </div>

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

                                        <select name="situation_type" id="role" class="form-control form-control-alternative{{ $errors->has('role') ? ' is-invalid' : '' }}">
                                            <option value="{{__('All') }}">{{__('All')}}</option>
                                            <option value="{{__('Expired') }}">{{__('Expired')}}</option>
                                            <option value="{{__('Not delivered') }}">{{__('Not delivered')}}</option>
                                            <option value="{{__('Expiring') }}">{{__('Expiring')}}</option>
                                        </select> 
                                        @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>     
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('confirmation') }}</button>
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