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
                        <h3 class="col-12 mb-0">{{__('View data:') }} {{$assoc->user->name}} </h3>
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
                    <form method="post" enctype="multipart/form-data" action="" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Council members') }}</h3>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('president') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->user->name }}</span>
                                                </div>
                                            </div>
                                        </div><hr>

                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Basic Information') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Abbreviation Association') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->name_asso_rid}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Association name') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->name }}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('CF') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->cf}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('VAT P.') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->vat_number}}</span>
                                                </div><div class='col-md-8'></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Texts') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Privacy Disclaimer Text') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->text_privacy}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Deduction text') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->text_deduction }}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Free receipt text') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->text_received_fee }}</span>
                                                </div><div class='col-md-8'></div>
                                                
                                            </div>
                                        </div><hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Contact details') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Via') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->vat}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__("Citta'") }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->city}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('CAP') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->cap}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Country') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->country }}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__("Province") }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->province}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('E-Mail') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->assoc_data->mail}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Cell phone') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->assoc_data->cel}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__("Fax") }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->assoc_data->fax}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('PEC') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->assoc_data->pec}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Page Web') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->assoc_data->web}}</span>
                                                </div><div class='col-md-8'></div>
                                            </div>
                                        </div><hr>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Additional Information')}}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Membership Fee €') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->assoc_data->membership_fee}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Start date YY') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->assoc_data->start_year}}</span>
                                                </div><div class='col-md-8'></div>
                                                <div class="col-md-4">
                                                        <label class='label'>{{__('Number of tickets available') }}:</label>
                                                        <span class='label' style='float:right'>{{$assoc->assoc_data->ticket}}</span>
                                                </div><div class='col-md-8'></div>
                                                
                                            </div>
                                        </div><hr>
                                    </div>
                                    <div class="text-center">
                                        <a  class="btn btn-primary mt-4" href="{{route('association.edit',$assoc->id)}}">Edit</a>
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

});

</script>
@endsection