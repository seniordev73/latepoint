@php
  $configData = Helper::appClasses();
  $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Register Cover - Pages')

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
        <img src="{{asset('assets/img/illustrations/girl-with-laptop-' . $configData['style'] . '.png')}}" class="img-fluid" alt="Login image" width="700" data-app-dark-img="illustrations/girl-with-laptop-dark.png" data-app-light-img="illustrations/girl-with-laptop-light.png">

      </div>
    </div>
    <!-- /Left Text -->

    <!-- Register -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand mb-5">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
            <!-- <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
            <span class="app-brand-text demo text-body fw-bold">{{config('variables.templateName')}}</span> -->
            <img src="{{asset('assets/img/logo.png')}}" alt="footer-logo" class="float-right" style="width: 100%; ">
          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Adventure starts here 🚀</h4>
        <p class="mb-4">Make your app management easy and fun!</p>

        <form id="formAuthentication" class="mb-3 row" method="POST" action="{{ route('agent.register') }}">
            @csrf
          <div class="mb-3 col-6">
            <label for="username" class="form-label">First Name</label>
            <input type="text" class="form-control " id="username" name="firstname" placeholder="First Name" autofocus>
            @error('firstname')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
          </div>
          <div class="mb-3 col-6">
            <label for="username" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" autofocus>
            @error('lastname')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
            @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password" placeholder="" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
          </div>

          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
              <label class="form-check-label" for="terms-conditions">
                I agree to
                <a href="javascript:void(0);">privacy policy & terms</a>
              </label>
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
          <button class="btn btn-primary d-grid w-100">
            Sign up
          </button>
        </form>

        <p class="text-center">
          <span>Already have an account?</span>
          <a href="{{route('agent.login') }}">
            <span>Sign in instead</span>
          </a>
        </p>

        <div class="divider my-4">
          <div class="divider-text">or</div>
        </div>

        <div class="d-flex justify-content-center">
          <a href="{{ route('agent.social.oauth', 'facebook') }}" class="btn btn-icon btn-label-facebook me-3">
            <i class="tf-icons bx bxl-facebook"></i>
          </a>

          <a href="{{ route('agent.social.oauth', 'google') }}" class="btn btn-icon btn-label-google-plus me-3">
            <i class="tf-icons bx bxl-google-plus"></i>
          </a>

          <a href="{{ route('agent.social.oauth', 'linkedin') }}" class="btn btn-icon btn-label-linkedin">
            <i class="tf-icons bx bxl-linkedin"></i>
          </a>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
@endsection
