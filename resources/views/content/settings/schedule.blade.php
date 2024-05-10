@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Latepoint')

@section('page-style')
@vite(['resources/assets/vendor/scss/pages/card-analytics.scss'])
@endsection

@section('vendor-style')
@vite(['resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/dropzone/dropzone.scss'])
@endsection

@section('vendor-script')
@vite(['resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/dropzone/dropzone.js'])
@endsection

@section('page-script')
@vite(['resources/assets/js/ui-cards-analytics.js', 'resources/assets/js/forms-selects.js', 'resources/assets/js/forms-file-upload.js'])
@endsection

@section('content')
<link href="{{ asset('/assets/css/settings.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/css/admin.css') }}" rel="stylesheet">
@php
    $week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

@endphp
<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/settings/general') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">General</h4>
            </a>
            <a href="{{ url('/admin/settings/schedule') }}" class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">Schedule</h4>
            </a>
            <a href="{{ url('/admin/settings/tax') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Tax</h4>
            </a>
            <a href="{{ url('/admin/settings/steps') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Steps</h4>
            </a>
            <a href="{{ url('/admin/settings/payments') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Payments</h4>
            </a>
            <a href="{{ url('/admin/settings/notifications') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Notifications</h4>
            </a>
            <a href="{{ url('/admin/settings/roles') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Roles</h4>
            </a>
            <a href="{{ url('/admin/settings/system') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">System</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            @if($check == 0)
                <form action="{{route('admin.settings-storeschedule')}}" method="post">
                    @csrf
                    <div class="card mb-4">
                        <h5 class="card-header">General Weekly Schedule</h5>
                        <div class="card-body demo-only-element p-0">
                            <div class="white-box-content">
                                <div class="weekday-schedules-w">
                                    @foreach ($week as $day)
                                        <div class="weekday-schedule-w">
                                            <div class="ws-head-w">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input" onchange="changeCheck(this)"
                                                        name="work_periods[{{$day}}][status]" checked />
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                                <div class="ws-head">
                                                    <div class="ws-day-name">
                                                        {{ $day }}
                                                    </div>
                                                    <div class="ws-day-hours">
                                                        <span>01:05am-05:00pm</span>
                                                    </div>
                                                    <div class="wp-edit-icon">
                                                        <i class="bx bx-edit-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="weekday-schedule-form">
                                                <div class="ws-period">
                                                    <div class="os-time-group os-time-input-w as-period">
                                                        <label
                                                            for="work_periods[{{$day}}][time][time][order][start_time][formatted_value]">Start</label>
                                                        <div class="os-time-input-fields">
                                                            <input type="text" placeholder="HH:MM"
                                                                name="work_periods[{{$day}}][time][order][start_time][formatted_value]"
                                                                value="01:05" class="os-form-control os-mask-time"
                                                                inputmode="text">

                                                            <div class="time-ampm-w">
                                                                <input type="hidden"
                                                                    name="work_periods[{{$day}}][time][order][start_time][ampm]"
                                                                    value="am" class="ampm-value-hidden-holder">
                                                                <div class="time-ampm-select time-am active"
                                                                    data-ampm-value="am">
                                                                    am
                                                                </div>
                                                                <div class="time-ampm-select time-pm " data-ampm-value="pm">
                                                                    pm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="os-time-group os-time-input-w as-period">
                                                        <label
                                                            for="work_periods[{{$day}}][time][order][end_time][formatted_value]">Finish</label>
                                                        <div class="os-time-input-fields">
                                                            <input type="text" placeholder="HH:MM"
                                                                name="work_periods[{{$day}}][time][order][end_time][formatted_value]"
                                                                value="05:00" class="os-form-control os-mask-time"
                                                                inputmode="text">

                                                            <div class="time-ampm-w">
                                                                <input type="hidden"
                                                                    name="work_periods[{{$day}}][time][order][end_time][ampm]"
                                                                    value="pm" class="ampm-value-hidden-holder">
                                                                <div class="time-ampm-select time-am " data-ampm-value="am">
                                                                    am
                                                                </div>
                                                                <div class="time-ampm-select time-pm active"
                                                                    data-ampm-value="pm">
                                                                    pm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="work_periods[{{$day}}][time][order][week_day]"
                                                        value="1" id="work_periods_1_week_day">
                                                    <input type="hidden" name="work_periods[{{$day}}][time][order][is_active]"
                                                        value="1" class="is-active" id="work_periods_1_is_active">
                                                    <input type="hidden" name="work_periods[{{$day}}][time][order][agent_id]"
                                                        value="0" id="work_periods_1_agent_id">
                                                    <input type="hidden" name="work_periods[{{$day}}][time][order][location_id]"
                                                        value="0" id="work_periods_1_location_id">
                                                    <input type="hidden" name="work_periods[{{$day}}][time][order][service_id]"
                                                        value="0" id="work_periods_1_service_id">
                                                </div>
                                                <div class="ws-period-add" data-="" data-os-params="week_day=1"
                                                    data-os-before-after="before"
                                                    data-os-after-call="latepoint_init_work_period_form"
                                                    data-os-action="settings__load_work_period_form">
                                                    <div class="add-period-graphic-w">
                                                        <div class="add-period-plus">
                                                            <i class="bx bxs-plus-square"></i>
                                                        </div>
                                                    </div>
                                                    <div class="add-period-label">Add another work period for Monday
                                                        <input type="hidden" name="currentDay" value="{{$day}}"
                                                            class="currentDay" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="os-form-buttons">
                                    <div class="os-form-group">
                                        <button class="btn btn-primary add-agent" type="submit">
                                            Save Weekly Schedule
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                        <form action="{{route('admin.settings-storeschedule')}}" method="post">
                            @csrf
                            @php
                                $value = unserialize($weekSchedule->value);
                            @endphp
                            <div class="card mb-4">
                                <h5 class="card-header">General Weekly Schedule</h5>
                                <div class="card-body demo-only-element p-0">
                                    <div class="white-box-content">
                                        <div class="weekday-schedules-w">
                                            @foreach ($week as $day)
                                                <div
                                                    class="weekday-schedule-w <?php        echo !empty($value[$day]['status']) && $value[$day]['status'] == 'on' ? '' : 'day-off'; ?>">
                                                    <div class="ws-head-w">
                                                        <label class="switch">
                                                            <input type="checkbox" class="switch-input" onchange="changeCheck(this)"
                                                                name="work_periods[{{$day}}][status]" <?php        echo !empty($value[$day]['status']) && $value[$day]['status'] == 'on' ? 'checked' : ''; ?> />
                                                            <span class="switch-toggle-slider">
                                                                <span class="switch-on"></span>
                                                                <span class="switch-off"></span>
                                                            </span>
                                                        </label>
                                                        <div class="ws-head">
                                                            <div class="ws-day-name">
                                                                {{ $day }}
                                                            </div>
                                                            <div class="ws-day-hours">
                                                                <span>{{$value[$day]['time']['order']['start_time']['formatted_value']}}{{$value[$day]['time']['order']['start_time']['ampm']}}-{{$value[$day]['time']['order']['end_time']['formatted_value']}}{{$value[$day]['time']['order']['end_time']['ampm']}}</span>
                                                            </div>
                                                            <div class="wp-edit-icon">
                                                                <i class="bx bx-edit-alt"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="weekday-schedule-form">
                                                        @foreach ($value[$day]['time'] as $key => $order)
                                                            <div class="ws-period">
                                                                <div class="os-time-group os-time-input-w as-period">
                                                                    <label
                                                                        for="work_periods[{{$day}}][time][{{$key}}][start_time][formatted_value]">Start</label>
                                                                    <div class="os-time-input-fields">
                                                                        <input type="text" placeholder="HH:MM"
                                                                            name="work_periods[{{$day}}][time][{{$key}}][start_time][formatted_value]"
                                                                            value="{{$value[$day]['time'][$key]['start_time']['formatted_value']}}"
                                                                            class="os-form-control os-mask-time" inputmode="text">

                                                                        <div class="time-ampm-w">
                                                                            <input type="hidden"
                                                                                name="work_periods[{{$day}}][time][{{$key}}][start_time][ampm]"
                                                                                value="am" class="ampm-value-hidden-holder">
                                                                            <div class="time-ampm-select time-am <?php            echo !empty($value[$day]['time'][$key]['start_time']['ampm']) && $value[$day]['time'][$key]['start_time']['ampm'] == 'am' ? 'active' : ''; ?>"
                                                                                data-ampm-value="am">am</div>
                                                                            <div class="time-ampm-select time-pm <?php            echo !empty($value[$day]['time'][$key]['start_time']['ampm']) && $value[$day]['time'][$key]['start_time']['ampm'] == 'pm' ? 'active' : ''; ?>"
                                                                                data-ampm-value="pm">pm</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="os-time-group os-time-input-w as-period">
                                                                    <label
                                                                        for="work_periods[{{$day}}][time][{{$key}}][end_time][formatted_value]">Finish</label>
                                                                    <div class="os-time-input-fields">
                                                                        <input type="text" placeholder="HH:MM"
                                                                            name="work_periods[{{$day}}][time][{{$key}}][end_time][formatted_value]"
                                                                            value="{{$value[$day]['time'][$key]['end_time']['formatted_value']}}"
                                                                            class="os-form-control os-mask-time" inputmode="text">

                                                                        <div class="time-ampm-w">
                                                                            <input type="hidden"
                                                                                name="work_periods[{{$day}}][time][{{$key}}][end_time][ampm]"
                                                                                value="pm" class="ampm-value-hidden-holder">
                                                                            <div class="time-ampm-select time-am <?php            echo !empty($value[$day]['time'][$key]['start_time']['ampm']) && $value[$day]['time'][$key]['end_time']['ampm'] == 'am' ? 'active' : ''; ?>"
                                                                                data-ampm-value="am">am</div>
                                                                            <div class="time-ampm-select time-pm <?php            echo !empty($value[$day]['time'][$key]['start_time']['ampm']) && $value[$day]['time'][$key]['end_time']['ampm'] == 'pm' ? 'active' : ''; ?>"
                                                                                data-ampm-value="pm">pm</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="work_periods[{{$day}}][time][{{$key}}][week_day]"
                                                                    value="{{$value[$day]['time'][$key]['week_day']}}"
                                                                    id="work_periods_1_week_day">
                                                                <input type="hidden"
                                                                    name="work_periods[{{$day}}][time][{{$key}}][is_active]"
                                                                    value="{{$value[$day]['time'][$key]['is_active']}}" class="is-active"
                                                                    id="work_periods_1_is_active">
                                                                <input type="hidden" name="work_periods[{{$day}}][time][{{$key}}][agent_id]"
                                                                    value="{{$value[$day]['time'][$key]['agent_id']}}"
                                                                    id="work_periods_1_agent_id">
                                                                <input type="hidden"
                                                                    name="work_periods[{{$day}}][time][{{$key}}][location_id]"
                                                                    value="{{$value[$day]['time'][$key]['location_id']}}"
                                                                    id="work_periods_1_location_id">
                                                                <input type="hidden"
                                                                    name="work_periods[{{$day}}][time][{{$key}}][service_id]"
                                                                    value="{{$value[$day]['time'][$key]['service_id']}}"
                                                                    id="work_periods_1_service_id">
                                                            </div>
                                                        @endforeach                                                
                                                        <div class="ws-period-add" data-="" data-os-params="week_day=1"
                                                            data-os-before-after="before"
                                                            data-os-after-call="latepoint_init_work_period_form"
                                                            data-os-action="settings__load_work_period_form">
                                                            <div class="add-period-graphic-w">
                                                                <div class="add-period-plus">
                                                                    <i class="bx bxs-plus-square"></i>
                                                                </div>
                                                            </div>
                                                            <div class="add-period-label">Add another work period for Monday
                                                                <input type="hidden" name="currentDay" value="{{$day}}"
                                                                    class="currentDay" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="os-form-buttons">
                                            <div class="os-form-group">
                                                <button class="btn btn-primary add-agent" type="submit">
                                                    Save Weekly Schedule
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
            @endif


            <div class="card mb-4">
                <h5 class="card-header">Days With Custom Schedules</h5>
                <div class="card-body demo-only-element p-0">
                    <div class="white-box-content">
                        <div class="custom-day-work-periods">
                            <div class="custom-day-work-period">
                                <a href="javascript:;" title="Edit Day Schedule" class="edit-custom-day"
                                    data-os-after-call="latepoint_init_custom_day_schedule"
                                    data-os-lightbox-classes="width-700 " data-os-output-target="lightbox"
                                    data-os-action="settings__custom_day_schedule_form"
                                    data-os-params="target_date=2024-06-06&amp;agent_id=0&amp;service_id=0&amp;location_id=0">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <a href="javascript:;" data-os-pass-this="yes"
                                    data-os-after-call="latepoint_custom_day_removed"
                                    data-os-action="settings__remove_custom_day_schedule"
                                    data-os-params="agent_id=0&amp;service_id=0&amp;location_id=0&amp;date=2024-06-06"
                                    data-os-prompt="Are you sure you want to remove custom schedule for this day?"
                                    title="Remove Day Schedule" class="remove-custom-day">
                                    <i class="bx bx-trash"></i>
                                </a>
                                <div class="custom-day-work-period-i">
                                    <div class="custom-day-number">06</div>
                                    <div class="custom-day-month">June</div>
                                </div>
                                <div class="custom-day-periods">
                                    <div class="custom-day-period">08:00am - 06:00pm</div>
                                </div>
                            </div>

                            <a class="add-custom-day-w add-custom-day-schedule"
                                data-os-after-call="latepoint_init_custom_day_schedule"
                                data-os-lightbox-classes="width-700  hide-schedule" data-os-output-target="lightbox"
                                data-os-action="settings__custom_day_schedule_form"
                                data-os-params="agent_id=0&amp;service_id=0&amp;location_id=0">
                                <div class="add-custom-day-i">
                                    <div class="add-day-graphic-w">
                                        <div class="add-day-plus">
                                            <i class="bx bx-plus bx-xs"></i>
                                        </div>
                                    </div>
                                    <div class="add-day-label">Add Day</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <h5 class="card-header">Days With Custom Schedules</h5>
                <div class="card-body demo-only-element p-0">
                    <div class="white-box-content">
                        <div class="custom-day-work-periods">
                            <div class="custom-day-work-period custom-day-off">
                                <a href="javascript:;" title="Edit Day Schedule" class="edit-custom-day"
                                    data-os-after-call="latepoint_init_custom_day_schedule"
                                    data-os-lightbox-classes="width-700 " data-os-output-target="lightbox"
                                    data-os-action="settings__custom_day_schedule_form"
                                    data-os-params="target_date=2024-06-05&amp;agent_id=0&amp;service_id=0&amp;location_id=0"><i
                                        class="bx bx-edit-alt"></i></a><a href="javascript:;" data-os-pass-this="yes"
                                    data-os-after-call="latepoint_custom_day_removed"
                                    data-os-action="settings__remove_custom_day_schedule"
                                    data-os-params="agent_id=0&amp;service_id=0&amp;location_id=0&amp;date=2024-06-05"
                                    data-os-prompt="Are you sure you want to remove this day off?"
                                    title="Remove Day Off" class="remove-custom-day"><i class="bx bx-trash"></i></a>
                                <div class="custom-day-work-period-i">
                                    <div class="custom-day-number">05</div>
                                    <div class="custom-day-month">June</div>
                                </div>
                            </div>
                            <a class="add-custom-day-w add-custom-day-off"
                                data-os-after-call="latepoint_init_custom_day_schedule"
                                data-os-lightbox-classes="width-700  hide-schedule" data-os-output-target="lightbox"
                                data-os-action="settings__custom_day_schedule_form"
                                data-os-params="agent_id=0&amp;service_id=0&amp;location_id=0">
                                <div class="add-custom-day-i">
                                    <div class="add-day-graphic-w">
                                        <div class="add-day-plus">
                                            <i class="bx bx-plus bx-xs"></i>
                                        </div>
                                    </div>
                                    <div class="add-day-label">Add Day</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script>
    let order = 1;
    $('.ws-head').click(function () {
        $(this).parents('.weekday-schedule-w').toggleClass('is-editing');
    });

    function changeCheck(obj) {
        $(obj).parents('.weekday-schedule-w').toggleClass('day-off');
    }

    $('body').on('click', '.time-ampm-select', function () {
        $(this).toggleClass('active');
        $(this).siblings('.time-ampm-select').toggleClass('active');
        var ampmValue = $(this).parent().find('input');
        ampmValue.val($(this).text());
    });

    $('body').on('click', '.ws-period-remove', function () {
        $(this).parents('.ws-period').remove();
    });

    $('body').on('click', '.remove-custom-day', function () {
        if (confirm($(this).attr('data-os-prompt'))) {
            $(this).parents('.custom-day-work-period').remove();
        }
    });

    function addCustomSchedule() {
        $('body').removeClass('latepoint-lightbox-active');

        $('.add-custom-day-schedule').before(`
            <div class="custom-day-work-period">
                <a href="javascript:;" title="Edit Day Schedule" class="edit-custom-day" data-os-after-call="latepoint_init_custom_day_schedule" data-os-lightbox-classes="width-700 " data-os-output-target="lightbox" data-os-action="settings__custom_day_schedule_form" data-os-params="target_date=2024-06-06&amp;agent_id=0&amp;service_id=0&amp;location_id=0">
                    <i class="bx bx-edit-alt"></i>
                </a>
                <a href="javascript:;" data-os-pass-this="yes" data-os-after-call="latepoint_custom_day_removed" data-os-action="settings__remove_custom_day_schedule" data-os-params="agent_id=0&amp;service_id=0&amp;location_id=0&amp;date=2024-06-06" data-os-prompt="Are you sure you want to remove custom schedule for this day?" title="Remove Day Schedule" class="remove-custom-day">
                    <i class="bx bx-trash"></i>
                </a>
                <div class="custom-day-work-period-i">
                    <div class="custom-day-number">${$('body .os-day-current.selected .os-day-number').text()}</div>
                    <div class="custom-day-month">June</div>
                </div>
                <div class="custom-day-periods">
                    <div class="custom-day-period">08:00am - 06:00pm</div>
                </div>
            </div>
            `);
        $('.latepoint-lightbox-w').remove();
    }

    function addCustomDayOff() {
        $('body').removeClass('latepoint-lightbox-active');

        $('.add-custom-day-off').before(`
                <div class="custom-day-work-period custom-day-off">
                    <a href="javascript:;" title="Edit Day Schedule" class="edit-custom-day" data-os-after-call="latepoint_init_custom_day_schedule" data-os-lightbox-classes="width-700 " data-os-output-target="lightbox" data-os-action="settings__custom_day_schedule_form" data-os-params="target_date=2024-06-05&amp;agent_id=0&amp;service_id=0&amp;location_id=0"><i class="bx bx-edit-alt"></i></a><a href="javascript:;" data-os-pass-this="yes" data-os-after-call="latepoint_custom_day_removed" data-os-action="settings__remove_custom_day_schedule" data-os-params="agent_id=0&amp;service_id=0&amp;location_id=0&amp;date=2024-06-05" data-os-prompt="Are you sure you want to remove this day off?" title="Remove Day Off" class="remove-custom-day"><i class="bx bx-trash"></i></a>
                    <div class="custom-day-work-period-i">
                        <div class="custom-day-number">${$('body .os-day-current.selected .os-day-number').text()}</div>
                        <div class="custom-day-month">June</div>
                    </div>
                </div>
            `);
        $('.latepoint-lightbox-w').remove();
    }

    $('body').on('click', '.latepoint-lightbox-close', function () {
        $('body').removeClass('latepoint-lightbox-active');
        $('.latepoint-lightbox-w').remove();
    });

    $('.ws-period-add').click(function () {
        order++;
        var dayVal = $(this).find('input').val();

        $(this).before(`
                <div class="ws-period">
                    <div class="os-time-group os-time-input-w as-period">
                        <label for="work_periods[${dayVal}][time][order${order}][start_time][formatted_value]">Start</label>
                        <div class="os-time-input-fields">
                            <input type="text" placeholder="HH:MM" name="work_periods[${dayVal}][time][order${order}][start_time][formatted_value]" value="08:00" class="os-form-control os-mask-time" inputmode="text">
                            <input type="hidden" name="work_periods[${dayVal}][time][order${order}][start_time][ampm]" value="am" class="ampm-value-hidden-holder">
                            <div class="time-ampm-w">
                                <div class="time-ampm-select time-am active" data-ampm-value="am">am</div>
                                <div class="time-ampm-select time-pm " data-ampm-value="pm">pm</div>
                            </div>
                        </div>
                    </div>
                    <div class="os-time-group os-time-input-w as-period">
                        <label for="work_periods[${dayVal}][time][order${order}][end_time][formatted_value]">Finish</label>
                        <div class="os-time-input-fields">
                            <input type="text" placeholder="HH:MM" name="work_periods[${dayVal}][time][order${order}][end_time][formatted_value]" value="06:00" class="os-form-control os-mask-time" inputmode="text">
                            <div class="time-ampm-w">
                                <input type="hidden" name="work_periods[${dayVal}][time][order${order}][end_time][ampm]" value="pm" class="ampm-value-hidden-holder">
                                <div class="time-ampm-select time-am " data-ampm-value="am">am</div>
                                <div class="time-ampm-select time-pm active" data-ampm-value="pm">pm</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="work_periods[${dayVal}][time][order${order}][week_day]" value="1" id="work_periods_${dayVal}_order${order}week_day">
                    <input type="hidden" name="work_periods[${dayVal}][time][order${order}][is_active]" value="1" class="is-active" id="work_periods_${dayVal}_order${order}is_active">
                    <input type="hidden" name="work_periods[${dayVal}][time][order${order}][agent_id]" value="0" id="work_periods_${dayVal}_order${order}agent_id">
                    <input type="hidden" name="work_periods[${dayVal}][time][order${order}][location_id]" value="0" id="work_periods_${dayVal}_order${order}location_id">
                    <input type="hidden" name="work_periods[${dayVal}][time][order${order}][service_id]" value="0" id="work_periods_${dayVal}_order${order}service_id">
                    <button class="ws-period-remove">
                        <i class="latepoint-icon latepoint-icon-x"></i>
                    </button>
                </div>
            `)
    });

    $('.add-custom-day-schedule').click(function () {
        $('body').append(`
            <div class="latepoint-lightbox-w latepoint-w width-700"><div class="latepoint-lightbox-i"><form class="latepoint-lightbox-wrapper-form" action="" data-os-success-action="reload" data-os-action="settings__save_custom_day_schedule">
                <input type="hidden" id="_wpnonce" name="_wpnonce" value="d3b5f65277"><input type="hidden" name="_wp_http_referer" value="/demo_4217c15f9eb342a2/wp-admin/admin-ajax.php">	<div class="latepoint-lightbox-heading">
                    <h2>Custom schedule</h2>
                </div>
                <div class="latepoint-lightbox-content">
                <div class="custom-day-schedule-w">
                    <div class="custom-day-calendar" data-show-schedule="yes" data-period-type="single" data-picking="start">
                            <div class="custom-day-settings-w">
                                <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="period_type" class="period-type-selector os-form-control" id="period_type"><option value="single" selected="">Single Day</option><option value="range">Date Range</option></select></div>					<input type="hidden" name="chain_id" value="" id="chain_id">					<div class="start-day-input-w">
                                    <div class="os-form-group os-form-textfield-group os-form-group-simple no-label has-value"><input type="text" placeholder="Pick a Start" name="start_custom_date" value="" id="start_custom_date" class="os-form-control"></div>					</div>
                                <div class="end-day-input-w">
                                    <div class="os-form-group os-form-textfield-group os-form-group-simple no-label"><input type="text" placeholder="Pick an End" name="end_custom_date" value="" id="end_custom_date" class="os-form-control"></div>					</div>
                            </div>
                        <div class="custom-day-calendar-head">
                                <h3 class="calendar-heading" data-label-single="Pick a Date" data-label-start="Pick a Start Date" data-label-end="Pick an End Date">Pick a Date</h3>
                            <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="custom_day_calendar_month" id="custom_day_calendar_month" class="os-form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6" selected="">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></div>	  			<div class="os-form-group os-form-select-group os-form-group-transparent"><select name="custom_day_calendar_year" id="custom_day_calendar_year" class="os-form-control"><option value="2024" selected="">2024</option><option value="2025">2025</option></select></div>	  		</div>
                        <div class="custom-day-calendar-month" data-route="calendars__load_monthly_calendar_days_only">
                            <div class="os-monthly-calendar-days-w" data-calendar-year="2024" data-calendar-month="6" data-calendar-month-label="June">
                        <div class="os-monthly-calendar-days">		<div class="os-day os-day-current week-day-1 os-month-prev" data-date="2024-05-27">
                        <div class="os-day-box">
                            <div class="os-day-number">27</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2 os-month-prev" data-date="2024-05-28">
                        <div class="os-day-box">
                            <div class="os-day-number">28</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3 os-month-prev" data-date="2024-05-29">
                        <div class="os-day-box">
                            <div class="os-day-number">29</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4 os-month-prev" data-date="2024-05-30">
                        <div class="os-day-box">
                            <div class="os-day-number">30</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5 os-month-prev" data-date="2024-05-31">
                        <div class="os-day-box">
                            <div class="os-day-number">31</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-01">
                        <div class="os-day-box">
                            <div class="os-day-number">1</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7 selected" data-date="2024-06-02">
                        <div class="os-day-box">
                            <div class="os-day-number">2</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-1" data-date="2024-06-03">
                        <div class="os-day-box">
                            <div class="os-day-number">3</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2" data-date="2024-06-04">
                        <div class="os-day-box">
                            <div class="os-day-number">4</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3" data-date="2024-06-05">
                        <div class="os-day-box">
                            <div class="os-day-number">5</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4" data-date="2024-06-06">
                        <div class="os-day-box">
                            <div class="os-day-number">6</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5" data-date="2024-06-07">
                        <div class="os-day-box">
                            <div class="os-day-number">7</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-08">
                        <div class="os-day-box">
                            <div class="os-day-number">8</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7" data-date="2024-06-09">
                        <div class="os-day-box">
                            <div class="os-day-number">9</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-1" data-date="2024-06-10">
                        <div class="os-day-box">
                            <div class="os-day-number">10</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2" data-date="2024-06-11">
                        <div class="os-day-box">
                            <div class="os-day-number">11</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3" data-date="2024-06-12">
                        <div class="os-day-box">
                            <div class="os-day-number">12</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4" data-date="2024-06-13">
                        <div class="os-day-box">
                            <div class="os-day-number">13</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5" data-date="2024-06-14">
                        <div class="os-day-box">
                            <div class="os-day-number">14</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-15">
                        <div class="os-day-box">
                            <div class="os-day-number">15</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7" data-date="2024-06-16">
                        <div class="os-day-box">
                            <div class="os-day-number">16</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-1" data-date="2024-06-17">
                        <div class="os-day-box">
                            <div class="os-day-number">17</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2" data-date="2024-06-18">
                        <div class="os-day-box">
                            <div class="os-day-number">18</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3" data-date="2024-06-19">
                        <div class="os-day-box">
                            <div class="os-day-number">19</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4" data-date="2024-06-20">
                        <div class="os-day-box">
                            <div class="os-day-number">20</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5" data-date="2024-06-21">
                        <div class="os-day-box">
                            <div class="os-day-number">21</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-22">
                        <div class="os-day-box">
                            <div class="os-day-number">22</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7" data-date="2024-06-23">
                        <div class="os-day-box">
                            <div class="os-day-number">23</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-1" data-date="2024-06-24">
                        <div class="os-day-box">
                            <div class="os-day-number">24</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2" data-date="2024-06-25">
                        <div class="os-day-box">
                            <div class="os-day-number">25</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3" data-date="2024-06-26">
                        <div class="os-day-box">
                            <div class="os-day-number">26</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4" data-date="2024-06-27">
                        <div class="os-day-box">
                            <div class="os-day-number">27</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5" data-date="2024-06-28">
                        <div class="os-day-box">
                            <div class="os-day-number">28</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-29">
                        <div class="os-day-box">
                            <div class="os-day-number">29</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7" data-date="2024-06-30">
                        <div class="os-day-box">
                            <div class="os-day-number">30</div>
                        </div>
                        </div></div></div>	  		</div>
                    </div>
                    <div class="custom-day-schedule">
                        <div class="custom-day-schedule-head">
                                <h3>Set Schedule</h3>
                            </div>
                        <div class="weekday-schedule-form active">
                        <div class="ws-period"><div class="os-time-group os-time-input-w as-period"><label for="work_periods[new_1_646262][start_time][formatted_value]">Start</label><div class="os-time-input-fields"><input type="text" placeholder="HH:MM" name="work_periods[new_1_646262][start_time][formatted_value]" value="08:00" class="os-form-control os-mask-time" inputmode="text"><input type="hidden" name="work_periods[new_1_646262][start_time][ampm]" value="am" class="ampm-value-hidden-holder"><div class="time-ampm-w"><div class="time-ampm-select time-am active" data-ampm-value="am">am</div><div class="time-ampm-select time-pm " data-ampm-value="pm">pm</div></div></div></div><div class="os-time-group os-time-input-w as-period"><label for="work_periods[new_1_646262][end_time][formatted_value]">Finish</label><div class="os-time-input-fields"><input type="text" placeholder="HH:MM" name="work_periods[new_1_646262][end_time][formatted_value]" value="06:00" class="os-form-control os-mask-time" inputmode="text"><input type="hidden" name="work_periods[new_1_646262][end_time][ampm]" value="pm" class="ampm-value-hidden-holder"><div class="time-ampm-w"><div class="time-ampm-select time-am " data-ampm-value="am">am</div><div class="time-ampm-select time-pm active" data-ampm-value="pm">pm</div></div></div></div><input type="hidden" name="work_periods[new_1_646262][week_day]" value="1" id="work_periods_new_1_646262_week_day"><input type="hidden" name="work_periods[new_1_646262][is_active]" value="1" class="is-active" id="work_periods_new_1_646262_is_active"><input type="hidden" name="work_periods[new_1_646262][agent_id]" value="0" id="work_periods_new_1_646262_agent_id"><input type="hidden" name="work_periods[new_1_646262][location_id]" value="0" id="work_periods_new_1_646262_location_id"><input type="hidden" name="work_periods[new_1_646262][service_id]" value="0" id="work_periods_new_1_646262_service_id"></div>          <div class="ws-period-add" data-="" data-os-params="custom_date=&amp;service_id=0&amp;agent_id=0&amp;location_id=0" data-os-before-after="before" data-os-after-call="latepoint_init_work_period_form" data-os-action="settings__load_work_period_form">
                        <div class="add-period-graphic-w">
                        <div class="add-period-plus"><i class="latepoint-icon latepoint-icon-plus-square"></i></div>
                        </div>
                        <div class="add-period-label">Add another work period</div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="latepoint-lightbox-footer" style="">
                <button type="button" onclick="addCustomSchedule()" class="latepoint-btn latepoint-btn-block latepoint-btn-lg latepoint-btn-outline latepoint-save-day-schedule-btn">Save Schedule</button>
                </div>
            </form><a href="javascript:;" class="latepoint-lightbox-close"><i class="latepoint-icon latepoint-icon-x"></i></a></div><div class="latepoint-lightbox-shadow"></div></div>
            `)

        $('body').addClass('latepoint-lightbox-active');
    });

    $('.add-custom-day-off').click(function () {
        $('body').append(`
            <div class="latepoint-lightbox-w latepoint-w width-700"><div class="latepoint-lightbox-i"><form class="latepoint-lightbox-wrapper-form" action="" data-os-success-action="reload" data-os-action="settings__save_custom_day_schedule">
                <input type="hidden" id="_wpnonce" name="_wpnonce" value="d3b5f65277"><input type="hidden" name="_wp_http_referer" value="/demo_4217c15f9eb342a2/wp-admin/admin-ajax.php">	<div class="latepoint-lightbox-heading">
                    <h2>Custom schedule</h2>
                </div>
                <div class="latepoint-lightbox-content">
                <div class="custom-day-schedule-w">
                    <div class="custom-day-calendar" data-show-schedule="yes" data-period-type="single" data-picking="start">
                            <div class="custom-day-settings-w">
                                <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="period_type" class="period-type-selector os-form-control" id="period_type"><option value="single" selected="">Single Day</option><option value="range">Date Range</option></select></div>					<input type="hidden" name="chain_id" value="" id="chain_id">					<div class="start-day-input-w">
                                    <div class="os-form-group os-form-textfield-group os-form-group-simple no-label has-value"><input type="text" placeholder="Pick a Start" name="start_custom_date" value="" id="start_custom_date" class="os-form-control"></div>					</div>
                                <div class="end-day-input-w">
                                    <div class="os-form-group os-form-textfield-group os-form-group-simple no-label"><input type="text" placeholder="Pick an End" name="end_custom_date" value="" id="end_custom_date" class="os-form-control"></div>					</div>
                            </div>
                        <div class="custom-day-calendar-head">
                                <h3 class="calendar-heading" data-label-single="Pick a Date" data-label-start="Pick a Start Date" data-label-end="Pick an End Date">Pick a Date</h3>
                            <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="custom_day_calendar_month" id="custom_day_calendar_month" class="os-form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6" selected="">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></div>	  			<div class="os-form-group os-form-select-group os-form-group-transparent"><select name="custom_day_calendar_year" id="custom_day_calendar_year" class="os-form-control"><option value="2024" selected="">2024</option><option value="2025">2025</option></select></div>	  		</div>
                        <div class="custom-day-calendar-month" data-route="calendars__load_monthly_calendar_days_only">
                            <div class="os-monthly-calendar-days-w" data-calendar-year="2024" data-calendar-month="6" data-calendar-month-label="June">
                        <div class="os-monthly-calendar-days">		<div class="os-day os-day-current week-day-1 os-month-prev" data-date="2024-05-27">
                        <div class="os-day-box">
                            <div class="os-day-number">27</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2 os-month-prev" data-date="2024-05-28">
                        <div class="os-day-box">
                            <div class="os-day-number">28</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3 os-month-prev" data-date="2024-05-29">
                        <div class="os-day-box">
                            <div class="os-day-number">29</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4 os-month-prev" data-date="2024-05-30">
                        <div class="os-day-box">
                            <div class="os-day-number">30</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5 os-month-prev" data-date="2024-05-31">
                        <div class="os-day-box">
                            <div class="os-day-number">31</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-01">
                        <div class="os-day-box">
                            <div class="os-day-number">1</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7 selected" data-date="2024-06-02">
                        <div class="os-day-box">
                            <div class="os-day-number">2</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-1" data-date="2024-06-03">
                        <div class="os-day-box">
                            <div class="os-day-number">3</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2" data-date="2024-06-04">
                        <div class="os-day-box">
                            <div class="os-day-number">4</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3" data-date="2024-06-05">
                        <div class="os-day-box">
                            <div class="os-day-number">5</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4" data-date="2024-06-06">
                        <div class="os-day-box">
                            <div class="os-day-number">6</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5" data-date="2024-06-07">
                        <div class="os-day-box">
                            <div class="os-day-number">7</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-08">
                        <div class="os-day-box">
                            <div class="os-day-number">8</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7" data-date="2024-06-09">
                        <div class="os-day-box">
                            <div class="os-day-number">9</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-1" data-date="2024-06-10">
                        <div class="os-day-box">
                            <div class="os-day-number">10</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2" data-date="2024-06-11">
                        <div class="os-day-box">
                            <div class="os-day-number">11</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3" data-date="2024-06-12">
                        <div class="os-day-box">
                            <div class="os-day-number">12</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4" data-date="2024-06-13">
                        <div class="os-day-box">
                            <div class="os-day-number">13</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5" data-date="2024-06-14">
                        <div class="os-day-box">
                            <div class="os-day-number">14</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-15">
                        <div class="os-day-box">
                            <div class="os-day-number">15</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7" data-date="2024-06-16">
                        <div class="os-day-box">
                            <div class="os-day-number">16</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-1" data-date="2024-06-17">
                        <div class="os-day-box">
                            <div class="os-day-number">17</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2" data-date="2024-06-18">
                        <div class="os-day-box">
                            <div class="os-day-number">18</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3" data-date="2024-06-19">
                        <div class="os-day-box">
                            <div class="os-day-number">19</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4" data-date="2024-06-20">
                        <div class="os-day-box">
                            <div class="os-day-number">20</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5" data-date="2024-06-21">
                        <div class="os-day-box">
                            <div class="os-day-number">21</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-22">
                        <div class="os-day-box">
                            <div class="os-day-number">22</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7" data-date="2024-06-23">
                        <div class="os-day-box">
                            <div class="os-day-number">23</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-1" data-date="2024-06-24">
                        <div class="os-day-box">
                            <div class="os-day-number">24</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-2" data-date="2024-06-25">
                        <div class="os-day-box">
                            <div class="os-day-number">25</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-3" data-date="2024-06-26">
                        <div class="os-day-box">
                            <div class="os-day-number">26</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-4" data-date="2024-06-27">
                        <div class="os-day-box">
                            <div class="os-day-number">27</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-5" data-date="2024-06-28">
                        <div class="os-day-box">
                            <div class="os-day-number">28</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-6" data-date="2024-06-29">
                        <div class="os-day-box">
                            <div class="os-day-number">29</div>
                        </div>
                        </div>		<div class="os-day os-day-current week-day-7" data-date="2024-06-30">
                        <div class="os-day-box">
                            <div class="os-day-number">30</div>
                        </div>
                        </div></div></div>	  		</div>
                    </div>
                    <div class="custom-day-schedule">
                        <div class="custom-day-schedule-head">
                                <h3>Set Schedule</h3>
                            </div>
                        <div class="weekday-schedule-form active">
                        <div class="ws-period"><div class="os-time-group os-time-input-w as-period"><label for="work_periods[new_1_646262][start_time][formatted_value]">Start</label><div class="os-time-input-fields"><input type="text" placeholder="HH:MM" name="work_periods[new_1_646262][start_time][formatted_value]" value="08:00" class="os-form-control os-mask-time" inputmode="text"><input type="hidden" name="work_periods[new_1_646262][start_time][ampm]" value="am" class="ampm-value-hidden-holder"><div class="time-ampm-w"><div class="time-ampm-select time-am active" data-ampm-value="am">am</div><div class="time-ampm-select time-pm " data-ampm-value="pm">pm</div></div></div></div><div class="os-time-group os-time-input-w as-period"><label for="work_periods[new_1_646262][end_time][formatted_value]">Finish</label><div class="os-time-input-fields"><input type="text" placeholder="HH:MM" name="work_periods[new_1_646262][end_time][formatted_value]" value="06:00" class="os-form-control os-mask-time" inputmode="text"><input type="hidden" name="work_periods[new_1_646262][end_time][ampm]" value="pm" class="ampm-value-hidden-holder"><div class="time-ampm-w"><div class="time-ampm-select time-am " data-ampm-value="am">am</div><div class="time-ampm-select time-pm active" data-ampm-value="pm">pm</div></div></div></div><input type="hidden" name="work_periods[new_1_646262][week_day]" value="1" id="work_periods_new_1_646262_week_day"><input type="hidden" name="work_periods[new_1_646262][is_active]" value="1" class="is-active" id="work_periods_new_1_646262_is_active"><input type="hidden" name="work_periods[new_1_646262][agent_id]" value="0" id="work_periods_new_1_646262_agent_id"><input type="hidden" name="work_periods[new_1_646262][location_id]" value="0" id="work_periods_new_1_646262_location_id"><input type="hidden" name="work_periods[new_1_646262][service_id]" value="0" id="work_periods_new_1_646262_service_id"></div>          <div class="ws-period-add" data-="" data-os-params="custom_date=&amp;service_id=0&amp;agent_id=0&amp;location_id=0" data-os-before-after="before" data-os-after-call="latepoint_init_work_period_form" data-os-action="settings__load_work_period_form">
                        <div class="add-period-graphic-w">
                        <div class="add-period-plus"><i class="latepoint-icon latepoint-icon-plus-square"></i></div>
                        </div>
                        <div class="add-period-label">Add another work period</div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="latepoint-lightbox-footer" style="">
                <button type="button" onclick="addCustomDayOff()" class="latepoint-btn latepoint-btn-block latepoint-btn-lg latepoint-btn-outline latepoint-save-day-schedule-btn">Save Schedule</button>
                </div>
            </form><a href="javascript:;" class="latepoint-lightbox-close"><i class="latepoint-icon latepoint-icon-x"></i></a></div><div class="latepoint-lightbox-shadow"></div></div>
            `)

        $('body').addClass('latepoint-lightbox-active');
    });

    $('body').on('click', '.os-day.os-day-current', function () {
        $(this).addClass('selected');
        $(this).siblings('.os-day.os-day-current').removeClass('selected');
    });

    $('body').on('click', '.latepoint-lightbox-close', function () {

    });


</script>
@endsection