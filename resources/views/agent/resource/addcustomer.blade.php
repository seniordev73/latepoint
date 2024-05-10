@php
$configData = agent_Helper::appClasses();
@endphp

@extends('layouts/agent_layoutMaster')

@section('title', 'Latepoint')

@section('page-style')
@vite([
'resources/assets/vendor/scss/pages/card-analytics.scss'

])
@endsection

@section('vendor-style')
@vite([
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.scss',
'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.scss',
'resources/assets/vendor/libs/jquery-timepicker/jquery-timepicker.scss',
'resources/assets/vendor/libs/pickr/pickr-themes.scss',
'resources/assets/vendor/libs/dropzone/dropzone.scss'
])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
'resources/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js',
'resources/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js',
'resources/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js',
'resources/assets/vendor/libs/pickr/pickr.js',
'resources/assets/vendor/libs/dropzone/dropzone.js'
])
@endsection

@section('page-script')
@vite([
'resources/assets/js/forms-pickers.js',
'resources/assets/js/forms-selects.js',
'resources/assets/js/ui-cards-analytics.js',
'resources/assets/js/forms-file-upload.js'
])
@endsection
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.4/build/css/intlTelInput.css">
<link href="{{asset('/assets/css/addcustomer_custom.css')}}" rel="stylesheet">

<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4">
    <div class="card-header mb-0">
            <h4 class="m-0 me-2">New Customer</h4>
            <hr>
        </div>
    </div>
    <div class="col-md-12">
        <form method="POST" class="add-customer" action="{{ route('agent.add_customer') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <h5 class="card-header">General Information</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <div class="d-flex px-3 mb-3">
                        <div action="/upload" class="dropzone" id="dropzone-basic">
                            <div class="dz-message needsclick">
                                <i class='bx bxs-tennis-ball' ></i>
                                Set Avatar
                            </div>
                        </div>
                        <input type="file" hidden>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-lg-6 px-3">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required aria-describedby="defaultFormControlHelp" />
                        </div>
                        <div class="col-lg-6 px-3">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required aria-describedby="defaultFormControlHelp" />
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-lg-6 px-3">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required aria-describedby="defaultFormControlHelp" />
                        </div>
                        <div class="col-lg-6 px-3">
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="201-555-0123" aria-describedby="defaultFormControlHelp" />
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-lg-12 px-3">
                            <textarea class="form-control" name="notes" placeholder="Notes by Customer" aria-describedby="defaultFormControlHelp" ></textarea>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-lg-12 px-3">
                            <textarea class="form-control" name="admin_notes" placeholder="Notes by admins, only visible to admins" aria-describedby="defaultFormControlHelp" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary add-customer">Save Customer</button>
                <meta name="csrf-token" content="{{ csrf_token() }}">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.4/build/js/intlTelInput.min.js"></script>
<script>
    // ITI
    const input = document.querySelector("#phone");
    const intlTelInputInstance = window.intlTelInput(input, {
        fixDropdownWidth: false,
        initialCountry: "us",
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.4/build/js/utils.js",
    });



    $('form.add-customer').on('submit', function(e) {
        e.preventDefault();
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        const first_name = $('input[name="first_name"]').val();
        const last_name = $('input[name="last_name"]').val();
        const email = $('input[name="email"]').val();
        const phone = $('input[name="phone"]').val();
        const notes = $('textarea[name="notes"]').val();
        const admin_notes = $('textarea[name="admin_notes"]').val();
        const file = $('.dz-thumbnail>img').attr('src');
        const countryName = $('.iti__selected-country-primary').children().first().attr('class').slice(-2);
        const countryCode = $('.iti__selected-dial-code').text()
        const country = countryName + countryCode ;

        console.log(country);



        $.ajax({
            type: 'POST',
            url: "{{ route('agent.add_customer') }}",
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                notes: notes,
                admin_notes: admin_notes,
                country: phone? country: null,
                customer_avatar: file? file: null,

            },
            success: function() {
                console.log('success');
                window.location.href = "{{ route('agent.app-customers') }}";
            },
            error: function(err) {
                console.log(err);
            }
        });  
    });
</script>

@endsection
