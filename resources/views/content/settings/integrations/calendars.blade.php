@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page')

<!-- Vendor Styles -->
@section('vendor-style')
@vite(['resources/assets/vendor/libs/quill/typography.scss', 'resources/assets/vendor/libs/quill/katex.scss', 'resources/assets/vendor/libs/quill/editor.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite(['resources/assets/vendor/libs/quill/katex.js', 'resources/assets/vendor/libs/quill/quill.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/forms-editors.js'])
@endsection

@section('content')
<link href="{{ asset('/assets/css/settings.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/css/admin.css') }}" rel="stylesheet">
<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/settings/integrations-calendars') }}"
                class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">Calendars</h4>
            </a>
            <a href="{{ url('/admin/settings/integrations-meeting') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Meetings</h4>
            </a>
            <a href="{{ url('/admin/settings/integrations-marketing') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Marketing</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="latepoint-settings-w os-form-w">
                @if ($check == 0)
                    <form action="{{route('admin.settings-integrations-storecalendars')}}" data-os-action="settings__update"
                        method="post">
                        @csrf
                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="f1cd9b5daa">
                        <input type="hidden" name="_wp_http_referer"
                            value="/demo_4217c15f9eb342a2/wp-admin/admin.php?page=latepoint&amp;route_name=integrations__external_calendars">
                        <div class="os-section-header">
                            <h3>External Calendars</h3>
                        </div>
                        <div class="os-togglable-items-w">
                            <div class="os-togglable-item-w">
                                <div class="os-togglable-item-head">
                                    <div class="os-toggler-w">
                                        <input type="hidden" name="settings[enable_google_calendar]" value=""
                                            id="settings_enable_google_calendar">
                                        <div data-controlled-toggle-id="toggleCalendarSettings_google_calendar"
                                            class="os-toggler size-large off" data-is-string-value="true"
                                            data-for="settings_enable_google_calendar">
                                            <div class="toggler-rail">
                                                <div class="toggler-pill"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="os-togglable-item-name">Google Calendar</div>
                                </div>
                                <div class="os-togglable-item-body" style="display: none;"
                                    id="toggleCalendarSettings_google_calendar">
                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Agent Connections</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <div class="latepoint-message latepoint-message-subtle">Each agent can link
                                                their Google Calendar from their agent profile form.</div>
                                            <div class="latepoint-gcal-agent-connections">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Event Template</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <div class="latepoint-message latepoint-message-subtle">You can use variables in
                                                your event title and description, they will be replaced with a value for the
                                                booking. <a href="#"
                                                    class="field-note-info-link open-template-variables-panel"><i
                                                        class="latepoint-icon latepoint-icon-info"></i><span>Show Available
                                                        Variables</span></a></div>
                                            <div class="os-row">
                                                <div class="os-col-12">
                                                    <div
                                                        class="os-form-group os-form-textfield-group os-form-group-bordered has-value">
                                                        <label
                                                            for="settings_google_calendar_event_summary_template">Template
                                                            For Event Title</label><input type="text"
                                                            placeholder="Template For Event Title"
                                                            name="settings[google_calendar_event_summary_template]"
                                                            value="@{{ service_name }}" theme="bordered"
                                                            id="settings_google_calendar_event_summary_template"
                                                            class="os-form-control">
                                                    </div>
                                                    <div class="os-form-group os-form-control-wp-editor-group"><label
                                                            for="settings[google_calendar_event_description_template]">Template
                                                            For Event Description</label>
                                                        <div id="full-editor1">
                                                            Customer Name: <strong>@{{customer_full_name}}</strong>
                                                            Phone: <strong>@{{customer_phone}}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Other Settings</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <div class="os-row">
                                                <div class="os-col-12">
                                                    <div
                                                        class="os-form-group os-form-toggler-group  with-sub-label size-normal">
                                                        <input type="hidden"
                                                            name="settings[google_calendar_hide_event_name]" value="off"
                                                            id="settings_google_calendar_hide_event_name">
                                                        <div class="os-toggler off size-normal" data-is-string-value="true"
                                                            data-for="settings_google_calendar_hide_event_name">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Hide titles of imported
                                                                events</label><span>For privacy reasons hides titles of
                                                                events imported from Google Calendar</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="os-form-buttons">
                            <div class="os-form-group"><button type="submit" name="submit" class="latepoint-btn"
                                    id="submit">Save Settings</button></div>
                        </div>
                    </form>
                @else
                                <form action="{{route('admin.settings-integrations-updatecalendars', $result->id)}}"
                                    data-os-action="settings__update" method="post">
                                    @csrf
                                    @php
                                        $value = unserialize($result->value);
                                    @endphp
                                    {{-- {{ htmlspecialchars($othervalue['agent__view']) }} --}}
                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="f1cd9b5daa">
                                    <input type="hidden" name="_wp_http_referer"
                                        value="/demo_4217c15f9eb342a2/wp-admin/admin.php?page=latepoint&amp;route_name=integrations__external_calendars">
                                    <div class="os-section-header">
                                        <h3>External Calendars</h3>
                                    </div>
                                    <div class="os-togglable-items-w">
                                        <div class="os-togglable-item-w">
                                            <div class="os-togglable-item-head">
                                                <div class="os-toggler-w">
                                                    <input type="hidden" name="settings[enable_google_calendar]"
                                                        value="<?php    echo (!empty($value['enable_google_calendar']) ? $value['enable_google_calendar'] : 'off'); ?>"
                                                        id="settings_enable_google_calendar">
                                                    <div data-controlled-toggle-id="toggleCalendarSettings_google_calendar"
                                                        class="os-toggler size-large {{htmlspecialchars($value['enable_google_calendar']) }}"
                                                        data-is-string-value="true" data-for="settings_enable_google_calendar">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="os-togglable-item-name">Google Calendar</div>
                                            </div>
                                            <div class="os-togglable-item-body"
                                                style="<?php    echo (!empty($value['enable_google_calendar']) && $value['enable_google_calendar'] == "on" ? '' : 'display:none'); ?>"
                                                id="toggleCalendarSettings_google_calendar">
                                                <div class="sub-section-row">
                                                    <div class="sub-section-label">
                                                        <h3>Agent Connections</h3>
                                                    </div>
                                                    <div class="sub-section-content">
                                                        <div class="latepoint-message latepoint-message-subtle">Each agent can link
                                                            their Google Calendar from their agent profile form.</div>
                                                        <div class="latepoint-gcal-agent-connections">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sub-section-row">
                                                    <div class="sub-section-label">
                                                        <h3>Event Template</h3>
                                                    </div>
                                                    <div class="sub-section-content">
                                                        <div class="latepoint-message latepoint-message-subtle">You can use variables in
                                                            your event title and description, they will be replaced with a value for the
                                                            booking. <a href="#"
                                                                class="field-note-info-link open-template-variables-panel"><i
                                                                    class="latepoint-icon latepoint-icon-info"></i><span>Show Available
                                                                    Variables</span></a></div>
                                                        <div class="os-row">
                                                            <div class="os-col-12">
                                                                <div
                                                                    class="os-form-group os-form-textfield-group os-form-group-bordered has-value">
                                                                    <label
                                                                        for="settings_google_calendar_event_summary_template">Template
                                                                        For Event Title</label><input type="text"
                                                                        placeholder="Template For Event Title"
                                                                        name="settings[google_calendar_event_summary_template]"
                                                                        value="{{htmlspecialchars($value['google_calendar_event_summary_template']) }}"
                                                                        theme="bordered"
                                                                        id="settings_google_calendar_event_summary_template"
                                                                        class="os-form-control">
                                                                </div>
                                                                <div class="os-form-group os-form-control-wp-editor-group"><label
                                                                        for="settings[google_calendar_event_description_template]">Template
                                                                        For Event Description</label>
                                                                    <div id="full-editor1">
                                                                        Customer Name: <strong>@{{customer_full_name}}</strong>
                                                                        Phone: <strong>@{{customer_phone}}</strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sub-section-row">
                                                    <div class="sub-section-label">
                                                        <h3>Other Settings</h3>
                                                    </div>
                                                    <div class="sub-section-content">
                                                        <div class="os-row">
                                                            <div class="os-col-12">
                                                                <div
                                                                    class="os-form-group os-form-toggler-group  with-sub-label size-normal">
                                                                    <input type="hidden"
                                                                        name="settings[google_calendar_hide_event_name]"
                                                                        value="{{htmlspecialchars($value['google_calendar_hide_event_name']) }}"
                                                                        id="settings_google_calendar_hide_event_name">
                                                                    <div class="os-toggler {{htmlspecialchars($value['google_calendar_hide_event_name']) }} size-normal"
                                                                        data-is-string-value="true"
                                                                        data-for="settings_google_calendar_hide_event_name">
                                                                        <div class="toggler-rail">
                                                                            <div class="toggler-pill"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="os-toggler-label-w">
                                                                        <label>Hide titles of imported
                                                                            events</label><span>For privacy reasons hides titles of
                                                                            events imported from Google Calendar</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="os-form-buttons">
                                        <div class="os-form-group"><button type="submit" name="submit" class="latepoint-btn"
                                                id="submit">Save Settings</button></div>
                                    </div>
                                </form>
                @endif

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script>
    $('.os-form-toggler-group').click(function () {
        var obj = $(this).children('.os-toggler');
        var val = $(this).children('input');
        if (obj.hasClass('on')) {
            obj.removeClass('on');
            obj.addClass('off');
            val.val("off");

        } else {
            obj.removeClass('off');
            obj.addClass('on');
            val.val("on");

        }
    });

    $('.os-toggler-w').click(function () {
        var obj = $(this).children('.os-toggler');
        var val = $(this).children('input');
        if (obj.hasClass('on')) {
            obj.removeClass('on');
            obj.addClass('off');
            obj.parents('.os-togglable-item-w').children('.os-togglable-item-body').hide();
            val.val("off");
        } else {
            obj.removeClass('off');
            obj.addClass('on');
            obj.parents('.os-togglable-item-w').children('.os-togglable-item-body').show();
            val.val("on");
        }
    });
</script>
@endsection