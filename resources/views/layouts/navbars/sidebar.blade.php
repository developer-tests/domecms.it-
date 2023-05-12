<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{route('dashboard')}}">
            <h1>Apak.it</h1>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                           placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="fas fa-users text-blue"></i> {{ __('Personal Data') }}  </a>
                    <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-right inner-sidebar">
                        <li><a class="nav-link" href="{{route('user.add')}}">{{__('Add')}} </a></li>
                        <li><a class="nav-link" href="{{route('personal.data')}}">{{__('Show List')}} </a></li>
                        <li><a class="nav-link" href="#">{{__('Import Data')}} </a> </li>
                        <li><a class="nav-link" href="{{route('export')}}">{{__('Export Data')}} </a> </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="ni ni-bullet-list-67 text-blue"></i> {{ __('Event') }}  </a>
                    <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-right inner-sidebar">
                        <li><a class="nav-link" href="{{route('event.addEvent')}}">{{__('Add')}} </a></li>
                        <li><a class="nav-link" href="{{route('event.eventList')}}">{{__('List')}} </a> </li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="ni ni-shop text-blue"></i> {{ __('CM Situation') }}  </a>
                    <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-right inner-sidebar">
                        <li><a class="nav-link" href="{{route('situation.add')}}">{{__('Add')}} </a></li>
                        <li><a class="nav-link" href="{{route('situation.list')}}">{{__('List')}} </a> </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('association.index')}}">
                        <i><img src="{{asset('argon')}}/img/icons/common/auction.png"/></i> {{ __('Association Data') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('recepit.index')}}">
                        <i class="ni ni-books text-blue"></i> {{ __('Fee Receipt') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('proposed.index')}}">
                        <i class="ni ni-books text-blue"></i> {{ __('Proposed Changes') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('intrance')}}">
                        <i class="ni ni-books text-blue"></i> {{ __('Entrance/Exits') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('ticket.index')}}">
                        <i class="ni ni-bullet-list-67 text-blue"></i> {{ __('Ticket') }}
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('log.index')}}">
                        <i class="ni ni-books text-blue"></i> {{ __('Log') }}
                    </a>
                </li>
               
                
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="ni ni-shop text-blue"></i> {{ __('Manage Operators') }}  </a>
                    <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <li><a class="nav-link" href="">{{__('Add')}} </a></li>
                        <li><a class="nav-link" href="{{route('operator.index')}}">{{__('List')}} </a> </li>
                        <li><a class="nav-link" href="{{route('user.change')}}">{{__('Change Password')}} </a> </li>
                    </ul>
                </li>
                

                <!--                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('access.set')}}">
                                            <i class="ni ni-settings text-blue"></i> {{ __('Set User Access') }}
                                        </a>
                                    </li>-->

            </ul>
        </div>
    </div>
</nav>
