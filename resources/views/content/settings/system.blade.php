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
            <a href="{{ url('/admin/settings/general') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">General</h4>
            </a>
            <a href="{{ url('/admin/settings/schedule') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Schedule</h4>
            </a>
            <a href="{{ url('/admin/settings/tax') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Tax</h4>
            </a>
            <a href="{{ url('/admin/settings/steps') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Steps</h4>
            </a>
            <a href="{{ url('/admin/settings/payments') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Payments</h4>
            </a>
            <a href="{{ url('/admin/settings/notifications') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Notifications</h4>
            </a>
            <a href="{{ url('/admin/settings/roles') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Roles</h4>
            </a>
            <a href="{{ url('/admin/settings/system') }}" class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">System</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="latepoint-content ">
                <div class="version-and-license-info-w">
                    <div class="version-status-info" data-route="updates__check_version_status">
                        <div class="new-version-message is-latest">
                            <h3>You are using the latest version</h3>
                            <div class="version-check-icon"></div>
                            <div class="current-version-info">
                                <span>Installed Version: <strong>4.9.92</strong></span>
                            </div>
                            <div class="version-buttons-w">
                                <a href="https://latepoint.com/changelog/" target="_blank" class="view-changelog-link">
                                    <i class="latepoint-icon latepoint-icon-external-link"></i>
                                    <span>View Changelog</span>
                                </a>
                                <a href="https://latepoint.com/" target="_blank">
                                    <i class="latepoint-icon latepoint-icon-globe"></i>
                                    <span>Official Website</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="active-license-info">
                        <div class="version-warn-icon"></div>
                        <h3>Activate Your LatePoint License</h3>
                        <div>
                            <span>Register your license to install plugin updates and addons.</span>
                        </div>
                        <div class="license-form-w">
                            <div class="os-form-w">
                                <h3>License Key Registration</h3>
                                <form action="" data-os-action="updates__save_license_information"
                                    data-os-success-action="reload">
                                    <div class="os-form-message-w">
                                        <ul>
                                            <li>Please enter your LatePoint license key to receive free plugin updates
                                                and install addons.</li>
                                        </ul>
                                    </div>
                                    <div class="os-row">
                                        <div class="os-col-lg-6">
                                            <div
                                                class="os-form-group os-form-textfield-group os-form-group-transparent">
                                                <label for="license_full_name">Your Name</label><input type="text"
                                                    placeholder="Your Name" name="license[full_name]" value=""
                                                    id="license_full_name" class="os-form-control">
                                            </div>
                                        </div>
                                        <div class="os-col-lg-6">
                                            <div
                                                class="os-form-group os-form-textfield-group os-form-group-transparent">
                                                <label for="license_email">Your Email Address</label><input type="text"
                                                    placeholder="Your Email Address" name="license[email]" value=""
                                                    id="license_email" class="os-form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="os-row">
                                        <div class="os-col-12">
                                            <div
                                                class="os-form-group os-form-textfield-group os-form-group-transparent">
                                                <label for="license_license_key">License Key</label><input type="text"
                                                    placeholder="License Key" name="license[license_key]" value=""
                                                    id="license_license_key" class="os-form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="license-buttons-w">
                                        <div class="os-form-group"><button type="submit" name="submit"
                                                class="latepoint-btn latepoint-btn-outline latepoint-btn-small"
                                                id="submit">Activate Licence Key</button></div> <a
                                            href="http://wpdocs.latepoint.com/how-to-find-my-license-key-for-latepoint/"
                                            target="_blank">Can't find license key?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="debug-info-wrapper" data-os-output-target="self" data-os-action-onload="debug__status">
                    <div class="latepoint-system-status-w">
                        <div class="os-accordion-wrapper">
                            <div class="os-accordion-title">
                                <i class="latepoint-icon latepoint-icon-file-text"></i>
                                <h3>System Info</h3>
                            </div>
                            <div class="os-accordion-content">
                                <ul>
                                    <li>
                                        LatePoint Plugin Version: <strong>4.9.92</strong>
                                    </li>
                                    <li>
                                        LatePoint Database Version: <strong>1.4.92</strong>
                                        <a href="#" class="reset-db-version-link"
                                            data-os-action="debug__reset_plugin_db_version"
                                            data-os-success-action="reload"><i
                                                class="latepoint-icon latepoint-icon-refresh-cw"></i><span>reset</span></a>
                                    </li>
                                    <li>
                                        PHP Version: <strong>8.0.30</strong>
                                    </li>
                                    <li>
                                        MySQL Version: <strong>8.0.37</strong>
                                    </li>
                                    <li>
                                        WordPress Version: <strong>6.5.3</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="os-accordion-wrapper">
                            <div class="os-accordion-title">
                                <i class="latepoint-icon latepoint-icon-box"></i>
                                <h3>Installed Addons</h3>
                            </div>
                            <div class="os-accordion-content">
                                <div class="installed-addons-wrapper">
                                    <div class="os-installed-addon-box">
                                        <h4>Group Bookings</h4>
                                        <div class="os-iab-version-info">
                                            <span>Core:</span><strong>1.1.1</strong>
                                            <span>Database:</span><strong>1.0.0</strong>
                                            <a class="reset-db-version-link" href="#"
                                                data-os-action="debug__reset_addon_db_version"
                                                data-os-params="plugin_name=latepoint-group-bookings"
                                                data-os-success-action="reload"><i
                                                    class="latepoint-icon latepoint-icon-refresh-cw"></i><span>reset</span></a>
                                        </div>
                                    </div>
                                    <div class="os-installed-addon-box">
                                        <h4>Locations</h4>
                                        <div class="os-iab-version-info">
                                            <span>Core:</span><strong>1.1.2</strong>
                                            <span>Database:</span><strong>1.0.1</strong>
                                            <a class="reset-db-version-link" href="#"
                                                data-os-action="debug__reset_addon_db_version"
                                                data-os-params="plugin_name=latepoint-locations"
                                                data-os-success-action="reload"><i
                                                    class="latepoint-icon latepoint-icon-refresh-cw"></i><span>reset</span></a>
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
</div>
<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script>
    $('.os-accordion-wrapper').click(function () {
        $(this).toggleClass('is-open')
    });
</script>
@endsection