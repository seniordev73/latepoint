@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Latepoint')

@section('page-style')
@vite([
'resources/assets/vendor/scss/pages/card-analytics.scss'

])
@endsection

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss',
'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.scss',
'resources/assets/vendor/libs/jquery-timepicker/jquery-timepicker.scss',
'resources/assets/vendor/libs/pickr/pickr-themes.scss',
'resources/assets/vendor/libs/dropzone/dropzone.scss'
])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js',
'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js',
'resources/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js',
'resources/assets/vendor/libs/pickr/pickr.js',
'resources/assets/vendor/libs/dropzone/dropzone.js'
])
@endsection

@section('page-script')
@vite([
'resources/assets/js/forms-pickers.js',
'resources/assets/js/forms-selects.js',
'resources/assets/js/ui-cards-analytics.js',
'resources/assets/js/forms-file-upload.js'
])
@endsection
@section('content')

<link href="{{asset('/assets/css/createservices_custom.css')}}" rel="stylesheet">

<div class="row">
    <form action="{{route('admin.resource-updateservices', $service->id)}}" method="post" class="add-service">
        @csrf
        @php
         $servicevalues = json_decode($service->short_description, true);
        @endphp
        
        <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
            <div class="card-header mb-0">
               <h4 class="m-0 me-2">Edit Service (Service ID:{{$service->id}})</h4>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">General Information</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="d-flex mb-3">
                            <div class="col-lg-6 px-3">
                                <label for="selectpickerBasic" class="form-label">Service Name</label>
                                <input type="text" value="{{$service->name}}" class="form-control" name="name" id="defaultFormControlInput" placeholder="Service Name" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="col-lg-6 px-3">
                                <label for="selectpickerBasic" class="form-label">Short Description</label>
                             <input type="text" value="{{$servicevalues['short_description']}}" class="form-control" name="short_description" id="defaultFormControlInput" placeholder="Short Description" aria-describedby="defaultFormControlHelp" />
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="col-lg-6 px-3">
                                <label for="selectpickerBasic" class="form-label">Category</label>
                                <div class="d-flex">
                                    <select id="selectpickerBasic" class="selectpicker w-100" name="category_id" data-style="btn-default">  
                                           <option value="0" {{$service->category_id == 0 ? 'selected' : '' }}>Uncategorized</option>
                                        @foreach ($categories as $category )
                                           <option value="{{$category->id}}" {{ $category->id == $service->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach                                                     
                                    </select>
                                    <button class="btn btn-primary h-px-40" type="button" style="width:200px;"><i class="fa fa-plus"></i>Add Category</button>
                                </div>
                            </div>
                            <div class="col-lg-6 px-3">
                                <label for="selectpickerBasic" class="form-label">Status</label>
                                <select id="selectpickerBasic" class="selectpicker w-100" name="status_edit" data-style="btn-default">
                                    <option value="active" <?php echo($service->status == "active" ? 'selected' : '') ?>>Active</option>
                                    <option value="disabled" <?php echo($service->status == "disabled" ? 'selected' : '') ?>>Disabled</option>
                                </select>
                            </div>
                        </div>    
                        <div class="d-flex mb-3">
                            <div class="col-lg-6 px-3">
                                <label for="selectpickerBasic" class="form-label">Background Color</label>
                                <input type="text" class="form-control" name="bg_color" id="defaultFormControlInput" value="{{$service->bg_color}}" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="col-lg-6 px-3">
                                <label for="selectpickerBasic" class="form-label">Visibility</label>
                                <select id="selectpickerBasic" class="selectpicker w-100" name="visibility" data-style="btn-default">
                                    <option value="everyone" <?php echo($service->visibility == "everyone" ? 'selected' : '') ?>>Visibe to everyone</option>
                                    <option value="admins" <?php echo($service->visibility == "admins" ? 'selected' : '') ?>>Visibe only to admins and agents</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 mb-4">
                <div class="card">
                    <h5 class="card-header">Media</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex col-lg-12 px-3 ">
                                <div class="col-lg-6 selection_image" style="text-align: center;">
                                    <div action="/upload" class="dropzone needsclick selection_image" id="dropzone-basic">
                                        <div class="dz-message needsclick">
                                            Selection Image
                                        </div>
                                        <span>This image is used on a service selection step in the booking form.</span>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 description_image" style="text-align: center;">
                                    <div action="/upload" class="dropzone needsclick description_image" id="dropzone-basic1">
                                        <div class="dz-message needsclick">
                                            Service Tile Image
                                        </div>
                                        <span>This image is used when service is listed in [latepoint_resources] shortcode.</span>
                                        <div class="fallback">
                                            <input name="file" type="file" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Service Duration and Price</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="d-flex">
                            <div class="col-lg-3 px-3">
                                <label for="selectpickerBasic" class="form-label">Optional Duration Name</label>
                                <input type="text" class="form-control" name="duration_name" id="defaultFormControlInput" placeholder="Optional Duration Name" aria-describedby="defaultFormControlHelp" value="{{$service->duration_name}}" />
                            </div>
                            <div class="col-lg-3 px-3">
                                <label for="selectpickerBasic" class="form-label">Duration(minutes)</label>
                                <input type="text" class="form-control" name="duration" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="60 min" value="{{$service->duration}}"/>
                            </div>
                            <div class="col-lg-3 px-3">
                                <label for="selectpickerBasic" class="form-label">Charge Amount</label>
                                <input type="text" class="form-control" name="charge_amount" id="defaultFormControlInput" placeholder="0.00" aria-describedby="defaultFormControlHelp" value="{{$service->charge_amount}}" />
                            </div>
                            <div class="col-lg-3 px-3">
                                <label for="selectpickerBasic" class="form-label">Deposit Amount</label>
                                <input type="text" class="form-control" name="deposit_amount" id="defaultFormControlInput" placeholder="0.00" aria-describedby="defaultFormControlHelp" value="{{$service->deposit_amount}}" />
                            </div>
                        </div>    
    
                        <!-- <div class="mx-3 os-add-box add-duration-box" data-os-action="service_durations__duration_fields" data-os-output-target-do="append" data-os-output-target=".os-service-durations-w">
                            <div class="add-box-graphic-w">
                                <div class="add-box-plus">
                                    <i class="latepoint-icon latepoint-icon-plus4 fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="add-box-label">Create Another Service Duration</div>
                        </div> -->
                    </div>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Display Price</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="d-flex mb-3 col-lg-12 px-3">
                            <div class="latepoint-message latepoint-message-subtle">
                                This price is for display purposes only, it is not the price that the customer will be charged. The Charge Amount field above controls the amount that customer will be charged for. Setting both minimum and maximum price, will show a price range on the service selection step.
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-lg-6 px-3">
                                <label for="selectpickerBasic" class="form-label">Minimum Price</label>
                                <input type="text" class="form-control" name="price_min" id="defaultFormControlInput" value="{{$service->price_min}}" placeholder="Minimum Price" aria-describedby="defaultFormControlHelp" placeholder="0.00" />
                            </div>
                            <div class="col-lg-6 px-3">
                                <label for="selectpickerBasic" class="form-label">Maximum Price</label>
                                <input type="text" class="form-control" name="price_max" id="defaultFormControlInput" value="{{$service->price_max}}" placeholder="Maximum Price" aria-describedby="defaultFormControlHelp" placeholder="0.00" />
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Other Settings</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="d-flex">
                            <div class="col-lg-3 px-3">
                                <label for="selectpickerBasic" class="form-label">Buffer Before</label>
                                <input type="text" class="form-control" name="buffer_before" value="{{$service->buffer_before}}" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="0 (min)" />
                            </div>
                            <div class="col-lg-3 px-3">
                                <label for="selectpickerBasic" class="form-label">Buffer After</label>
                                <input type="text" class="form-control" name="buffer_after" value="{{$service->buffer_after}}" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="0 (min)" />
                            </div>
                            <div class="col-lg-3 px-3">
                                <label for="selectpickerBasic" class="form-label">Override Time Intervals</label>
                                <input type="text" class="form-control" name="timeblock_interval" value="{{$service->timeblock_interval}}" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="0 (min)" />
                            </div>
                            <div class="col-lg-3 px-3">
                                <label for="selectpickerBasic" class="form-label">Override status for bookings</label>
                                <select id="selectpickerBasic" class="selectpicker w-100" name="override_default_booking_status" data-style="btn-default">
                                    <option value="approved" <?php echo($service->override_default_booking_status == "approved" ? 'selected': '')?>>Approved</option>
                                    <option value="pending_approval" <?php echo($service->override_default_booking_status == "pending_approval" ? 'selected': '')?>>Pending Approval</option>
                                    <option value="cancelled" <?php echo($service->override_default_booking_status == "cancelled" ? 'selected': '')?>>Cancelled</option>
                                    <option value="no_show" <?php echo($service->override_default_booking_status == "no_show" ? 'selected': '')?>>No Show</option>
                                    <option value="completed" <?php echo($service->override_default_booking_status == "completed" ? 'selected': '')?>>Completed</option>
                                </select>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 mb-4">
                <div class="card">
                    <h5 class="card-header">Agents Who Offer This Service</h5>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($agents as $agent)
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-basic">
                                    <label class="form-check-label custom-option-content" for="customCheckTemp37">
                                    <input class="form-check-input" type="checkbox" name="service[offer][{{$agent->id}}]" id="customCheckTemp37" {{ isset($servicevalues['offer'][$agent->id]) && $servicevalues['offer'][$agent->id] == 'true' ? 'checked' : '' }} />
                                        <span class="custom-option-header">
                                            <img src="{{ $agent->avatar ? $agent->avatar : asset('assets/img/avatar.png') }}" class="w-px-30 border-50" />
                                            <span class="h6 mb-0">{{$agent->first_name }} {{$agent->last_name}}</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 mb-4">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between card-header-11">
                        <h5 class="card-header">Service Schedule</h5>
                        <div class="py-4 px-5">
                            <label class="form-check-label custom-option-content customCheckTemp1" for="customCheckTemp1">
                                <input class="form-check-input" type="checkbox" name="service[schedule][status]" id="customCheckTemp1" <?php echo($servicevalues['schedule']['status']=='true'? 'checked':'')?>/>
                                <span class="custom-option-header">
                                    <span class="h6 mb-0">Set Custom Schedule</span>
                                </span>
                            </label>
                        </div>
                    </div>
                        
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="mb-3 col-lg-12 px-3 first_section">
                            <div class="latepoint-message latepoint-message-subtle">
                                This service is using general schedule which is set in main settings
                            </div>
                        </div>
                        <div class="second_section">
                            <div class="custom-schedule-wrapper" style="<?php echo($servicevalues['schedule']['status']=='true'? '':'display:none')?>">
                                <div class="weekday-schedule-w">
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[schedule][mon][status]" <?php echo($servicevalues['schedule']['mon']['status']=='true'? 'checked':'')?>/>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Monday</span>
                                            </label>
                                            <span>08:00AM-05:00PM</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="start_time">
                                                <label for="flatpickr-time" class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time" name="service[schedule][mon][start]" value="{{$servicevalues['schedule']['mon']['start']}}"/>
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish" name="service[schedule][mon][finish]" value="{{$servicevalues['schedule']['mon']['finish']}}"/>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[schedule][tus][status]" <?php echo($servicevalues['schedule']['tus']['status']=='true'? 'checked':'')?>/>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Tuesday</span>
                                            </label>
                                            <span>08:00AM-05:00PM</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="start_time">
                                                <label for="flatpickr-time" class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time1" name="service[schedule][tus][start]" value="{{$servicevalues['schedule']['tus']['start']}}" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish1" name="service[schedule][tus][finish]"/value="{{$servicevalues['schedule']['tus']['finish']}}">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[schedule][wed][status]" <?php echo($servicevalues['schedule']['wed']['status']=='true'? 'checked':'')?>/>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Wednesday</span>
                                            </label>
                                            <span>08:00AM-05:00PM</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="start_time">
                                                <label for="flatpickr-time" class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time2" name="service[schedule][wed][start]" value="{{$servicevalues['schedule']['wed']['start']}}"/>
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish2" name="service[schedule][wed][finish]" value="{{$servicevalues['schedule']['wed']['finish']}}"/>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[schedule][thu][status]" <?php echo($servicevalues['schedule']['thu']['status']=='true'? 'checked':'')?>/>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Thursday</span>
                                            </label>
                                            <span>08:00AM-05:00PM</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="start_time">
                                                <label for="flatpickr-time" class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time3" name="service[schedule][thu][start]" value="{{$servicevalues['schedule']['thu']['start']}}"/>
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish3" name="service[schedule][thu][finish]" value="{{$servicevalues['schedule']['thu']['finish']}}" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[schedule][fri][status]" <?php echo($servicevalues['schedule']['fri']['status']=='true'? 'checked':'')?>/>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Friday</span>
                                            </label>
                                            <span>08:00AM-05:00PM</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="start_time">
                                                <label for="flatpickr-time" class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time4" name="service[schedule][fri][start]" value="{{$servicevalues['schedule']['fri']['start']}}"/>
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish4" name="service[schedule][fri][finish]" value="{{$servicevalues['schedule']['fri']['finish']}}"/>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[schedule][sat][status]" <?php echo($servicevalues['schedule']['sat']['status']=='true'? 'checked':'')?>/>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Saturday</span>
                                            </label>
                                            <span>08:00AM-05:00PM</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="start_time">
                                                <label for="flatpickr-time" class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time5" name="service[schedule][sat][start]" value="{{$servicevalues['schedule']['sat']['start']}}" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish5" name="service[schedule][sat][finish]" value="{{$servicevalues['schedule']['sat']['finish']}}"/>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[schedule][sun][status]" <?php echo($servicevalues['schedule']['sun']['status']=='true'? 'checked':'')?>/>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Sunday</span>
                                            </label>
                                            <span>08:00AM-05:00PM</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="start_time">
                                                <label for="flatpickr-time" class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time6" name="service[schedule][sun][start]" value="{{$servicevalues['schedule']['sun']['start']}}" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish6" name="service[schedule][sun][finish]" value="{{$servicevalues['schedule']['sun']['finish']}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Group Bookings</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="d-flex row mb-3 group_booking_item">
                            <div class="col-lg-1 px-3">
                                <label for="selectpickerBasic" class="form-label">Capacity</label>
                            </div>
                            <div class="col-lg-3 px-3 mb-3">
                                <label for="selectpickerBasic" class="form-label">Minimum</label>
                                <input type="text" class="form-control" name="capacity_min" id="defaultFormControlInput" placeholder="Minimum" aria-describedby="defaultFormControlHelp" value="{{$service->capacity_min}}" />
                            </div>
                            <div class="col-lg-3 px-3 mb-3">
                                <label for="selectpickerBasic" class="form-label">Maximum</label>
                                <input type="text" class="form-control" name="capacity_max" id="defaultFormControlInput" placeholder="Maximum" aria-describedby="defaultFormControlHelp" value="{{$service->capacity_max}}" />
                            </div>
                        </div>    
    
                        <div class="d-flex row mb-3 group_booking_item">
                            <div class="col-lg-1 px-3">
                                <label for="selectpickerBasic" class="form-label">Pricing</label>
                            </div>
                            <div class="col-lg-6 px-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <label class="switch">
                                        <input type="checkbox" class="switch-input" name="service[booking][price_charge]" <?php echo($servicevalues['booking']['price_charge']=='true'?'checked':'') ?> />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">Do not multiply charge amount by the number of attendees</span>
                                    </label>
                                </div>
    
                                <div class="d-flex justify-content-between mb-3">
                                    <label class="switch">
                                        <input type="checkbox" class="switch-input" name="service[booking][price_deposit]" <?php echo($servicevalues['booking']['price_deposit']=='true'?'checked':'') ?>  />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">Do not multiply deposit amount by the number of attendees</span>
                                    </label>
                                </div>
                            </div>
                        </div>    
    
                        <div class="d-flex row mb-3 group_booking_item">
                            <div class="col-lg-1 px-3">
                                <label for="selectpickerBasic" class="form-label">Other</label>
                            </div>
                            <div class="col-lg-6 px-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <label class="switch">
                                        <input type="checkbox" class="switch-input" name="service[booking][other_customer]" <?php echo($servicevalues['booking']['other_customer']=='true'?'checked':'') ?>  />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">Do not ask customers to select number of attendees</span>
                                    </label>
                                </div>
    
                                <div class="d-flex justify-content-between mb-3">
                                    <label class="switch">
                                        <input type="checkbox" class="switch-input" name="service[booking][other_timeslot]" <?php echo($servicevalues['booking']['other_timeslot']=='true'?'checked':'') ?>/>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">Block timeslot if minimum capacity is reached</span>
                                    </label>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="d-flex justify-content-between card-header-11">
                        <h5 class="card-header">Service Extras</h5>
                        <div class="py-4 px-5">
                            <label class="form-check-label custom-option-content selectAll" for="selectAll">
                                <input class="form-check-input" type="checkbox" value="" id="selectAll" />
                                <span class="custom-option-header">
                                    <span class="h6 mb-0">Select All</span>
                                </span>
                            </label>
                        </div>
                    </div>
                        
                    <div class="card-body">
                        <div class="row">
                            @foreach ($extras as $extra)
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-basic">
                                    <label class="form-check-label custom-option-content" for="service_extra_1">
                                        <input class="form-check-input" type="checkbox" name="service[extra][{{$extra->id}}]"  id="service_extra_{{$extra->id}}"  {{ isset($servicevalues['extra'][$extra->id]) && $servicevalues['extra'][$extra->id] == 'true' ? 'checked' : '' }} />
                                        <span class="custom-option-header">
                                            <img src="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-content/plugins/latepoint/public/images/service-image.png" class="w-px-30 border-50" />
                                            <span class="h6 mb-0">{{$extra->name}}</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            @endforeach                                                    
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 mb-4">
                <div class="card">
                    <h5 class="card-header">Restrictions for Service Extras</h5>
                    <div class="card-body">
                        <div class="row">
                            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[setting][extra_min]" <?php echo($servicevalues['setting']['extra_min']=='true'?'checked':'') ?> />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <div class="d-grid mx-5">
                                                    <strong><h5 class="switch-label">Require a minimum to be selected</h5></strong>
                                                    <span>Requires user to pick a minimum number of service extras</span>
                                                </div>
                                            </label>
                                        </button>
                                    </h2>
    
                                    <div id="accordionIcon-1" class="accordion-collapse collapse <?php echo($servicevalues['setting']['extra_min']=='true'?'show':'') ?>" data-bs-parent="#accordionIcon">
                                        <div class="accordion-body" style="" >
                                            <div class="card-body">
                                                <div class="d-flex col-lg-6 d-flex mb-3 px-1">
                                                    <span class="form-label">At least</span>
                                                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Value" aria-describedby="defaultFormControlHelp" />
                                                    <span class="form-label">service extras have to be selected</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="service[setting][extra_max]" <?php echo($servicevalues['setting']['extra_max']=='true'?'checked':'') ?>/>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <div class="d-grid mx-5">
                                                    <strong><h5 class="switch-label">Limit maximum number that can be selected</h5></strong>
                                                    <span>Limits user from picking more than a set maximum</span>
                                                </div>
                                            </label>
                                        </button>
                                    </h2>
    
                                    <div id="accordionIcon-2" class="accordion-collapse collapse <?php echo($servicevalues['setting']['extra_max']=='true'?'show':'') ?>" data-bs-parent="#accordionIcon" >
                                        <div class="accordion-body">
                                            <div class="card-body">
                                                <div class="d-flex col-lg-6 d-flex mb-3 px-1">
                                                    <span class="form-label">At most</span>
                                                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Value" aria-describedby="defaultFormControlHelp" />
                                                    <span class="form-label">service extras can be selected</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 mb-4">
                <div class="card">
                    <h5 class="card-header">Zoom Settings</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option-basic">
                                    <div class="d-flex justify-content-between mb-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="service[setting][zoom]" <?php echo($servicevalues['setting']['zoom']=='true'?'checked':'') ?>/>
                                            <span class="switch-toggle-slider" >
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                            <div class="d-grid mx-5">
                                                <h6 class="switch-label">Create Zoom meeting for bookings</h6>
                                                <span>Zoom meeting for bookings of this service will be created automatically</span>        
                                            </div>
                                            <input type="text" value={{$service->id}} name="id" hidden>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary add-location" type="submit">Save Changes</button>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <button class="btn btn-danger add-location" id="deleteServiceButton" data-service-id="{{$service->id}}">Delete Service</button>
            </div>
            
        </div>
    </form>
    
</div>

<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script type="text/javascript">
    const servicedata = {
        'offer': {},
        'schedule' : {
            'mon' : {},
            'tus' : {},
            'wed' : {},
            'thu' : {},
            'fri' : {},
            'sat' : {},
            'sun' : {},
        },
        'booking' : {},
        'extra' : {},
        'setting' : {}
    }; 
    var agents = @json($agents);
    var extras = @json($extras);


    $(document).ready(function() {
        // $('.custom-schedule-wrapper').hide();

        $('#deleteServiceButton').click(function() {
        var serviceId = $(this).data('service-id');
        
        if(confirm('Are you sure you want to delete this service?')) {
            $.ajax({
                url: '/admin/resource/deleteservice/' + serviceId,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                },
                success: function(response) {
                    window.location.href = "{{ route('admin.resource-services') }}";
                    
                },
                error: function(xhr, status, error) {
                    // alert('An error occurred while deleting the service.');
                    console.log(xhr.responseText);
                }
            });
        }
    });
        

        $('.customCheckTemp1').click(function() {
            var set_custom_schedule_status = $('#customCheckTemp1')[0].checked;
            if (set_custom_schedule_status == true) {
                $('.first_section').hide();
                $('.custom-schedule-wrapper').show();
            }else{
                $('.first_section').show();
                $('.custom-schedule-wrapper').hide();
            }
        });

    
    });

    $('form.add-service').on('submit', function(e) {
        e.preventDefault();
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        const name = $('input[name="name"]').val();
        const id = $('input[name="id"]').val();
        const price_min = $('input[name="price_min"]').val();
        const price_max = $('input[name="price_max"]').val();
        const charge_amount = $('input[name="charge_amount"]').val();
        const deposit_amount = $('input[name="deposit_amount"]').val();

        const duration_name = $('input[name="duration_name"]').val();
        const duration = $('input[name="duration"]').val();
        const buffer_before = $('input[name="buffer_before"]').val();
        const buffer_after = $('input[name="buffer_after"]').val();
        const category_id = $('select[name="category_id"]').val();
        // const order_number = $('input[name="order_number"]').val();
        const selection_image_id = $('.selection_image>.dz-preview>.dz-details>.dz-thumbnail>img').attr('src');
        const description_image_id = $('.description_image>.dz-preview>.dz-details>.dz-thumbnail>img').attr('src');
        const bg_color = $('input[name="bg_color"]').val();
        const timeblock_interval = $('input[name="timeblock_interval"]').val();
        const capacity_min = $('input[name="capacity_min"]').val();
        const capacity_max = $('input[name="capacity_max"]').val();
        const status = $('select[name="status_edit"]').val();
        const visibility = $('select[name="visibility"]').val();
        const override_default_booking_status = $('select[name="override_default_booking_status"]').val();
        servicedata['short_description'] =  $('input[name="short_description"]').val();
        agents.forEach(element => {
            servicedata['offer'][element.id] = $(`input[name="service[offer][${element.id}]"]`).prop('checked');
        });
        servicedata['schedule']['status'] = $('input[name="service[schedule][status]"]').prop('checked');

        servicedata['schedule']['mon']['status'] = $('input[name="service[schedule][mon][status]"]').prop('checked');
        servicedata['schedule']['mon']['start'] = $('input[name="service[schedule][mon][start]"]').prop('checked');
        servicedata['schedule']['mon']['finish'] = $('input[name="service[schedule][mon][finish]"]').prop('checked');
        servicedata['schedule']['tus']['status'] = $('input[name="service[schedule][tus][status]"]').prop('checked');
        servicedata['schedule']['tus']['start'] = $('input[name="service[schedule][tus][start]"]').prop('checked');
        servicedata['schedule']['tus']['finish'] = $('input[name="service[schedule][tus][finish]"]').prop('checked');
        servicedata['schedule']['wed']['status'] = $('input[name="service[schedule][wed][status]"]').prop('checked');
        servicedata['schedule']['wed']['start'] = $('input[name="service[schedule][wed][start]"]').prop('checked');
        servicedata['schedule']['wed']['finish'] = $('input[name="service[schedule][wed][finish]"]').prop('checked');
        servicedata['schedule']['thu']['status'] = $('input[name="service[schedule][thu][status]"]').prop('checked');
        servicedata['schedule']['thu']['start'] = $('input[name="service[schedule][thu][start]"]').prop('checked');
        servicedata['schedule']['thu']['finish'] = $('input[name="service[schedule][thu][finish]"]').prop('checked');
        servicedata['schedule']['fri']['status'] = $('input[name="service[schedule][fri][status]"]').prop('checked');
        servicedata['schedule']['fri']['start'] = $('input[name="service[schedule][fri][start]"]').prop('checked');
        servicedata['schedule']['fri']['finish'] = $('input[name="service[schedule][fri][finish]"]').prop('checked');
        servicedata['schedule']['sat']['status'] = $('input[name="service[schedule][sat][status]"]').prop('checked');
        servicedata['schedule']['sat']['start'] = $('input[name="service[schedule][sat][start]"]').prop('checked');
        servicedata['schedule']['sat']['finish'] = $('input[name="service[schedule][sat][finish]"]').prop('checked');
        servicedata['schedule']['sun']['status'] = $('input[name="service[schedule][sun][status]"]').prop('checked');
        servicedata['schedule']['sun']['start'] = $('input[name="service[schedule][sun][start]"]').prop('checked');
        servicedata['schedule']['sun']['finish'] = $('input[name="service[schedule][sun][finish]"]').prop('checked');
        servicedata['booking']['price_charge'] = $('input[name="service[booking][price_charge]"]').prop('checked');
        servicedata['booking']['price_deposit'] = $('input[name="service[booking][price_deposit]"]').prop('checked');
        servicedata['booking']['other_customer'] = $('input[name="service[booking][other_customer]"]').prop('checked');
        servicedata['booking']['other_timeslot'] = $('input[name="service[booking][other_timeslot]"]').prop('checked');
        extras.forEach(element => {
            servicedata['extra'][element.id] = $(`input[name="service[extra][${element.id}]"]`).prop('checked');
        });
        servicedata['setting']['extra_min'] = $('input[name="service[setting][extra_min]"]').prop('checked');
        servicedata['setting']['extra_max'] = $('input[name="service[setting][extra_max]"]').prop('checked');
        servicedata['setting']['zoom'] = $('input[name="service[setting][zoom]"]').prop('checked');

        // console.log(servicedata);
       

        $.ajax({
            type: 'POST',
            url: "{{ route('admin.resource-updateservices') }}",
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            data: {
                id: id,
                name: name,
                short_description: JSON.stringify(servicedata) ,
                price_min: price_min ? price_min : null,
                price_max: price_max ? price_max : null,
                charge_amount: charge_amount ? charge_amount : null,
                deposit_amount: deposit_amount ? deposit_amount : null,
                duration_name: duration_name ? duration_name : null,
                duration: duration,
                buffer_before: buffer_before ? buffer_before : null,
                buffer_after: buffer_after ? buffer_after : null,
                category_id: category_id ? category_id : null,
                // order_number: order_number,
                selection_image_id: selection_image_id ? selection_image_id : null,
                description_image_id: description_image_id ? description_image_id : null,
                bg_color: bg_color ? bg_color : null,
                timeblock_interval: timeblock_interval ? timeblock_interval : null,
                capacity_min: capacity_min ? capacity_min : null,
                capacity_max: capacity_max ? capacity_max : null,
                status: status,
                visibility: visibility,
                override_default_booking_status: override_default_booking_status ? override_default_booking_status : null
            },
            success: function() {
                console.log('success');
                window.location.href = "{{ route('admin.resource-services') }}";
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
</script>

@endsection
