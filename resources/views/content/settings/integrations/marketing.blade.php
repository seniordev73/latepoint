@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page')

@section('content')
<link href="{{ asset('/assets/css/settings.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/css/admin.css') }}" rel="stylesheet">
<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/settings/integrations-calendars') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Calendars</h4>
            </a>
            <a href="{{ url('/admin/settings/integrations-meeting') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Meetings</h4>
            </a>
            <a href="{{ url('/admin/settings/integrations-marketing') }}"
                class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">Marketing</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="latepoint-settings-w os-form-w">
                <form action="" data-os-action="settings__update">
                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="f1cd9b5daa"><input type="hidden"
                        name="_wp_http_referer"
                        value="/demo_4217c15f9eb342a2/wp-admin/admin.php?page=latepoint&amp;route_name=integrations__external_marketing_systems">
                    <div class="os-section-header">
                        <h3>Marketing Systems</h3>
                    </div>
                    <a target="_blank" href="javascript:;" class="os-add-box">
                        <div class="add-box-graphic-w">
                            <div class="add-box-plus"><i class="latepoint-icon latepoint-icon-plus4"></i></div>
                        </div>
                        <div class="add-box-label">Install Marketing add-ons</div>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection