@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8"><h3 class="mb-0">Users</h3></div>
<!--                            <div class="col-4 text-right">
                                <a href="" class="btn btn-sm btn-primary">Create user</a>
                            </div>-->
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
                    <div class="table-responsive">
                        <table id="table" class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <!--<th scope="col">#</th>-->
                                <th scope="col">Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Date Of Birth</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">Note</th>
                                <th scope="col">Action</th>
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
                ajax: "{{route('personal.list',$segment)}}",
                language: {
                    paginate: {
                        next: '<i class="fas fa-arrow-right"></i>',
                        previous: '<i class="fas fa-arrow-left"></i>'
                    }
                },
                columns: [
//                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'date_of_birth', name: 'date_of_birth'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'note', name: 'note'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            
            $('body').on('change','.additional_action',function(){
               var data = $(this).attr('data');
               var val = $(this).val();
            });
        });
    </script>
@endpush
