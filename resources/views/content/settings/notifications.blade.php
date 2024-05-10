@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Latepoint')

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
            <a href="{{ url('/admin/settings/general') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">General</h4>
            </a>
            <a href="{{ url('/admin/settings/schedule') }}" class="agent-status-active text-center mx-2 ">
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
            <a href="{{ url('/admin/settings/notifications') }}"
                class="agent-status-active text-center mx-2 acitive-tab">
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
            <div class="latepoint-settings-w os-form-w">
                @if($check == 0)
                    <form action="{{route('admin.settings-storenotifications')}}" data-os-action="settings__update"
                        method="post">
                        @csrf
                        {{-- <input type="hidden" id="_wpnonce" name="_wpnonce" value="45429e9a8b"> --}}
                        {{-- <input type="hidden" name="_wp_http_referer"
                            value="/demo_4217c15f9eb342a2/wp-admin/admin.php?page=latepoint&amp;route_name=settings__notifications">
                        --}}
                        <div class="notifications-types-wrapper mb-4">
                            <div class="os-section-header">
                                <h3>Email Processors</h3>
                            </div>
                            <div class="mb-4">
                                <div id="email_processors_list" class="mb-4">
                                    <div class="os-togglable-items-w">
                                        <div class="os-togglable-item-w" id="notificationProcessorToggler_wp_mail">
                                            <div class="os-togglable-item-head">
                                                <div class="os-toggler-w">
                                                    <input type="hidden" name="settings[notifications_email_processor]"
                                                        value="off" id="settings_notifications_email_processor">
                                                    <div data-controlled-toggle-id="toggleNotificationSettings_wp_mail"
                                                        class="os-toggler os-toggler-radio size-large off"
                                                        data-is-string-value="true"
                                                        data-for="settings_notifications_email_processor_wp_mail">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="os-togglable-item-name">Default WordPress Mailer</div>
                                            </div>
                                            <div class="os-togglable-item-body" style="display:none"
                                                id="toggleNotificationSettings_wp_mail">
                                                <div class="sub-section-row">
                                                    <div class="sub-section-label">
                                                        <h3>Email Settings</h3>
                                                    </div>
                                                    <div class="sub-section-content">
                                                        <div class="os-row">
                                                            <div class="os-col-4">
                                                                <div
                                                                    class="os-form-group os-form-textfield-group os-form-group-simple">
                                                                    <label
                                                                        for="settings_notification_email_setting_from_name">From
                                                                        Name</label><input type="text"
                                                                        placeholder="From Name"
                                                                        name="settings[notification_email_setting_from_name]"
                                                                        value=""
                                                                        id="settings_notification_email_setting_from_name"
                                                                        class="os-form-control">
                                                                </div>
                                                            </div>
                                                            <div class="os-col-8">
                                                                <div
                                                                    class="os-form-group os-form-textfield-group os-form-group-simple has-value">
                                                                    <label
                                                                        for="settings_notification_email_setting_from_email">From
                                                                        Email Address
                                                                    </label>
                                                                    <input type="text" placeholder="From Email Address"
                                                                        name="settings[notification_email_setting_from_email]"
                                                                        value=""
                                                                        id="settings_notification_email_setting_from_email"
                                                                        class="os-form-control">
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
                            <div class="os-section-header">
                                <h3>SMS Processors</h3>
                            </div>
                            <div class="mb-4">
                                <div id="sms_processors_list" class="mb-4">
                                    <div class="os-togglable-items-w">
                                        <div class="os-togglable-item-w" id="notificationProcessorToggler_twilio">
                                            <div class="os-togglable-item-head">
                                                <div class="os-toggler-w">
                                                    <input type="hidden" name="settings[notifications_sms_processor]"
                                                        value="off" id="settings_notifications_sms_processor">
                                                    <div data-controlled-toggle-id="toggleNotificationSettings_twilio"
                                                        class="os-toggler os-toggler-radio size-large off"
                                                        data-is-string-value="true"
                                                        data-for="settings_notifications_sms_processor_twilio">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img class="os-togglable-item-logo-img"
                                                    src="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-content/plugins/latepoint-sms-twilio/public/images/twilio.svg">
                                                <div class="os-togglable-item-name">Twilio</div>
                                            </div>
                                            <div class="os-togglable-item-body" style="display:none"
                                                id="toggleNotificationSettings_twilio">
                                                <div class="sub-section-row">
                                                    <div class="sub-section-label">
                                                        <h3>Sender</h3>
                                                    </div>
                                                    <div class="sub-section-content">
                                                        <div
                                                            class="os-form-group os-form-textfield-group os-form-group-bordered">
                                                            <label for="settings_notifications_sms_twilio_phone">Phone
                                                                Number</label><input type="text" placeholder="Phone Number"
                                                                name="settings[notifications_sms_twilio_phone]" value=""
                                                                theme="bordered"
                                                                id="settings_notifications_sms_twilio_phone"
                                                                class="os-form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sub-section-row">
                                                    <div class="sub-section-label">
                                                        <h3>API Credentials</h3>
                                                    </div>
                                                    <div class="sub-section-content">
                                                        <div
                                                            class="os-form-group os-form-textfield-group os-form-group-bordered">
                                                            <label
                                                                for="settings_notifications_sms_twilio_account_sid">Account
                                                                SID</label><input type="text" placeholder="Account SID"
                                                                name="settings[notifications_sms_twilio_account_sid]"
                                                                value="" theme="bordered"
                                                                id="settings_notifications_sms_twilio_account_sid"
                                                                class="os-form-control">
                                                        </div>
                                                        <div
                                                            class="os-form-group os-form-textfield-group os-form-group-bordered">
                                                            <label for="settings_notifications_sms_twilio_auth_token">Auth
                                                                Token</label><input type="password" placeholder="Auth Token"
                                                                name="settings[notifications_sms_twilio_auth_token]"
                                                                value="" theme="bordered"
                                                                id="settings_notifications_sms_twilio_auth_token"
                                                                class="os-form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="os-section-header">
                            <h3>Other Settings</h3>
                        </div>
                        <div class="white-box">
                            <div class="white-box-header">
                                <div class="os-form-sub-header">
                                    <h3>Email System Settings</h3>
                                </div>
                            </div>
                            <div class="white-box-content no-padding">
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Email Layout</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="latepoint-message latepoint-message-subtle">This layout is used for
                                            your emails. You can customize it below and use @{{ content }} variable
                                            to
                                            insert content of the email that is generated by the Process that was triggered.
                                            Go to Processes to manage actual content of the email that is being sent.</div>
                                        <div class="mb-2">
                                            <a href="#"
                                                class="latepoint-btn latepoint-btn-outline latepoint-btn-sm open-layout-template-variables-panel"><i
                                                    class="latepoint-icon latepoint-icon-zap"></i><span>Show layout
                                                    variables</span></a>
                                        </div>
                                        <div class="os-form-group os-form-control-wp-editor-group"><label
                                                for="settings[email_layout_template]"></label>
                                            <div id="full-editor1">
                                                <div
                                                    style="padding: 20px; background-color: #f0f0f0; font-family: -apple-system, system-ui, BlinkMacSystemFont,;">
                                                    <div
                                                        style="background-color: #fff; padding: 30px; margin: 0px auto; max-width: 450px; box-shadow: 0px 2px 6px -1px rgba(0,0,0,0.2); border-radius: 6px;">
                                                        <div
                                                            style="margin: 0px auto 30px auto; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                                                            <table style="width: 100%;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>@{{ business_logo_image }}</td>
                                                                        <td style="text-align: right;"><span
                                                                                style="color: #7b7b7b;">Questions?</span>
                                                                            <strong>@{{ business_phone }}</strong>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div style="font-size: 16px; line-height: 1.5;">
                                                            @{{ content }}</div>
                                                    </div>
                                                    <div style="max-width: 450px; margin: 10px auto; text-align: center;">
                                                        @{{ business_address }}</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Password Reset</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="latepoint-message latepoint-message-subtle">This email content will be
                                            used for password reset requests. Use @{{ token }} variable to insert
                                            a
                                            generated token, which is needed to reset the password.</div>
                                        <div class="mb-2">
                                            <a href="#"
                                                class="latepoint-btn latepoint-btn-outline latepoint-btn-sm open-template-variables-panel"><i
                                                    class="latepoint-icon latepoint-icon-zap"></i><span>Show smart
                                                    variables</span></a>
                                        </div>
                                        <div class="os-form-group os-form-textfield-group os-form-group-bordered has-value">
                                            <label for="settings_email_customer_password_reset_request_subject">Email
                                                Subject</label><input type="text" placeholder="Email Subject"
                                                name="settings[email_customer_password_reset_request_subject]"
                                                value="Reset Your Password" theme="bordered"
                                                id="settings_email_customer_password_reset_request_subject"
                                                class="os-form-control">
                                        </div>
                                        <div class="os-form-group os-form-control-wp-editor-group"><label
                                                for="settings[email_customer_password_reset_request_content]">Email
                                                Message</label>
                                            <div id="full-editor2">
                                                Hi {customer_full_name},

                                                You have requested to change password for this account.

                                                Use this secret key to reset your password:
                                                <strong>@{{ token }}</strong>

                                                Best Regards!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white-box">
                            <div class="white-box-header">
                                <div class="os-form-sub-header">
                                    <h3>Chat Notifications</h3>
                                </div>
                            </div>
                            <div class="white-box-content no-padding">
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Settings</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-form-group os-form-checkbox-group has-toggle-element">
                                            <label for="settings_email_notification_customer_has_new_message">
                                                <input type="checkbox" onchange="clickCheckForm(this)"
                                                    name="settings[email_notification_customer_has_new_message]"
                                                    data-toggle-element="#notificationCustomerHasNewMessageContent"
                                                    id="settings_email_notification_customer_has_new_message"
                                                    class="os-form-checkbox">Notify customers about new messages</label>
                                        </div>
                                        <div class="lp-form-checkbox-contents" id="notificationCustomerHasNewMessageContent"
                                            style="display:none">
                                            <div
                                                class="os-form-group os-form-textfield-group os-form-group-transparent has-value">
                                                <label
                                                    for="settings_email_notification_customer_has_new_message_subject">Email
                                                    Subject</label><input type="text" placeholder="Email Subject"
                                                    name="settings[email_notification_customer_has_new_message_subject]"
                                                    value="You have a new message"
                                                    id="settings_email_notification_customer_has_new_message_subject"
                                                    class="os-form-control">
                                            </div>
                                            <div id="full-editor3">
                                            </div>
                                        </div>
                                        <div class="os-form-group os-form-checkbox-group has-toggle-element"
                                            data-toggle-element="#notificationAgentHasNewMessageContent">
                                            <label for="settings_email_notification_agent_has_new_message">
                                                <input type="checkbox"
                                                    name="settings[email_notification_agent_has_new_message]"
                                                    onchange="clickCheckForm(this)"
                                                    data-toggle-element="#notificationAgentHasNewMessageContent"
                                                    id="settings_email_notification_agent_has_new_message"
                                                    class="os-form-checkbox">Notify agents about new messages</label>
                                        </div>
                                        <div class="lp-form-checkbox-contents" id="notificationAgentHasNewMessageContent"
                                            style="display:none">
                                            <div
                                                class="os-form-group os-form-textfield-group os-form-group-transparent has-value">
                                                <label for="settings_email_notification_agent_has_new_message_subject">Email
                                                    Subject</label><input type="text" placeholder="Email Subject"
                                                    name="settings[email_notification_agent_has_new_message_subject]"
                                                    value="You have a new message"
                                                    id="settings_email_notification_agent_has_new_message_subject"
                                                    class="os-form-control">
                                            </div>
                                            <div class="os-form-group os-form-control-wp-editor-group"><label
                                                    for="settings[email_notification_agent_has_new_message_content]">Email
                                                    Message</label>
                                                <div id="full-editor4">
                                                    You have a new message from @{{ customer_full_name }} for
                                                    @{{ service_name }} on @{{ start_date }}. Message says:
                                                    <div
                                                        style="padding-left: 20px; margin: 20px 0px; border-left: 2px solid #ccc; color: #888;">
                                                        @{{ message_content }}</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="os-form-buttons">
                            <div class="os-form-group">
                                <button type="submit" name="submit" class="btn btn-primary" id="submit">Save
                                    Settings</button>
                            </div>
                        </div>
                    </form>
                @else
                                <form action="{{route('admin.settings-updatenotifications', $result->id)}}"
                                    data-os-action="settings__update" method="post">
                                    @csrf
                                    @php
                                        $value = unserialize($result->value);
                                    @endphp
                                    {{-- <input type="hidden" id="_wpnonce" name="_wpnonce" value="45429e9a8b"> --}}
                                    {{-- <input type="hidden" name="_wp_http_referer"
                                        value="/demo_4217c15f9eb342a2/wp-admin/admin.php?page=latepoint&amp;route_name=settings__notifications">
                                    --}}
                                    <div class="notifications-types-wrapper mb-4">
                                        <div class="os-section-header">
                                            <h3>Email Processors</h3>
                                        </div>
                                        <div class="mb-4">
                                            <div id="email_processors_list" class="mb-4">
                                                <div class="os-togglable-items-w">
                                                    <div class="os-togglable-item-w" id="notificationProcessorToggler_wp_mail">
                                                        <div class="os-togglable-item-head">
                                                            <div class="os-toggler-w">
                                                                <input type="hidden" name="settings[notifications_email_processor]"
                                                                    value="{{$value['notifications_email_processor']}}"
                                                                    id="settings_notifications_email_processor">
                                                                <div data-controlled-toggle-id="toggleNotificationSettings_wp_mail"
                                                                    class="os-toggler os-toggler-radio size-large {{$value['notifications_email_processor']}}"
                                                                    data-is-string-value="true"
                                                                    data-for="settings_notifications_email_processor_wp_mail">
                                                                    <div class="toggler-rail">
                                                                        <div class="toggler-pill"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="os-togglable-item-name">Default WordPress Mailer</div>
                                                        </div>
                                                        <div class="os-togglable-item-body"
                                                            style="<?php    echo (!empty($value['notifications_email_processor']) && $value['notifications_email_processor'] == "on" ? '' : 'display:none'); ?>"
                                                            id="toggleNotificationSettings_wp_mail">
                                                            <div class="sub-section-row">
                                                                <div class="sub-section-label">
                                                                    <h3>Email Settings</h3>
                                                                </div>
                                                                <div class="sub-section-content">
                                                                    <div class="os-row">
                                                                        <div class="os-col-4">
                                                                            <div
                                                                                class="os-form-group os-form-textfield-group os-form-group-simple">
                                                                                <label
                                                                                    for="settings_notification_email_setting_from_name">From
                                                                                    Name</label><input type="text"
                                                                                    placeholder="From Name"
                                                                                    name="settings[notification_email_setting_from_name]"
                                                                                    value="{{$value['notification_email_setting_from_name']}}"
                                                                                    id="settings_notification_email_setting_from_name"
                                                                                    class="os-form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="os-col-8">
                                                                            <div
                                                                                class="os-form-group os-form-textfield-group os-form-group-simple has-value">
                                                                                <label
                                                                                    for="settings_notification_email_setting_from_email">From
                                                                                    Email Address
                                                                                </label>
                                                                                <input type="text" placeholder="From Email Address"
                                                                                    name="settings[notification_email_setting_from_email]"
                                                                                    value="{{$value['notification_email_setting_from_email']}}"
                                                                                    id="settings_notification_email_setting_from_email"
                                                                                    class="os-form-control">
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
                                        <div class="os-section-header">
                                            <h3>SMS Processors</h3>
                                        </div>
                                        <div class="mb-4">
                                            <div id="sms_processors_list" class="mb-4">
                                                <div class="os-togglable-items-w">

                                                    <div class="os-togglable-item-w" id="notificationProcessorToggler_twilio">
                                                        <div class="os-togglable-item-head">
                                                            <div class="os-toggler-w">
                                                                <input type="hidden" name="settings[notifications_sms_processor]"
                                                                    value="{{$value['notifications_sms_processor']}}"
                                                                    id="settings_notifications_sms_processor">
                                                                <div data-controlled-toggle-id="toggleNotificationSettings_twilio"
                                                                    class="os-toggler os-toggler-radio size-large {{$value['notifications_sms_processor']}}"
                                                                    data-is-string-value="true"
                                                                    data-for="settings_notifications_sms_processor_twilio">
                                                                    <div class="toggler-rail">
                                                                        <div class="toggler-pill"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img class="os-togglable-item-logo-img"
                                                                src="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-content/plugins/latepoint-sms-twilio/public/images/twilio.svg">
                                                            <div class="os-togglable-item-name">Twilio</div>
                                                        </div>
                                                        <div class="os-togglable-item-body"
                                                            style="<?php    echo (!empty($value['notifications_sms_processor']) && $value['notifications_sms_processor'] == "on" ? '' : 'display:none'); ?>"
                                                            id="toggleNotificationSettings_twilio">
                                                            <div class="sub-section-row">
                                                                <div class="sub-section-label">
                                                                    <h3>Sender</h3>
                                                                </div>
                                                                <div class="sub-section-content">
                                                                    <div
                                                                        class="os-form-group os-form-textfield-group os-form-group-bordered">
                                                                        <label for="settings_notifications_sms_twilio_phone">Phone
                                                                            Number</label><input type="text" placeholder="Phone Number"
                                                                            name="settings[notifications_sms_twilio_phone]"
                                                                            value="{{$value['notifications_sms_twilio_phone']}}"
                                                                            theme="bordered"
                                                                            id="settings_notifications_sms_twilio_phone"
                                                                            class="os-form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sub-section-row">
                                                                <div class="sub-section-label">
                                                                    <h3>API Credentials</h3>
                                                                </div>
                                                                <div class="sub-section-content">
                                                                    <div
                                                                        class="os-form-group os-form-textfield-group os-form-group-bordered">
                                                                        <label
                                                                            for="settings_notifications_sms_twilio_account_sid">Account
                                                                            SID</label><input type="text" placeholder="Account SID"
                                                                            name="settings[notifications_sms_twilio_account_sid]"
                                                                            value="{{$value['notifications_sms_twilio_account_sid']}}"
                                                                            theme="bordered"
                                                                            id="settings_notifications_sms_twilio_account_sid"
                                                                            class="os-form-control">
                                                                    </div>
                                                                    <div
                                                                        class="os-form-group os-form-textfield-group os-form-group-bordered">
                                                                        <label for="settings_notifications_sms_twilio_auth_token">Auth
                                                                            Token</label><input type="password" placeholder="Auth Token"
                                                                            name="settings[notifications_sms_twilio_auth_token]"
                                                                            value="{{$value['notifications_sms_twilio_auth_token']}}"
                                                                            theme="bordered"
                                                                            id="settings_notifications_sms_twilio_auth_token"
                                                                            class="os-form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="os-section-header">
                                        <h3>Other Settings</h3>
                                    </div>
                                    <div class="white-box">
                                        <div class="white-box-header">
                                            <div class="os-form-sub-header">
                                                <h3>Email System Settings</h3>
                                            </div>
                                        </div>
                                        <div class="white-box-content no-padding">
                                            <div class="sub-section-row">
                                                <div class="sub-section-label">
                                                    <h3>Email Layout</h3>
                                                </div>
                                                <div class="sub-section-content">
                                                    <div class="latepoint-message latepoint-message-subtle">This layout is used for
                                                        your emails. You can customize it below and use @{{ content }} variable
                                                        to
                                                        insert content of the email that is generated by the Process that was triggered.
                                                        Go to Processes to manage actual content of the email that is being sent.</div>
                                                    <div class="mb-2">
                                                        <a href="#"
                                                            class="latepoint-btn latepoint-btn-outline latepoint-btn-sm open-layout-template-variables-panel"><i
                                                                class="latepoint-icon latepoint-icon-zap"></i><span>Show layout
                                                                variables</span></a>
                                                    </div>
                                                    <div class="os-form-group os-form-control-wp-editor-group"><label
                                                            for="settings[email_layout_template]"></label>
                                                        <div id="full-editor1">
                                                            <div
                                                                style="padding: 20px; background-color: #f0f0f0; font-family: -apple-system, system-ui, BlinkMacSystemFont,;">
                                                                <div
                                                                    style="background-color: #fff; padding: 30px; margin: 0px auto; max-width: 450px; box-shadow: 0px 2px 6px -1px rgba(0,0,0,0.2); border-radius: 6px;">
                                                                    <div
                                                                        style="margin: 0px auto 30px auto; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                                                                        <table style="width: 100%;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>@{{ business_logo_image }}</td>
                                                                                    <td style="text-align: right;"><span
                                                                                            style="color: #7b7b7b;">Questions?</span>
                                                                                        <strong>@{{ business_phone }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div style="font-size: 16px; line-height: 1.5;">
                                                                        @{{ content }}</div>
                                                                </div>
                                                                <div style="max-width: 450px; margin: 10px auto; text-align: center;">
                                                                    @{{ business_address }}</div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sub-section-row">
                                                <div class="sub-section-label">
                                                    <h3>Password Reset</h3>
                                                </div>
                                                <div class="sub-section-content">
                                                    <div class="latepoint-message latepoint-message-subtle">This email content will be
                                                        used for password reset requests. Use @{{ token }} variable to insert
                                                        a
                                                        generated token, which is needed to reset the password.</div>
                                                    <div class="mb-2">
                                                        <a href="#"
                                                            class="latepoint-btn latepoint-btn-outline latepoint-btn-sm open-template-variables-panel"><i
                                                                class="latepoint-icon latepoint-icon-zap"></i><span>Show smart
                                                                variables</span></a>
                                                    </div>
                                                    <div class="os-form-group os-form-textfield-group os-form-group-bordered has-value">
                                                        <label for="settings_email_customer_password_reset_request_subject">Email
                                                            Subject</label><input type="text" placeholder="Email Subject"
                                                            name="settings[email_customer_password_reset_request_subject]"
                                                            value="{{$value['email_customer_password_reset_request_subject']}}"
                                                            theme="bordered" id="settings_email_customer_password_reset_request_subject"
                                                            class="os-form-control">
                                                    </div>
                                                    <div class="os-form-group os-form-control-wp-editor-group"><label
                                                            for="settings[email_customer_password_reset_request_content]">Email
                                                            Message</label>
                                                        <div id="full-editor2">
                                                            Hi {customer_full_name},

                                                            You have requested to change password for this account.

                                                            Use this secret key to reset your password:
                                                            <strong>@{{ token }}</strong>

                                                            Best Regards!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="white-box">
                                        <div class="white-box-header">
                                            <div class="os-form-sub-header">
                                                <h3>Chat Notifications</h3>
                                            </div>
                                        </div>
                                        <div class="white-box-content no-padding">
                                            <div class="sub-section-row">
                                                <div class="sub-section-label">
                                                    <h3>Settings</h3>
                                                </div>
                                                <div class="sub-section-content">
                                                    <div class="os-form-group os-form-checkbox-group has-toggle-element">
                                                        <label for="settings_email_notification_customer_has_new_message">
                                                            <input type="checkbox" onchange="clickCheckForm(this)"
                                                                name="settings[email_notification_customer_has_new_message]"
                                                                data-toggle-element="#notificationCustomerHasNewMessageContent"
                                                                id="settings_email_notification_customer_has_new_message"
                                                                class="os-form-checkbox" <?php    echo (!empty($value['email_notification_customer_has_new_message']) && $value['email_notification_customer_has_new_message'] == "on" ? 'checked' : ''); ?>>Notify customers about new messages</label>
                                                    </div>
                                                    <div class="lp-form-checkbox-contents" id="notificationCustomerHasNewMessageContent"
                                                        style="<?php    echo (!empty($value['email_notification_customer_has_new_message']) && $value['email_notification_customer_has_new_message'] == "on" ? '' : 'display:none'); ?>">
                                                        <div
                                                            class="os-form-group os-form-textfield-group os-form-group-transparent has-value">
                                                            <label
                                                                for="settings_email_notification_customer_has_new_message_subject">Email
                                                                Subject</label>
                                                            <input type="text" placeholder="Email Subject"
                                                                name="settings[email_notification_customer_has_new_message_subject]"
                                                                value="{{$value['email_notification_customer_has_new_message_subject']}}"
                                                                id="settings_email_notification_customer_has_new_message_subject"
                                                                class="os-form-control">
                                                        </div>
                                                        <div id="full-editor3">
                                                        </div>
                                                    </div>
                                                    <div class="os-form-group os-form-checkbox-group has-toggle-element"
                                                        data-toggle-element="#notificationAgentHasNewMessageContent">
                                                        <label for="settings_email_notification_agent_has_new_message">
                                                            <input type="checkbox"
                                                                name="settings[email_notification_agent_has_new_message]"
                                                                onchange="clickCheckForm(this)"
                                                                data-toggle-element="#notificationAgentHasNewMessageContent"
                                                                id="settings_email_notification_agent_has_new_message"
                                                                class="os-form-checkbox" <?php    echo (!empty($value['email_notification_agent_has_new_message']) && $value['email_notification_agent_has_new_message'] == "on" ? 'checked' : ''); ?>>Notify agents about new messages</label>
                                                    </div>
                                                    <div class="lp-form-checkbox-contents" id="notificationAgentHasNewMessageContent"
                                                        style="<?php    echo (!empty($value['email_notification_agent_has_new_message']) && $value['email_notification_agent_has_new_message'] == "on" ? '' : 'display:none'); ?>">
                                                        <div
                                                            class="os-form-group os-form-textfield-group os-form-group-transparent has-value">
                                                            <label for="settings_email_notification_agent_has_new_message_subject">Email
                                                                Subject</label><input type="text" placeholder="Email Subject"
                                                                name="settings[email_notification_agent_has_new_message_subject]"
                                                                value="{{$value['email_notification_agent_has_new_message_subject']}}"
                                                                id="settings_email_notification_agent_has_new_message_subject"
                                                                class="os-form-control">
                                                        </div>
                                                        <div class="os-form-group os-form-control-wp-editor-group"><label
                                                                for="settings[email_notification_agent_has_new_message_content]">Email
                                                                Message</label>
                                                            <div id="full-editor4">
                                                                You have a new message from @{{ customer_full_name }} for
                                                                @{{ service_name }} on @{{ start_date }}. Message says:
                                                                <div
                                                                    style="padding-left: 20px; margin: 20px 0px; border-left: 2px solid #ccc; color: #888;">
                                                                    @{{ message_content }}</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="os-form-buttons">
                                        <div class="os-form-group">
                                            <button type="submit" name="submit" class="btn btn-primary" id="submit">Save
                                                Settings</button>
                                        </div>
                                    </div>
                                </form>
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('/assets/jquery.js') }}"></script>
<script>
    $('.os-toggler-w').click(function () {
        var obj = $(this).children('.os-toggler');
        var val = $(this).children('input');
        if (obj.hasClass('on')) {
            obj.removeClass('on');
            obj.addClass('off');
            val.val('off');
            obj.parents('.os-togglable-item-w').children('.os-togglable-item-body').hide();
        } else {
            obj.removeClass('off');
            obj.addClass('on');
            val.val('on');
            obj.parents('.os-togglable-item-w').children('.os-togglable-item-body').show();
        }
    });
    var _event_counter = 0;

    function clickCheckForm(obj) {

        $(obj).parents('.os-form-checkbox-group').toggleClass('is-checked');
        var id = $(obj).attr('data-toggle-element');
        console.log(id)
        $(id).toggle();


    };
</script>
@endsection