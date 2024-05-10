@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page')

@section('content')
<link href="{{ asset('/assets/css/settings.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/css/admin.css') }}" rel="stylesheet">
<div class="latepoint-content ">
    <div class="os-section-header">
        <h3>Default Fields</h3>
    </div>
    <div class="os-default-fields" data-route="settings__update_default_fields">
        @if($check == 0)
            <form method="post" class="default_form" action="{{route('admin.settings-storeform-fields')}}">
                <div class="os-default-field " id="first_name_field">
                    <div class="os-toggler on" data-for="default_fields_first_name_active">
                        <div class="toggler-rail">
                            <div class="toggler-pill"></div>
                        </div>
                    </div>
                    <div class="os-field-name">First Name</div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-checkbox-group is-checked">
                            <label for="default_fields_first_name_required">
                                <input type="checkbox" name="first_name_required" id="default_fields_first_name_required"
                                    class="os-form-checkbox">Required?
                            </label>
                        </div>
                    </div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                            <select name="first_name_width" id="default_fields_first_name_width" class="os-form-control">
                                <option value="os-col-12">Full Width</option>
                                <option value="os-col-6">Half Width</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="os-default-field " id="last_name_field">
                    <div class="os-toggler on" data-for="default_fields_last_name_active">
                        <div class="toggler-rail">
                            <div class="toggler-pill"></div>
                        </div>
                    </div>
                    <div class="os-field-name">Last Name</div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-checkbox-group is-checked">
                            <label for="default_fields_last_name_required">
                                <input type="checkbox" name="last_name_required" id="default_fields_last_name_required"
                                    class="os-form-checkbox">Required?
                            </label>
                        </div>
                    </div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                            <select name="last_name_width" id="default_fields_last_name_width" class="os-form-control">
                                <option value="os-col-12">Full Width</option>
                                <option value="os-col-6">Half Width</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="os-default-field ">
                    <div class="locked-field"><i class="latepoint-icon latepoint-icon-lock"></i><span>Email Address field
                            can not be disabled.</span></div>
                    <div class="os-field-name">Email Address</div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-checkbox-group is-checked"><label
                                for="default_fields_email_required"><input type="checkbox"
                                    name="default_fields[email][required]" value="on" checked="" disabled="disabled"
                                    id="default_fields_email_required" class="os-form-checkbox">Required?</label></div>
                    </div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="email_width"
                                id="default_fields_email_width" class="os-form-control">
                                <option value="os-col-12">Full Width</option>
                                <option value="os-col-6">Half Width</option>
                            </select></div>
                    </div>
                </div>
                <div class="os-default-field " id="phone_number_field">
                    <div class="os-toggler on" data-for="default_fields_phone_active">
                        <div class="toggler-rail">
                            <div class="toggler-pill"></div>
                        </div>
                    </div>
                    <div class="os-field-name">Phone Number</div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-checkbox-group ">
                            <label for="default_fields_phone_required">
                                <input type="checkbox" name="phone_required" id="default_fields_phone_required"
                                    class="os-form-checkbox">Required?
                            </label>
                        </div>
                    </div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="phone_width"
                                id="default_fields_phone_width" class="os-form-control">
                                <option value="os-col-12">Full Width</option>
                                <option value="os-col-6">Half Width</option>
                            </select></div>
                    </div>
                </div>
                <div class="os-default-field " id="comments_field">
                    <div class="os-toggler on" data-for="default_fields_notes_active">
                        <div class="toggler-rail">
                            <div class="toggler-pill"></div>
                        </div>
                    </div>
                    <div class="os-field-name">Comments</div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-checkbox-group ">
                            <label for="default_fields_notes_required">
                                <input type="checkbox" name="comments_required" id="default_fields_notes_required"
                                    class="os-form-checkbox">Required?
                            </label>
                        </div>
                    </div>
                    <div class="os-field-setting">
                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                            <select name="comments_width" id="default_fields_notes_width" class="os-form-control">
                                <option value="os-col-12">Full Width</option>
                                <option value="os-col-6">Half Width</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary add-customer" hidden></button>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                </div>
            </form>
        @else
                <form method="post" class="default_form" action="{{route('admin.settings-storeform-fields')}}">
                    @php
                        $value = unserialize($formfield->value);
                        $firstName = json_decode($value['firstName']);
                        $lastName = json_decode($value['lastName']);
                        $phone = json_decode($value['phone']);
                        $comments = json_decode($value['comments']);
                    @endphp
                    <div class="{{$firstName->class}}" id="first_name_field">
                        <div class="{{ $firstName->class == 'os-default-field' ? 'os-toggler on' : 'os-toggler off' }}"
                            data-for="default_fields_first_name_active">
                            <div class="toggler-rail">
                                <div class="toggler-pill"></div>
                            </div>
                        </div>
                        <div class="os-field-name">First Name</div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-checkbox-group is-checked">
                                <label for="default_fields_first_name_required">
                                    <input type="checkbox" name="first_name_required" id="default_fields_first_name_required"
                                        class="os-form-checkbox" <?php    echo (!empty($firstName->required) && $firstName->required ? 'checked' : ''); ?>>Required?
                                </label>
                            </div>
                        </div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                <select name="first_name_width" id="default_fields_first_name_width" class="os-form-control"
                                    onchange="saveWidth()">
                                    @if($firstName->width == "os-col-12")
                                        <option value="os-col-12" selected>Full Width</option>
                                        <option value="os-col-6">Half Width</option>
                                    @else
                                        <option value="os-col-12">Full Width</option>
                                        <option value="os-col-6" selected>Half Width</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="{{$lastName->class}}" id="last_name_field">
                        <div class="{{ $lastName->class == 'os-default-field' ? 'os-toggler on' : 'os-toggler off' }}"
                            data-for="default_fields_last_name_active">
                            <div class="toggler-rail">
                                <div class="toggler-pill"></div>
                            </div>
                        </div>
                        <div class="os-field-name">Last Name</div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-checkbox-group is-checked">
                                <label for="default_fields_last_name_required">
                                    <input type="checkbox" name="last_name_required" id="default_fields_last_name_required"
                                        class="os-form-checkbox" <?php    echo (!empty($lastName->required) && $lastName->required ? 'checked' : ''); ?>>Required?
                                </label>
                            </div>
                        </div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                <select name="last_name_width" id="default_fields_last_name_width" class="os-form-control"
                                    onchange="saveWidth()">
                                    @if($lastName->width == "os-col-12")
                                        <option value="os-col-12" selected>Full Width</option>
                                        <option value="os-col-6">Half Width</option>
                                    @else
                                        <option value="os-col-12">Full Width</option>
                                        <option value="os-col-6" selected>Half Width</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="os-default-field">
                        <div class="locked-field"><i class="latepoint-icon latepoint-icon-lock"></i><span>Email Address field
                                can not be disabled.</span></div>
                        <div class="os-field-name">Email Address</div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-checkbox-group is-checked"><label
                                    for="default_fields_email_required"><input type="checkbox"
                                        name="default_fields[email][required]" checked="" disabled="disabled"
                                        id="default_fields_email_required" class="os-form-checkbox">Required?</label></div>
                        </div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="email_width"
                                    id="default_fields_email_width" class="os-form-control" onchange="saveWidth()">
                                    @if($value['email_width'] == "os-col-12")
                                        <option value="os-col-12" selected>Full Width</option>
                                        <option value="os-col-6">Half Width</option>
                                    @else
                                        <option value="os-col-12">Full Width</option>
                                        <option value="os-col-6" selected>Half Width</option>
                                    @endif
                                </select></div>
                        </div>
                    </div>
                    <div class="{{$phone->class}}" id="phone_number_field">
                        <div class="{{ $phone->class == 'os-default-field' ? 'os-toggler on' : 'os-toggler off' }}"
                            data-for="default_fields_phone_active">
                            <div class="toggler-rail">
                                <div class="toggler-pill"></div>
                            </div>
                        </div>
                        <div class="os-field-name">Phone Number</div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-checkbox-group ">
                                <label for="default_fields_phone_required">
                                    <input type="checkbox" name="phone_required" id="default_fields_phone_required"
                                        class="os-form-checkbox" <?php    echo (!empty($phone->required) && $phone->required ? 'checked' : ''); ?>>Required?
                                </label>
                            </div>
                        </div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="phone_width"
                                    id="default_fields_phone_width" class="os-form-control" onchange="saveWidth()">
                                    @if($phone->width == "os-col-12")
                                        <option value="os-col-12" selected>Full Width</option>
                                        <option value="os-col-6">Half Width</option>
                                    @else
                                        <option value="os-col-12">Full Width</option>
                                        <option value="os-col-6" selected>Half Width</option>
                                    @endif
                                </select></div>
                        </div>
                    </div>
                    <div class="{{$comments->class}} " id="comments_field">
                        <div class="{{ $comments->class == 'os-default-field' ? 'os-toggler on' : 'os-toggler off' }}"
                            data-for="default_fields_notes_active">
                            <div class="toggler-rail">
                                <div class="toggler-pill"></div>
                            </div>
                        </div>
                        <div class="os-field-name">Comments</div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-checkbox-group ">
                                <label for="default_fields_notes_required">
                                    <input type="checkbox" name="comments_required" id="default_fields_notes_required"
                                        class="os-form-checkbox" <?php    echo (!empty($comments->required) && $comments->required ? 'checked' : ''); ?>>Required?
                                </label>
                            </div>
                        </div>
                        <div class="os-field-setting">
                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                <select name="comments_width" id="default_fields_notes_width" class="os-form-control"
                                    onchange="saveWidth()">
                                    @if($comments->width == "os-col-12")
                                        <option value="os-col-12" selected>Full Width</option>
                                        <option value="os-col-6">Half Width</option>
                                    @else
                                        <option value="os-col-12">Full Width</option>
                                        <option value="os-col-6" selected>Half Width</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary add-customer" hidden></button>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                    </div>
                </form>
        @endif
    </div>
    <div class="os-section-header">
        <h3>Custom Fields</h3>
    </div>
    <div class="os-custom-fields-w os-draggable-form-blocks os-form-blocks-w"
        data-order-update-route="custom_fields__update_order" data-fields-for="customer">
    </div>
    @foreach ($customfields as $item)
        <form method="post" id="create_field" class="create_field os-form-block os-form-block-type-text"
            action="{{route('admin.settings-updateform-otherfields', $item->id)}}">
            @csrf
            @php
                $value = unserialize($item->value);
            @endphp
            <div class="os-form-block-i">
                <div class="os-form-block-header ">
                    <div class="os-form-block-drag"></div>
                    <div class="os-form-block-name">{{$value['label']}}</div>
                    <div class="os-form-block-type">text</div>
                    <div class="os-form-block-edit-btn"><i class="latepoint-icon latepoint-icon-edit-3"></i></div>
                </div>
                <div class="os-form-block-params os-form-w">
                    <div class="sub-section-row">
                        <div class="sub-section-label">
                            <h3>Field Label</h3>
                        </div>
                        <div class="sub-section-content">
                            <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label">
                                <input type="text" placeholder="Enter Field Label" name="custom_fields[label]"
                                    value="{{$value['label']}}" theme="bordered"
                                    class="os-form-block-name-input os-form-control" id="custom_fields_cf_ubxei2ro_label">
                            </div>
                        </div>
                    </div>

                    <div class="sub-section-row">
                        <div class="sub-section-label">
                            <h3>Placeholder</h3>
                        </div>
                        <div class="sub-section-content">
                            <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label">
                                <input type="text" placeholder="Enter Field Placeholder" name="custom_fields[placeholder]"
                                    value="{{$value['placeholder']}}" theme="bordered"
                                    id="custom_fields_cf_ubxei2ro_placeholder" class="os-form-control">
                            </div>
                        </div>
                    </div>

                    <div class="sub-section-row">
                        <div class="sub-section-label">
                            <h3>Field Type</h3>
                        </div>
                        <div class="sub-section-content">
                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                <select name="custom_fields[type]" class="os-form-block-type-select os-form-control"
                                    id="custom_fields_cf_ubxei2ro_type">
                                    <option value="text" <?php    echo ($value['type'] == 'text' ? 'selected' : ''); ?>>Text
                                        Field</option>
                                    <option value="phone_number" <?php    echo ($value['type'] == 'phone_number' ? 'selected' : ''); ?>>Phone Number Field</option>
                                    <option value="number" <?php    echo ($value['type'] == 'number' ? 'selected' : ''); ?>>
                                        Number Field</option>
                                    <option value="hidden" <?php    echo ($value['type'] == 'hidden' ? 'selected' : ''); ?>>
                                        Hidden Field</option>
                                    <option value="select" <?php    echo ($value['type'] == 'select' ? 'selected' : ''); ?>>
                                        Select Box</option>
                                    <option value="textarea" <?php    echo ($value['type'] == 'textarea' ? 'selected' : ''); ?>>
                                        Text Area Field</option>
                                    <option value="checkbox" <?php    echo ($value['type'] == 'checkbox' ? 'selected' : ''); ?>>
                                        Checkbox</option>
                                    <option value="google_address_autocomplete" <?php    echo ($value['type'] == 'google_address_autocomplete' ? 'selected' : ''); ?>>Google Address
                                        Autocomplete</option>
                                    <option value="file_upload" <?php    echo ($value['type'] == 'file_upload' ? 'selected' : ''); ?>>File Upload</option>
                                </select>
                            </div>
                            <div class="custom-fields-google-places-api-status" style="display: none;">
                                <div class="latepoint-message latepoint-message-warning mt-1">To use address field, you need
                                    to enter Google API key in general settings.</div>
                            </div>
                        </div>
                    </div>

                    <div class="sub-section-row custom-fields-select-values" style="display: none;">
                        <div class="sub-section-label">
                            <h3>Options List</h3>
                        </div>
                        <div class="sub-section-content">
                            <div>
                                <div
                                    class="os-form-group os-form-textfield-group os-form-textarea-group os-form-group-bordered no-label">
                                    <textarea type="text" placeholder="Choices for Select. Enter each choice on a new line."
                                        name="custom_fields[options]" theme="bordered" rows="5"
                                        id="custom_fields_cf_ubxei2ro_options" class="os-form-control">
                                  </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sub-section-row custom-fields-default-value-row">
                        <div class="sub-section-label">
                            <h3>Default Value</h3>
                        </div>
                        <div class="sub-section-content">
                            <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label">
                                <input type="text" placeholder="Enter Field Default Value" name="custom_fields[value]"
                                    value="{{$value['value']}}" theme="bordered" id="custom_fields_cf_ubxei2ro_value"
                                    class="os-form-control">
                            </div>
                        </div>
                    </div>

                    <div class="sub-section-row">
                        <div class="sub-section-label">
                            <h3>Field Width</h3>
                        </div>
                        <div class="sub-section-content">
                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                <select name="custom_fields[width]" id="custom_fields_cf_ubxei2ro_width"
                                    class="os-form-control">
                                    <option value="os-col-12" <?php    echo ($value['width'] == 'os-col-12' ? 'selected' : ''); ?>>Full Width</option>
                                    <option value="os-col-6" <?php    echo ($value['width'] == 'os-col-6' ? 'selected' : ''); ?>>
                                        Half Width</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="sub-section-row">
                        <div class="sub-section-label">
                            <h3>Field Visibility</h3>
                        </div>
                        <div class="sub-section-content">
                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                <select name="custom_fields[visibility]" id="custom_fields_cf_ubxei2ro_visibility"
                                    class="os-form-control">
                                    <option value="public" <?php    echo ($value['visibility'] == 'public' ? 'selected' : ''); ?>>Visible to Everyone</option>
                                    <option value="admin_agent" <?php    echo ($value['visibility'] == 'admin_agent' ? 'selected' : ''); ?>>Admin and Agents Only</option>
                                    <option value="hidden" <?php    echo ($value['visibility'] == 'hidden' ? 'selected' : ''); ?>>Temporary Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="sub-section-row">
                        <div class="sub-section-label">
                            <h3>Required</h3>
                        </div>
                        <div class="sub-section-content">
                            <div class="os-form-group os-form-toggler-group  size-normal">
                                <div class="os-toggler <?php    echo (!empty($value['required']) ? $value['required'] : 'off'); ?> size-normal"
                                    data-is-string-value="true" data-for="custom_fields_cf_ubxei2ro_required">
                                    <input type="text" name="custom_fields[required]"
                                        value="<?php    echo (!empty($value['required']) ? $value['required'] : 'off'); ?>"
                                        class="toggle_value" hidden>
                                    <div class="toggler-rail">
                                        <div class="toggler-pill"></div>
                                    </div>
                                </div>
                                <div class="os-toggler-label-w">
                                    <label>Make this field required</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sub-section-row">
                        <div class="sub-section-label">
                            <h3>Hide from Summary</h3>
                        </div>
                        <div class="sub-section-content">
                            <div class="os-form-group os-form-toggler-group  size-normal">
                                <div class="os-toggler <?php    echo (!empty($value['summary']) ? $value['summary'] : 'off'); ?> size-normal"
                                    data-is-string-value="true" data-for="custom_fields_cf_ubxei2ro_hide_on_summary">
                                    <input type="text" name="custom_fields[summary]"
                                        value="<?php    echo (!empty($value['summary']) ? $value['summary'] : 'off'); ?>"
                                        class="toggle_value" hidden>
                                    <div class="toggler-rail">
                                        <div class="toggler-pill"></div>
                                    </div>
                                </div>
                                <div class="os-toggler-label-w">
                                    <label>Hide from Summary Panel and Confirmation Step</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="os-form-block-buttons">
                        <a href="/settings/deleteform-otherfields/{{$item->id}}"
                            class="latepoint-btn latepoint-btn-danger pull-left os-remove-custom-field"
                            data-os-prompt="Are you sure you want to delete this field?"
                            data-os-after-call="latepoint_custom_field_removed" data-os-pass-this="yes"
                            data-os-action="custom_fields__destroy"
                            data-os-params="id=cf_UBXEI2RO&amp;fields_for=customer">Delete</a>
                        <button type="submit" class="os-form-block-save-btn latepoint-btn latepoint-btn-primary"><span>Save
                                Field</span></button>
                    </div>
                </div>

            </div>
        </form>
    @endforeach
    <div class="os-add-box add-custom-field-box add-custom-field-trigger" data-os-params="fields_for=customer"
        data-os-action="custom_fields__new_form" data-os-output-target-do="append"
        data-os-output-target=".os-custom-fields-w">

        <div class="add-box-graphic-w">
            <div class="add-box-plus">
                <i class="latepoint-icon latepoint-icon-plus4"></i>
            </div>
        </div>
        <div class="add-box-label">Add Custom Field</div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('/assets/jquery.js') }}"></script>
<script>
    const first_name = {};
    const last_name = {};
    const phone = {};
    const comments = {};
    function saveWidth() {
        $('.default_form').find('[type="submit"]').click();
    };

    $('.os-toggler').click(function () {
        var obj = $(this);
        if (obj.hasClass('on')) {
            obj.removeClass('on');
            obj.addClass('off');
            obj.parents('.os-default-field').addClass('is-disabled');
        } else {
            obj.removeClass('off');
            obj.addClass('on');
            obj.parents('.os-default-field').removeClass('is-disabled');
        }
        if ($(this).parents().hasClass('os-default-field')) {
            $('.default_form').find('[type="submit"]').click();
        }
    });

    $('.os-form-checkbox').click(function () {
        $('.default_form').find('[type="submit"]').click();
    });

    $('.os-add-box').click(function () {
        $('.os-custom-fields-w').append(`
            <form method="post" id="create_field" class="create_field os-form-block os-form-block-type-text os-is-editing" action="{{route('admin.settings-storeform-otherfields')}}">
              @csrf
              <div class="os-form-block-i">
                <div class="os-form-block-header ">
                  <div class="os-form-block-drag"></div>
                  <div class="os-form-block-name">New Field</div>
                  <div class="os-form-block-type">text</div>
                  <div class="os-form-block-edit-btn"><i class="latepoint-icon latepoint-icon-edit-3"></i></div>
                </div>
                <div class="os-form-block-params os-form-w">
                  <div class="sub-section-row">
                    <div class="sub-section-label">
                      <h3>Field Label</h3>
                    </div>
                    <div class="sub-section-content">
                      <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label">
                        <input type="text" placeholder="Enter Field Label" name="custom_fields[label]" value="" theme="bordered" class="os-form-block-name-input os-form-control" id="custom_fields_cf_ubxei2ro_label">
                        </div>
                      </div>
                  </div>

                  <div class="sub-section-row">
                    <div class="sub-section-label">
                      <h3>Placeholder</h3>
                    </div>
                    <div class="sub-section-content">
                      <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label">
                        <input type="text" placeholder="Enter Field Placeholder" name="custom_fields[placeholder]" value="" theme="bordered" id="custom_fields_cf_ubxei2ro_placeholder" class="os-form-control"></div>        </div>
                  </div>

                  <div class="sub-section-row">
                    <div class="sub-section-label">
                      <h3>Field Type</h3>
                    </div>
                    <div class="sub-section-content">
                      <div class="os-form-group os-form-select-group os-form-group-transparent">
                        <select name="custom_fields[type]" class="os-form-block-type-select os-form-control" id="custom_fields_cf_ubxei2ro_type">
                            <option value="text" selected="">Text Field</option>
                            <option value="phone_number">Phone Number Field</option>
                            <option value="number">Number Field</option>
                            <option value="hidden">Hidden Field</option>
                            <option value="select">Select Box</option>
                            <option value="textarea">Text Area Field</option>
                            <option value="checkbox">Checkbox</option>
                            <option value="google_address_autocomplete">Google Address Autocomplete</option>
                            <option value="file_upload">File Upload</option>
                        </select>
                      </div>
                      <div class="custom-fields-google-places-api-status" style="display: none;" "="">
                        <div class="latepoint-message latepoint-message-warning mt-1">To use address field, you need to enter Google API key in general settings.</div>					</div>
                    </div>
                  </div>

                  <div class="sub-section-row custom-fields-select-values" style="display: none;">
                    <div class="sub-section-label">
                      <h3>Options List</h3>
                    </div>
                    <div class="sub-section-content">
                      <div>
                        <div class="os-form-group os-form-textfield-group os-form-textarea-group os-form-group-bordered no-label">
                            <textarea type="text" placeholder="Choices for Select. Enter each choice on a new line." name="custom_fields[options]" theme="bordered" rows="5" id="custom_fields_cf_ubxei2ro_options" class="os-form-control">
                            </textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="sub-section-row custom-fields-default-value-row">
                  <div class="sub-section-label">
                      <h3>Default Value</h3>
                  </div>
                  <div class="sub-section-content">
                    <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label">
                        <input type="text" placeholder="Enter Field Default Value" name="custom_fields[value]" value="" theme="bordered" id="custom_fields_cf_ubxei2ro_value" class="os-form-control">
                    </div>
                  </div>
                  </div>
                    
                  <div class="sub-section-row">
                  <div class="sub-section-label">
                      <h3>Field Width</h3>
                  </div>
                  <div class="sub-section-content">
                    <div class="os-form-group os-form-select-group os-form-group-transparent">
                        <select name="custom_fields[width]" id="custom_fields_cf_ubxei2ro_width" class="os-form-control">
                            <option value="os-col-12" selected="">Full Width</option>
                            <option value="os-col-6">Half Width</option>
                        </select>
                    </div>        
                  </div>
                  </div>
  
                  <div class="sub-section-row">
                  <div class="sub-section-label">
                    <h3>Field Visibility</h3>
                  </div>
                  <div class="sub-section-content">
                    <div class="os-form-group os-form-select-group os-form-group-transparent">
                        <select name="custom_fields[visibility]" id="custom_fields_cf_ubxei2ro_visibility" class="os-form-control">
                            <option value="public">Visible to Everyone</option>
                            <option value="admin_agent">Admin and Agents Only</option>
                            <option value="hidden">Temporary Hidden</option>
                        </select>
                    </div>
                  </div>
                  </div>
  
                  <div class="sub-section-row">
                  <div class="sub-section-label">
                    <h3>Required</h3>
                  </div>
                  <div class="sub-section-content">
                    <div class="os-form-group os-form-toggler-group  size-normal">
                        <div class="os-toggler off size-normal" data-is-string-value="true" data-for="custom_fields_cf_ubxei2ro_required">
                            <input type="text" name="custom_fields[required]" class="toggle_value" hidden>
                            <div class="toggler-rail">
                                <div class="toggler-pill"></div>
                            </div>
                        </div>
                        <div class="os-toggler-label-w">
                            <label>Make this field required</label>
                        </div>
                    </div>
                  </div>
                  </div>
  
                  <div class="sub-section-row">
                  <div class="sub-section-label">
                    <h3>Hide from Summary</h3>
                  </div>
                  <div class="sub-section-content">
                    <div class="os-form-group os-form-toggler-group  size-normal">
                        <div class="os-toggler off size-normal" data-is-string-value="true" data-for="custom_fields_cf_ubxei2ro_hide_on_summary">
                            <input type="text" name="custom_fields[summary]" class="toggle_value" hidden>
                            <div class="toggler-rail">
                                <div class="toggler-pill"></div>
                            </div>
                        </div>
                        <div class="os-toggler-label-w">
                            <label>Hide from Summary Panel and Confirmation Step</label>
                        </div>
                    </div>
                  </div>
                  
                  </div>  
                  <div class="os-form-block-buttons">
                    <button type="submit" class="os-form-block-save-btn latepoint-btn latepoint-btn-primary"><span>Save Field</span></button>
                  </div>
                </div>
                
              </div>
            </form>
          `);
    });

    $('body').on('click', '.os-form-block-header', function () {
        $(this).parents('.os-form-block').toggleClass('os-is-editing')
    });

    $('body').on('click', '.os-remove-form-block', function () {
        if (confirm($(this).attr('data-os-prompt'))) {
            $(this).parents('.os-form-block').remove();
        }
    });
    $('body').on('click', '.os-remove-custom-field', function () {
        if (confirm($(this).attr('data-os-prompt'))) {
            $(this).parents('.os-form-block').remove();
        }
    });

    $('body').on('click', '.os-form-toggler-group', function () {
        var obj = $(this).children('.os-toggler');
        var val = $(this).children('.os-toggler').children('input');
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

    function createField() {
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
    };

    $('form.default_form').on('submit', function (e) {
        e.preventDefault();
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        first_name['class'] = $('#first_name_field').attr('class');
        last_name['class'] = $('#last_name_field').attr('class');
        phone['class'] = $('#phone_number_field').attr('class');
        comments['class'] = $('#comments_field').attr('class');

        first_name['required'] = $('input[name="first_name_required"]').prop('checked');
        first_name['width'] = $('select[name="first_name_width"]').val();
        last_name['required'] = $('input[name="last_name_required"]').prop('checked');
        last_name['width'] = $('select[name="last_name_width"]').val();
        phone['required'] = $('input[name="phone_required"]').prop('checked');
        phone['width'] = $('select[name="phone_width"]').val();
        comments['required'] = $('input[name="comments_required"]').prop('checked');
        comments['width'] = $('select[name="comments_width"]').val();
        const email_width = $('select[name="email_width"]').val();


        $.ajax({
            type: 'POST',
            url: "{{ route('admin.settings-storeform-fields') }}",
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            data: {
                email_width: email_width,
                first_name: JSON.stringify(first_name),
                last_name: JSON.stringify(last_name),
                phone: JSON.stringify(phone),
                comments: JSON.stringify(comments),
            },
            success: function () {
                console.log('success');
                window.location.href = "{{ route('admin.settings-form-fields') }}";
            },
            error: function (err) {
                console.log(err);
            }
        });
    });




</script>
@endsection