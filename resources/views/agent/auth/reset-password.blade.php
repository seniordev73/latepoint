@php
  $configData = Helper::appClasses();
  $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Reset Password Cover - Pages')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

@section('page-style')
@vite([
  'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/@form-validation/popular.js',
  'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
  'resources/assets/vendor/libs/@form-validation/auto-focus.js'
])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/pages-auth.js'
])
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">

    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
      <div class="w-100 d-flex justify-content-center">
        <img src="{{asset('assets/img/illustrations/boy-with-laptop-' . $configData['style'] . '.png')}}" class="img-fluid"
          alt="Login image" width="600" data-app-dark-img="illustrations/boy-with-laptop-dark.png"
          data-app-light-img="illustrations/boy-with-laptop-light.png">

      </div>
    </div>
    <!-- /Left Text -->

    <!-- Reset Password -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-4 p-sm-5">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand mb-5">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
            <!-- <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
            <span class="app-brand-text demo text-body fw-bold">{{ config('variables.templateName') }}</span> -->
            <img src="{{asset('assets/img/logo.png')}}" alt="footer-logo" class="float-right" style="width: 100%; ">
          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Reset Password 🔒</h4>
        <p class="mb-4">for <span class="fw-medium">{{ $user->email }}</span></p>
        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('agent.password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $user->token }}">
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">New Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="confirm-password">Confirm Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="confirm-password" class="form-control" name="confirm-password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          @if (session('success'))
        <div class="link-wrap" style="color: green; font-size: 12px;">
        {{ session('success') }}
        </div>
      @endif

          @if (session('error'))
        <div class="link-wrap" style="color: red; font-size: 12px;">
        {{ session('error') }}
        </div>
      @endif

          <button type="submit" class="btn btn-primary d-grid w-100 mb-3">
            Set new password
          </button>
          <div class="text-center">
            <a href="{{route('agent.login')}}">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Back to login
            </a>
          </div>
        </form>
      </div>
    </div>
    <!-- /Reset Password -->
  </div>
</div>
@endsection