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

<link href="{{asset('/assets/css/editlocation_custom.css')}}" rel="stylesheet">

<div class="row">
    <form action="{{route('admin.resource-updatelocations')}}" method="post" class="update-location">
        @csrf
        <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
            <div class="card-header mb-0">
                <h4 class="m-0 me-2">Edit Location</h4>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Basic Information</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="d-flex mb-3">
                            
                            <div class="col-lg-5 px-3">
                                <input type="text" class="form-control" name="name" value="{{$location->name}}" id="defaultFormControlInput" placeholder="Location Name" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="col-lg-7 px-3">
                                <input type="text" class="form-control" name="full_address" value="{{$location->full_address}}" id="defaultFormControlInput" placeholder="Location Address" aria-describedby="defaultFormControlHelp" />
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="col-lg-5 px-3">
                                <label for="selectpickerBasic" class="form-label">Status</label>
                                <select id="selectpickerBasic" name="status" value="{{$location->status}}" class="selectpicker w-100" data-style="btn-default">
                                    <option value="active">Active</option>
                                    <option value="disabled">Disabled</option>
                                </select>
                            </div>
                        </div>    
                        <div class="d-flex mb-3">
                            <div class="col-lg-5 px-3">
                                <label for="selectpickerBasic" class="form-label">Category</label>
                                <div class="d-flex">
                                    <select id="selectpickerBasic" name="category_id" value="{{$location->category_id}}" class="selectpicker w-100" data-style="btn-default">
                                        <option value="">Not Categorized</option>
                                    </select>
                                    <button class="btn btn-primary" type="button" style="width:200px;"><i class="fa fa-plus"></i>Add Category</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 px-3">
                            <div class="col-lg-5">
                                <div action="/upload" class="dropzone needsclick" id="dropzone-basic">
                                    <div class="dz-message needsclick">
                                        Location Photo
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-12 mb-4">
                <div class="card">
                    <h5 class="card-header">Select Agents for This Location</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-basic">
                                    <label class="form-check-label custom-option-content" for="customCheckTemp37">
                                        <input class="form-check-input" type="checkbox" value="" id="customCheckTemp37" />
                                        <span class="custom-option-header">
                                            <span class="h6 mb-0">John Mayers</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp47">
                                    <input class="form-check-input" type="checkbox" value="" id="customCheckTemp47" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Invisilign Braces</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp38">
                                    <input class="form-check-input" type="checkbox" value="" id="customCheckTemp38" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Group Booking</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp48">
                                    <input class="form-check-input" type="checkbox" value="" id="customCheckTemp48" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Porcelain Crown</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp39">
                                    <input class="form-check-input" type="checkbox" value="" id="customCheckTemp39" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Root Canal Therapy</span>
                                    </span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="customCheckTemp49">
                                    <input class="form-check-input" type="checkbox" value="" id="customCheckTemp49" />
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
                        <h5 class="card-header">Location Schedule</h5>
                        <div class="py-4 px-5">
                            <label class="form-check-label custom-option-content customCheckTemp1" for="customCheckTemp1">
                                <input class="form-check-input" type="checkbox" value="" id="customCheckTemp1" />
                                <span class="custom-option-header">
                                    <span class="h6 mb-0">Set Custom Schedule</span>
                                </span>
                            </label>
                        </div>
                    </div>
                        
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="mb-3 col-lg-12 px-3 first_section">
                            <div class="latepoint-message latepoint-message-subtle">
                                This location is using general schedule which is set in main settings
                            </div>
                        </div>
                        <div class="second_section">
                            <div class="custom-schedule-wrapper">
                                <div class="weekday-schedule-w">
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" checked />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" checked />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time1" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish1" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" checked />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time2" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish2" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" checked />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time3" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish3" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" checked />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time4" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish4" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" checked />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time5" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish5" />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="ws-head-w">
                                        <div class="d-flex justify-content-between mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" checked />
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
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time6" />
                                            </div>
                                            <div class="finish_time">
                                                <label for="flatpickr-time" class="form-label">Finish Time</label>
                                                <input type="text" class="form-control" placeholder="HH:MM" id="flatpickr-time-finish6" />
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
                <button class="btn btn-primary add-location" type="submit">Save Location</button>
                <meta name="csrf-token" content="{{ csrf_token() }}">
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script type="text/javascript">
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

    $('form.update-location').on('submit', function(e){
        e.preventDefault();
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        const name = $('input[name="name"]').val();
        const full_address = $('input[name="full_address"]').val();
        const status = $('select[name="status"]').val();
        const selection_image_id = $('.dz-thumbnail>img').attr('src');
        const category_id = $('select[name="category_id"]').val();
        const id = "{{$location->id}}";
       

        $.ajax({
            type: 'POST',
            url: "{{ route('admin.resource-updatelocations') }}",
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            data: {
                id: id,
                name: name,
                full_address: full_address,
                status: status,
                selection_image_id: selection_image_id,
                category_id: category_id
            },
            success: function() {
                console.log('success');
                window.location.href = "{{ route('admin.resource-locations') }}";
            },
            error: function(err) {
                console.log(err);
            }
        });
    })
</script>

@endsection
