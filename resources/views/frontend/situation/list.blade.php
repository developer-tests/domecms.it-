@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8"><h3 class="mb-0">{{__('CM Situation ') }}</h3></div>
<!--                            <div class="col-4 text-right">
                                <a href="" class="btn btn-sm btn-primary">Create user</a>
                            </div>-->
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
                    <div class="table-responsive">
                        <table id="table" class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('First name') }}</th>
                                <th scope="col">{{__('delivery date cm')}}</th>
                                <th scope="col">{{__('expiry date cm')}}</th>
                                <th scope="col">{{__('issue date cm') }}</th>
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

        $(document).ready(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('situation.list')}}",
                language: {
                    paginate: {
                        next: '<i class="fas fa-arrow-right"></i>',
                        previous: '<i class="fas fa-arrow-left"></i>'
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'first name', name: 'first name'},
                    {data: 'delivery date cm', name: 'delivery date cm'},
                    {data: 'expiry date cm', name: 'expiry date cm'},
                    {data: 'issue date cm', name: 'issue date cm'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endpush
