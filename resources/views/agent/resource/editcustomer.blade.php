@php
$configData = Helper::appClasses();
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
            <h4 class="m-0 me-2">Edit Customer</h4>
            <hr>
        </div>
    </div>
    <div class="col-md-12">
        <form  method="POST" class="add-customer" action="{{ route('agent.update_customer', $customer)}}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <h5 class="card-header">General Information</h5>
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <div class="d-flex px-3 mb-3">
                        <div action="/upload" class="dropzone needsclick" id="dropzone-basic">
                            <div class="dz-message needsclick">
                                <i class='bx bxs-tennis-ball' ></i>
                                Set Avatar
                            </div>
                            {{-- <div class="fallback">
                                <input type="file" name="customer_avatar" id="customer_avatar"/>
                            </div> --}}
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-lg-6 px-3">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required aria-describedby="defaultFormControlHelp" value="{{$customer->first_name}}"/>
                        </div>
                        <div class="col-lg-6 px-3">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required aria-describedby="defaultFormControlHelp" value="{{$customer->last_name}}"/>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-lg-6 px-3">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required aria-describedby="defaultFormControlHelp" value="{{$customer->email}}"/>
                        </div>
                        <div class="col-lg-6 px-3">
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="201-555-0123" aria-describedby="defaultFormControlHelp" value="{{$customer->phone}}"/>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-lg-12 px-3">
                            <textarea class="form-control" name="notes" placeholder="Notes by Customer" aria-describedby="defaultFormControlHelp" >{{$customer->notes}}</textarea>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-lg-12 px-3">
                            <textarea class="form-control" name="admin_notes" placeholder="Notes by admins, only visible to admins" aria-describedby="defaultFormControlHelp" >{{$customer->admin_notes}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edit-btns">
                <button type="submit" class="btn btn-primary add-customer">Save Customer</button>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <a href="/delete_customer/{{$customer->id}}" class="btn btn-danger add-customer">Delete Customer</a>
            </div>

        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.4/build/js/intlTelInput.min.js"></script>
<script>
    // ITI
    const Country = "{{$customer->country}}"
    const initialCountry = Country.slice(0,2);
    console.log(initialCountry);
    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        fixDropdownWidth: false,
        initialCountry: initialCountry? initialCountry: "us",
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
        const id = "{{$customer->id}}";
        const admin_notes = $('textarea[name="admin_notes"]').val();
        const file = $('.dz-thumbnail>img').attr('src');
        const countryName = $('.iti__selected-country-primary').children().first().attr('class').slice(-2);
        const countryCode = $('.iti__selected-dial-code').text()
        const country = countryName + countryCode ;

        $.ajax({
            type: 'POST',
            url: "{{ route('agent.update_customer')}}",
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            data: {
                id: id,
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                notes: notes,
                admin_notes: admin_notes,
                customer_avatar: file? file: null,
                country: phone? country: null,
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
