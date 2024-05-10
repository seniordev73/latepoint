@php
    $containerNav = (isset($configData['contentLayout']) && $configData['contentLayout'] === 'compact') ? 'container-xxl' :
        'container-fluid';
    $navbarDetached = ($navbarDetached ?? '');

@endphp

<!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme"
        id="layout-navbar">
@endif
    @if(isset($navbarDetached) && $navbarDetached == '')
        <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="{{$containerNav}}">
    @endif

            <!--  Brand demo (display only for navbar-full and hide on below xl) -->
            @if(isset($navbarFull))
                <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
                    <a href="{{url('/')}}" class="app-brand-link gap-2">
                        <span
                            class="app-brand-logo demo">@include('_partials.macros', ["width" => 25, "withbg" => 'var(--bs-primary)'])</span>
                        <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
                    </a>

                    @if(isset($menuHorizontal))
                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                            <i class="bx bx-chevron-left bx-sm align-middle"></i>
                        </a>
                    @endif
                </div>
            @endif

            <!-- ! Not required for layout-without-menu -->
            @if(!isset($navbarHideToggle))
                <div
                    class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
            @endif

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                @if(!isset($menuHorizontal))
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item navbar-search-wrapper mb-0">
                            <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                <i class="bx bx-search bx-sm"></i>
                                <span class="d-none d-md-inline-block text-muted">Start typing to find bookings, customers, agents or services...</span>
                            </a>
                        </div>
                    </div>
                    <!-- /Search -->
                @endif

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    @if(isset($menuHorizontal))
                        <!-- Search -->
                        <li class="nav-item navbar-search-wrapper me-2 me-xl-0">
                            <a class="nav-link search-toggler" href="javascript:void(0);">
                                <i class="bx bx-search bx-sm"></i>
                            </a>
                        </li>
                        <!-- /Search -->
                    @endif

                    <!-- Language -->
                    <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" href="{{url('app/chat')}}">
                            <i class='bx bx-chat bx-sm'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                                    href="{{url('lang/en')}}" data-language="en" data-text-direction="ltr">
                                    <span class="align-middle">English</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() === 'fr' ? 'active' : '' }}"
                                    href="{{url('lang/fr')}}" data-language="fr" data-text-direction="ltr">
                                    <span class="align-middle">French</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}"
                                    href="{{url('lang/ar')}}" data-language="ar" data-text-direction="rtl">
                                    <span class="align-middle">Arabic</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() === 'de' ? 'active' : '' }}"
                                    href="{{url('lang/de')}}" data-language="de" data-text-direction="ltr">
                                    <span class="align-middle">German</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--/ Language -->

                    <!-- Quick links  -->
                    <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <i class='bx bx-grid-alt bx-sm'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="dropdown-menu-header border-bottom">
                                <div class="dropdown-header d-flex align-items-center py-3">
                                    <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                                    <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i
                                            class="bx bx-sm bx-plus-circle"></i></a>
                                </div>
                            </div>
                            <div class="dropdown-shortcuts-list scrollable-container">
                                <div class="row row-bordered overflow-visible g-0">
                                    <div class="dropdown-shortcuts-item col">
                                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                            <i class="bx bx-calendar fs-4"></i>
                                        </span>
                                        <a href="{{url('app/calendar')}}" class="stretched-link">Calendar</a>
                                        <small class="text-muted mb-0">Appointments</small>
                                    </div>
                                    <div class="dropdown-shortcuts-item col">
                                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                            <i class="bx bx-food-menu fs-4"></i>
                                        </span>
                                        <a href="{{url('app/invoice/list')}}" class="stretched-link">Invoice App</a>
                                        <small class="text-muted mb-0">Manage Accounts</small>
                                    </div>
                                </div>
                                <div class="row row-bordered overflow-visible g-0">
                                    <div class="dropdown-shortcuts-item col">
                                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                            <i class="bx bx-user fs-4"></i>
                                        </span>
                                        <a href="{{url('app/user/list')}}" class="stretched-link">User App</a>
                                        <small class="text-muted mb-0">Manage Users</small>
                                    </div>
                                    <div class="dropdown-shortcuts-item col">
                                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                            <i class="bx bx-check-shield fs-4"></i>
                                        </span>
                                        <a href="{{url('app/access-roles')}}" class="stretched-link">Role Management</a>
                                        <small class="text-muted mb-0">Permission</small>
                                    </div>
                                </div>
                                <div class="row row-bordered overflow-visible g-0">
                                    <div class="dropdown-shortcuts-item col">
                                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                            <i class="bx bx-pie-chart-alt-2 fs-4"></i>
                                        </span>
                                        <a href="{{url('/')}}" class="stretched-link">Dashboard</a>
                                        <small class="text-muted mb-0">User Profile</small>
                                    </div>
                                    <div class="dropdown-shortcuts-item col">
                                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                            <i class="bx bx-cog fs-4"></i>
                                        </span>
                                        <a href="{{url('pages/account-settings-account')}}"
                                            class="stretched-link">Setting</a>
                                        <small class="text-muted mb-0">Account Settings</small>
                                    </div>
                                </div>
                                <div class="row row-bordered overflow-visible g-0">
                                    <div class="dropdown-shortcuts-item col">
                                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                            <i class="bx bx-help-circle fs-4"></i>
                                        </span>
                                        <a href="{{url('pages/faq')}}" class="stretched-link">FAQs</a>
                                        <small class="text-muted mb-0">FAQs & Articles</small>
                                    </div>
                                    <div class="dropdown-shortcuts-item col">
                                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                            <i class="bx bx-window-open fs-4"></i>
                                        </span>
                                        <a href="{{url('modal-examples')}}" class="stretched-link">Modals</a>
                                        <small class="text-muted mb-0">Useful Popups</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Quick links -->

                    <!-- Style Switcher -->
                    <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" href="{{url('app/email')}}">
                            <i class='bx bxs-inbox bx-sm'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                            <!-- <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                    <span class="align-middle"><i class='bx bx-sun me-2'></i>Light</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                    <span class="align-middle"><i class="bx bx-moon me-2"></i>Dark</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                    <span class="align-middle"><i class="bx bx-desktop me-2"></i>System</span>
                                </a>
                            </li> -->
                        </ul>
                    </li>
                    <!--/ Style Switcher -->

                    <!-- Notification -->
                    <button class="btn btn-primary d-flex send-msg-btn" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                        <i class="bx bx-plus me-md-1 me-0"></i>
                        <span class="align-middle d-md-inline-block d-none">New Booking</span>
                    </button>
                    <!--/ Notification -->

                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="{{ Auth::user()->profile_photo_url ? Auth::user()->profile_photo_url : asset('assets/img/avatar.png') }}"
                                    alt class="w-px-40 h-auto rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.user-profile')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="{{ Auth::user()->profile_photo_url ? Auth::user()->profile_photo_url : asset('assets/img/avatar.png') }}"
                                                    alt class="w-px-40 h-auto rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-medium d-block">
                                                @if (Auth::check())
                                                    {{ Auth::user()->first_name }}
                                                @else
                                                    UserName
                                                @endif
                                            </span>
                                            <small class="text-muted">Agent</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.api-tokens.index') }}">
                                        <i class='bx bx-key me-2'></i>
                                        <span class="align-middle">API Tokens</span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{url('settings/general')}}">
                                    <span class="d-flex align-items-center align-middle">
                                        <i class="flex-shrink-0 bx bx-cog me-2"></i>
                                        <span class="flex-grow-1 align-middle">Settings</span>
                                        <!-- <span
                                            class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                    </span> -->
                                </a>
                            </li>
                            @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <h6 class="dropdown-header">Manage Team</h6>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ Auth::user() ? route('admin.teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">
                                        <i class='bx bx-cog me-2'></i>
                                        <span class="align-middle">Team Settings</span>
                                    </a>
                                </li>
                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.teams.create') }}">
                                            <i class='bx bx-user me-2'></i>
                                            <span class="align-middle">Create New Team</span>
                                        </a>
                                    </li>
                                @endcan
                                @if (Auth::user()->allTeams()->count() > 1)
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <h6 class="dropdown-header">Switch Teams</h6>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                @endif
                                @if (Auth::user())
                                    @foreach (Auth::user()->allTeams() as $team)
                                        {{-- Below commented code read by artisan command while installing jetstream. !! Do not
                                        remove if you want to use jetstream. --}}

                                        {{-- <x-switchable-team :team="$team" /> --}}
                                    @endforeach
                                @endif
                            @endif
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            @if (Auth::check())
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class='bx bx-power-off me-2'></i>
                                        <span class="align-middle">Logout</span>
                                    </a>
                                </li>
                                <form method="POST" id="logout-form" action="{{ route('admin.logout') }}">
                                    @csrf
                                </form>
                            @else
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ Route::has('login') ? route('admin.login') : url('auth/login-basic') }}">
                                        <i class='bx bx-log-in me-2'></i>
                                        <span class="align-middle">Login</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <!--/ User -->
                </ul>
            </div>

            <!-- Search Small Screens -->
            <div
                class="navbar-search-wrapper search-input-wrapper {{ isset($menuHorizontal) ? $containerNav : '' }} d-none">
                <input type="text"
                    class="form-control search-input {{ isset($menuHorizontal) ? '' : $containerNav }} border-0"
                    placeholder="Search..." aria-label="Search...">
                <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
            </div>

            @if(isset($navbarDetached) && $navbarDetached == '')
                </div>
            @endif
    </nav>
    <!-- / Navbar -->

    <!-- Start the New Booking Modal -->
    <style type="text/css">
        .offcanvas-title {
            border-bottom: 2px solid blue;
        }

        .sub_total {
            border-bottom: 2px solid black;
        }

        .add-coupon-box:hover {
            border-color: #2652E4;
            border-style: solid;
        }

        .add-coupon-box {
            border: 3px dotted rgba(0, 0, 0, 0.1);
            padding: 13px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .add-coupon-box .add-coupon-graphic-w {
            width: 40px;
            height: 40px;
            position: relative;
        }

        .add-coupon-box .add-coupon-graphic-w .add-coupon-plus {
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            height: 18px;
            width: 18px;
            background-color: #2652E4;
            box-shadow: 0px 0px 0px 10px rgba(189, 214, 252, 0.3);
            color: #fff;
            transform: translate(-50%, -50%);
            transition: all 0.2s cubic-bezier(0.25, 1.4, 0.5, 1.35);
        }

        .add-coupon-box .add-coupon-graphic-w .add-coupon-plus i {
            position: absolute;
            display: block;
            top: 50%;
            left: 50%;
            font-size: 10px;
            transform: translate(-45%, -47%);
            transition: all 0.2s ease;
        }

        .latepoint-icon {
            font-family: "latepointadmin" !important;
            speak: never;
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .add-coupon-box .add-coupon-label {
            color: #2652E4;
            font-weight: 500;
            font-size: 19.2px;
            transition: all 0.2s cubic-bezier(0.25, 1.4, 0.5, 1.35);
            margin-left: 15px;
        }

        .toast {
            position: absolute;
            top: 2px;
            right: 5px;
        }
    </style>
    <div class="col-lg-3 col-md-6">
        <form id="create-form" action="{{route('admin.app-storeappointments')}}" method="post">
            @csrf
            <div class="mt-3">
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                    aria-labelledby="offcanvasEndLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasEndLabel" class="offcanvas-title">New Appointment</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div id="toast" class="toast align-items-center text-white bg-primary" role="alert"
                        aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                Toast message placeholder
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="offcanvas-body mx-0 flex-grow-0">
                        <!-- Service Selector -->
                        <div class="col-lg-12 mb-3">
                            <select id="selectpickerGroups-service" name="service" class="selectpicker-service selectpicker w-100" data-style="btn-default">
                                <option value="" disabled>Select Service</option>
                                <!-- Options will be populated by AJAX -->
                            </select>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="selectpickerBasic" class="form-label">Service Extras</label>
                            <div class="select2-primary">
                                <select id="select2Primary" name="service_extra" class="select2 form-select" multiple>
                                    <!-- <option value="teeth_whitening" selected>Teeth Whitening</option>
                                    <option value="hair_wash" selected>Hair Wash</option>
                                    <option value="recovery_mask">Recovery Mask</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-3">
                            <div class="col-lg-6">
                                <label for="selectpickerBasic" class="form-label">Agent</label>
                                <select id="selectpickerBasic-agent" name="agent" class="selectpicker-agent selectpicker w-100"
                                    data-style="btn-default">
                                    <!-- <option value="john_mayers">John Mayers</option>
                                    <option value="kim_collins">Kim Collins</option>
                                    <option value="ben_stones">Ben Stones</option> -->
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="selectpickerBasic" class="form-label">Status</label>
                                <select id="selectpickerBasic" name="status" class="selectpicker w-100"
                                    data-style="btn-default">
                                    <option value="approved">Approved</option>
                                    <option value="pending_approval">Pending Approval</option>
                                    <option value="cancelled">Cancelled</option>
                                    <option value="finished">Finished</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="selectpickerBasic" class="form-label">Start Date</label>
                            <input type="text" class="form-control" name="start_date" placeholder="mm/dd/YYYY"
                                id="flatpickr-datetime" />
                        </div>
                        <div class="col-lg-12 d-flex mb-3">
                            <div class="col-lg-6">
                                <div class="start_time">
                                    <label for="flatpickr-time" class="form-label">Start Time</label>
                                    <input type="text" class="form-control" name="start_time" placeholder="HH:MM"
                                        id="flatpickr-time" />
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="finish_time">
                                    <label for="flatpickr-time" class="form-label">End Time</label>
                                    <input type="text" class="form-control" name="end_time" placeholder="HH:MM"
                                        id="flatpickr-time-finish" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-3">
                            <div class="col-lg-6">
                                <div class="buffer_before">
                                    <label for="flatpickr-time" class="form-label">Buffer Before</label>
                                    <input type="text" class="form-control" name="buffer_before" placeholder="0 minutes"
                                        id="flatpickr-time" />
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="buffer_after">
                                    <label for="flatpickr-time" class="form-label">Buffer After</label>
                                    <input type="text" class="form-control" name="buffer_after" placeholder="0 minutes"
                                        id="flatpickr-time-finish" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-3">
                            <div class="col-lg-12">
                                <div class="comment_left_by_customer">
                                    <label for="flatpickr-time" class="form-label">Comment left by customer</label>
                                    <textarea placeholder="" class="form-control" name="customer_comment"
                                        rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-5">
                            <div class="col-lg-12">
                                <div class="doc_upload">
                                    <label for="flatpickr-time" class="form-label">Doc</label>
                                    <input type="file" class="form-control" name="doc" id="flatpickr-time-finish" />
                                </div>
                            </div>
                        </div>

                        <h5 id="offcanvasEndLabel" class="offcanvas-title mb-4">Customer</h5>

                        <div class="col-lg-12 mb-3 d-flex">
                            <div class="col-lg-6">
                                <div class="start_time">
                                    <label for="flatpickr-time" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                        id="flatpickr-time" />
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="finish_time">
                                    <label for="flatpickr-time" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                        id="flatpickr-time-finish" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-3">
                            <div class="col-lg-12">
                                <div class="customer_email">
                                    <label for="flatpickr-time" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address"
                                        id="flatpickr-time" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-3">
                            <div class="col-lg-12">
                                <div class="telephone_number">
                                    <label for="flatpickr-time" class="form-label">Telephone Number</label>
                                    <input type="text" class="form-control" name="telephone_number"
                                        placeholder="+1-205-555-0123" id="flatpickr-time" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-3">
                            <div class="col-lg-12">
                                <div class="customer_notes">
                                    <label for="flatpickr-time" class="form-label">Customer Notes</label>
                                    <textarea placeholder="" class="form-control" name="customer_notes"
                                        rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-5">
                            <div class="col-lg-12">
                                <div class="customer_notes">
                                    <label for="flatpickr-time" class="form-label">Notes only visible to admins</label>
                                    <textarea placeholder="" class="form-control" rows="2"
                                        name="admin_notes"></textarea>
                                </div>
                            </div>
                        </div>

                        <h5 id="offcanvasEndLabel" class="offcanvas-title mb-4">Price Breakdown</h5>

                        <div class="col-lg-12 mb-3 d-flex">
                            <div class="col-lg-12 d-flex">
                                <label class="switch">
                                    <input type="checkbox" class="switch-input" />
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label">Use Coupon</span>
                                </label>
                                <input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code"
                                    id="flatpickr-coupon_code" />
                                <button>apply</button>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-3">
                            <div class="col-lg-12">
                                <div class="sub_total justify-content-between">
                                    <label for="flatpickr-time" class="form-label">Sub Total $</label>
                                    <input type="text" class="form-control" name="subtotal" placeholder="0.00"
                                        id="flatpickr-sub_total" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex mb-5">
                            <div class="col-lg-12">
                                <div class="total_price justify-content-between">
                                    <label for="flatpickr-time" class="form-label">Total Price $</label>
                                    <input type="text" class="form-control" name="price" placeholder="0.00"
                                        id="flatpickr-total_price" />
                                </div>
                            </div>
                        </div>


                        <h5 id="offcanvasEndLabel" class="offcanvas-title mb-4">Balance & Payments</h5>

                        <div class="col-lg-12 d-flex mb-5">
                            <div class="col-lg-12">
                                <div class="sub_total d-flex justify-content-between"
                                    style="border-bottom: 1px solid black;">
                                    <label for="flatpickr-time" class="form-label">$0.00</label>
                                    <strong style="color: red;" id="dynamic-price">$0.00</strong>
                                </div>
                                <div class="sub_total d-flex justify-content-between">
                                    <label for="flatpickr-time" class="form-label">Total Payments</label>
                                    <label for="flatpickr-time" class="form-label">Balance Due</label>
                                </div>
                            </div>
                        </div>

                        <h5 id="offcanvasEndLabel" class="offcanvas-title mb-4">Transactions</h5>

                        <div id="add-coupon-box" class="add-coupon-box mb-4" data-os-action="coupons__new_form"
                            data-os-output-target-do="append" data-os-output-target=".os-coupons-w">
                            <div class="add-coupon-graphic-w">
                                <div class="add-coupon-plus"><i
                                        class="latepoint-icon latepoint-icon-plus4 fa fa-plus"></i></div>
                            </div>
                            <div class="add-coupon-label">Add Transaction</div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Create Appointment</button>

                    </div>


                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize flatpickr for date and time fields
            flatpickr("#flatpickr-datetime", {
                dateFormat: "m/d/Y", // Set the date format
                enableTime: false    // Disable time picker
            });

             // Fetch services data when the page loads
             fetchServices();
             fetchExtraServices();
             fetchAgents();
            // Update price display on input change
            const priceInput = document.getElementById('flatpickr-total_price');
            const dynamicPriceLabel = document.getElementById('dynamic-price');

            priceInput.addEventListener('input', function () {
                const priceValue = priceInput.value.trim() || '0.00';
                dynamicPriceLabel.textContent = `$${parseFloat(priceValue).toFixed(2)}`;
            });

            // Select the form element
            const form = document.getElementById('create-form');

            // Add event listener for form submission
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission

                // Perform validation here
                if (validateForm()) {
                    // If validation passes, proceed with AJAX submission
                    submitFormAjax();
                }
            });

            // Function to validate form fields
            function validateForm() {
                // Example validation (you can add more as needed)
                const service = form.elements['service'].value;
                const startDateTime = form.elements['start_date'].value;
                const startTime = form.elements['start_time'].value;
                const endTime = form.elements['end_time'].value;

                const first_name = form.elements['first_name'].value;
                const last_name = form.elements['last_name'].value;
                const telephone_number = form.elements['telephone_number'].value;
                const customer_notes = form.elements['customer_notes'].value;
                const email = form.elements['email'].value;

                // Simple validation example
                if (!service) {
                    showToast('Service can not be blank');
                    return false;
                }

                if (!startDateTime) {
                    showToast('Start Date can not be blank');
                    return false;
                }

                if (!startTime) {
                    showToast('Start Time can not be blank');
                    return false;
                }
                if (!endTime) {
                    showToast('End Time can not be blank');
                    return false;
                }

                if (!first_name) {
                    showToast('First Name can not be blank');
                    return false;
                }
                if (!last_name) {
                    showToast('Last Name can not be blank');
                    return false;
                }
                if (!telephone_number) {
                    showToast('Telephone Number can not be blank');
                    return false;
                }
                if (!email) {
                    showToast('Email Adress can not be blank');
                    return false;
                }
                if (!isValidEmail(email)) {
                    showToast('Please enter a valid email address');
                    return false;
                }
                if (!customer_notes) {
                    showToast('Customer Notes can not be blank');
                    return false;
                }



                return true; // Return true if all validations pass
            }

            // Function to check if email is valid (simple example)
            function isValidEmail(email) {
                // Regular expression for basic email validation
                const emailRegex = /\S+@\S+\.\S+/;
                return emailRegex.test(email);
            }

            // Function to show Bootstrap Toast message
            function showToast(message) {
                // Select the toast element
                const toastElement = document.getElementById('toast');

                // Update toast message
                toastElement.querySelector('.toast-body').textContent = message;

                // Show the toast
                const toast = new bootstrap.Toast(toastElement);
                toast.show();
            }

            // Function to submit form via AJAX
            function submitFormAjax() {
                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Handle response if needed
                        showToast('Appointment created successfully');
                        window.location.href = '/admin/appointments'
                    },
                    error: function (error) {
                        console.error('Error:', error);
                        showToast(error.responseJSON.message);
                    }
                });
            }

            function fetchServices() {
                console.log("Fetch")
                $.ajax({
                    url: "{{ route('admin.resource-getservices') }}",
                    type: 'GET',
                    success: function (response) {

                        populateServices(response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching services:', error);
                        showToast('Failed to fetch services');
                    }
                });
            }

            // Function to populate services dropdown
            function populateServices(services) {
                const selectpickerServGroups = document.getElementById('selectpickerGroups-service');
                selectpickerServGroups.innerHTML = ''; // Clear existing options
                console.log(services, "Sss")

                if (services.length) {
                    services.forEach(service => {
                        const optgroup = document.createElement('optgroup');
                        optgroup.label = service.category;

                        service.services.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.textContent = item.name;
                            optgroup.appendChild(option);
                        });

                        selectpickerServGroups.appendChild(optgroup);
                    });
                } else {

                    showToast('Warnning: Please create service first.');
                }

                // Refresh selectpicker to show new options (if using Bootstrap selectpicker)
                $('.selectpicker-service').selectpicker('refresh');
            }
            function fetchExtraServices() {
                console.log("Fetch")
                $.ajax({
                    url: "{{ route('admin.resource-getserviceextras') }}",
                    type: 'GET',
                    success: function (response) {

                        populateExtraServices(response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching services:', error);
                        showToast('Failed to fetch services');
                    }
                });
            }

            // Function to populate services dropdown
            function populateExtraServices(services) {
                const select2Primary = document.getElementById('select2Primary');
                select2Primary.innerHTML = ''; // Clear existing options

                if (services.length) {
                    services.forEach(service => {
                        const option = document.createElement('option');
                        option.value = service.id;
                        option.textContent = service.name;
                        select2Primary.appendChild(option);
                    });
                } else {

                    // showToast('Warnning: Please create extra service first.');
                }

                // Refresh selectpicker to show new options (if using Bootstrap selectpicker)
                $('.select2').selectpicker('refresh');
            }

            //get agents
            function fetchAgents() {
                console.log("Fetch")
                $.ajax({
                    url: "{{ route('admin.resource-getagents') }}",
                    type: 'GET',
                    success: function (response) {

                        populateAgents(response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching services:', error);
                        showToast('Failed to fetch services');
                    }
                });
            }

            // Function to populate services dropdown
            function populateAgents(agents) {
                const selectpickerBasic = document.getElementById('selectpickerBasic-agent');
                selectpickerBasic.innerHTML = ''; // Clear existing options

                if (agents.length) {
                    agents.forEach(agent => {
                        const option = document.createElement('option');
                        option.value = agent.id;
                        option.textContent = agent.first_name + ' ' + agent.last_name;
                        selectpickerBasic.appendChild(option);
                    });
                } else {

                    // showToast('Warnning: Please create extra service first.');
                }

                // Refresh selectpicker to show new options (if using Bootstrap selectpicker)
                $('.selectpicker-agent').selectpicker('refresh');
            }
        });
    </script>
    <!-- End the New Booking Modal -->
