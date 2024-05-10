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

<link href="{{asset('/assets/css/createagent_custom.css')}}" rel="stylesheet">

<style type="text/css">
    
</style>

<div class="row">
    <form action="{{route('admin.resource-storeagent')}}" class="add-agent" method="POST">
        @csrf
        <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
            <div class="card-header mb-0">
                <h4 class="m-0 me-2">Create New Agent</h4>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">General Information</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="col-lg-12 px-3 set-avatar">
                            <div action="/upload" class="dropzone needsclick" id="dropzone-basic">
                                <div class="dz-message needsclick">
                                    Set Avatar
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            
                            <div class="col-lg-4 px-3">
                                <input type="text" class="form-control" id="defaultFormControlInput first_name_agent" placeholder="First Name" aria-describedby="defaultFormControlHelp" name="first_name_agent" required/>
                            </div>
                            <div class="col-lg-4 px-3">
                                <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Last Name" aria-describedby="defaultFormControlHelp" name="last_name_agent"/>
                            </div>
                            <div class="col-lg-4 px-3">
                                <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Display Name" aria-describedby="defaultFormControlHelp" name="display_name"/>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="col-lg-4 px-3">
                                <input type="email" class="form-control" id="defaultFormControlInput" placeholder="Email Address" aria-describedby="defaultFormControlHelp" name="email_agent" required/>
                            </div>
                            <div class="col-lg-4 px-3">
                                <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Phone Number" aria-describedby="defaultFormControlHelp" name="phone"/>
                            </div>
                        </div>    
                        <div class="d-flex mb-3">
                            <div class="col-lg-4 px-3">
                                <label for="selectpickerBasic" class="form-label">Connect to WP User</label>
                                <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default" name="">                                    
                                    <option value="sandbox_agent">Sandbox Agent</option>
                                    <option value="godfather">The Godfather</option>
                                </select>
                            </div>
                            <div class="col-lg-4 px-3">
                                <label for="selectpickerBasic" class="form-label">Status</label>
                                <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default" name="status">
                                    <option value="active">Active</option>
                                    <option value="disabled">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Additional Contact Information</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="d-flex mb-3 col-lg-12 px-3">
                            <div class="latepoint-message latepoint-message-subtle">
                                If you need to notify multiple persons about the appointment, you can list additional email addresses and phone numbers to send notification emails and sms to. You can list multiple numbers and emails separated by commas.
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-lg-6 px-3">
                                <input type="email" class="form-control" id="defaultFormControlInput" placeholder="Additional Email Addresses" aria-describedby="defaultFormControlHelp" name="extra_email"/>
                            </div>
                            <div class="col-lg-6 px-3">
                                <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Additional Phone Numbers" aria-describedby="defaultFormControlHelp" name="extra_phone"/>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Extra Information</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="mb-3 px-3">
                            <div class="col-lg-12 px-3 mb-4 set-bio">
                                <div action="/upload" class="dropzone needsclick" id="dropzone-basic1">
                                    <div class="dz-message needsclick">
                                        Set Bio Image
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Agent Title" aria-describedby="defaultFormControlHelp" name="title"/>
                            </div>
                            <div class="col-lg-12">
                                <textarea class="form-control" aria-label="With textarea" placeholder="Bio Text" rows="10" name="bio"></textarea>
                            </div>
                        </div>
    
                        <h6 class="card-header-1">Agent Highlights</h6>
                        <div class="d-flex mb-3 col-lg-12 px-3">
                            <div class="latepoint-message latepoint-message-subtle">
                                These value-label pairs will appear on agent information popup. You can enter things like years of experience, or number of clients served, to highlight agent accomplishments.
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-lg-4 px-3">
                                <h6 class="highlight">Highlight #1</h6>
                                <div class="d-flex">
                                    <input type="text" class="form-control w-50 mx-2" id="defaultFormControlInput" placeholder="Value" aria-describedby="defaultFormControlHelp" />
                                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Label" aria-describedby="defaultFormControlHelp" />
                                </div>
                            </div>
                            <div class="col-lg-4 px-3">
                                <h6 class="highlight">Highlight #2</h6>
                                <div class="d-flex">
                                    <input type="text" class="form-control w-50 mx-2" id="defaultFormControlInput" placeholder="Value" aria-describedby="defaultFormControlHelp" />
                                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Label" aria-describedby="defaultFormControlHelp" />
                                </div>
                            </div>
                            <div class="col-lg-4 px-3">
                                <h6 class="highlight">Highlight #3</h6>
                                <div class="d-flex">
                                    <input type="text" class="form-control w-50 mx-2" id="defaultFormControlInput" placeholder="Value" aria-describedby="defaultFormControlHelp" />
                                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Label" aria-describedby="defaultFormControlHelp" />
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 mb-4">
                <div class="card">
                    <h5 class="card-header">Offered Services</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-basic">
                                    <label class="form-check-label custom-option-content" for="customCheckTemp37">
                                        <input class="form-check-input" type="checkbox" name="agent[offer][tooth_whitening]" id="customCheckTemp37" />
                                        <span class="custom-option-header">
                                            <span class="h6 mb-0">Tooth Whitening</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp47">
                                    <input class="form-check-input" type="checkbox" name="agent[offer][invisilign_braces]" id="customCheckTemp47" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Invisilign Braces</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp38">
                                    <input class="form-check-input" type="checkbox" name="agent[offer][group_booking]" id="customCheckTemp38" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Group Booking</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp48">
                                    <input class="form-check-input" type="checkbox" name="agent[offer][porcelain_crown]" id="customCheckTemp48" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Porcelain Crown</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp39">
                                    <input class="form-check-input" type="checkbox" name="agent[offer][root_canal]" id="customCheckTemp39" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Root Canal Therapy</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp49">
                                    <input class="form-check-input" type="checkbox" name="agent[offer][gum_decease]" id="customCheckTemp49" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Gum Decease</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between card-header-11">
                        <h5 class="card-header">Agent Schedule</h5>
                        <div class="py-4 px-5">
                            <label class="form-check-label custom-option-content customCheckTemp1" for="customCheckTemp1">
                                <input class="form-check-input" type="checkbox" name="agent[schedule][status]" id="customCheckTemp1" />
                                <span class="custom-option-header">
                                    <span class="h6 mb-0">Set Custom Schedule</span>
                                </span>
                            </label>
                        </div>
                        
                    </div>
                        
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="mb-3 col-lg-12 px-3 first_section">
                            <div class="latepoint-message latepoint-message-subtle">
                                This agent is using general schedule which is set in main settings
                            </div>
                        </div>
                        <div class="second_section">
                            <div class="custom-schedule-wrapper">
                                <div class="weekday-schedule-w">
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="agent[schedule][mon][status]" />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time" name="agent[schedule][mon][start]" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish" name="agent[schedule][mon][finish]"/>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="agent[schedule][tus][status]" />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time1" name="agent[schedule][tus][start]" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish1" name="agent[schedule][tus][finish]"/>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="agent[schedule][wed][status]" />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time2" name="agent[schedule][wed][start]"/>
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish2" name="agent[schedule][wed][finish]" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="agent[schedule][thu][status]" />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time3" name="agent[schedule][thu][start]"/>
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish3" name="agent[schedule][thu][finish]"/>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="agent[schedule][fri][status]" />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time4" name="agent[schedule][fri][start]"/>
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish4" name="agent[schedule][fri][finish]" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="agent[schedule][sat][status]" />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time5" name="agent[schedule][sat][start]" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish5" name="agent[schedule][sat][finish]" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="agent[schedule][sun][status]" />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time6" name="agent[schedule][sun][start]" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish6" name="agent[schedule][sun][finish]" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
    
            <div>
                <button class="btn btn-primary add-agent" type="su">Add Agent</button>
                <meta name="csrf-token" content="{{ csrf_token() }}">
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script type="text/javascript">
    const agentdata = {
            'offer': {},
            'schedule' : {
                'mon' : {},
                'tus' : {},
                'wed' : {},
                'thu' : {},
                'fri' : {},
                'sat' : {},
                'sun' : {},
            }            
        }; 
    $(document).ready(function() {
        $('.custom-schedule-wrapper').hide();

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

    $('form.add-agent').on('submit', function(e) {
        e.preventDefault();
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        const avatar_image = $('.set-avatar>.dropzone>.dz-preview>.dz-details>.dz-thumbnail>img').attr('src');
        const bio_image = $('.set-bio>.dropzone>.dz-preview>.dz-details>.dz-thumbnail>img').attr('src');
        const first_name = $('input[name="first_name_agent"]').val();

        const last_name = $('input[name="last_name_agent"]').val();
        const display_name = $('input[name="display_name"]').val();
        const title = $('input[name="title"]').val();
        const bio = $('textarea[name="bio"]').val();
        // const features = $('textarea[name="features"]').val();
        const email = $('input[name="email_agent"]').val();
        const phone = $('input[name="phone"]').val();
        // const custom_hours = $('input[name="custom_hours"]').val();
        const status = $('select[name="status"]').val();
        const extra_email = $('input[name="extra_email"]').val();
        const extra_phone = $('input[name="extra_phones"]').val();
        agentdata['offer']['tooth_whitening'] = $('input[name="agent[offer][tooth_whitening]"]').prop('checked');
        agentdata['offer']['invisilign_braces'] = $('input[name="agent[offer][invisilign_braces]"]').prop('checked');
        agentdata['offer']['group_booking'] = $('input[name="agent[offer][group_booking]"]').prop('checked');
        agentdata['offer']['porcelain_crown'] = $('input[name="agent[offer][porcelain_crown]"]').prop('checked');
        agentdata['offer']['root_canal'] = $('input[name="agent[offer][root_canal]"]').prop('checked');
        agentdata['offer']['gum_decease'] = $('input[name="agent[offer][gum_decease]"]').prop('checked');
        agentdata['schedule']['status'] = $('input[name="agent[schedule][status]"]').prop('checked');
        agentdata['schedule']['mon']['status'] = $('input[name="agent[schedule][mon][status]"]').prop('checked');
        agentdata['schedule']['mon']['start'] = $('input[name="agent[schedule][mon][start]"]').prop('checked');
        agentdata['schedule']['mon']['finish'] = $('input[name="agent[schedule][mon][finish]"]').prop('checked');
        agentdata['schedule']['tus']['status'] = $('input[name="agent[schedule][tus][status]"]').prop('checked');
        agentdata['schedule']['tus']['start'] = $('input[name="agent[schedule][tus][start]"]').prop('checked');
        agentdata['schedule']['tus']['finish'] = $('input[name="agent[schedule][tus][finish]"]').prop('checked');
        agentdata['schedule']['wed']['status'] = $('input[name="agent[schedule][wed][status]"]').prop('checked');
        agentdata['schedule']['wed']['start'] = $('input[name="agent[schedule][wed][start]"]').prop('checked');
        agentdata['schedule']['wed']['finish'] = $('input[name="agent[schedule][wed][finish]"]').prop('checked');
        agentdata['schedule']['thu']['status'] = $('input[name="agent[schedule][thu][status]"]').prop('checked');
        agentdata['schedule']['thu']['start'] = $('input[name="agent[schedule][thu][start]"]').prop('checked');
        agentdata['schedule']['thu']['finish'] = $('input[name="agent[schedule][thu][finish]"]').prop('checked');
        agentdata['schedule']['fri']['status'] = $('input[name="agent[schedule][fri][status]"]').prop('checked');
        agentdata['schedule']['fri']['start'] = $('input[name="agent[schedule][fri][start]"]').prop('checked');
        agentdata['schedule']['fri']['finish'] = $('input[name="agent[schedule][fri][finish]"]').prop('checked');
        agentdata['schedule']['sat']['status'] = $('input[name="agent[schedule][sat][status]"]').prop('checked');
        agentdata['schedule']['sat']['start'] = $('input[name="agent[schedule][sat][start]"]').prop('checked');
        agentdata['schedule']['sat']['finish'] = $('input[name="agent[schedule][sat][finish]"]').prop('checked');
        agentdata['schedule']['sun']['status'] = $('input[name="agent[schedule][sun][status]"]').prop('checked');
        agentdata['schedule']['sun']['start'] = $('input[name="agent[schedule][sun][start]"]').prop('checked');
        agentdata['schedule']['sun']['finish'] = $('input[name="agent[schedule][sun][finish]"]').prop('checked');

        console.log(agentdata);

        $.ajax({
            type: 'POST',
            url: "/admin/resource/storeagent",
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            data: {
                avatar_image: avatar_image? avatar_image: null,
                bio_image: bio_image? bio_image: null,
                first_name: first_name,
                last_name: last_name? last_name: null,
                display_name: display_name? display_name: null,
                title: title? title: null,
                bio: bio? bio: null,
                email: email,
                phone: phone? phone: null,
                status: status,
                extra_email: extra_email? extra_email: null,
                extra_phone: extra_phone? extra_phone: null,
                features: JSON.stringify(agentdata)
            },
            success: function() {
                console.log('success');
                window.location.href = "{{ route('admin.resource-agents') }}";
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
</script>

@endsection
