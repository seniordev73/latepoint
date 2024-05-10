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
            <a href="{{ url('/admin/settings/steps') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Steps</h4>
            </a>
            <a href="{{ url('/admin/settings/payments') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Payments</h4>
            </a>
            <a href="{{ url('/admin/settings/notifications') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Notifications</h4>
            </a>
            <a href="{{ url('/admin/settings/roles') }}" class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">Roles</h4>
            </a>
            <a href="{{ url('/admin/settings/system') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">System</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="latepoint-content ">
                <div class="os-section-header">
                    <h3>Default Roles</h3>
                </div>
                <div class="os-default-roles-w mb-4 os-form-blocks-w">
                    <form action="{{route('admin.settings-storeroles')}}" method="post" data-os-action="roles__save"
                        class="os-form-block os-user-type-form ">
                        @csrf
                        <div class="os-form-block-i">
                            <div class="os-form-block-header">
                                <div class="os-form-block-drag"></div>
                                <div class="os-form-block-name update-from-name">Administrator</div>
                                <div class="os-form-block-type">1 user</div>
                                <div class="os-form-block-edit-btn">
                                    <i class="latepoint-icon latepoint-icon-edit-3"></i>
                                </div>
                            </div>
                            <div class="os-form-block-params os-form-w">
                                <input type="hidden" name="role[wp_role]" value="administrator" id="role_wp_role">
                                {{-- <input type="hidden" name="role[user_type]" value="admin" id="role_user_type"> --}}
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Users</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="role-users-wrapper">
                                            <div class="role-user-wrapper" data-os-output-target="side-panel"
                                                data-os-after-call="latepointRoleManagerAddonAdmin.init_edit_wp_user_form"
                                                data-os-action="roles__edit_wp_user" data-os-params="id=33510">
                                                <div class="ru-main-info">
                                                    <div class="ru-avatar"
                                                        style="background-image: url(https://secure.gravatar.com/avatar/ea50452414da73d7519f0cf07b2831fe?s=96&amp;d=mm&amp;r=g)">
                                                    </div>
                                                    <div class="ru-wp-user-name">
                                                        <div class="ru-name">Sandbox Site Admin</div>
                                                        <div class="ru-email">lnicely@me.com</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Allowed Records</h3>
                                    </div>
                                    <div class="sub-section-content">

                                        <div class="latepoint-message latepoint-message-subtle">Users with
                                            "Administrator" role are allowed to perform all available actions on any
                                            agent, location and service records.</div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Permitted Actions</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="role-actions-grid">
                                            <div class="latepoint-message latepoint-message-subtle">Users with
                                                "Administrator" role are permitted to execute all available actions in
                                                the system.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    @if($check == 0)
                        <form action="{{route('admin.settings-storeroles')}}" method="post" data-os-action="roles__save"
                            class="os-form-block os-user-type-form ">
                            @csrf
                            <div class="os-form-block-i">
                                <div class="os-form-block-header">
                                    <div class="os-form-block-drag"></div>
                                    <div class="os-form-block-name update-from-name">LatePoint Agent</div>
                                    <div class="os-form-block-type">0 users</div>
                                    <div class="os-form-block-edit-btn">
                                        <i class="latepoint-icon latepoint-icon-edit-3"></i>
                                    </div>
                                </div>
                                <div class="os-form-block-params os-form-w">
                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Users</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <div class="latepoint-message latepoint-message-subtle">You have not assigned
                                                any WordPress users to this role. Create a new WP user or edit existing user
                                                and assign them a role called: "<span class="update-from-name">LatePoint
                                                    Agent</span>"</div>
                                        </div>
                                    </div>
                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Allowed Records</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <input type="hidden" name="role[wp_role]" value="latepoint_agent"
                                                id="role_wp_role">
                                            <div class="latepoint-message latepoint-message-subtle">Users with
                                                "Administrator" role can execute permitted actions only on records that
                                                belong to a LatePoint agent they are connected to.</div>
                                        </div>
                                    </div>
                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Permitted Actions</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <div class="role-actions-grid">
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Agents</h3>
                                                        <div class="role-actions-group-description"></div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][agent__view]"
                                                                value="on" id="role_capabilities_agent_view">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_agent_view">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][agent__delete]"
                                                                value="off" id="role_capabilities_agent_delete">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_agent_delete">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][agent__create]"
                                                                value="off" id="role_capabilities_agent_create">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_agent_create">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][agent__edit]"
                                                                value="on" id="role_capabilities_agent_edit">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_agent_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Services</h3>
                                                        <div class="role-actions-group-description"></div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][service__view]"
                                                                value="off" id="role_capabilities_service_view">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_service_view">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][service__delete]"
                                                                value="off" id="role_capabilities_service_delete">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_service_delete">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][service__create]"
                                                                value="off" id="role_capabilities_service_create">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_service_create">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][service__edit]"
                                                                value="off" id="role_capabilities_service_edit">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_service_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Locations</h3>
                                                        <div class="role-actions-group-description"></div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][location__view]"
                                                                value="off" id="role_capabilities_location_view">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_location_view">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][location__delete]"
                                                                value="off" id="role_capabilities_location_delete">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_location_delete">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][location__create]"
                                                                value="off" id="role_capabilities_location_create">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_location_create">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][location__edit]"
                                                                value="off" id="role_capabilities_location_edit">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_location_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Bookings</h3>
                                                        <div class="role-actions-group-description"></div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][booking__view]"
                                                                value="on" id="role_capabilities_booking_view">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_booking_view">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][booking__delete]"
                                                                value="on" id="role_capabilities_booking_delete">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_booking_delete">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][booking__create]"
                                                                value="on" id="role_capabilities_booking_create">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_booking_create">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][booking__edit]"
                                                                value="on" id="role_capabilities_booking_edit">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_booking_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Customers</h3>
                                                        <div class="role-actions-group-description"></div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][customer__view]"
                                                                value="on" id="role_capabilities_customer_view">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_customer_view">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][customer__delete]"
                                                                value="on" id="role_capabilities_customer_delete">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_customer_delete">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][customer__create]"
                                                                value="on" id="role_capabilities_customer_create">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_customer_create">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][customer__edit]"
                                                                value="on" id="role_capabilities_customer_edit">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_customer_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Transactions</h3>
                                                        <div class="role-actions-group-description"></div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden"
                                                                name="role[capabilities][transaction__view]" value="on"
                                                                id="role_capabilities_transaction_view">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_transaction_view">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden"
                                                                name="role[capabilities][transaction__delete]" value="on"
                                                                id="role_capabilities_transaction_delete">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_transaction_delete">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden"
                                                                name="role[capabilities][transaction__create]" value="on"
                                                                id="role_capabilities_transaction_create">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_transaction_create">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden"
                                                                name="role[capabilities][transaction__edit]" value="on"
                                                                id="role_capabilities_transaction_edit">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_transaction_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Activity Logs</h3>
                                                        <div class="role-actions-group-description"></div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][activity__view]"
                                                                value="on" id="role_capabilities_activity_view">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_activity_view">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][activity__delete]"
                                                                value="on" id="role_capabilities_activity_delete">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_activity_delete">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][activity__create]"
                                                                value="on" id="role_capabilities_activity_create">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_activity_create">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][activity__edit]"
                                                                value="on" id="role_capabilities_activity_edit">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_activity_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Chat</h3>
                                                        <div class="role-actions-group-description">Ability to send
                                                            messages to customers (available with chat addon).</div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][chat__edit]"
                                                                value="on" id="role_capabilities_chat_edit">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_chat_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Resource Schedules</h3>
                                                        <div class="role-actions-group-description">Edit custom schedule of
                                                            individual agent, location or service.</div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden"
                                                                name="role[capabilities][resource_schedule__edit]"
                                                                value="on" id="role_capabilities_resource_schedule_edit">
                                                            <div class="os-toggler on size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_resource_schedule_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Settings</h3>
                                                        <div class="role-actions-group-description">Access to all settings
                                                            pages, including general schedule and booking steps.</div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][settings__edit]"
                                                                value="off" id="role_capabilities_settings_edit">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_settings_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Connections</h3>
                                                        <div class="role-actions-group-description">Ability to connect
                                                            agents to services and locations.</div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][connection__edit]"
                                                                value="off" id="role_capabilities_connection_edit">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_connection_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="role-actions-item">
                                                    <div class="role-actions-group-name">
                                                        <h3>Coupons</h3>
                                                        <div class="role-actions-group-description"></div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][coupon__view]"
                                                                value="off" id="role_capabilities_coupon_view">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_coupon_view">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][coupon__delete]"
                                                                value="off" id="role_capabilities_coupon_delete">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_coupon_delete">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][coupon__create]"
                                                                value="off" id="role_capabilities_coupon_create">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_coupon_create">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="role-toggler-wrapper">
                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                            <input type="hidden" name="role[capabilities][coupon__edit]"
                                                                value="off" id="role_capabilities_coupon_edit">
                                                            <div class="os-toggler off size-normal"
                                                                data-is-string-value="true"
                                                                data-for="role_capabilities_coupon_edit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="os-form-block-buttons">
                                        <button type="submit" class="os-form-block-save-btn btn btn-primary"><span>Save
                                                Changes</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                                        <form action="{{route('admin.settings-updateroles', $latepoint->id)}}" method="post"
                                            data-os-action="roles__save" class="os-form-block os-user-type-form ">
                                            @csrf
                                            @php
                                                $lpvalue = unserialize($latepoint->value);
                                            @endphp
                                            <div class="os-form-block-i">
                                                <div class="os-form-block-header">
                                                    <div class="os-form-block-drag"></div>
                                                    <div class="os-form-block-name update-from-name">LatePoint Agent</div>
                                                    <div class="os-form-block-type">0 users</div>
                                                    <div class="os-form-block-edit-btn">
                                                        <i class="latepoint-icon latepoint-icon-edit-3"></i>
                                                    </div>
                                                </div>
                                                <div class="os-form-block-params os-form-w">
                                                    <div class="sub-section-row">
                                                        <div class="sub-section-label">
                                                            <h3>Users</h3>
                                                        </div>
                                                        <div class="sub-section-content">
                                                            <div class="latepoint-message latepoint-message-subtle">You have not assigned
                                                                any WordPress users to this role. Create a new WP user or edit existing user
                                                                and assign them a role called: "<span class="update-from-name">LatePoint
                                                                    Agent</span>"</div>
                                                        </div>
                                                    </div>
                                                    <div class="sub-section-row">
                                                        <div class="sub-section-label">
                                                            <h3>Allowed Records</h3>
                                                        </div>
                                                        <div class="sub-section-content">

                                                            <div class="latepoint-message latepoint-message-subtle">Users with
                                                                "Administrator" role can execute permitted actions only on records that
                                                                belong to a LatePoint agent they are connected to.</div>
                                                        </div>
                                                    </div>
                                                    <div class="sub-section-row">
                                                        <div class="sub-section-label">
                                                            <h3>Permitted Actions</h3>
                                                        </div>
                                                        <div class="sub-section-content">
                                                            <div class="role-actions-grid">
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Agents</h3>
                                                                        <div class="role-actions-group-description"></div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][agent__view]"
                                                                                value="{{$lpvalue['agent__view']}}"
                                                                                id="role_capabilities_agent_view">
                                                                            <div class="os-toggler {{$lpvalue['agent__view']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_agent_view">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][agent__delete]"
                                                                                value="{{$lpvalue['agent__delete']}}"
                                                                                id="role_capabilities_agent_delete">
                                                                            <div class="os-toggler {{$lpvalue['agent__delete']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_agent_delete">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][agent__create]"
                                                                                value="{{$lpvalue['agent__create']}}"
                                                                                id="role_capabilities_agent_create">
                                                                            <div class="os-toggler {{$lpvalue['agent__create']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_agent_create">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][agent__edit]"
                                                                                value="{{$lpvalue['agent__edit']}}"
                                                                                id="role_capabilities_agent_edit">
                                                                            <div class="os-toggler {{$lpvalue['agent__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_agent_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Services</h3>
                                                                        <div class="role-actions-group-description"></div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][service__view]"
                                                                                value="{{$lpvalue['service__view']}}"
                                                                                id="role_capabilities_service_view">
                                                                            <div class="os-toggler {{$lpvalue['service__view']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_service_view">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][service__delete]"
                                                                                value="{{$lpvalue['service__delete']}}"
                                                                                id="role_capabilities_service_delete">
                                                                            <div class="os-toggler {{$lpvalue['service__delete']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_service_delete">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][service__create]"
                                                                                value="{{$lpvalue['service__create']}}"
                                                                                id="role_capabilities_service_create">
                                                                            <div class="os-toggler {{$lpvalue['service__create']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_service_create">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][service__edit]"
                                                                                value="{{$lpvalue['service__edit']}}"
                                                                                id="role_capabilities_service_edit">
                                                                            <div class="os-toggler {{$lpvalue['service__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_service_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Locations</h3>
                                                                        <div class="role-actions-group-description"></div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][location__view]"
                                                                                value="{{$lpvalue['location__view']}}"
                                                                                id="role_capabilities_location_view">
                                                                            <div class="os-toggler {{$lpvalue['location__view']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_location_view">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][location__delete]"
                                                                                value="{{$lpvalue['location__delete']}}"
                                                                                id="role_capabilities_location_delete">
                                                                            <div class="os-toggler {{$lpvalue['location__delete']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_location_delete">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][location__create]"
                                                                                value="{{$lpvalue['location__create']}}"
                                                                                id="role_capabilities_location_create">
                                                                            <div class="os-toggler {{$lpvalue['location__create']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_location_create">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][location__edit]"
                                                                                value="{{$lpvalue['location__edit']}}"
                                                                                id="role_capabilities_location_edit">
                                                                            <div class="os-toggler {{$lpvalue['location__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_location_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Bookings</h3>
                                                                        <div class="role-actions-group-description"></div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][booking__view]"
                                                                                value="{{$lpvalue['booking__view']}}"
                                                                                id="role_capabilities_booking_view">
                                                                            <div class="os-toggler {{$lpvalue['booking__view']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_booking_view">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][booking__delete]"
                                                                                value="{{$lpvalue['booking__delete']}}"
                                                                                id="role_capabilities_booking_delete">
                                                                            <div class="os-toggler {{$lpvalue['booking__delete']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_booking_delete">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][booking__create]"
                                                                                value="{{$lpvalue['booking__create']}}"
                                                                                id="role_capabilities_booking_create">
                                                                            <div class="os-toggler {{$lpvalue['booking__create']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_booking_create">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][booking__edit]"
                                                                                value="{{$lpvalue['booking__edit']}}"
                                                                                id="role_capabilities_booking_edit">
                                                                            <div class="os-toggler {{$lpvalue['booking__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_booking_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Customers</h3>
                                                                        <div class="role-actions-group-description"></div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][customer__view]"
                                                                                value="{{$lpvalue['customer__view']}}"
                                                                                id="role_capabilities_customer_view">
                                                                            <div class="os-toggler {{$lpvalue['customer__view']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_customer_view">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][customer__delete]"
                                                                                value="{{$lpvalue['customer__delete']}}"
                                                                                id="role_capabilities_customer_delete">
                                                                            <div class="os-toggler {{$lpvalue['customer__delete']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_customer_delete">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][customer__create]"
                                                                                value="{{$lpvalue['customer__create']}}"
                                                                                id="role_capabilities_customer_create">
                                                                            <div class="os-toggler {{$lpvalue['customer__create']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_customer_create">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][customer__edit]"
                                                                                value="{{$lpvalue['customer__edit']}}"
                                                                                id="role_capabilities_customer_edit">
                                                                            <div class="os-toggler {{$lpvalue['customer__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_customer_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Transactions</h3>
                                                                        <div class="role-actions-group-description"></div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden"
                                                                                name="role[capabilities][transaction__view]"
                                                                                value="{{$lpvalue['transaction__view']}}"
                                                                                id="role_capabilities_transaction_view">
                                                                            <div class="os-toggler {{$lpvalue['transaction__view']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_transaction_view">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden"
                                                                                name="role[capabilities][transaction__delete]"
                                                                                value="{{$lpvalue['transaction__delete']}}"
                                                                                id="role_capabilities_transaction_delete">
                                                                            <div class="os-toggler {{$lpvalue['transaction__delete']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_transaction_delete">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden"
                                                                                name="role[capabilities][transaction__create]"
                                                                                value="{{$lpvalue['transaction__create']}}"
                                                                                id="role_capabilities_transaction_create">
                                                                            <div class="os-toggler {{$lpvalue['transaction__create']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_transaction_create">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden"
                                                                                name="role[capabilities][transaction__edit]"
                                                                                value="{{$lpvalue['transaction__edit']}}"
                                                                                id="role_capabilities_transaction_edit">
                                                                            <div class="os-toggler {{$lpvalue['transaction__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_transaction_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Activity Logs</h3>
                                                                        <div class="role-actions-group-description"></div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][activity__view]"
                                                                                value="{{$lpvalue['activity__view']}}"
                                                                                id="role_capabilities_activity_view">
                                                                            <div class="os-toggler {{$lpvalue['activity__view']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_activity_view">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][activity__delete]"
                                                                                value="{{$lpvalue['activity__delete']}}"
                                                                                id="role_capabilities_activity_delete">
                                                                            <div class="os-toggler {{$lpvalue['activity__delete']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_activity_delete">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][activity__create]"
                                                                                value="{{$lpvalue['activity__create']}}"
                                                                                id="role_capabilities_activity_create">
                                                                            <div class="os-toggler {{$lpvalue['activity__create']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_activity_create">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][activity__edit]"
                                                                                value="{{$lpvalue['activity__edit']}}"
                                                                                id="role_capabilities_activity_edit">
                                                                            <div class="os-toggler {{$lpvalue['activity__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_activity_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Chat</h3>
                                                                        <div class="role-actions-group-description">Ability to send
                                                                            messages to customers (available with chat addon).</div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][chat__edit]"
                                                                                value="{{$lpvalue['chat__edit']}}"
                                                                                id="role_capabilities_chat_edit">
                                                                            <div class="os-toggler {{$lpvalue['chat__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_chat_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Resource Schedules</h3>
                                                                        <div class="role-actions-group-description">Edit custom schedule of
                                                                            individual agent, location or service.</div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden"
                                                                                name="role[capabilities][resource_schedule__edit]"
                                                                                value="{{$lpvalue['resource_schedule__edit']}}"
                                                                                id="role_capabilities_resource_schedule_edit">
                                                                            <div class="os-toggler {{$lpvalue['resource_schedule__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_resource_schedule_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Settings</h3>
                                                                        <div class="role-actions-group-description">Access to all settings
                                                                            pages, including general schedule and booking steps.</div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][settings__edit]"
                                                                                value="{{$lpvalue['settings__edit']}}"
                                                                                id="role_capabilities_settings_edit">
                                                                            <div class="os-toggler {{$lpvalue['settings__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_settings_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Connections</h3>
                                                                        <div class="role-actions-group-description">Ability to connect
                                                                            agents to services and locations.</div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][connection__edit]"
                                                                                value="{{$lpvalue['connection__edit']}}"
                                                                                id="role_capabilities_connection_edit">
                                                                            <div class="os-toggler {{$lpvalue['connection__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_connection_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="role-actions-item">
                                                                    <div class="role-actions-group-name">
                                                                        <h3>Coupons</h3>
                                                                        <div class="role-actions-group-description"></div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][coupon__view]"
                                                                                value="{{$lpvalue['coupon__view']}}"
                                                                                id="role_capabilities_coupon_view">
                                                                            <div class="os-toggler {{$lpvalue['coupon__view']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_coupon_view">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>View</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][coupon__delete]"
                                                                                value="{{$lpvalue['coupon__delete']}}"
                                                                                id="role_capabilities_coupon_delete">
                                                                            <div class="os-toggler {{$lpvalue['coupon__delete']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_coupon_delete">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][coupon__create]"
                                                                                value="{{$lpvalue['coupon__create']}}"
                                                                                id="role_capabilities_coupon_create">
                                                                            <div class="os-toggler {{$lpvalue['coupon__create']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_coupon_create">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Create</label></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-toggler-wrapper">
                                                                        <div class="os-form-group os-form-toggler-group  size-normal">
                                                                            <input type="hidden" name="role[capabilities][coupon__edit]"
                                                                                value="{{$lpvalue['coupon__edit']}}"
                                                                                id="role_capabilities_coupon_edit">
                                                                            <div class="os-toggler {{$lpvalue['coupon__edit']}} size-normal"
                                                                                data-is-string-value="true"
                                                                                data-for="role_capabilities_coupon_edit">
                                                                                <div class="toggler-rail">
                                                                                    <div class="toggler-pill"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="os-form-block-buttons">
                                                        <button type="submit" class="os-form-block-save-btn btn btn-primary"><span>Save
                                                                Changes</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                    @endif
                </div>
                <div class="os-section-header">
                    <h3>Custom Roles</h3>
                    @foreach ($otherroles as $role)
                                        <div class="os-custom-roles-w os-form-blocks-w">
                                            <form action="{{route('admin.settings-updateroles', $role->id)}}" data-os-action="roles__save"
                                                class="os-form-block os-user-type-form" method="post">
                                                @csrf
                                                @php
                                                    $othervalue = unserialize($role->value);
                                                @endphp
                                                {{-- {{ htmlspecialchars($othervalue['agent__view']) }} --}}
                                                <div class="os-form-block-i">
                                                    <div class="os-form-block-header">
                                                        <div class="os-form-block-drag"></div>
                                                        <div class="os-form-block-name update-from-name">{{$othervalue['name']}}</div>
                                                        <div class="os-form-block-type">0 users</div>
                                                        <div class="os-form-block-edit-btn">
                                                            <i class="latepoint-icon latepoint-icon-edit-3"></i>
                                                        </div>
                                                    </div>
                                                    <div class="os-form-block-params os-form-w">
                                                        <div class="sub-section-row">
                                                            <div class="sub-section-label">
                                                                <h3>Name</h3>
                                                            </div>
                                                            <div class="sub-section-content">
                                                                <div
                                                                    class="os-form-group os-form-textfield-group os-form-group-bordered has-value no-label">
                                                                    <input type="text" placeholder="" name="role[capabilities][name]"
                                                                        value="{{$othervalue['name']}}" theme="bordered" id="role_name"
                                                                        class="os-form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="role[wp_role]" value="role_custom" id="role_wp_role">

                                                        <div class="sub-section-row">
                                                            <div class="sub-section-label">
                                                                <h3>Users</h3>
                                                            </div>
                                                            <div class="sub-section-content">
                                                                <div class="latepoint-message latepoint-message-subtle">You have not
                                                                    assigned
                                                                    any WordPress users to this role. Create a new WP user or edit existing
                                                                    user
                                                                    and assign them a role called: "<span class="update-from-name">New
                                                                        Custom
                                                                        Role</span>"</div>
                                                            </div>
                                                        </div>
                                                        <div class="sub-section-row">
                                                            <div class="sub-section-label">
                                                                <h3>Allowed Records</h3>
                                                            </div>
                                                            <div class="sub-section-content">

                                                                <div class="latepoint-message latepoint-message-subtle">Once you assign
                                                                    users
                                                                    to this role, they will appear in "Users" section above, click on each
                                                                    user
                                                                    to set restrictions on which records each of them can access.</div>
                                                            </div>
                                                        </div>
                                                        <div class="sub-section-row">
                                                            <div class="sub-section-label">
                                                                <h3>Permitted Actions</h3>
                                                            </div>
                                                            <div class="sub-section-content">
                                                                <div class="role-actions-grid">
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Agents</h3>
                                                                            <div class="role-actions-group-description"></div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden" name="role[capabilities][agent__view]"
                                                                                    value="{{$othervalue['agent__view']}}"
                                                                                    id="role_capabilities_agent_view">
                                                                                <div class="os-toggler {{$othervalue['agent__view']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_agent_view">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>View</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][agent__delete]"
                                                                                    value="{{$othervalue['agent__delete']}}"
                                                                                    id="role_capabilities_agent_delete">
                                                                                <div class="os-toggler {{$othervalue['agent__delete']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_agent_delete">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][agent__create]"
                                                                                    value="{{$othervalue['agent__create']}}"
                                                                                    id="role_capabilities_agent_create">
                                                                                <div class="os-toggler {{$othervalue['agent__create']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_agent_create">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Create</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden" name="role[capabilities][agent__edit]"
                                                                                    value="{{$othervalue['agent__edit']}}"
                                                                                    id="role_capabilities_agent_edit">
                                                                                <div class="os-toggler {{$othervalue['agent__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_agent_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Services</h3>
                                                                            <div class="role-actions-group-description"></div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][service__view]"
                                                                                    value="{{$othervalue['service__view']}}"
                                                                                    id="role_capabilities_service_view">
                                                                                <div class="os-toggler {{$othervalue['service__view']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_service_view">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>View</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][service__delete]"
                                                                                    value="{{$othervalue['service__delete']}}"
                                                                                    id="role_capabilities_service_delete">
                                                                                <div class="os-toggler {{$othervalue['service__delete']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_service_delete">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][service__create]"
                                                                                    value="{{$othervalue['service__create']}}"
                                                                                    id="role_capabilities_service_create">
                                                                                <div class="os-toggler {{$othervalue['service__create']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_service_create">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Create</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][service__edit]"
                                                                                    value="{{$othervalue['service__edit']}}"
                                                                                    id="role_capabilities_service_edit">
                                                                                <div class="os-toggler {{$othervalue['service__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_service_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Locations</h3>
                                                                            <div class="role-actions-group-description"></div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][location__view]"
                                                                                    value="{{$othervalue['location__view']}}"
                                                                                    id="role_capabilities_location_view">
                                                                                <div class="os-toggler {{$othervalue['location__view']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_location_view">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>View</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][location__delete]"
                                                                                    value="{{$othervalue['location__delete']}}"
                                                                                    id="role_capabilities_location_delete">
                                                                                <div class="os-toggler {{$othervalue['location__delete']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_location_delete">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][location__create]"
                                                                                    value="{{$othervalue['location__create']}}"
                                                                                    id="role_capabilities_location_create">
                                                                                <div class="os-toggler {{$othervalue['location__create']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_location_create">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Create</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][location__edit]"
                                                                                    value="{{$othervalue['location__edit']}}"
                                                                                    id="role_capabilities_location_edit">
                                                                                <div class="os-toggler {{$othervalue['location__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_location_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Bookings</h3>
                                                                            <div class="role-actions-group-description"></div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][booking__view]"
                                                                                    value="{{$othervalue['booking__view']}}"
                                                                                    id="role_capabilities_booking_view">
                                                                                <div class="os-toggler {{$othervalue['booking__view']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_booking_view">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>View</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][booking__delete]"
                                                                                    value="{{$othervalue['booking__delete']}}"
                                                                                    id="role_capabilities_booking_delete">
                                                                                <div class="os-toggler {{$othervalue['booking__delete']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_booking_delete">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][booking__create]"
                                                                                    value="{{$othervalue['booking__create']}}"
                                                                                    id="role_capabilities_booking_create">
                                                                                <div class="os-toggler {{$othervalue['booking__create']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_booking_create">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Create</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][booking__edit]"
                                                                                    value="{{$othervalue['booking__edit']}}"
                                                                                    id="role_capabilities_booking_edit">
                                                                                <div class="os-toggler {{$othervalue['booking__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_booking_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Customers</h3>
                                                                            <div class="role-actions-group-description"></div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][customer__view]"
                                                                                    value="{{$othervalue['customer__view']}}"
                                                                                    id="role_capabilities_customer_view">
                                                                                <div class="os-toggler {{$othervalue['customer__view']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_customer_view">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>View</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][customer__delete]"
                                                                                    value="{{$othervalue['customer__delete']}}"
                                                                                    id="role_capabilities_customer_delete">
                                                                                <div class="os-toggler {{$othervalue['customer__delete']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_customer_delete">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][customer__create]"
                                                                                    value="{{$othervalue['customer__create']}}"
                                                                                    id="role_capabilities_customer_create">
                                                                                <div class="os-toggler {{$othervalue['customer__create']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_customer_create">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Create</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][customer__edit]"
                                                                                    value="{{$othervalue['customer__edit']}}"
                                                                                    id="role_capabilities_customer_edit">
                                                                                <div class="os-toggler {{$othervalue['customer__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_customer_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Transactions</h3>
                                                                            <div class="role-actions-group-description"></div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][transaction__view]"
                                                                                    value="{{$othervalue['transaction__view']}}"
                                                                                    id="role_capabilities_transaction_view">
                                                                                <div class="os-toggler {{$othervalue['transaction__view']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_transaction_view">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>View</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][transaction__delete]"
                                                                                    value="{{$othervalue['transaction__delete']}}"
                                                                                    id="role_capabilities_transaction_delete">
                                                                                <div class="os-toggler {{$othervalue['transaction__delete']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_transaction_delete">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][transaction__create]"
                                                                                    value="{{$othervalue['transaction__create']}}"
                                                                                    id="role_capabilities_transaction_create">
                                                                                <div class="os-toggler {{$othervalue['transaction__create']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_transaction_create">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Create</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][transaction__edit]"
                                                                                    value="{{$othervalue['transaction__edit']}}"
                                                                                    id="role_capabilities_transaction_edit">
                                                                                <div class="os-toggler {{$othervalue['transaction__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_transaction_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Activity Logs</h3>
                                                                            <div class="role-actions-group-description"></div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][activity__view]"
                                                                                    value="{{$othervalue['activity__view']}}"
                                                                                    id="role_capabilities_activity_view">
                                                                                <div class="os-toggler {{$othervalue['activity__view']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_activity_view">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>View</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][activity__delete]"
                                                                                    value="{{$othervalue['activity__delete']}}"
                                                                                    id="role_capabilities_activity_delete">
                                                                                <div class="os-toggler {{$othervalue['activity__delete']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_activity_delete">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][activity__create]"
                                                                                    value="{{$othervalue['activity__create']}}"
                                                                                    id="role_capabilities_activity_create">
                                                                                <div class="os-toggler {{$othervalue['activity__create']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_activity_create">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Create</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][activity__edit]"
                                                                                    value="{{$othervalue['activity__edit']}}"
                                                                                    id="role_capabilities_activity_edit">
                                                                                <div class="os-toggler {{$othervalue['activity__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_activity_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Chat</h3>
                                                                            <div class="role-actions-group-description">Ability to send
                                                                                messages to customers (available with chat addon).</div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden" name="role[capabilities][chat__edit]"
                                                                                    value="{{$othervalue['chat__edit']}}"
                                                                                    id="role_capabilities_chat_edit">
                                                                                <div class="os-toggler {{$othervalue['chat__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_chat_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Resource Schedules</h3>
                                                                            <div class="role-actions-group-description">Edit custom schedule
                                                                                of individual agent, location or service.</div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][resource_schedule__edit]"
                                                                                    value="{{$othervalue['resource_schedule__edit']}}"
                                                                                    id="role_capabilities_resource_schedule_edit">
                                                                                <div class="os-toggler {{$othervalue['resource_schedule__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_resource_schedule_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Settings</h3>
                                                                            <div class="role-actions-group-description">Access to all
                                                                                settings
                                                                                pages, including general schedule and booking steps.</div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][settings__edit]"
                                                                                    value="{{$othervalue['settings__edit']}}"
                                                                                    id="role_capabilities_settings_edit">
                                                                                <div class="os-toggler {{$othervalue['settings__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_settings_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Connections</h3>
                                                                            <div class="role-actions-group-description">Ability to connect
                                                                                agents to services and locations.</div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][connection__edit]"
                                                                                    value="{{$othervalue['connection__edit']}}"
                                                                                    id="role_capabilities_connection_edit">
                                                                                <div class="os-toggler {{$othervalue['connection__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_connection_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="role-actions-item">
                                                                        <div class="role-actions-group-name">
                                                                            <h3>Coupons</h3>
                                                                            <div class="role-actions-group-description"></div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden" name="role[capabilities][coupon__view]"
                                                                                    value="{{$othervalue['coupon__view']}}"
                                                                                    id="role_capabilities_coupon_view">
                                                                                <div class="os-toggler {{$othervalue['coupon__view']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_coupon_view">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>View</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][coupon__delete]"
                                                                                    value="{{$othervalue['coupon__delete']}}"
                                                                                    id="role_capabilities_coupon_delete">
                                                                                <div class="os-toggler {{$othervalue['coupon__delete']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_coupon_delete">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Delete</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden"
                                                                                    name="role[capabilities][coupon__create]"
                                                                                    value="{{$othervalue['coupon__create']}}"
                                                                                    id="role_capabilities_coupon_create">
                                                                                <div class="os-toggler {{$othervalue['coupon__create']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_coupon_create">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Create</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="role-toggler-wrapper">
                                                                            <div class="os-form-group os-form-toggler-group  size-normal">
                                                                                <input type="hidden" name="role[capabilities][coupon__edit]"
                                                                                    value="{{$othervalue['coupon__edit']}}"
                                                                                    id="role_capabilities_coupon_edit">
                                                                                <div class="os-toggler {{$othervalue['coupon__edit']}} size-normal"
                                                                                    data-is-string-value="true"
                                                                                    data-for="role_capabilities_coupon_edit">
                                                                                    <div class="toggler-rail">
                                                                                        <div class="toggler-pill"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="os-toggler-label-w"><label>Edit</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="os-form-block-buttons">
                                                            <a href="/settings/deleteroles/{{$role->id}}"
                                                                class="btn btn-danger pull-left os-remove-role"
                                                                data-os-prompt="Are you sure you want to delete this role?"
                                                                data-os-after-call="latepointRoleManagerAddonAdmin.role_deleted"
                                                                data-os-pass-this="yes" data-os-action="roles__destroy"
                                                                data-os-params="wp_role=role_AuuNwSTd">Delete </a>
                                                            <button type="submit" class="os-form-block-save-btn btn btn-primary"><span>Save
                                                                    Changes</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="/settings/deleteroles/{{$role->id}}"
                                                    data-os-prompt="Are you sure you want to delete this role?"
                                                    data-os-after-call="latepointRoleManagerAddonAdmin.role_deleted" data-os-pass-this="yes"
                                                    data-os-action="roles__destroy" data-os-params="wp_role=role_AuuNwSTd"
                                                    class="os-remove-form-block"><i class="latepoint-icon latepoint-icon-cross"></i></a>
                                            </form>
                                        </div>
                    @endforeach

                </div>
                <div class="os-custom-roles-w os-form-blocks-w new-custom-form" style="display: none">
                    <form action="{{route('admin.settings-storeroles')}}" data-os-action="roles__save"
                        class="os-form-block os-user-type-form os-is-editing" method="post">
                        @csrf
                        <div class="os-form-block-i">
                            <div class="os-form-block-header">
                                <div class="os-form-block-drag"></div>
                                <div class="os-form-block-name update-from-name">New Custom Role</div>
                                <div class="os-form-block-type">0 users</div>
                                <div class="os-form-block-edit-btn">
                                    <i class="latepoint-icon latepoint-icon-edit-3"></i>
                                </div>
                            </div>
                            <div class="os-form-block-params os-form-w">
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Name</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div
                                            class="os-form-group os-form-textfield-group os-form-group-bordered has-value no-label">
                                            <input type="text" placeholder="" name="role[capabilities][name]"
                                                value="New Custom Role" theme="bordered" id="role_name"
                                                class="os-form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="role[wp_role]" value="role_custom" id="role_wp_role">

                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Users</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="latepoint-message latepoint-message-subtle">You have not assigned
                                            any WordPress users to this role. Create a new WP user or edit existing user
                                            and assign them a role called: "<span class="update-from-name">New Custom
                                                Role</span>"</div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Allowed Records</h3>
                                    </div>
                                    <div class="sub-section-content">

                                        <div class="latepoint-message latepoint-message-subtle">Once you assign users
                                            to this role, they will appear in "Users" section above, click on each user
                                            to set restrictions on which records each of them can access.</div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Permitted Actions</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="role-actions-grid">
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Agents</h3>
                                                    <div class="role-actions-group-description"></div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][agent__view]"
                                                            value="off" id="role_capabilities_agent_view">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_agent_view">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>View</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][agent__delete]"
                                                            value="off" id="role_capabilities_agent_delete">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_agent_delete">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Delete</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][agent__create]"
                                                            value="off" id="role_capabilities_agent_create">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_agent_create">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Create</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][agent__edit]"
                                                            value="off" id="role_capabilities_agent_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_agent_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Services</h3>
                                                    <div class="role-actions-group-description"></div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][service__view]"
                                                            value="off" id="role_capabilities_service_view">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_service_view">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>View</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][service__delete]"
                                                            value="off" id="role_capabilities_service_delete">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_service_delete">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Delete</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][service__create]"
                                                            value="off" id="role_capabilities_service_create">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_service_create">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Create</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][service__edit]"
                                                            value="off" id="role_capabilities_service_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_service_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Locations</h3>
                                                    <div class="role-actions-group-description"></div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][location__view]"
                                                            value="off" id="role_capabilities_location_view">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_location_view">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>View</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][location__delete]"
                                                            value="off" id="role_capabilities_location_delete">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_location_delete">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Delete</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][location__create]"
                                                            value="off" id="role_capabilities_location_create">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_location_create">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Create</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][location__edit]"
                                                            value="off" id="role_capabilities_location_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_location_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Bookings</h3>
                                                    <div class="role-actions-group-description"></div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][booking__view]"
                                                            value="off" id="role_capabilities_booking_view">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_booking_view">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>View</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][booking__delete]"
                                                            value="off" id="role_capabilities_booking_delete">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_booking_delete">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Delete</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][booking__create]"
                                                            value="off" id="role_capabilities_booking_create">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_booking_create">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Create</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][booking__edit]"
                                                            value="off" id="role_capabilities_booking_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_booking_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Customers</h3>
                                                    <div class="role-actions-group-description"></div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][customer__view]"
                                                            value="off" id="role_capabilities_customer_view">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_customer_view">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>View</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][customer__delete]"
                                                            value="off" id="role_capabilities_customer_delete">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_customer_delete">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Delete</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][customer__create]"
                                                            value="off" id="role_capabilities_customer_create">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_customer_create">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Create</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][customer__edit]"
                                                            value="off" id="role_capabilities_customer_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_customer_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Transactions</h3>
                                                    <div class="role-actions-group-description"></div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden"
                                                            name="role[capabilities][transaction__view]" value="off"
                                                            id="role_capabilities_transaction_view">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_transaction_view">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>View</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden"
                                                            name="role[capabilities][transaction__delete]" value="off"
                                                            id="role_capabilities_transaction_delete">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_transaction_delete">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Delete</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden"
                                                            name="role[capabilities][transaction__create]" value="off"
                                                            id="role_capabilities_transaction_create">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_transaction_create">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Create</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden"
                                                            name="role[capabilities][transaction__edit]" value="off"
                                                            id="role_capabilities_transaction_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_transaction_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Activity Logs</h3>
                                                    <div class="role-actions-group-description"></div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][activity__view]"
                                                            value="off" id="role_capabilities_activity_view">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_activity_view">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>View</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][activity__delete]"
                                                            value="off" id="role_capabilities_activity_delete">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_activity_delete">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Delete</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][activity__create]"
                                                            value="off" id="role_capabilities_activity_create">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_activity_create">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Create</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][activity__edit]"
                                                            value="off" id="role_capabilities_activity_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_activity_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Chat</h3>
                                                    <div class="role-actions-group-description">Ability to send
                                                        messages to customers (available with chat addon).</div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][chat__edit]"
                                                            value="off" id="role_capabilities_chat_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_chat_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Resource Schedules</h3>
                                                    <div class="role-actions-group-description">Edit custom schedule
                                                        of individual agent, location or service.</div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden"
                                                            name="role[capabilities][resource_schedule__edit]"
                                                            value="off" id="role_capabilities_resource_schedule_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_resource_schedule_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Settings</h3>
                                                    <div class="role-actions-group-description">Access to all settings
                                                        pages, including general schedule and booking steps.</div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][settings__edit]"
                                                            value="off" id="role_capabilities_settings_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_settings_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Connections</h3>
                                                    <div class="role-actions-group-description">Ability to connect
                                                        agents to services and locations.</div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][connection__edit]"
                                                            value="off" id="role_capabilities_connection_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_connection_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="role-actions-item">
                                                <div class="role-actions-group-name">
                                                    <h3>Coupons</h3>
                                                    <div class="role-actions-group-description"></div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][coupon__view]"
                                                            value="off" id="role_capabilities_coupon_view">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_coupon_view">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>View</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][coupon__delete]"
                                                            value="off" id="role_capabilities_coupon_delete">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_coupon_delete">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Delete</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][coupon__create]"
                                                            value="off" id="role_capabilities_coupon_create">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_coupon_create">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Create</label></div>
                                                    </div>
                                                </div>
                                                <div class="role-toggler-wrapper">
                                                    <div class="os-form-group os-form-toggler-group  size-normal">
                                                        <input type="hidden" name="role[capabilities][coupon__edit]"
                                                            value="off" id="role_capabilities_coupon_edit">
                                                        <div class="os-toggler off size-normal"
                                                            data-is-string-value="true"
                                                            data-for="role_capabilities_coupon_edit">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Edit</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-form-block-buttons">
                                    <a href="javascript:;" class="btn btn-danger pull-left os-remove-role"
                                        data-os-prompt="Are you sure you want to delete this role?"
                                        data-os-after-call="latepointRoleManagerAddonAdmin.role_deleted"
                                        data-os-pass-this="yes" data-os-action="roles__destroy"
                                        data-os-params="wp_role=role_AuuNwSTd">Delete </a>
                                    <button type="submit" class="os-form-block-save-btn btn btn-primary"><span>Save
                                            Changes</span></button>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;" data-os-prompt="Are you sure you want to delete this role?"
                            data-os-after-call="latepointRoleManagerAddonAdmin.role_deleted" data-os-pass-this="yes"
                            data-os-action="roles__destroy" data-os-params="wp_role=role_AuuNwSTd"
                            class="os-remove-form-block"><i class="latepoint-icon latepoint-icon-cross"></i></a>
                    </form>
                </div>
                <div class="os-add-box" data-os-after-call="latepointRoleManagerAddonAdmin.init_new_role_form"
                    data-os-action="roles__new_form" data-os-output-target-do="append"
                    data-os-output-target=".os-custom-roles-w">
                    <div class="add-box-graphic-w">
                        <div class="add-box-plus"><i class="latepoint-icon latepoint-icon-plus4"></i></div>
                    </div>
                    <div class="add-box-label">Create Custom Role</div>
                </div>
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
            val.val('off');
        } else {
            obj.removeClass('off');
            obj.addClass('on');
            val.val('on');
        }
    });

    $('body').on('click', '.os-remove-role', function () {
        if (confirm($(this).attr('data-os-prompt'))) {
            $(this).parents('.os-custom-roles-w').remove();
        }
    });

    $('body').on('click', '.os-remove-form-block', function () {
        if (confirm($(this).attr('data-os-prompt'))) {
            $(this).parents('.os-custom-roles-w').remove();
        }
    });

    $('body').on('click', '.os-form-block-header', function () {
        $(this).parents('.os-user-type-form').toggleClass('os-is-editing');
    });

    $('.os-add-box').click(function () {
        $('.new-custom-form').css('display', 'block');
    });

    $('.role-user-wrapper').click(function () {
        $('body').append(`
            <div class="latepoint-side-panel-w"><div class="latepoint-side-panel-i">
                <form action="" data-os-action="roles__update_wp_user" class="role-user-edit-form">
                    <div class="os-form-header">
                        <h2>Edit User</h2>
                        <a href="#" class="latepoint-side-panel-close latepoint-side-panel-close-trigger"><i class="latepoint-icon latepoint-icon-x"></i></a>
                    </div>
                    <div class="os-form-content">
                            <div class="ru-main-info">
                                <div class="ru-avatar" style="background-image: url(https://secure.gravatar.com/avatar/ea50452414da73d7519f0cf07b2831fe?s=96&amp;d=mm&amp;r=g)"></div>
                                <div class="ru-wp-user-name">
                                    <div class="ru-name">Sandbox Site Admin</div>
                                    <div class="ru-email">lnicely@me.com</div>
                                    <div class="ru-user-meta">
                                        <div class="ru-role">Administrator</div>
                                        <a href="profile.php" target="__blank" class="ru-wp-user-link">
                                            <span>WP User</span>
                                            <i class="latepoint-icon latepoint-icon-external-link"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                                        <div class="os-form-sub-header">
                                <h3>Allowed Records</h3>
                            </div>
                            <div class="latepoint-message latepoint-message-subtle">This user has "Administrator" role and can access all records</div>
                            <div class="os-form-sub-header">
                                <h3>Permitted Actions</h3>
                                            </div>
                            <div class="custom-user-capabilities-w" style="display: none;">
                                <div class="role-actions-grid">
                                    <div class="role-actions-item"><h3>Agents</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[agent__view]" value="on" id="capabilities_agent_view"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_agent_view"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>View</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[agent__delete]" value="on" id="capabilities_agent_delete"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_agent_delete"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Delete</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[agent__create]" value="on" id="capabilities_agent_create"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_agent_create"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Create</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[agent__edit]" value="on" id="capabilities_agent_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_agent_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Services</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[service__view]" value="on" id="capabilities_service_view"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_service_view"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>View</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[service__delete]" value="on" id="capabilities_service_delete"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_service_delete"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Delete</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[service__create]" value="on" id="capabilities_service_create"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_service_create"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Create</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[service__edit]" value="on" id="capabilities_service_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_service_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Locations</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[location__view]" value="on" id="capabilities_location_view"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_location_view"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>View</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[location__delete]" value="on" id="capabilities_location_delete"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_location_delete"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Delete</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[location__create]" value="on" id="capabilities_location_create"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_location_create"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Create</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[location__edit]" value="on" id="capabilities_location_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_location_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Bookings</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[booking__view]" value="on" id="capabilities_booking_view"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_booking_view"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>View</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[booking__delete]" value="on" id="capabilities_booking_delete"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_booking_delete"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Delete</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[booking__create]" value="on" id="capabilities_booking_create"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_booking_create"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Create</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[booking__edit]" value="on" id="capabilities_booking_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_booking_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Customers</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[customer__view]" value="on" id="capabilities_customer_view"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_customer_view"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>View</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[customer__delete]" value="on" id="capabilities_customer_delete"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_customer_delete"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Delete</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[customer__create]" value="on" id="capabilities_customer_create"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_customer_create"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Create</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[customer__edit]" value="on" id="capabilities_customer_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_customer_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Transactions</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[transaction__view]" value="on" id="capabilities_transaction_view"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_transaction_view"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>View</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[transaction__delete]" value="on" id="capabilities_transaction_delete"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_transaction_delete"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Delete</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[transaction__create]" value="on" id="capabilities_transaction_create"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_transaction_create"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Create</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[transaction__edit]" value="on" id="capabilities_transaction_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_transaction_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Activity Logs</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[activity__view]" value="on" id="capabilities_activity_view"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_activity_view"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>View</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[activity__delete]" value="on" id="capabilities_activity_delete"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_activity_delete"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Delete</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[activity__create]" value="on" id="capabilities_activity_create"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_activity_create"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Create</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[activity__edit]" value="on" id="capabilities_activity_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_activity_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Chat</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[chat__edit]" value="on" id="capabilities_chat_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_chat_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Resource Schedules</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[resource_schedule__edit]" value="on" id="capabilities_resource_schedule_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_resource_schedule_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Settings</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[settings__edit]" value="on" id="capabilities_settings_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_settings_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Connections</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[connection__edit]" value="on" id="capabilities_connection_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_connection_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div><div class="role-actions-item"><h3>Coupons</h3><div class="role-actions-action"><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[coupon__view]" value="on" id="capabilities_coupon_view"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_coupon_view"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>View</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[coupon__delete]" value="on" id="capabilities_coupon_delete"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_coupon_delete"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Delete</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[coupon__create]" value="on" id="capabilities_coupon_create"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_coupon_create"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Create</label></div></div></div><div class="role-toggler-wrapper"><div class="os-form-group os-form-toggler-group  size-small"><input type="hidden" name="capabilities[coupon__edit]" value="on" id="capabilities_coupon_edit"><div class="os-toggler on size-small" data-is-string-value="true" data-for="capabilities_coupon_edit"><div class="toggler-rail"><div class="toggler-pill"></div></div></div><div class="os-toggler-label-w"><label>Edit</label></div></div></div></div></div>		    </div>
                            </div>
                            <div class="default-user-capabilities-w" style="">
                                <div class="latepoint-message latepoint-message-subtle">Permitted actions are defined by user's role settings.</div>
                            </div>
                    </div>
                    <div class="os-form-buttons">
                        <input type="hidden" name="wp_user_id" value="33510" id="wp_user_id">		<button type="button" class="btn btn-primary btn-lg btn-block w-100 save-sidebar">Save Changes</button>
                    </div>
                </form>
            </div><div class="latepoint-side-panel-shadow"></div></div>
            `)
    });

    $('body').on('click', '.latepoint-side-panel-close, .save-sidebar', function () {
        $('.latepoint-side-panel-w').remove();
    })
</script>
@endsection