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

<link href="{{asset('/assets/css/createservices_custom.css')}}" rel="stylesheet">
<style type="text/css">
 .os-form-message-w {
    padding: 15px 15px 17px 50px;
    background-color: #f0f1f5;
    color: #6e7084;
    margin-bottom: 20px;
    font-weight: 500;
    font-size: 16px;
    border-radius: 6px;
    border: 1px solid #d3d4de;
    position: relative;
 }

 .os-form-message-w.status-error {
    background-color: #fff1f1;
    border: 1px solid #f2c3c3;
    border-bottom-color: #ea9898;
    color: #7f0d0d;
    box-shadow: 0px 1px 2px rgba(255, 61, 61, 0.16);
}
.os-form-message-w.status-error:before {
    background-color: #ff5839;
    box-shadow: 0px 1px 0px 0px rgba(255, 138, 138, 0.5), 0px 0px 0px 6px rgba(255, 138, 138, 0.15), 0px 0px 0px 10px rgba(255, 138, 138, 0.1), inset 0px 2px 0px 0px rgba(255, 255, 255, 0.2);
    border: 1px solid #ee1b1b;
    border-bottom-color: #ce0a0a;
}
.os-form-message-w.status-error:before {
    animation: 1s ease 0s pulseErrorPill infinite;
}
.os-form-message-w:before {
    color: #fff;
    position: absolute;
    top: 20px;
    left: 19px;
    width: 10px;
    height: 10px;
    text-align: center;
    border-radius: 50%;
    z-index: 3;
    content: "";
}
.os-form-message-w ul {
    list-style: none;
    margin: 0px;
    padding: 0px;
}
.os-form-message-w ul li:last-child {
    margin-bottom: 0px;
}
.agent-name {
    margin-left: 10px;
    color: #183fbf;
}
</style>
<div class="row">
    <form action="{{route('admin.resource-updateserviceextras')}}" method="post" class="update-serviceExtra">
        <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1" id="error_scroll_extra_edit">
            <div class="card-header mb-0">
                <h4 class="m-0 me-2">Edit Service Extra</h4>
                <hr>
            </div>
            <div class="os-form-message-w status-error" id="error-message-extra-edit" style="display: none;"><ul><li></li></ul></div>
            <div class="col-md-12 d-flex">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Basic Information</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <div class="mb-3">
                                <div class="col-lg-12 px-3 mb-3">
                                    <label for="selectpickerBasic" class="form-label">Service Extra Name</label>
                                    <input type="text" name="name" value="{{$serviceExtra->name}}" class="form-control" id="defaultFormControlInput" placeholder="Service Extra Name" aria-describedby="defaultFormControlHelp" />
                                </div>
                                <div class="col-lg-12 d-flex mb-3">
                                    <div class="col-lg-4 px-3">
                                        <label for="selectpickerBasic" class="form-label">Duration(minutes)</label>
                                        <input type="text" name="duration" value="{{$serviceExtra->duration}}" class="form-control" id="defaultFormControlInput" placeholder="Duration(minutes)" aria-describedby="defaultFormControlHelp" />
                                    </div>
                                    <div class="col-lg-4 px-3 mb-3">
                                        <label for="selectpickerBasic" class="form-label">Charge Amount</label>
                                        <input type="text" name="charge_amount" value="{{$serviceExtra->charge_amount}}" class="form-control" id="defaultFormControlInput" placeholder="$0.00" value="$0.00" aria-describedby="defaultFormControlHelp" />
                                    </div>
                                    <div class="col-lg-4 px-3 mb-3">
                                        <label for="selectpickerBasic" class="form-label">Maximum Quantity</label>
                                        <input type="text" name="max_quantity" value="{{$serviceExtra->maximum_quantity}}" class="form-control" id="defaultFormControlInput" placeholder="Maximum Quantity" value="1" aria-describedby="defaultFormControlHelp" />
                                    </div>
                                </div>
                                <div class="col-lg-12 px-3 mb-3">
                                    <label for="selectpickerBasic" class="form-label">Status</label>
                                    <div class="d-flex">
                                        <select id="selectpickerBasic" name="status_extra_edit" class="selectpicker w-100" data-style="btn-default">
                                            <option value="active">Active</option>
                                            <option value="disabled">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 px-3 mb-3">
                                    <label for="selectpickerBasic" class="form-label">Short Description</label>
                                    <div class="d-flex">
                                        <textarea class="form-control" name="short_description" rows="6" placeholder="Short Description">
                                           {{$serviceExtra->short_description}}
                                        </textarea>
                                    </div>
                                </div>                                    
                                <div class="col-lg-12 px-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" checked="">
                                        <label class="form-check-label" for="defaultCheck3">
                                            Multiply cost of this service extra by number of attendees
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <h5 class="card-header">Media</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex col-lg-12 px-3">
                                    <div class="col-lg-12" style="text-align: center;">
                                        <div action="/upload" class="dropzone needsclick" id="dropzone-basic">
                                            <div class="dz-message needsclick">
                                                Selection Image
                                            </div>
                                            <span>This image will be used as a background image of the service extra tile on booking form</span>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            @php
    $multiplied_by_attendies = json_decode($serviceExtra->multiplied_by_attendies, true);
