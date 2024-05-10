@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Appointment Studio')

@section('vendor-style')
@vite([
    'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
    'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
    'resources/assets/vendor/libs/select2/select2.scss',
])
@endsection

@section('vendor-script')
@vite([
    'resources/assets/vendor/libs/apex-charts/apexcharts.js',
    'resources/assets/vendor/libs/chartjs/chartjs.js',
    'resources/assets/vendor/libs/flatpickr/flatpickr.js',
    'resources/assets/vendor/libs/select2/select2.js',
])
@endsection

@section('page-script')
@vite([
    'resources/assets/js/app-logistics-dashboard.js',
    'resources/assets/js/charts-chartjs.js',
    'resources/assets/js/forms-pickers.js',
    'resources/assets/js/forms-selects.js',
])
@endsection
@section('content')

<style type="text/css">
    .percent_val {
        padding-left: 0 !important;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-xxl-7 mb-4 order-3 order-xxl-1">
        <div class="card h-80">
            <div class="card-header mb-0">
                <h4 class="m-0 me-2">Performance</h4>
            </div>
            <div class="card-header row py-1">
                <div class="col-md-4 mb-2">
                    <select id="select2Basic1" class="select2 form-select form-select-lg" data-allow-clear="true">
                        <option>All Agents</option>
                        @foreach ($agents as $agent)
                            <option>{{$agent->first_name." ".$agent->last_name}}</option>
                        @endforeach
                    </select>

                                       </div>
                <div class="col-md-4 mb-2">
                    <select id="select2Basic2" class="select2 form-select col-md-4 form-select-lg" data-allow-clear="true">
                        <option>All Services</option>
                        @foreach ($services as $service)
                            <option>{{$service->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <input type="text" class="form-control" placeholder="YYYY-MM-DD to YYYY-MM-DD"
                        id="flatpickr-range" />
                </div>
            </div>
            <hr>

            <div class="d-md-flex row vehicles-progress-labels" style="padding: 0 2% 0 2%;">
                <div class="col-md-3 col-6 vehicles-progress-label on-the-way-text">
                    <div class="d-flex">

                           
                                                   <h2 class="m-1">0</h2>
                        <span class="p-3 percent_val">0%</span>
                        <i class="fa fa-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Total number of appointments in selected period."></i>
                    </div>
                    <h6>Appointments</h6>
                </div>
                <div class="col-md-3 col-6 vehicles-progress-label unloading-text">
                    <div class="d-flex">
                        
                           <h2 class="m-1">$0</h2>
                        <span class="p-3 percent_val">0%</span>
                        <i class="fa fa-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Total sales in selected period."></i>
                    </div>
                    <h6>Sales Revenue</h6>
                </div>
                <div class="col-md-3 col-6 vehicles-progress-label loading-text">
                    <div class="d-flex">

                                            
                                  <h2 class="m-1">0</h2>
                        <span class="p-3 percent_val">0%</span>
                        <i class="fa fa-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Total hours worked across all selected agents in selected period."></i>
                    </div>
                    <h6>Hours Worked</h6>
                </div>
                <div class="col-md-3 col-6 vehicles-progress-label waiting-text">
                    <div class="d-flex">
                             
                         
                        <h2 class="m-1">5</h2>
                        <span class="p-3 percent_val">0%</span>
                        <i class="fa fa-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" data-bs-original-title="Total number of new customers registered in selected period."></i>
                    </div>
                    <h6>New Customers</h6>
                </div>
            </div>
            <hr>

            <div class="card-body">
                <div id="shipmentStatisticsChart">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xxl-5 mb-4 order-3 order-xxl-1">
        <div class="card h-100">
            <div class="card-header mb-0">
                <h4 class="m-0 me-2">Upcoming</h4>
            </div>
            <div class="card-header row pt-1">
                <div class="col-md-4 mb-2">
                    <select id="select2Basic3" class="select2 form-select form-select-lg" data-allow-clear="true">
                        <option>All Locations</option>
                        <option>Los Angeles</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <select id="select2Basic4" class="select2 form-select form-select-lg" data-allow-clear="true">
                        <option>All Services</option>
                        <option>Tooth Whitening</option>
                        <option>Imvisilingn Braces</option>
                        <option>Group Booking</option>
                        <option>Pocelain Crown</option>
                        <option>Root Canal Therapy</option>
                        <option>Gum Decease</option>
                    </select>
                </div>
                <div class="col-md-4 mb-2">
                    <select id="select2Basic5" class="select2 form-select form-select-lg" data-allow-clear="true">
                        <option>All Agents</option>
                        <option>John Mayers</option>
                        <option>Kim collins</option>
                        <option>Ben Stones</option>
        <option>Clark Simeone</option>
                    </select>
                </div>
                
            </div>
            <div class="d-fex align-items-center justify-content-center text-center">
                <i class='bx bx-sm bxs-inbox'></i>
                <p>No Upcoming Appointments</p>

                                       <a href="#">
                    <i class='bx bx-sm bx-plus'></i>
                    <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">Add Appointment</span>
                </a>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header d-flex flex-column">
                <h4 class="card-title mb-0">Day Preview</h4>
            </div>
            <div class="card-header header-elements d-flex gap-3">
                <div class="">
                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                </div>
                <select id="select2Basic6" class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option>All Locations</option>
                    <option>Los Angeles</option>
                </select>
                <select id="select2Basic7" class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option>All Services</option>
                    <option>Tooth Whitening</option>
                    <option>Imvisilingn Braces</option>
                    <option>Group Booking</option>
                    <option>Pocelain Crown</option>
                    <option>Root Canal Therapy</option>
                    <option>Gum Decease</option>
                </select>
                <div class="fom-check">
                    <label class="px-4 py-2" for="customRadioTemp1">
                        <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                            id="customRadioTemp1" checked />
                        <span class="custom-option-header">
                            <span class="h6 mb-0">Show Appointments</span>
                        </span>
                    </label>
                </div>
                <div class="form-check">
                    <label class="py-2" for="customRadioTemp2">
                        <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                            id="customRadioTemp2" />
                        <span class="custom-option-header">
                            <span class="h6 mb-0">Show Availability</span>
                        </span>
                    </label>
                </div>
                <div class="card-action-element ms-auto py-0">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bx bx-calendar"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                    class="dropdown-item d-flex align-items-center">Yesterday</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7
                                    Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                    30
                                    Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                                    Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                    Month</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="horizontalBarChart" class="chartjs" data-height="400"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection
