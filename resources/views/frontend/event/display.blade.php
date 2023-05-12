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
                        <h3 class="col-12 mb-0">{{__('Event') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div id="tutor_div">
                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Basic Information') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Event Name') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->name}}" placeholder="{{__('Event Name') }}" readonly>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Event start date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{date('m/d/Y',strtotime($event->start_date))}}" placeholder="{{__('Event start date') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Event end date') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{date('m/d/Y',strtotime($event->end_date))}}" placeholder="{{__('Event end date') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Note') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->note}}" placeholder="{{__('Note') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control" name="event_start_time" value="{{$event->start_time}}" placeholder="{{__('Event start time') }}" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control " name="event_end_time" value="{{$event->end_time}}" placeholder="{{__('Event end time') }}" type="text" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            </div><hr>

                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Additional Information') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Description') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->description}}" placeholder="{{__('Description') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect2">{{__('Maximum number of subscribers') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control" name="max_no_subscription" value="{{$event->max_no_subscription}}" placeholder="{{__('Maximum number of subscribers') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><hr>

                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Payments Accepted') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Weekly payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->weekly_pay}}" placeholder="{{__('Weekly payment') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Monthly payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->monthly_pay}}" placeholder="{{__('Monthly payment') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Bimonthly payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->bimonthly_pay}}" placeholder="{{__('Bimonthly payment') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Quartely payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->quartely_pay}}" placeholder="{{__('Quartely payment') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Six month payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->sixmonth_pay}}" placeholder="{{__('Six month payment') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Annual payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->annual_pay}}" placeholder="{{__('Annual payment') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Pay a tantum') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->tantum_pay}}" placeholder="{{__('Pay a tantum') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Family discount') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" value="{{$event->family_discount}}" placeholder="{{__('Family discount') }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div><hr>

                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Instructors') }}</h3>
                                                </div><br>
                                                <!--                                            <div class="row">
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                                                                        <input type="text" class="form-control tutor_input"  placeholder="{{__('Description') }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>-->
                                            </div><hr>

                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Subscribers') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                    <!--                                                <div class="col-md-6">
                                                                                                        <div class="form-group custom-control-inline" style="width:100%">
                                                                                                            <input type="text" class="form-control tutor_input"  placeholder="{{__('Description') }}">
                                                                                                        </div>
                                                                                                    </div>-->
                                                </div>
                                            </div><hr>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('event.eventList')}}" class="btn btn-success mt-4">{{__('Back')}}</a>
                                        <a href="{{route('event.edit',$event->id)}}" class="btn btn-success mt-4">{{__('Edit')}}</a>
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

    @endsection