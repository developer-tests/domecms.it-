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
                        <h3 class="col-12 mb-0">{{__('New Event') }} </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('event.save')}}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-xl-12 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Basic Information') }}</h3>
                                            </div><br>
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" placeholder="{{__('Event Name') }}" value="{{old('name')}}">
                                                         @if ($errors->has('name'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                        </div>
                                                        <input class="form-control datepicker" name="event_start_date" placeholder="{{__('Event start date') }}" type="text" value="{{old('event_start_date')}}">
                                                         
                                                    </div>
                                                    @if ($errors->has('event_start_date'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('event_start_date') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                        </div>
                                                        <input class="form-control datepicker" name="event_end_date" placeholder="{{__('Event end date') }}" type="text" value="{{old('event_end_date')}}">
                                                         
                                                    </div>
                                                    @if ($errors->has('event_end_date'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('event_end_date') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="note" plaseholder="{{__('Note') }}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control" name="event_start_time" placeholder="{{__('Event start time') }}" type="text" value="{{old('event_start_time')}}">
                                                    </div>
                                                    @if ($errors->has('event_start_time'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('event_start_time') }}</strong>
                                                            </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control " name="event_end_time" placeholder="{{__('Event end time') }}" type="text" value="{{old('event_end_time')}}">
                                                    </div>
                                                      @if ($errors->has('event_end_time'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('event_end_time') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div><hr>
                                        
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Additional Information') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea class="form-control" plaseholder="{{__('Description') }}" name="description" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" value="{{old('max_no_subscription')}}" name="max_no_subscription" placeholder="{{__('Maximum number of subscribers') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="card-header bg-white border-0" id="fa-fa-contain">
                                            <div class="row align-items-center" >
                                                <h3 class="col-12 mb-0">{{__('Instructors') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group custom-control-inline" style="width:100%">
                                                        <input type="text" name="instructor[]"  class="form-control instructors" name="instructor" list="items" placeholder="{{__('Instructor') }}">
                                                        <div class="add-f" id="plus_icn">
                                                            <i class="ni ni-fat-add"></i>
                                                        </div>
                                                        <datalist id="items" >

                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <h3 class="col-12 mb-0">{{__('Payments Accepted') }}</h3>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{old('pay_weekly')}}" name="pay_weekly" placeholder="{{__('Weekly Payment') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" value="{{old('pay_monthly')}}" name="pay_monthly" placeholder="{{__('Monthly Payment') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{old('pay_bimonthly')}}" name="pay_bimonthly" placeholder="{{__('Bimonthly Payment') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" value="{{old('pay_quarterly')}}" name="pay_quarterly" placeholder="{{__('Quarterly Payment') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{old('pay_six')}}" name="pay_six" placeholder="{{__('Six-monthly payment') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{old('pay_annual')}}" name="pay_annual" placeholder="{{__('Annual Payment') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{old('pay_tantum')}}" name="pay_tantum" placeholder="{{__('Payment of a Tantum') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{old('family_discount')}}" name="family_discount" placeholder="{{__('Family discount [%]') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">Save</button>
                                        <input type="button" class="btn btn-primary mt-4" name="reset" value="Reset" id="reset">
                                        <a href="{{route('dashboard')}}" class="btn btn-danger mt-4" >Cancel</a>
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
    $('#reset').on('click', function () {
        $('input:not([name="reset"])').val('');
    });
    $('.language').css('display', 'none');
    $('#tutor_div').css('display', 'none');
    $('#tutor').on('click', function () {
        if($(this).is(':checked')){
            $('#tutor_div').css('display', 'block');
        }else{
           $('#tutor_div').css('display', 'none'); 
        }
    })
    $('#plus_icn').on('click',function(){
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline ' style='width:100%'><input type='text' name='instructor[]' list='items' class='instructors form-control' placeholder='{{__('Instructor') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div><datalist id=items' ></datalist></div></div></div>";
        $('#fa-fa-contain').append(apnd);
    });
    $('body').on('click','.remove-fa-fa',function(){
        $(this).parent().parent().parent().remove();
    });
    
    $('body').on('keyup', '.instructors', function () {
        if ($(this).val().length > 1) {
            var instructor = $(this).val();
            var options;
            $.ajax({
                type: 'POST',
                url: "{{ route('event.instructor') }}",
                data: {"_token": "{{ csrf_token() }}",  instructor: instructor},
                success: function (data) {
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            options += '<option data-hi-d="' + data[i].id + '" >' + data[i].first_name + ' ' + data[i].last_name  + '</option>';
                        }
                        $('#items').empty();
                        $('#items').append(options);
                    }
                }
            });
        }
    });
    
    var gb_ar =[];
    $("body").on('input', '.instructors', function () {
        var val = this.value;
        var userText = $(this).val();
        var ths = $(this);
        
        $("#items").find("option").each(function () {
            if ($(this).val() == userText) {
                if (!gb_ar.includes(userText)) {
                    $('#instructor_user_id').val($(this).attr('data-hi-d'));
                    gb_ar.push(userText);
                } else {
                    ths.val('');

                }
            }
        });
    });
});

</script>
@endsection