@endphp

<div class="col-md-12 mb-4">
    <div class="card">
        <div class="d-flex justify-content-between card-header-11">
            <h5 class="card-header">Connected Services</h5>
            <div class="py-4 px-5">
                <label class="form-check-label custom-option-content selectAll" for="selectAll">
                    <input class="form-check-input" type="checkbox" value="" id="selectAll" />
                    <span class="custom-option-header">
                        <span class="h6 mb-0">Select All</span>
                    </span>
                </label>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach ($services as $service)
                    @php
                        $isChecked = $multiplied_by_attendies[$service->id] ?? false;
                    @endphp
                    <div class="col-md-12 mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-basic">
                            <label class="form-check-label custom-option-content" for="service_extra_{{ $service->id }}">
                                <input class="form-check-input service-checkbox" name="service_extra[{{ $service->id }}]" type="checkbox" id="service_extra_{{ $service->id }}" {{ $isChecked ? 'checked' : '' }} />
                                <span class="custom-option-header">
                                    <!-- <img src="{{ $service->image_url }}" class="w-px-30 border-50" /> -->
                                    <span class="h6 mb-0">{{ $service->name }}</span>
                                </span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

    
            <div>
                <button class="btn btn-primary add-location" type="submit">Update Service Extra</button>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <button class="btn btn-danger add-location" id="deleteExtraServiceButton" data-extra-id="{{$serviceExtra->id}}">Delete Service Extra</button>

            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script type="text/javascript">
    const multiplied_by_attendies ={};
    var services = @json($services);

    $(document).ready(function() {
        $('#deleteExtraServiceButton').click(function() {
        var extraId = $(this).data('extra-id');
        
        if(confirm('Are you sure you want to delete this service?')) {
            $.ajax({
                url: '/admin/resource/deleteserviceextras/' + extraId,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                },
                success: function(response) {
                    window.location.href = "{{ route('admin.resource-serviceextras') }}";
                },
                error: function(xhr, status, error) {
                    // alert('An error occurred while deleting the service.');
                    console.log(xhr.responseText);
                }
            });
        }
    });
        $('#selectAll').click(function() {
        var isChecked = $(this).prop('checked');
        $('.service-checkbox').prop('checked', isChecked);
    });

    // Handle individual service checkbox click
    $('.service-checkbox').click(function() {
        if ($('.service-checkbox:checked').length === $('.service-checkbox').length) {
            $('#selectAll').prop('checked', true);
        } else {
            $('#selectAll').prop('checked', false);
        }
    });

    // Initial check if all service checkboxes are selected
    if ($('.service-checkbox:checked').length === $('.service-checkbox').length) {
        $('#selectAll').prop('checked', true);
    }
        $('.custom-schedule-wrapper').hide();

        $('.customCheckTemp1').click(function() {
            var set_custom_schedule_status = $('#customCheckTemp1')[0].checked;
            if (set_custom_schedule_status == true) {
                $('.first_section').hide();
                $('.custom-schedule-wrapper').show();
            }else{
                $('.first_section').show();
                $('.custom-schedule-wrapper').hide();
            }
        });

       
    });

    $('form.update-serviceExtra').on('submit', function(e) {
        e.preventDefault();
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        const id = "{{$serviceExtra->id}}";
        const name = $('input[name="name"]').val();
        const duration = $('input[name="duration"]').val() || 60 ;
        const charge_amount = $('input[name="charge_amount"]').val() || 0;
        const max_quantity = $('input[name="max_quantity"]').val() || 1;
        const status = $('select[name="status_extra_edit"]').val();
        const short_description = $('textarea[name="short_description"]').val();
        const selection_image_id = $('.dz-thumbnail>img').attr('src');
        services.forEach(element => {
            multiplied_by_attendies[element.id] = $(`input[name="service_extra[${element.id}]"]`).prop('checked');
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('admin.resource-updateserviceextras') }}",
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            data: {
                id: id,
                name: name,
                duration: duration,
                charge_amount: charge_amount,
                max_quantity: max_quantity,
                status: status,
                short_description: short_description,
                selection_image_id: selection_image_id,
                multiplied_by_attendies: JSON.stringify(multiplied_by_attendies)
            },
            success: function() {
                console.log('success');
                window.location.href = "{{ route('admin.resource-serviceextras') }}";
            },
            error: function(err) {
                var errorMessage = 'An error occurred. Please try again.';
                if (err.responseJSON && err.responseJSON.message) {
                    errorMessage = err.responseJSON.message;
                }
                $('#error-message-extra-edit').text(errorMessage).show();
                // Scroll to the error message
              $('html, body').animate({
                  scrollTop: $("#error_scroll_extra_edit").offset().top
              }, 500);
            }
        });
    });

</script>

@endsection
