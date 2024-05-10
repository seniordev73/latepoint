@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('vendor-style')

@vite([
'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
'resources/assets/vendor/libs/select2/select2.scss',


])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
'resources/assets/vendor/libs/flatpickr/flatpickr.js',
'resources/assets/vendor/libs/select2/select2.js',



])
@endsection

@section('page-script')
@vite([
'resources/assets/js/tables-datatables-advanced.js',
'resources/assets/js/forms-pickers.js',
'resources/assets/js/forms-selects.js',
'resources/assets/js/form-basic-inputs.js',
])
@endsection

@section('content')

<style type="text/css">
    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>

<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header flex-column flex-md-row">
        <h5 class="card-header">Payments</h5>
        <div class="text-end">
            <button type="button" class="btn btn-primary">Download CSV</button>
        </div>
    </div>
    <div class="card-datatable text-nowrap">
        <table class="dt-column-search-1 table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Token</th>
                    <th>Booking ID</th>
                    <th>Customer</th>
                    <th>Processor</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Funds Status</th>
                    <th>Date</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection
