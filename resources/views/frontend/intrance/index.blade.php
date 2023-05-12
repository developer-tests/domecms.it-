@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8"><h3 class="mb-0">{{__('Inputs / Outputs') }}</h3></div>
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
                    <div class="row input-daterange">
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" name="from_date" placeholder="{{__('From Date') }}" type="text" id="from_date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" name="to_date" placeholder="{{__('To Date') }}" type="text" id="to_date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select class="form-control" name="towords" placeholder="{{__('towords')}}" type="text" id="towords">
                                    <option>--{{__('Select') }}--</option>
                                    <option>{{__('Entrance') }}</option>
                                    <option>{{__('Exit') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="table" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('Receipt number')}}</th>
                                    <th scope="col">{{__('Operation Date')}}</th>
                                    <th scope="col">{{__('Payment Type')}}</th>
                                    <th scope="col">{{__('Entrance')}}</th>
                                    <th scope="col">{{__('Exit')}}</th>
                                    <th scope="col">{{__('Causal')}}</th>
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
    load_table();
    
    function load_table(from_date = '', to_date = ''){
        $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('intrance')}}",
            data: {from_date: from_date, to_date: to_date},
            language: {
                paginate: {
                    next: '<i class="fas fa-arrow-right"></i>',
                    previous: '<i class="fas fa-arrow-left"></i>'
                }
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Receipt number', name: 'Receipt number'},
            {data: 'Operation Date', name: 'Operation Date'},
            {data: 'Payment Type', name: 'Payment Type'},
            {data: 'Entrance', name: 'Entrance'},
            {data: 'Exit', name: 'Exit'},
            {data: 'Causal', name: 'Causal'},
            {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
        ]
    });
    }
//    $('#filter').click(function () {
//        var from_date = $('#from_date').val();
//        var to_date = $('#to_date').val();
//        if (from_date != '' && to_date != '')
//        {
//            $('#table').DataTable().destroy();
//            load_table(from_date, to_date);
//        } else
//        {
//            alert('Both Date is required');
//        }
//    });
});
</script>
@endpush
