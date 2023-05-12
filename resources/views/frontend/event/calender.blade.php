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
<link rel="stylesheet" type="text/css" href="{{ asset('fullcalendar') }}/lib/main.css" rel="stylesheet">

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
                    <div class="card">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
<script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
<script src="{{ asset('fullcalendar') }}/lib/main.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        events: [
            {
                title: 'Business Lunch',
                start: '2020-09-03T13:00:00',
                constraint: 'businessHours'
            },
            {
                title: 'Meeting',
                start: '2020-09-13T11:00:00',
                constraint: 'availableForMeeting', // defined below
                color: '#257e4a'
            },
            {
                title: 'Conference',
                start: '2020-09-18',
                end: '2020-09-20'
            },
            {
                title: 'Party',
                start: '2020-09-29T20:00:00'
            },

            // areas where "Meeting" must be dropped
            {
                groupId: 'availableForMeeting',
                start: '2020-09-11T10:00:00',
                end: '2020-09-11T16:00:00',
                display: 'background'
            },
            {
                groupId: 'availableForMeeting',
                start: '2020-09-13T10:00:00',
                end: '2020-09-13T16:00:00',
                display: 'background'
            },

            // red areas where no events can be dropped
            {
                start: '2020-09-24',
                end: '2020-09-28',
                overlap: false,
                display: 'background',
                color: '#ff9f89'
            },
            {
                start: '2020-09-06',
                end: '2020-09-08',
                overlap: false,
                display: 'background',
                color: '#ff9f89'
            }
        ]
    });

    calendar.render();
});

</script>
<style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }

</style>
<script>
    $(document).ready(function () {
        $('#reset').on('click', function () {
            $('input:not([name="reset"])').val('');
        });
        $('.language').css('display', 'none');
        $('#tutor_div').css('display', 'none');
        $('#tutor').on('click', function () {
            if ($(this).is(':checked')) {
                $('#tutor_div').css('display', 'block');
            } else {
                $('#tutor_div').css('display', 'none');
            }
        })
        $('#plus_icn').on('click', function () {
            var apnd = "<div class='row'><div class='col-md-6'><div class='form-group custom-control-inline' style='width:100%'><input type='text' name='instructor[]' class='form-control' placeholder='{{__('Instructor') }}'><div class='add-f remove-fa-fa'> <i class='ni ni-fat-delete'></i></div></div></div></div>";
            $('#fa-fa-contain').append(apnd);
        });
        $('body').on('click', '.remove-fa-fa', function () {
            $(this).parent().parent().parent().remove();
        });


    });

</script>
@endsection