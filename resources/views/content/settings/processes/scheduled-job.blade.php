@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Latepoint')

@section('content')

<link href="{{ asset('/assets/css/settings.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/css/admin.css') }}" rel="stylesheet">

<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/settings/processes') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Processes</h4>
            </a>
            <a href="{{ url('/admin/settings/process_jobs') }}"
                class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">Scheduled Jobs</h4>
            </a>
            <a href="{{ url('/admin/settings/activities') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Activity Log</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="table-with-pagination-w">
                <div class="os-jobs-list">
                    <div class="os-scrollable-table-w">
                        <div class="os-table-w os-table-compact">
                            <table class="os-table os-reload-on-booking-update os-scrollable-table os-table-align-top"
                                data-route="process_jobs__index">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Process</th>
                                        <th>Object ID</th>
                                        <th>Actions</th>
                                        <th>Status</th>
                                        <th>Run Time (UTC)</th>
                                        <th>Run Info</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                <select name="filter[event_type]" placeholder="All Types"
                                                    class="os-table-filter os-form-control" id="filter_event_type">
                                                    <option value="">All Types</option>
                                                    <option value="booking_created">Booking Created</option>
                                                    <option value="booking_updated">Booking Updated</option>
                                                    <option value="booking_start">Booking Started</option>
                                                    <option value="booking_end">Booking Ended</option>
                                                    <option value="customer_created">Customer Created</option>
                                                    <option value="transaction_created">Transaction Created</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                <select name="filter[process_id]" placeholder="All Processes"
                                                    class="os-table-filter os-form-control" id="filter_process_id">
                                                    <option value="">All Processes</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div
                                                class="os-form-group os-form-textfield-group os-form-group-transparent no-label">
                                                <input type="text" placeholder="Object ID" name="filter[object_id]"
                                                    value="" class="os-table-filter os-form-control"
                                                    style="width: 80px;" id="filter_object_id">
                                            </div>
                                        </th>
                                        <th></th>
                                        <th>
                                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                <select name="filter[status]" placeholder="All Statuses"
                                                    class="os-table-filter os-form-control" id="filter_status">
                                                    <option value="">All Statuses</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="scheduled">Scheduled</option>
                                                    <option value="cancelled">Cancelled</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="os-form-group">
                                                <div class="os-date-range-picker os-table-filter-datepicker"
                                                    data-can-be-cleared="yes" data-no-value-label="Filter By Date"
                                                    data-clear-btn-label="Reset Date Filtering">
                                                    <span class="range-picker-value">Filter By Date</span>
                                                    <i class="latepoint-icon latepoint-icon-chevron-down"></i>
                                                    <input type="hidden" class="os-table-filter os-datepicker-date-from"
                                                        name="filter[to_run_after_utc_from]" value="">
                                                    <input type="hidden" class="os-table-filter os-datepicker-date-to"
                                                        name="filter[to_run_after_utc_to]" value="">
                                                </div>
                                            </div>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($processes as $process)
                                        <tr>
                                            <td><strong>{{$process->event_type}}</strong></td>
                                            <td>
                                                <a href="processes__index" target="_blank">New Booking Notification
                                                    [Deleted]</a>
                                            </td>
                                            <td><a href="#">14</a></td>
                                            <td>
                                                <span data-os-action="process_jobs__preview_job_action"
                                                    data-os-output-target="lightbox"
                                                    data-os-after-call="latepoint_init_json_view"
                                                    data-os-params="job_id=3&amp;action_id=pa_dwoDq8"
                                                    data-os-lightbox-classes="width-800" class="action-run-info-pill">
                                                    <i class="latepoint-icon latepoint-icon-mail"></i>
                                                    <span>Send Email</span>
                                                    <i style="color: #ad0606;"
                                                        class="latepoint-icon latepoint-icon-x-square"></i>
                                                </span>
                                                <span data-os-action="process_jobs__preview_job_action"
                                                    data-os-output-target="lightbox"
                                                    data-os-after-call="latepoint_init_json_view"
                                                    data-os-params="job_id=3&amp;action_id=pa_yd7auC"
                                                    data-os-lightbox-classes="width-800" class="action-run-info-pill">
                                                    <i class="latepoint-icon latepoint-icon-mail"></i>
                                                    <span>Send Email</span>
                                                    <i style="color: #ad0606;"
                                                        class="latepoint-icon latepoint-icon-x-square"></i>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="os-column-status os-column-status-error">Error</span>
                                            </td>
                                            <td> 2024-05-11 11:45:05</td>
                                            <td>
                                                <span class="in-table-time-left">
                                                    <span class="time-left left-days time-past">9 days ago</span>
                                                </span>
                                                <a href="#" data-os-params="id=3"
                                                    data-os-action="process_jobs__view_job_run_result"
                                                    data-os-lightbox-classes="width-800"
                                                    data-os-after-call="latepoint_init_json_view"
                                                    data-os-output-target="lightbox"><i
                                                        class="latepoint-icon latepoint-icon-file-text"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="latepoint-link" data-os-after-call="reload_process_jobs_table"
                                                    href="#" data-os-prompt="Are you sure you want to run this job?"
                                                    data-os-action="process_jobs__run_job"
                                                    data-os-params="job_id=3&amp;_wpnonce=91bf1c44ef">
                                                    <i class="latepoint-icon latepoint-icon-refresh-cw"></i>
                                                    <span>Run Again</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach                      
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Event</th>
                                        <th>Process</th>
                                        <th>Object ID</th>
                                        <th>Actions</th>
                                        <th>Status</th>
                                        <th>Run Time (UTC)</th>
                                        <th>Run Info</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="os-pagination-w">
                    <div class="pagination-info">Showing jobs <span class="os-pagination-from">1</span> to <span
                            class="os-pagination-to">3</span> of <span class="os-pagination-total">3</span></div>
                    <div class="pagination-page-select-w">
                        <label for="">Page:</label>
                        <select name="page" class="pagination-page-select">
                            <option selected="">1</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection