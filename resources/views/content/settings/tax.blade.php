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
<link href="{{asset('/assets/css/settings.css')}}" rel="stylesheet">
<link href="{{asset('/assets/css/admin.css')}}" rel="stylesheet">

<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/settings/general') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">General</h4>
            </a>
            <a href="{{ url('/admin/settings/schedule') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Schedule</h4>
            </a>
            <a href="{{ url('/admin/settings/tax') }}" class="agent-status-active text-center mx-2 acitive-tab">
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
            <a href="{{ url('/admin/settings/system') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">System</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="tax_list">
                @foreach ($results as $item)
                                <form action="{{route('admin.settings-updatetax')}}" method="post" data-os-form-block-id="tax_FfgQTHyJ"
                                    data-os-action="taxes__save" class="os-form-block os-form-block-type-percentage">
                                    @csrf
                                    @php
                                        $value = unserialize($item->value);
                                    @endphp
                                    <div class="os-form-block-i">
                                        <div class="os-form-block-header">
                                            <div class="os-form-block-drag"></div>
                                            <div class="os-form-block-name">{{ $value['name'] }}</div>
                                            <div class="os-form-block-type">{{ $value['type'] }}</div>
                                            <div class="os-form-block-edit-btn"><i class="latepoint-icon latepoint-icon-edit-3"></i>
                                            </div>
                                        </div>
                                        <div class="os-form-block-params os-form-w">
                                            <div class="sub-section-row">
                                                <div class="sub-section-label">
                                                    <h3>Tax Name</h3>
                                                </div>
                                                <div class="sub-section-content">
                                                    <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label">
                                                        <input type="text" placeholder="Enter Tax Name" name="name"
                                                            value="{{ $value['name'] }}" theme="bordered"
                                                            class="os-form-block-name-input os-form-control"
                                                            id="taxes_tax_ffgqthyj_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sub-section-row">
                                                <div class="sub-section-label">
                                                    <h3>Tax Type</h3>
                                                </div>
                                                <div class="sub-section-content">
                                                    <div class="os-row">
                                                        <div class="os-col-4">
                                                            <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                                <select name="type" value="{{ $value['type'] }}"
                                                                    class="os-form-block-type-select tax-type-selector os-form-control"
                                                                    id="taxes_tax_ffgqthyj_type">
                                                                    <option value="percentage">Percentage of the booking price</option>
                                                                    <option value="fixed">Fixed amount</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="os-col-8">
                                                            <div
                                                                class="os-form-group os-form-textfield-group os-form-group-bordered has-value no-label">
                                                                <input type="text" value="{{ $value['value'] }}"
                                                                    placeholder="Enter Tax Value" name="value" value="0"
                                                                    theme="bordered" class="os-form-block-value-input os-form-control"
                                                                    id="taxes_tax_ffgqthyj_value">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="os-form-block-buttons">
                                                <a href="/resource/deletetax/{{$item->id}}" class="btn btn-danger pull-left"
                                                    data-os-prompt="Are you sure you want to delete this tax?"
                                                    data-os-after-call="latepointTaxesAddon.latepoint_tax_removed"
                                                    data-os-pass-this="yes" data-os-action="taxes__destroy"
                                                    data-os-params="id=tax_FfgQTHyJ">Delete</a>
                                                <button type="submit" class="os-form-block-save-btn btn btn-primary"><span>Save
                                                        Tax</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$item->id}}" class="os-form-block-id"
                                        id="taxes_tax_ffgqthyj_id">
                                    <a href="/resource/deletetax/{{$item->id}}"
                                        data-os-prompt="Are you sure you want to delete this tax?"
                                        data-os-after-call="latepointTaxesAddon.latepoint_tax_removed" data-os-pass-this="yes"
                                        data-os-action="taxes__destroy" data-os-params="id=tax_FfgQTHyJ" class="os-remove-form-block"><i
                                            class="latepoint-icon latepoint-icon-cross"></i></a>
                                </form>
                @endforeach

            </div>
            <div class="os-taxes-w os-form-blocks-w os-taxes-ordering-w" data-order-update-route="taxes__update_order">

            </div>
            <div class="os-add-box" data-os-after-call="latepointTaxesAddon.init_new_tax_form"
                data-os-action="taxes__new_form" data-os-output-target-do="append" data-os-output-target=".os-taxes-w"
                onclick="addTax()">
                <div class="add-box-graphic-w">
                    <div class="add-box-plus"><i class="latepoint-icon latepoint-icon-plus4"></i></div>
                </div>
                <div class="add-box-label">Add Tax</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script>
    function addTax() {
        $('.os-taxes-w').append(`
            <form action="{{route('admin.settings-storetax')}}" method=post data-os-form-block-id="tax_FfgQTHyJ" data-os-action="taxes__save" class="os-form-block os-form-block-type-percentage os-is-editing">
                @csrf
                <div class="os-form-block-i">
                    <div class="os-form-block-header">
                        <div class="os-form-block-drag"></div>
                        <div class="os-form-block-name">New Tax</div>
                        <div class="os-form-block-type">percentage</div>
                        <div class="os-form-block-edit-btn"><i class="latepoint-icon latepoint-icon-edit-3"></i></div>
                    </div>
                    <div class="os-form-block-params os-form-w">
                  <div class="sub-section-row">
                    <div class="sub-section-label">
                      <h3>Tax Name</h3>
                    </div>
                    <div class="sub-section-content">
                      <div class="os-form-group os-form-textfield-group os-form-group-bordered no-label"><input type="text" placeholder="Enter Tax Name" name="name" value="" theme="bordered" class="os-form-block-name-input os-form-control" id="taxes_tax_ffgqthyj_name"></div>        </div>
                  </div>
            
                  <div class="sub-section-row">
                    <div class="sub-section-label">
                      <h3>Tax Type</h3>
                    </div>
                    <div class="sub-section-content">
                        <div class="os-row">
                            <div class="os-col-4">
                                  <div class="os-form-group os-form-select-group os-form-group-transparent"><select name="type" class="os-form-block-type-select tax-type-selector os-form-control" id="taxes_tax_ffgqthyj_type"><option value="percentage" selected="">Percentage of the booking price</option><option value="fixed">Fixed amount</option></select></div>		        </div>
                            <div class="os-col-8">
                                <div class="os-form-group os-form-textfield-group os-form-group-bordered has-value no-label"><input type="text" placeholder="Enter Tax Value" name="value" value="0" theme="bordered" class="os-form-block-value-input os-form-control" id="taxes_tax_ffgqthyj_value"></div>		        </div>
                        </div>
                    </div>
                    </div>
            
                    <div class="os-form-block-buttons">
                        <button type="submit" class="os-form-block-save-btn btn btn-primary"><span>Save Tax</span></button>
                    </div>
                    </div>
                </div>                
            </form>
        `);
    }

    function deleteTax(obj) {
        if (confirm($(obj).attr('data-os-prompt'))) {
            $(obj).parents('.os-form-block').remove();
        }
    }
    $('body').on('click', '.os-form-block-header', function () {
        $(this).parents('.os-form-block').toggleClass('os-is-editing')
    })
</script>
@endsection