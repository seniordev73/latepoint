@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Latepoint')

<!-- Vendor Styles -->
@section('vendor-style')
@vite(['resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss', 'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.scss', 'resources/assets/vendor/libs/jquery-timepicker/jquery-timepicker.scss', 'resources/assets/vendor/libs/pickr/pickr-themes.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js', 'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js', 'resources/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js', 'resources/assets/vendor/libs/pickr/pickr.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/forms-pickers.js'])
@endsection

@section('content')

<link href="{{ asset('/assets/css/settings.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/css/admin.css') }}" rel="stylesheet">

<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/settings/processes') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Processes</h4>
            </a>
            <a href="{{ url('/admin/settings/process_jobs') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Scheduled Jobs</h4>
            </a>
            <a href="{{ url('/admin/settings/activities') }}" class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">Activity Log</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            <input type="hidden" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-range"
                style="display: none" />

            <div class="table-with-pagination-w">
                <div class="os-pagination-w">
                    <div class="pagination-info">Showing activities <span class="os-pagination-from">1</span> to <span
                            class="os-pagination-to">6</span> of <span class="os-pagination-total">6</span></div>
                    <div class="mobile-table-actions-trigger"><i
                            class="latepoint-icon latepoint-icon-more-horizontal"></i></div>
                    <div class="table-actions">
                        <a data-os-success-action="reload" data-os-params="_wpnonce=ff216588e3"
                            data-os-action="activities__clear_all"
                            data-os-prompt="Are you sure you want to clear the activities log?" href="#"
                            class="latepoint-btn latepoint-btn-outline latepoint-btn-danger latepoint-btn-sm"><i
                                class="latepoint-icon latepoint-icon-trash"></i><span>Clear All</span></a>
                        <a href="admin-post.php?action=latepoint_route_call&amp;route_name=activities__export"
                            target="_blank" class="latepoint-btn latepoint-btn-outline latepoint-btn-sm"><i
                                class="latepoint-icon latepoint-icon-download"></i><span>Export</span></a>
                    </div>
                </div>
                <div class="activities-index">
                    <div class="os-scrollable-table-w">
                        <div class="os-table-w os-table-compact">
                            <table class="os-table os-reload-on-booking-update os-scrollable-table"
                                data-route="activities__index">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Action By</th>
                                        <th>Date/Time</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                <select name="filter[code]" placeholder="All Types"
                                                    class="os-table-filter os-form-control" id="filter_code">
                                                    <option value="">All Types</option>
                                                    <option value="customer_created">New Customer Registration</option>
                                                    <option value="customer_updated">Customer Profile Update</option>
                                                    <option value="booking_created">New Appointment</option>
                                                    <option value="booking_change_status">Appointment Status Changed
                                                    </option>
                                                    <option value="booking_updated">Appointment Edited</option>
                                                    <option value="agent_created">New Agent</option>
                                                    <option value="agent_updated">Agent Profile Update</option>
                                                    <option value="coupon_created">New Coupon</option>
                                                    <option value="coupon_updated">Coupon Update</option>
                                                    <option value="service_updated">Service Updated</option>
                                                    <option value="service_created">Service Created</option>
                                                    <option value="location_updated">Location Updated</option>
                                                    <option value="location_created">Location Created</option>
                                                    <option value="sms_sent">SMS Sent</option>
                                                    <option value="email_sent">Email Sent</option>
                                                    <option value="process_job_run">Process Job Run</option>
                                                    <option value="booking_intent_converted">Booking Intent Converted
                                                    </option>
                                                    <option value="booking_intent_created">Booking Intent Created
                                                    </option>
                                                    <option value="booking_intent_updated">Booking Intent Updated
                                                    </option>
                                                    <option value="error">Error</option>
                                                    <option value="http_request">Webhook Run</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th>
                                            <div
                                                class="os-form-group os-form-textfield-group os-form-group-transparent no-label">
                                                <input type="text" placeholder="User ID" name="filter[initiated_by_id]"
                                                    value="" class="os-table-filter os-form-control"
                                                    id="filter_initiated_by_id">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="os-form-group">

                                                <input type="text" id="bs-rangepicker-basic"
                                                    placeholder="Filter By Date" class="form-control"
                                                    style="height: 26px" />

                                            </div>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr class="activity-type-customer_created">
                                            <td class="activity-column-name">
                                                <div>{{$activity->code}}</div>
                                            </td>
                                            <td><a class="user-link-with-avatar" target="_blank" href="profile.php"><span
                                                        class="ula-avatar"
                                                        style="background-image: url(https://secure.gravatar.com/avatar/ea50452414da73d7519f0cf07b2831fe?s=200&amp;d=mm&amp;r=g)"></span><span
                                                        class="ula-name">{{$activity->initiated_by}}</span><span
                                                        class="latepoint-icon latepoint-icon-external-link"></span></a>
                                            </td>
                                            <td>{{$activity->created_at}}</td>
                                            <td><a class="view-activity-link" href="customers__edit_form&amp;id=24">View</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Type</th>
                                        <th>Action By</th>
                                        <th>Date/Time</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="os-pagination-w">
                        <div class="pagination-info">Showing activities <span class="os-pagination-from">1</span> to
                            <span class="os-pagination-to">1</span> of <span class="os-pagination-total">10</span>
                        </div>
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
</div>

@endsection