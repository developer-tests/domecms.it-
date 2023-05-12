<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            @if(Request::segment(1)=== 'dashboard')
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('Course Modification Proposals') }}</h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <!--<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
                                <span class="text-nowrap">{{__('requests to evaluate') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Members') }}</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$user}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <!--<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>-->
                                <span class="text-nowrap">{{__('members are registered .') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Payment status') }}</h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <!--<span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>-->
                                <span class="text-nowrap">{{__('outstanding payments .') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Payments accepted today') }}</h5>
                                    <span class="h2 font-weight-bold mb-0">0.00€</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <!--<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>-->
                                <span class="text-nowrap">{{__('accepted') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Payments accepted yesterday') }}</h5>
                                    <span class="h2 font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <!--<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
                                <span class="text-nowrap">{{__('accepted') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('Events') }}</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$total_event}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <!--<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>-->
                                <span class="h4 font-weight-bold mb-0">{{$in_progress}}</span>&nbsp;
                                <span class="text-nowrap">{{__('In progress') }}</span><br>
                                <span class="h4 font-weight-bold mb-0">{{$sedule_today}}</span>&nbsp;
                                <span class="text-nowrap">{{__('scheduled for today') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{__('CM status registered') }}</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$total_situaltion}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <!--<span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>-->
                                <span class="h4 font-weight-bold mb-0">{{$expired_situaltion}}</span>&nbsp;
                                <span class="text-nowrap">{{__('expired CMs .') }}</span><br>
                                <span class="h4 font-weight-bold mb-0">{{$expired_situaltion_month}}</span>&nbsp;
                                <span class="text-nowrap">{{__('CM expiring in the month.') }}</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $('#whiteboard').on('keyup',function(){
        
        $.ajax({
                type:'POST',
                url:"{{ route('clipboard') }}",
                data:{"_token": "{{ csrf_token() }}",msg:$(this).val()},
                success:function(data){
                    
                }
             });
    });
})
</script>