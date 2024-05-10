
<!-- BEGIN: Vendor JS-->
@vite([
'resources/assets/vendor/js/dropdown-hover.js',
'resources/assets/vendor/js/mega-dropdown.js',
'resources/assets/vendor/libs/popper/popper.js',
'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
'resources/assets/vendor/js/bootstrap.js'])

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
@vite(['resources/assets/js/front-main.js'])
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
