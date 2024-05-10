@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Latepoint')

@section('page-style')
@vite([
'resources/assets/vendor/scss/pages/card-analytics.scss'

])
@endsection

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',

])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/flatpickr/flatpickr.js',

])
@endsection

@section('page-script')
@vite([
'resources/assets/js/ui-cards-analytics.js',
])
@endsection
@section('content')

<link href="{{asset('/assets/css/locations_custom.css')}}" rel="stylesheet">

<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/resource/locations') }}" class="agent-status-active service_title text-center mx-2">
                <h4 class="m-0 me-2">All Locations</h4>
            </a>
            <a href="{{ url('/admin/resource/locationcategories') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Categories</h4>
            </a>
            <hr>
        </div>
        <div class="index-agent-boxes">
            @foreach ($locations as $location)
                <a href="{{ route('admin.resource-editlocations', $location->id) }}" class="agent-box-w agent-status-active">
                    <div id="googleMap" style="width:100%; height:400px;"></div>
                    <div class="agent-info-w">
                        <div class="agent-info">
                            <div class="agent-name">{{$location->name}}</div>
                            <div class="agent-phone">{{$location->full_address}}</div>
                        </div>
                    </div>
                    <div class="os-location-agents">
                        <div class="label">Agents:</div>
                        <div class="agents-avatars">
                            <div class="agent-avatar" style="background-image: url(<?= asset("assets/img/avatars/9.png") ?>)"></div>
                            <div class="agent-avatar" style="background-image: url(<?= asset("assets/img/avatars/10.png") ?>)"></div>
                            <div class="agent-avatar" style="background-image: url(<?= asset("assets/img/avatars/11.png") ?>)"></div>
                            <div class="agent-avatar" style="background-image: url(<?= asset("assets/img/avatars/12.png") ?>)"></div>
                        </div>
                    </div>
                </a>
            @endforeach
            

            <a href="{{url('/admin/resource/createlocations')}}" class="create-agent-link-w">
                <div class="create-agent-link-i">
                  <div class="add-agent-graphic-w">
                    <div class="add-agent-plus"><i class="latepoint-icon latepoint-icon-plus4 fa fa-plus"></i></div>
                  </div>
                  <div class="add-agent-label">Add Location</div>
                </div>
            </a>
        </div>
    </div>
</div>

<script>
    function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(51.508742,-0.120850),
      zoom:5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

@endsection
