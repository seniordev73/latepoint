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
            <a href="{{ url('/admin/settings/processes') }}" class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">Processes</h4>
            </a>
            <a href="{{ url('/admin/settings/process_jobs') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Scheduled Jobs</h4>
            </a>
            <a href="{{ url('/admin/settings/activities') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Activity Log</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            @foreach ($processes as $process)
                        <div class="os-processes-w os-form-blocks-w">
                            <form action="{{route('admin.settings-updateprocesses', $process->id)}}" method="post"
                                data-os-action="processes__save" data-os-after-call="latepoint_process_updated"
                                class="os-process-form os-form-block os-form-block-type- status-active">
                                @csrf
                                @php
                                    $value = unserialize($process->actions_json);
                                @endphp

                                <div class="os-form-block-i">
                                    <div class="os-form-block-header">
                                        <div class="os-form-block-drag"></div>
                                        <div class="os-form-block-name">{{$process->name}}</div>
                                        <div class="os-form-block-type"></div>
                                        <div class="os-form-block-edit-btn"><i class="latepoint-icon latepoint-icon-edit-3"></i>
                                        </div>
                                    </div>
                                    <div class="os-form-block-params os-form-w">
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">

                                                <h3>Status</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                    <select name="process[status]" id="process_status" class="os-form-control">
                                                        <option value="active" <?php    echo ($process->status == "active" ? 'selected' : ''); ?>>Active</option>
                                                        <option value="disabled" <?php    echo ($process->status == "disabled" ? 'selected' : ''); ?>>Disabled</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>Name</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label">
                                                    <input type="text" placeholder="Process Name" name="process[name]"
                                                        value="{{$process->name}}" theme="bordered"
                                                        class="os-form-block-name-input os-form-control" id="process_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>Event Type</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                                        name="process[event][type]"
                                                        class="process-event-type-selector os-form-control"
                                                        data-route="processes__reload_event_trigger_conditions"
                                                        id="process_event_type">
                                                        <option value="booking_created" <?php    echo (htmlspecialchars($value['event']['type']) == "booking_created" ? 'selected' : ''); ?>>Booking Created</option>
                                                        <option value="booking_updated" <?php    echo (htmlspecialchars($value['event']['type']) == "booking_updated" ? 'selected' : ''); ?>>Booking Updated</option>
                                                        <option value="booking_start" <?php    echo (htmlspecialchars($value['event']['type']) == "booking_start" ? 'selected' : ''); ?>>Booking Started</option>
                                                        <option value="booking_end" <?php    echo (htmlspecialchars($value['event']['type']) == "booking_end" ? 'selected' : ''); ?>>Booking Ended</option>
                                                        <option value="customer_created" <?php    echo (htmlspecialchars($value['event']['type']) == "customer_created" ? 'selected' : ''); ?>>Customer Created</option>
                                                        <option value="transaction_created" <?php    echo (htmlspecialchars($value['event']['type']) == "transaction_created" ? 'selected' : ''); ?>>Transaction Created</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="process-event-condition-wrapper">
                                            <div class="sub-section-row">
                                                <div class="sub-section-label">
                                                    <h3>Conditional</h3>
                                                </div>
                                                <div class="sub-section-content">
                                                    <div
                                                        class="os-form-group os-form-toggler-group  size-normal process_event_conditional">
                                                        <input type="hidden" name="process[event][conditional]"
                                                            value="{{htmlspecialchars($value['event']['conditional'])}}"
                                                            id="process_event_conditional">
                                                        <div data-controlled-toggle-id="pe-conditions-for-pe_ZuOF5X"
                                                            class="os-toggler size-normal {{htmlspecialchars($value['event']['conditional'])}}"
                                                            data-is-string-value="true" data-for="process_event_conditional">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Trigger only when specific conditions
                                                                are
                                                                met</label></div>
                                                    </div>
                                                    <div class="pe-conditions" id="pe-conditions-for-pe_ZuOF5X"
                                                        style="<?php    echo htmlspecialchars($value['event']['conditional']) === 'on' ? '' : 'display:none;' ?>">
                                                        <div class="pe-conditions-heading">Trigger only if:</div>
                                                        @foreach ($value['event']['trigger_conditions'] as $key => $item)
                                                            <div class="pe-condition" data-condition-id="{{$key}}"><button
                                                                    class="pe-remove-condition"><i
                                                                        class="latepoint-icon latepoint-icon-cross"></i></button>
                                                                <div class="process-condition-properties-w">
                                                                    <div
                                                                        class="os-form-group os-form-select-group os-form-group-transparent">
                                                                        <select
                                                                            name="process[event][trigger_conditions][{{$key}}][property]"
                                                                            class="process-condition-property-selector os-form-control"
                                                                            data-route="processes__available_operators_for_trigger_condition_property"
                                                                            id="process_event_trigger_conditions_pec_zj8ja6_property">
                                                                            <option value="booking__service_id" <?php        echo ($item['property']) == "booking__service_id" ? 'selected' : ''; ?>>Service</option>
                                                                            <option value="booking__agent_id" <?php        echo ($item['property']) == "booking__agent_id" ? 'selected' : ''; ?>>Agent</option>
                                                                            <option value="booking__status" <?php        echo ($item['property']) == "booking__status" ? 'selected' : ''; ?>>Status</option>
                                                                            <option value="booking__payment_status" <?php        echo ($item['property']) == "booking__payment_status" ? 'selected' : ''; ?>>Payment Status</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="process-condition-operators-w">
                                                                    <div
                                                                        class="os-form-group os-form-select-group os-form-group-transparent">
                                                                        <select
                                                                            name="process[event][trigger_conditions][{{$key}}][operator]"
                                                                            class="process-condition-operator-selector os-form-control"
                                                                            data-route="processes__available_values_for_trigger_condition_property"
                                                                            id="process_event_trigger_conditions_pec_zj8ja6_operator">
                                                                            <option value="equal" <?php        echo ($item['operator']) == "equal" ? 'selected' : ''; ?>>is
                                                                                equal to</option>
                                                                            <option value="not_equal" <?php        echo ($item['operator']) == "not_equal" ? 'selected' : ''; ?>>
                                                                                is not equal to</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="process-condition-values-w" style="">
                                                                    <div
                                                                        class="os-form-group os-form-select-group os-form-group-transparent">
                                                                        <div class="lateselect-w">
                                                                            <select
                                                                                id=" process_event_trigger_conditions_pec_zj8ja6_value"
                                                                                class="os-late-select os-late-select-active"
                                                                                data-placeholder="Click to select..." multiple=""
                                                                                style="display: none;">
                                                                                <option value="1">Tooth Whitening</option>
                                                                                <option value="2">Invisilign Braces</option>
                                                                                <option value="3">Group Booking</option>
                                                                                <option value="4">Porcelain Crown</option>
                                                                                <option value="5">Root Canal Therapy</option>
                                                                                <option value="6">Gum Decease</option>
                                                                            </select>
                                                                            <div class="ls-selected-items-w">
                                                                                <div class="ls-placeholder">Click to select...</div>
                                                                            </div>
                                                                            <div class="ls-all-items-w">
                                                                                <div class="ls-item " data-value="1">Tooth Whitening
                                                                                </div>
                                                                                <div class="ls-item " data-value="2">Invisilign Braces
                                                                                </div>
                                                                                <div class="ls-item " data-value="3">Group Booking</div>
                                                                                <div class="ls-item " data-value="4">Porcelain Crown
                                                                                </div>
                                                                                <div class="ls-item " data-value="5">Root Canal Therapy
                                                                                </div>
                                                                                <div class="ls-item " data-value="6">Gum Decease</div>
                                                                            </div>
                                                                        </div><input type="hidden"
                                                                            name="process[event][trigger_conditions][{{$key}}][value]"
                                                                            value="">
                                                                    </div>
                                                                </div>
                                                                <div data-os-action="processes__new_trigger_condition"
                                                                    data-os-pass-response="yes" data-os-pass-this="yes"
                                                                    data-os-before-after="none"
                                                                    data-os-params="event_type=booking_created"
                                                                    data-os-after-call="latepoint_add_process_condition"><button
                                                                        type="button" onclick="addPeCondition(this)"
                                                                        class="btn btn-outline-primary"><i
                                                                            class="latepoint-icon latepoint-icon-plus2"></i><span>AND</span></button>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>Time offset</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div
                                                    class="os-form-group os-form-toggler-group  size-normal process_event_has_time_offset">
                                                    <input type="hidden" name="process[event][has_time_offset]"
                                                        value="{{$value['event']['has_time_offset']}}"
                                                        id="process_event_has_time_offset">
                                                    <div data-controlled-toggle-id="pe-conditions-for-pe_C0UjnF"
                                                        class="os-toggler size-normal {{$value['event']['has_time_offset']}}"
                                                        data-is-string-value="true" data-for="process_event_has_time_offset">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Execute actions with a time
                                                            offset</label></div>
                                                </div>
                                                <div class="pe-conditions" id="pe-conditions-for-pe_C0UjnF"
                                                    style="<?php    echo htmlspecialchars($value['event']['has_time_offset']) === 'on' ? '' : 'display:none;' ?>">
                                                    <div class="time-offset-actions">
                                                        <div class="time-offset-label">Actions will be executed:</div>
                                                        <div
                                                            class="os-form-group os-form-textfield-group os-form-group-bordered has-value no-label">
                                                            <input type="number" placeholder=""
                                                                name="process[event][time_offset][value]"
                                                                value="{{$value['event']['time_offset']['value']}}" theme="bordered"
                                                                min="1" id="process_event_time_offset_value"
                                                                class="os-form-control">
                                                        </div>
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <select name="process[event][time_offset][unit]"
                                                                id="process_event_time_offset_unit" class="os-form-control">
                                                                <option value="minute" <?php    echo $value['event']['time_offset']['unit'] == "minute" ? 'selected' : ''; ?>>minutes</option>
                                                                <option value="hour" <?php    echo $value['event']['time_offset']['unit'] == "hour" ? 'selected' : ''; ?>>hours</option>
                                                                <option value="day" <?php    echo $value['event']['time_offset']['unit'] == "day" ? 'selected' : ''; ?>>days</option>
                                                            </select>
                                                        </div>
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <select name="process[event][time_offset][before_after]"
                                                                id="process_event_time_offset_before_after" class="os-form-control">
                                                                <option value="before" <?php    echo $value['event']['time_offset']['before_after'] == "before" ? 'selected' : ''; ?>>before the event</option>
                                                                <option value="after" <?php    echo $value['event']['time_offset']['before_after'] == "after" ? 'selected' : ''; ?>>after the event</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>Actions</h3>
                                            </div>

                                            <div class="sub-section-content">
                                                @foreach ($value['actions'] as $key => $item)
                                                    <div class="process-action-form pa-type-send_email pa-status-active"
                                                        data-id="pa_NF3Iic">
                                                        <div class="process-action-heading">
                                                            <div class="process-action-status"></div>
                                                            <div class="process-action-icon"></div>
                                                            <div class="process-action-name">Send Email</div>

                                                            <div class="process-action-chevron"><i
                                                                    class="latepoint-icon latepoint-icon-chevron-down"></i></div>
                                                            <a href="javascript:;"
                                                                class="process-action-remove os-remove-process-action"
                                                                data-os-prompt="Are you sure you want to delete this action?"><i
                                                                    class="latepoint-icon latepoint-icon-cross"></i></a>
                                                        </div>
                                                        <div class="process-action-content">
                                                            <div class="os-row">
                                                                <div class="os-col-10">
                                                                    <div
                                                                        class="os-form-group os-form-select-group os-form-group-transparent">
                                                                        <label for="process_actions_pa_nf3iic_type">Action
                                                                            Type</label><select name="process[actions][{{$key}}][type]"
                                                                            class="process-action-type os-form-control"
                                                                            data-action-id="pa_NF3Iic"
                                                                            data-route="processes__load_action_settings"
                                                                            id="process_actions_pa_nf3iic_type">
                                                                            <option value="send_email" <?php        echo $item['type'] == "send_email" ? 'selected' : ''; ?>>Send
                                                                                Email</option>
                                                                            <option value="send_sms" <?php        echo $item['type'] == "send_sms" ? 'selected' : ''; ?>>Send SMS
                                                                            </option>
                                                                            <option value="trigger_webhook" <?php        echo $item['type'] == "trigger_webhook" ? 'selected' : ''; ?>>
                                                                                HTTP Request</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="os-col-2">
                                                                    <div
                                                                        class="os-form-group os-form-select-group os-form-group-transparent">
                                                                        <label
                                                                            for="process_actions_pa_nf3iic_status">Status</label><select
                                                                            name="process[actions][{{$key}}][status]"
                                                                            id="process_actions_pa_nf3iic_status"
                                                                            class="os-form-control">
                                                                            <option value="active" <?php        echo $item['status'] == "active" ? 'selected' : ''; ?>>Active</option>
                                                                            <option value="disabled" <?php        echo $item['status'] == "disabled" ? 'selected' : ''; ?>>
                                                                                Disabled</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="process-action-settings">
                                                                <div class="process-action-controls-wrapper"><a href="javascript:;"
                                                                        data-os-after-call="latepoint_init_template_library"
                                                                        data-os-params="action_id=pa_NF3Iic&amp;action_type=send_email"
                                                                        data-os-lightbox-classes="width-1000"
                                                                        data-os-action="notifications__templates_index"
                                                                        data-os-output-target="lightbox"
                                                                        class="latepoint-btn latepoint-btn-outline latepoint-btn-sm"><i
                                                                            class="latepoint-icon latepoint-icon-book"></i><span>Load
                                                                            from
                                                                            template</span></a><a href="javascript:;"
                                                                        class="latepoint-btn latepoint-btn-outline latepoint-btn-sm open-template-variables-panel"><i
                                                                            class="latepoint-icon latepoint-icon-zap"></i><span>Show
                                                                            smart
                                                                            variables</span></a></div>
                                                                <div class="os-row">
                                                                    <div class="os-col-6">
                                                                        <div
                                                                            class="os-form-group os-form-textfield-group os-form-group-simple">
                                                                            <label for="process_actions_pa_nf3iic_settings_to_email">To
                                                                                Email</label><input type="text"
                                                                                placeholder="To email address"
                                                                                name="process[actions][{{$key}}][settings][to_email]"
                                                                                value="{{$item['settings']['to_email']}}"
                                                                                id="process_actions_pa_nf3iic_settings_to_email"
                                                                                class="os-form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="os-col-6">
                                                                        <div
                                                                            class="os-form-group os-form-textfield-group os-form-group-simple">
                                                                            <label
                                                                                for="process_actions_pa_nf3iic_settings_subject">Email
                                                                                Subject</label><input type="text"
                                                                                placeholder="Email Subject"
                                                                                name="process[actions][{{$key}}][settings][subject]"
                                                                                value="{{$item['settings']['subject']}}"
                                                                                id="process_actions_pa_nf3iic_settings_subject"
                                                                                class="os-form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div id="full-editor1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="process-buttons">
                                                                <a href="javascript:;"
                                                                    class="latepoint-btn latepoint-btn-danger pull-left os-remove-process-action"
                                                                    data-os-prompt="Are you sure you want to delete this action?">Delete</a>
                                                                <a href="javascript:;" data-route="processes__action_test_preview"
                                                                    class="latepoint-btn latepoint-btn-secondary os-run-process-action"><i
                                                                        class="latepoint-icon latepoint-icon-play-circle"></i><span>Test
                                                                        this
                                                                        action</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <a href="javascript:;" id="new_action"
                                                    class="latepoint-btn latepoint-btn-block latepoint-btn-outline"
                                                    data-os-after-call="latepoint_init_added_process_action_form"
                                                    data-os-pass-this="yes" data-os-action="processes__new_action"
                                                    data-os-before-after="before">
                                                    <i class="latepoint-icon latepoint-icon-plus"></i>
                                                    <span>Add Action</span>
                                                </a>
                                            </div>


                                        </div>
                                        <div class="os-form-block-buttons">
                                            <a href="/resource/deleteprocesses/{{$process->id}}"
                                                class="latepoint-btn latepoint-btn-danger pull-left os-remove-process"
                                                data-os-prompt="Are you sure you want to delete this process?"
                                                data-os-after-call="latepoint_process_action_removed" data-os-pass-this="yes"
                                                data-os-action="processes__destroy" data-os-params="_wpnonce=90dc251364">Delete </a>
                                            <a href="javascript:;" class="latepoint-btn latepoint-btn-secondary os-run-process"
                                                data-route="processes__test_preview"><i
                                                    class="latepoint-icon latepoint-icon-play-circle"></i><span>Test this
                                                    process</span></a>
                                            <button type="submit"
                                                class="os-form-block-save-btn latepoint-btn latepoint-btn-primary"><span>Update
                                                    Process</span></button>
                                        </div>
                                    </div>
                                </div>
                                <a href="/resource/deleteprocesses/{{$process->id}}"
                                    data-os-prompt="Are you sure you want to delete this process?"
                                    data-os-after-call="latepoint_process_action_removed" data-os-pass-this="yes"
                                    data-os-action="processes__destroy" data-os-params="_wpnonce=90dc251364"
                                    class="os-remove-form-block"><i class="latepoint-icon latepoint-icon-cross"></i></a>
                                {{-- <input type="hidden" name="process[id]" value="" class="os-form-block-id" id="process_id">
                                <input type="hidden" id="_wpnonce" name="_wpnonce" value="c05095649a">
                                <input type="hidden" name="_wp_http_referer" value="/demo_4217c15f9eb342a2/wp-admin/admin-ajax.php">
                                --}}
                            </form>
                        </div>
            @endforeach


            <div class="os-add-box" data-os-after-call="latepoint_init_process_conditions_form"
                data-os-action="processes__new_form" data-os-output-target-do="append"
                data-os-output-target=".os-processes-w">
                <div class="add-box-graphic-w">
                    <div class="add-box-plus"><i class="latepoint-icon latepoint-icon-plus4"></i></div>
                </div>
                <div class="add-box-label">Add Process</div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('/assets/jquery.js') }}"></script>
<script>
    let order = 1;
    function addPeCondition(obj) {
        order++;
        console.log(order);
        $(obj).parents('.pe-conditions').append(`
                    <div class="pe-condition" data-condition-id="pec_dEgOqa">
                        <button class="pe-remove-condition" type="button">
                            <i class="latepoint-icon latepoint-icon-cross"></i></button>
                            <div class="process-condition-properties-w">
                                <div class="os-form-group os-form-select-group os-form-group-transparent">
                                    <select name="process[event][trigger_conditions][order${order}][property]" class="process-condition-property-selector os-form-control" data-route="processes__available_operators_for_trigger_condition_property" id="process_event_trigger_conditions_pec_degoqa_property">
                                        <option value="booking__service_id" selected="">Service</option>
                                        <option value="booking__agent_id">Agent</option>
                                        <option value="booking__status">Status</option>
                                        <option value="booking__payment_status">Payment Status</option>
                                    </select>
                                </div>
                            </div>
                            <div class="process-condition-operators-w">
                                <div class="os-form-group os-form-select-group os-form-group-transparent">
                                    <select name="process[event][trigger_conditions][order${order}][operator]" class="process-condition-operator-selector os-form-control" data-route="processes__available_values_for_trigger_condition_property" id="process_event_trigger_conditions_pec_degoqa_operator">
                                        <option value="equal" selected="">is equal to</option>
                                        <option value="not_equal">is not equal to</option>
                                    </select>
                                </div>
                            </div>
                            <div class="process-condition-values-w" style="">
                                <div class="os-form-group os-form-select-group os-form-group-transparent">
                                    <div class="lateselect-w"><select "="" id="process_event_trigger_conditions_pec_degoqa_value" class="os-late-select os-late-select-active" data-placeholder="Click to select..." multiple="" style="display: none;">
                                        <option value="1">Tooth Whitening</option>
                                        <option value="2">Invisilign Braces</option>
                                        <option value="3">Group Booking</option>
                                        <option value="4">Porcelain Crown</option>
                                        <option value="5">Root Canal Therapy</option>
                                        <option value="6">Gum Decease</option>
                                    </select>
                                    <div class="ls-selected-items-w">
                                    <div class="ls-placeholder">Click to select...</div>
                                </div>
                                <div class="ls-all-items-w">
                                    <div class="ls-item " data-value="1">Tooth Whitening</div>
                                    <div class="ls-item " data-value="2">Invisilign Braces</div>
                                    <div class="ls-item " data-value="3">Group Booking</div>
                                    <div class="ls-item " data-value="4">Porcelain Crown</div>
                                    <div class="ls-item " data-value="5">Root Canal Therapy</div>
                                    <div class="ls-item " data-value="6">Gum Decease</div>
                                </div>
                            </div>
                            <input type="hidden" name="process[event][trigger_conditions][order${order}][value]" value="">
                        </div>
                    </div>
                    <div data-os-action="processes__new_trigger_condition" data-os-pass-response="yes" data-os-pass-this="yes" data-os-before-after="none" data-os-params="event_type=booking_created" data-os-after-call="latepoint_add_process_condition" class="">
                        <button type="button" class="btn btn-outline-primary" onclick="addPeCondition(this)">
                            <i class="latepoint-icon latepoint-icon-plus2"></i>
                            <span>AND</span>
                        </button>
                    </div>
                  </div>
                `)
    }

    $('.os-add-box').click(function () {
        $(this).before(`
                <div class="os-processes-w os-form-blocks-w">
                    <form action="{{route('admin.settings-storeprocesses')}}" method="post" data-os-action="processes__save" data-os-after-call="latepoint_process_updated" class="os-process-form os-form-block os-form-block-type- status-active os-is-editing">
                        @csrf
                        <div class="os-form-block-i">
                            <div class="os-form-block-header">
                                <div class="os-form-block-drag"></div>
                                <div class="os-form-block-name">New Process</div>
                                <div class="os-form-block-type"></div>
                                <div class="os-form-block-edit-btn"><i class="latepoint-icon latepoint-icon-edit-3"></i></div>
                            </div>
                            <div class="os-form-block-params os-form-w">
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Status</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                                name="process[status]" id="process_status" class="os-form-control">
                                                <option value="active" selected="">Active</option>
                                                <option value="disabled">Disabled</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Name</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label"><input
                                                type="text" placeholder="Process Name" name="process[name]" value="" theme="bordered"
                                                class="os-form-block-name-input os-form-control" id="process_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Event Type</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                                name="process[event][type]" class="process-event-type-selector os-form-control"
                                                data-route="processes__reload_event_trigger_conditions" id="process_event_type">
                                                <option value="booking_created" selected="">Booking Created</option>
                                                <option value="booking_updated">Booking Updated</option>
                                                <option value="booking_start">Booking Started</option>
                                                <option value="booking_end">Booking Ended</option>
                                                <option value="customer_created">Customer Created</option>
                                                <option value="transaction_created">Transaction Created</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="process-event-condition-wrapper">
                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Conditional</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <div class="os-form-group os-form-toggler-group  size-normal process_event_conditional">
                                                <input type="hidden" name="process[event][conditional]" value="on"
                                                    id="process_event_conditional">
                                                <div data-controlled-toggle-id="pe-conditions-for-pe_ZuOF5X"
                                                    class="os-toggler size-normal off" data-is-string-value="true"
                                                    data-for="process_event_conditional">
                                                    <div class="toggler-rail">
                                                        <div class="toggler-pill"></div>
                                                    </div>
                                                </div>
                                                <div class="os-toggler-label-w"><label>Trigger only when specific conditions are
                                                        met</label></div>
                                            </div>
                                            <div class="pe-conditions" id="pe-conditions-for-pe_ZuOF5X" style="display: none;">
                                                <div class="pe-conditions-heading">Trigger only if:</div>
                                                <div class="pe-condition" data-condition-id="pec_ZJ8JA6"><button
                                                        class="pe-remove-condition"><i
                                                            class="latepoint-icon latepoint-icon-cross"></i></button>
                                                    <div class="process-condition-properties-w">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <select name="process[event][trigger_conditions][pec_ZJ8JA6][property]"
                                                                class="process-condition-property-selector os-form-control"
                                                                data-route="processes__available_operators_for_trigger_condition_property"
                                                                id="process_event_trigger_conditions_pec_zj8ja6_property">
                                                                <option value="booking__service_id" selected="">Service</option>
                                                                <option value="booking__agent_id">Agent</option>
                                                                <option value="booking__status">Status</option>
                                                                <option value="booking__payment_status">Payment Status</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="process-condition-operators-w">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <select name="process[event][trigger_conditions][pec_ZJ8JA6][operator]"
                                                                class="process-condition-operator-selector os-form-control"
                                                                data-route="processes__available_values_for_trigger_condition_property"
                                                                id="process_event_trigger_conditions_pec_zj8ja6_operator">
                                                                <option value="equal" selected="">is equal to</option>
                                                                <option value="not_equal">is not equal to</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="process-condition-values-w" style="">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <div class="lateselect-w"><select "="" id="
                                                                    process_event_trigger_conditions_pec_zj8ja6_value"
                                                                    class="os-late-select os-late-select-active"
                                                                    data-placeholder="Click to select..." multiple=""
                                                                    style="display: none;">
                                                                    <option value="1">Tooth Whitening</option>
                                                                    <option value="2">Invisilign Braces</option>
                                                                    <option value="3">Group Booking</option>
                                                                    <option value="4">Porcelain Crown</option>
                                                                    <option value="5">Root Canal Therapy</option>
                                                                    <option value="6">Gum Decease</option>
                                                                </select>
                                                                <div class="ls-selected-items-w">
                                                                    <div class="ls-placeholder">Click to select...</div>
                                                                </div>
                                                                <div class="ls-all-items-w">
                                                                    <div class="ls-item " data-value="1">Tooth Whitening</div>
                                                                    <div class="ls-item " data-value="2">Invisilign Braces</div>
                                                                    <div class="ls-item " data-value="3">Group Booking</div>
                                                                    <div class="ls-item " data-value="4">Porcelain Crown</div>
                                                                    <div class="ls-item " data-value="5">Root Canal Therapy</div>
                                                                    <div class="ls-item " data-value="6">Gum Decease</div>
                                                                </div>
                                                            </div><input type="hidden"
                                                                name="process[event][trigger_conditions][pec_ZJ8JA6][value]" value="">
                                                        </div>
                                                    </div>
                                                    <div data-os-action="processes__new_trigger_condition" data-os-pass-response="yes"
                                                        data-os-pass-this="yes" data-os-before-after="none"
                                                        data-os-params="event_type=booking_created"
                                                        data-os-after-call="latepoint_add_process_condition"><button type="button"
                                                            onclick="addPeCondition(this)" class="btn btn-outline-primary"><i
                                                                class="latepoint-icon latepoint-icon-plus2"></i><span>AND</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Time offset</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-form-group os-form-toggler-group  size-normal process_event_has_time_offset"><input
                                                type="hidden" name="process[event][has_time_offset]" value="on"
                                                id="process_event_has_time_offset">
                                            <div data-controlled-toggle-id="pe-conditions-for-pe_C0UjnF" class="os-toggler size-normal off"
                                                data-is-string-value="true" data-for="process_event_has_time_offset">
                                                <div class="toggler-rail">
                                                    <div class="toggler-pill"></div>
                                                </div>
                                            </div>
                                            <div class="os-toggler-label-w"><label>Execute actions with a time offset</label></div>
                                        </div>
                                        <div class="pe-conditions" id="pe-conditions-for-pe_C0UjnF" style="display: none;">
                                            <div class="time-offset-actions">
                                                <div class="time-offset-label">Actions will be executed:</div>
                                                <div
                                                    class="os-form-group os-form-textfield-group os-form-group-bordered has-value no-label">
                                                    <input type="number" placeholder="" name="process[event][time_offset][value]" value="1"
                                                        theme="bordered" min="1" id="process_event_time_offset_value"
                                                        class="os-form-control"></div>
                                                <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                                        name="process[event][time_offset][unit]" id="process_event_time_offset_unit"
                                                        class="os-form-control">
                                                        <option value="minute">minutes</option>
                                                        <option value="hour">hours</option>
                                                        <option value="day" selected="">days</option>
                                                    </select></div>
                                                <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                                        name="process[event][time_offset][before_after]"
                                                        id="process_event_time_offset_before_after" class="os-form-control">
                                                        <option value="before">before the event</option>
                                                        <option value="after" selected="">after the event</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Actions</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="process-action-form pa-type-send_email pa-status-active is-editing" data-id="pa_NF3Iic">
                                            <div class="process-action-heading">
                                                <div class="process-action-status"></div>
                                                <div class="process-action-icon"></div>
                                                <div class="process-action-name">Send Email</div>

                                                <div class="process-action-chevron"><i
                                                        class="latepoint-icon latepoint-icon-chevron-down"></i></div>
                                                <a href="javascript:;" class="process-action-remove os-remove-process-action"
                                                    data-os-prompt="Are you sure you want to delete this action?"><i
                                                        class="latepoint-icon latepoint-icon-cross"></i></a>
                                            </div>
                                            <div class="process-action-content">
                                                <div class="os-row">
                                                    <div class="os-col-10">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent"><label
                                                                for="process_actions_pa_nf3iic_type">Action Type</label><select
                                                                name="process[actions][pa_NF3Iic][type]"
                                                                class="process-action-type os-form-control" data-action-id="pa_NF3Iic"
                                                                data-route="processes__load_action_settings"
                                                                id="process_actions_pa_nf3iic_type">
                                                                <option value="send_email" selected="">Send Email</option>
                                                                <option value="send_sms">Send SMS</option>
                                                                <option value="trigger_webhook">HTTP Request</option>
                                                            </select></div>
                                                    </div>
                                                    <div class="os-col-2">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent"><label
                                                                for="process_actions_pa_nf3iic_status">Status</label><select
                                                                name="process[actions][pa_NF3Iic][status]"
                                                                id="process_actions_pa_nf3iic_status" class="os-form-control">
                                                                <option value="active" selected="">Active</option>
                                                                <option value="disabled">Disabled</option>
                                                            </select></div>
                                                    </div>
                                                </div>
                                                <div class="process-action-settings">
                                                    <div class="process-action-controls-wrapper"><a href="javascript:;"
                                                            data-os-after-call="latepoint_init_template_library"
                                                            data-os-params="action_id=pa_NF3Iic&amp;action_type=send_email"
                                                            data-os-lightbox-classes="width-1000"
                                                            data-os-action="notifications__templates_index" data-os-output-target="lightbox"
                                                            class="latepoint-btn latepoint-btn-outline latepoint-btn-sm"><i
                                                                class="latepoint-icon latepoint-icon-book"></i><span>Load from
                                                                template</span></a><a href="javascript:;"
                                                            class="latepoint-btn latepoint-btn-outline latepoint-btn-sm open-template-variables-panel"><i
                                                                class="latepoint-icon latepoint-icon-zap"></i><span>Show smart
                                                                variables</span></a></div>
                                                    <div class="os-row">
                                                        <div class="os-col-6">
                                                            <div class="os-form-group os-form-textfield-group os-form-group-simple"><label
                                                                    for="process_actions_pa_nf3iic_settings_to_email">To Email</label><input
                                                                    type="text" placeholder="To email address"
                                                                    name="process[actions][pa_NF3Iic][settings][to_email]" value=""
                                                                    id="process_actions_pa_nf3iic_settings_to_email"
                                                                    class="os-form-control"></div>
                                                        </div>
                                                        <div class="os-col-6">
                                                            <div class="os-form-group os-form-textfield-group os-form-group-simple"><label
                                                                    for="process_actions_pa_nf3iic_settings_subject">Email
                                                                    Subject</label><input type="text" placeholder="Email Subject"
                                                                    name="process[actions][pa_NF3Iic][settings][subject]" value=""
                                                                    id="process_actions_pa_nf3iic_settings_subject" class="os-form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div id="full-editor1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="process-buttons">
                                                    <a href="javascript:;"
                                                        class="latepoint-btn latepoint-btn-danger pull-left os-remove-process-action"
                                                        data-os-prompt="Are you sure you want to delete this action?">Delete</a>
                                                    <a href="javascript:;" data-route="processes__action_test_preview"
                                                        class="latepoint-btn latepoint-btn-secondary os-run-process-action"><i
                                                            class="latepoint-icon latepoint-icon-play-circle"></i><span>Test this
                                                            action</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:;" id="new_action"
                                            class="latepoint-btn latepoint-btn-block latepoint-btn-outline"
                                            data-os-after-call="latepoint_init_added_process_action_form" data-os-pass-this="yes"
                                            data-os-action="processes__new_action" data-os-before-after="before">
                                            <i class="latepoint-icon latepoint-icon-plus"></i>
                                            <span>Add Action</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="os-form-block-buttons">
                                    <a href="javascript:;" class="latepoint-btn latepoint-btn-danger pull-left os-remove-process"
                                        data-os-prompt="Are you sure you want to delete this process?"
                                        data-os-after-call="latepoint_process_action_removed" data-os-pass-this="yes"
                                        data-os-action="processes__destroy" data-os-params="_wpnonce=90dc251364">Delete </a>
                                    <a href="javascript:;" class="latepoint-btn latepoint-btn-secondary os-run-process"
                                        data-route="processes__test_preview"><i
                                            class="latepoint-icon latepoint-icon-play-circle"></i><span>Test this process</span></a>
                                    <button type="submit" class="os-form-block-save-btn latepoint-btn latepoint-btn-primary"><span>Save
                                            Process</span></button>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;" data-os-prompt="Are you sure you want to delete this process?"
                            data-os-after-call="latepoint_process_action_removed" data-os-pass-this="yes"
                            data-os-action="processes__destroy" data-os-params="_wpnonce=90dc251364" class="os-remove-form-block"><i
                                class="latepoint-icon latepoint-icon-cross"></i></a>
                        <input type="hidden" name="process[id]" value="" class="os-form-block-id" id="process_id">
                        <input type="hidden" id="_wpnonce" name="_wpnonce" value="c05095649a">
                        <input type="hidden" name="_wp_http_referer" value="/demo_4217c15f9eb342a2/wp-admin/admin-ajax.php">
                    </form>
                </div>
                `)
    })

    $('body').on('click', '.os-form-block-header', function () {
        $(this).parents('.os-process-form').toggleClass('os-is-editing')
    })

    $('body').on('click', '.os-remove-form-block', function () {
        if (confirm($(this).attr('data-os-prompt'))) {
            $(this).parents('.os-processes-w').remove();
        }
    })

    $('body').on('click', '.os-remove-process', function () {
        if (confirm($(this).attr('data-os-prompt'))) {
            $(this).parents('.os-processes-w').remove();
        }
    })

    $('body').on('click', '.process_event_conditional', function () {
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
        $(this).parents('.sub-section-content').children('.pe-conditions').toggle();
    })

    $('body').on('click', '.process_event_has_time_offset', function () {
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
        $(this).parents('.sub-section-content').children('.pe-conditions').toggle();
    })

    $('body').on('click', '.pe-remove-condition', function () {
        if ($(this).parents('.pe-conditions').children('.pe-condition').length == 1) {
            alert('You need to have at least one condition if your custom field is set to be conditional.');
            return;
        }

        $(this).parents('.pe-condition').remove();
    });

    $('body').on('click', '#new_action', function () {
        order++;
        $(this).before(`
                    <div class="process-action-form pa-type-send_email pa-status-active is-editing" data-id="pa_NF3Iic"><div class="process-action-heading">
                        <div class="process-action-status"></div>
                        <div class="process-action-icon"></div>
                        <div class="process-action-name">Send Email</div>
                        
                        <div class="process-action-chevron"><i class="latepoint-icon latepoint-icon-chevron-down"></i></div>
                        <a href="javascript:;" class="process-action-remove os-remove-process-action" data-os-prompt="Are you sure you want to delete this action?"><i class="latepoint-icon latepoint-icon-cross"></i></a>
                    </div><div class="process-action-content"><div class="os-row"><div class="os-col-10"><div class="os-form-group os-form-select-group os-form-group-transparent"><label for="process_actions_pa_nf3iic_type">Action Type</label>
                        <select name="process[actions][order${order}][type]" class="process-action-type os-form-control" data-action-id="pa_NF3Iic" data-route="processes__load_action_settings" id="process_actions_pa_nf3iic_type">
                            <option value="send_email" selected="">Send Email</option>
                            <option value="send_sms">Send SMS</option>
                            <option value="trigger_webhook">HTTP Request</option>
                        </select>
                        </div></div>
                        <div class="os-col-2">
                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                <label for="process_actions_pa_nf3iic_status">Status</label>
                                    <select name="process[actions][order${order}][status]" id="process_actions_pa_nf3iic_status" class="os-form-control">
                                        <option value="active" selected="">Active</option><option value="disabled">Disabled</option>
                                    </select>
                            </div>
                        </div></div>
                        <div class="process-action-settings">
                            <div class="process-action-controls-wrapper">
                                <a href="javascript:;" data-os-after-call="latepoint_init_template_library" data-os-params="action_id=pa_NF3Iic&amp;action_type=send_email" data-os-lightbox-classes="width-1000" data-os-action="notifications__templates_index" data-os-output-target="lightbox" class="latepoint-btn latepoint-btn-outline latepoint-btn-sm">
                                    <i class="latepoint-icon latepoint-icon-book"></i>
                                    <span>Load from template</span>
                                </a>
                                <a href="javascript:;" class="latepoint-btn latepoint-btn-outline latepoint-btn-sm open-template-variables-panel">
                                    <i class="latepoint-icon latepoint-icon-zap"></i>
                                        <span>Show smart variables</span>
                                </a>
                            </div>
                        <div class="os-row">
                            <div class="os-col-6">
                                <div class="os-form-group os-form-textfield-group os-form-group-simple">
                                    <label for="process_actions_pa_nf3iic_settings_to_email">To Email</label>
                                    <input type="text" placeholder="To email address" name="process[actions][order${order}][settings][to_email]" value="" id="process_actions_pa_nf3iic_settings_to_email" class="os-form-control">
                                </div>
                            </div>
                            <div class="os-col-6">
                                <div class="os-form-group os-form-textfield-group os-form-group-simple">
                                    <label for="process_actions_pa_nf3iic_settings_subject">Email Subject</label>
                                    <input type="text" placeholder="Email Subject" name="process[actions][order${order}][settings][subject]" value="" id="process_actions_pa_nf3iic_settings_subject" class="os-form-control">
                                </div>
                            </div>
                        </div>
                    <div>
                    <div id="full-editor1">
                            </div></div></div><div class="process-buttons">
                        <a href="javascript:;" class="latepoint-btn latepoint-btn-danger pull-left os-remove-process-action" data-os-prompt="Are you sure you want to delete this action?">Delete</a>
                        <a href="javascript:;" data-route="processes__action_test_preview" class="latepoint-btn latepoint-btn-secondary os-run-process-action"><i class="latepoint-icon latepoint-icon-play-circle"></i><span>Test this action</span></a>
                    </div></div></div>
                `)
    });

    $('body').on('click', '.process-action-heading', function () {
        $(this).parents('.process-action-form').toggleClass('is-editing')
    });

    $('body').on('click', '.process-action-remove', function () {
        if (confirm($(this).attr('data-os-prompt'))) {
            $(this).parents('.process-action-form').remove();
        }
    });
</script>

@endsection