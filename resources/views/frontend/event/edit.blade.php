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
                        <h3 class="col-12 mb-0">{{__('New') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('event.update')}}" method="post">
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
                                                <input type="hidden" value="{{$event->id}}" name="event_id" >
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Event Name') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" name="name" value="{{$event->name}}" placeholder="{{__('Event Name') }}">
                                                                @if ($errors->has('name'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                            <input class="form-control datepicker" name="event_start_date" value="{{date('m/d/Y',strtotime($event->start_date))}}" placeholder="{{__('Event start date') }}" type="text" >

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
                                                            <input class="form-control datepicker" name="event_end_date" value="{{date('m/d/Y',strtotime($event->end_date))}}" placeholder="{{__('Event end date') }}" type="text" >

                                                        </div>
                                                        @if ($errors->has('event_end_date'))
                                                                <span class="red" role="alert">
                                                                    <strong>{{ $errors->first('event_end_date') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea class="form-control" value="{{$event->note}}" name="note" >{{__('Note') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control" name="event_start_time" value="{{$event->start_time}}" placeholder="{{__('Event start time') }}" type="text" value="{{old('event_start_time')}}">
                                                    </div>
                                                    @if ($errors->has('event_start_time'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('event_start_time') }}</strong>
                                                            </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input class="form-control " name="event_end_time" value="{{$event->end_time}}" placeholder="{{__('Event end time') }}" type="text" value="{{old('event_end_time')}}">
                                                    </div>
                                                      @if ($errors->has('event_end_time'))
                                                            <span class="red" role="alert">
                                                                <strong>{{ $errors->first('event_end_time') }}</strong>
                                                            </span>
                                                        @endif
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
                                                                <input type="text" class="form-control" name="description" value="{{$event->description}}" placeholder="{{__('Description') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect2">{{__('Maximum number of subscribers') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control" name="max_no_subscription" value="{{$event->max_no_subscription}}" placeholder="{{__('Maximum number of subscribers') }}">
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
                                                                <input type="text" class="form-control tutor_input" name="pay_weekly" value="{{$event->weekly_pay}}" placeholder="{{__('Weekly payment') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Monthly payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" name="pay_monthly" value="{{$event->monthly_pay}}" placeholder="{{__('Monthly payment') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Bimonthly payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" name="pay_bimonthly" value="{{$event->bimonthly_pay}}" placeholder="{{__('Bimonthly payment') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Quartely payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" name="quaterly_pay" value="{{$event->quartely_pay}}" placeholder="{{__('Quartely payment') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Six month payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" name="pay_six" value="{{$event->sixmonth_pay}}" placeholder="{{__('Six month payment') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Annual payment') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" name="pay_annual" value="{{$event->annual_pay}}" placeholder="{{__('Annual payment') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Pay a tantum') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" name="pay_tantum" value="{{$event->tantum_pay}}" placeholder="{{__('Pay a tantum') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">{{__('Family discount') }}</label>
                                                            <div class="form-group custom-control-inline" style="width:100%">
                                                                <input type="text" class="form-control tutor_input" name="family_discount" value="{{$event->family_discount}}" placeholder="{{__('Family discount') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div><hr>

                                            <div class="card-header bg-white border-0" id="fa-fa-contain_instructors">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Instructors') }}</h3>
                                                </div><br>
                                                <script>
                                                var gb_ar =[];
                                                </script>
                                                @if(count($users)>0)
                                                @foreach($users as $user)
                                                <div class="row">
                                                     <div class="col-md-6">
                                                         <div class="form-group custom-control-inline" style="width:100%">
                                                             <input type="text" class="form-control tutor_input instructors" value="{{$user->first_name.' '.$user->last_name}}" name="instructor[]" list="items"  placeholder="{{__('Instructors') }}">
                                                             <div class="add-f" id="plus_instructors_input">
                                                                <i class="ni ni-fat-add"></i>
                                                            </div>
                                                             <datalist id="items" >

                                                            </datalist>
                                                             <script>
                                                                 var ps = "@php echo $user->first_name.' '.$user->last_name @endphp";
                                                             gb_ar.push(ps);
                                                             </script>
                                                         </div>
                                                     </div>
                                                 </div>
                                                @endforeach
                                                @else
                                                <div class="row">
                                                     <div class="col-md-6">
                                                         <div class="form-group custom-control-inline" style="width:100%">
                                                             <input type="text" class="form-control tutor_input instructors"  name="instructor[]" list="items"  placeholder="{{__('Instructors') }}">
                                                             <div class="add-f" id="plus_instructors_input">
                                                                <i class="ni ni-fat-add"></i>
                                                            </div>
                                                             <datalist id="items" >

                                                            </datalist>
                                                         </div>
                                                     </div>
                                                 </div>
                                                @endif
                                            </div><hr>
                                            <input type="hidden" name="instructor_user_id[]" id="instructor_user_id" />
                                            <div class="card-header bg-white border-0" id="fa-fa-contain_tutor">
                                                <div class="row align-items-center">
                                                    <h3 class="col-12 mb-0">{{__('Subscribers') }}</h3>
                                                </div><br>
                                                <div class="row">
                                                   
                                                </div>
                                            </div><hr>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button  class="btn btn-success mt-4">{{__('Submit')}}</button>
                                        <a class="btn btn-success mt-4" href="{{route('event.delete',$event->id)}}">{{__('Cancel Event')}}</a>
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
$(document).ready(function(){
     $('#plus_instructors_input').on('click', function () {
        var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='instructor[]' list='items' class='form-control instructors'  placeholder='{{__('Instructor') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div><datalist class='items'></datalist></div></div></div>";
        $('#fa-fa-contain_instructors').append(apnd);
    });
   $('body').on('click', '.remove-fa-fa', function () {
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
    
     //var gb_ar = [];
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