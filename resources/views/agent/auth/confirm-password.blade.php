@php
  $configData = Helper::appClasses();
  $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Verify Email Cover - Pages')

@section('page-style')
<!-- Page -->
@vite('resources/assets/vendor/scss/pages/page-auth.scss')
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">

    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
      <div class="w-100 d-flex justify-content-center">
        <img src="{{asset('assets/img/illustrations/boy-verify-email-' . $configData['style'] . '.png')}}" class="img-fluid"
          alt="Login image" width="600" data-app-dark-img="illustrations/boy-verify-email-dark.png"
          data-app-light-img="illustrations/boy-verify-email-light.png">

      </div>
    </div>
    <!-- /Left Text -->

    <!--  Verify email -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-4 p-sm-5">
      <div class="w-px-400 mx-auto">
        <div class="app-brand mb-5">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
            <!-- <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
            <span class="app-brand-text demo text-body fw-bold">{{ config('variables.templateName') }}</span> -->
            <img src="{{asset('assets/img/logo.png')}}" alt="footer-logo" class="float-right" style="width: 100%; ">
          </a>
        </div>
        <h3 class="mb-2">Password Changed.</h3>
        <p class="text-start">
          Your password was changed successfuly.<br />
          You can login now.
        </p>
        <a class="btn btn-primary w-100 my-3" href="{{route('agent.login')}}">
          Login
        </a>
      </div>
    </div>
    <!-- / Verify email -->
  </div>
</div>
@endsection