@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
$configData = Helper::appClasses();

$customizerHidden = ($customizerHidden ?? '');
@endphp

@extends('layouts/commonMaster' )

@section('layoutContent')

<!-- Content -->
@yield('content')
<!--/ Content -->

@endsection
