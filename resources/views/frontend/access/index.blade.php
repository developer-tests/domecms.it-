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
                    <form method="post"  action="{{route('access.save')}}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('User Name') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <input type="text" name="user" class="form-control" >
                                                                </div>
                                                                @if ($errors->has('user'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('user') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Password') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <div class="input-group">
                                                                    <input type="password" name="password" class="form-control" >
                                                                </div>
                                                                @if ($errors->has('password'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="personal_data" type="checkbox" name="add_edit_personal_data" >
                                                        <label class="custom-control-label" for="personal_data">{{__('Add / Edit a Personal Data') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="edit_event" type="checkbox" name="add_edit_an_event" >
                                                        <label class="custom-control-label" for="edit_event">{{__('Add / Edit an Event') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="association_data" type="checkbox" name="changes_association_data" >
                                                        <label class="custom-control-label" for="association_data">{{__("Change the Association's data") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="accept_payment" type="checkbox" name="accept_payment" >
                                                        <label class="custom-control-label" for="accept_payment">{{__('Accept a Payment') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="view_input_output" type="checkbox" name="view_input_output" >
                                                        <label class="custom-control-label" for="view_input_output">{{__('View the inputs and outputs') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="basic_function" type="checkbox" name="basic_function" >
                                                        <label class="custom-control-label" for="basic_function">{{__("Basic functions") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="view_receipt" type="checkbox" name="view_receipt" >
                                                        <label class="custom-control-label" for="view_receipt">{{__('View Receipts') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="export_personal_data_event" type="checkbox" name="export_personal_data_event" >
                                                        <label class="custom-control-label" for="export_personal_data_event">{{__('Export of personal data and events') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="medical_certificate" type="checkbox" name="medical_certificate" >
                                                        <label class="custom-control-label" for="medical_certificate">{{__("Medical Certificate Management") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="ticket_creation" type="checkbox" name="ticket_creation" >
                                                        <label class="custom-control-label" for="ticket_creation">{{__('Ticket creation') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="management" type="checkbox" name="management" >
                                                        <label class="custom-control-label" for="management">{{__('Management') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="view_personal_data" type="checkbox" name="view_personal_data" >
                                                        <label class="custom-control-label" for="view_personal_data">{{__("View the personal data") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="view_event" type="checkbox" name="view_event" >
                                                        <label class="custom-control-label" for="view_event">{{__('View events') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="importing_personal_data" type="checkbox" name="importing_personal_data" >
                                                        <label class="custom-control-label" for="importing_personal_data">{{__('Importing personal data from CSV') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="send_Communication" type="checkbox" name="send_Communication" >
                                                        <label class="custom-control-label" for="send_Communication">{{__("Send communications") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="login_application" type="checkbox" name="login_application" >
                                                        <label class="custom-control-label" for="login_application">{{__('Login on Application') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="manage_attendance" type="checkbox" name="manage_attendance" >
                                                        <label class="custom-control-label" for="manage_attendance">{{__('Manage Attendance') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input class="custom-control-input" id="manage_proposal_for_moving_course" type="checkbox" name="manage_proposal_for_moving_course" >
                                                        <label class="custom-control-label" for="manage_proposal_for_moving_course">{{__("Manage the proposals for moving courses") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{__('confirmation') }}</button>
                                        <input type="button" name="reset" class="btn btn-success mt-4" value="{{__('Reset') }}" id="reset">
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
    $('input:not([name="reset"])').val('');
    $('input:checkbox').prop('checked',false);
  })
});

</script>
@endsection