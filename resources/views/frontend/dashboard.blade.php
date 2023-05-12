@extends('layouts.admin_layout')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('Global Search') }}</font></font></h6>
                        </div>
                        <div class="col-6 text-end">

                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">March, 01, 2020</font>
                                    </font>
                                </h6>
                                <span class="text-xs">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"># MS-415646</font> 
                                    </font>
                                </span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                $ 180
                                </font>
                                    </font>
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                        <i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i>
                                        <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">PDF</font>
                                        </font>
                                    </button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">February, 10, 2021</font>
                                    </font>
                                </h6>
                                <span class="text-xs">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"># RV-126749</font>
                                    </font>
                                </span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                $ 250
                                </font>
                                </font>
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                    <i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i>
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">PDF</font>
                                    </font>
                                </button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">April, 05, 2020</font>
                                    </font>
                                </h6>
                                <span class="text-xs">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"># FB-212562</font>
                                        </font>
                                </span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                $ 560
                                </font>
                                    </font>
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                        <i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PDF</font>
                                        </font>
                                    </button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">June, 25, 2019</font>
                                        </font>
                                </h6>
                                <span class="text-xs">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"># QW-103578</font>
                                    </font>
                                </span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                $ 120
                                </font>
                                    </font>
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                        <i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i>
                                        <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">PDF</font>
                                            </font>
                                    </button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">March, 01, 2019</font>
                                        </font>
                                </h6>
                                <span class="text-xs">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"># AR-803481</font>
                                        </font>
                                </span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                $ 300
                                </font>
                                    </font>
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                        <i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i>
                                        <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">PDF</font>
                                            </font>
                                    </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="text-uppercase text-muted ls-1 mb-1">{{__('Clipboard') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="whiteboard">
                        <textarea id="whiteboard" style="width: 90%;height: 75%;font-size: 18px;margin: 20px;border: 10px solid #7b61e4;" >@if(isset($clipboard->msg)){{$clipboard->msg}}@else NMNMNMN @endif</textarea>
                        <button id="edit" data-focus="off" hidden="true">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush