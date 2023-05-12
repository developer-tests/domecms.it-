@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8"><h3 class="mb-0">{{_('Event') }}</h3></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="col-12">

                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>Status :</strong></label>
                                <select id='status' class="form-control" style="width: 200px">
                                    <option value="">--Select Status--</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>

                                    <th scope="col">{{__('Instructor') }}</th>
                                    <th scope="col">{{__('Event Name')}}</th>
                                    <th scope="col">{{__('Description')}}</th>
                                    <th scope="col">{{__('Maximum number of subscribers') }}</th>
                                    <th scope="col">{{__('Status')}}</th>
                                    <th >{{__('Action')}}</th>
                                    <th scope="col"></th>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@push('backend_css')
<link href="{{asset('argon/css/jquery.dataTables.min.css')}}" >
<link href="{{asset('argon/css/dataTables.bootstrap4.min.css')}}" >
<style>
    .dataTables_filter label{
        float: right;
    }
    .pagination{
        float: right;
    }
</style>
@endpush
@push('backend_script')

<script src="{{asset('argon/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('argon/js/dataTables.bootstrap4.min.js')}}"></script>
<script>

$(document).ready(function () {
var table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    
     ajax: {
        url: "{{route('event.eventList')}}",
        data: function (d) {
            d.status = $('#status').val()
        }
        },
//        language: {
//            paginate: {
//                next: '<i class="fas fa-arrow-right"></i>',
//                previous: '<i class="fas fa-arrow-left"></i>'
//            }
//        },
        
    columns: [
        {data: 'Instructor', name: 'Instructor'},
        {data: 'Event Name', name: 'Event Name'},
        {data: 'Description', name: 'Description'},
        {data: 'Maximum number of subscribers', name: 'Maximum number of subscribers'},
        {data: 'status', name: 'status'},
        {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },
    ]
});

    $('#status').change(function(){
        table.draw();
    });
});
</script>
@endpush
