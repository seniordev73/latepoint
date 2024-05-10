@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dashboard - CRM')

@section('vendor-style')
@vite(['resources/assets/vendor/libs/apex-charts/apex-charts.scss'])
@endsection

@section('vendor-script')
@vite(['resources/assets/vendor/libs/apex-charts/apexcharts.js'])
@endsection

@section('page-script')
@vite(['resources/assets/js/dashboards-crm.js'])
@endsection

@section('content')
<div class="row">
  <!-- Customer Ratings -->
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Customer Ratings</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="customerRatings" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="customerRatings">
            <a class="dropdown-item" href="javascript:void(0);">Featured Ratings</a>
            <a class="dropdown-item" href="javascript:void(0);">Based on Task</a>
            <a class="dropdown-item" href="javascript:void(0);">See All</a>
          </div>
        </div>
      </div>
      <div class="card-body pb-0">
        <div class="d-flex align-items-center gap-3 mb-3">
          <h1 class="display-3 mb-0">4.0</h1>
          <div class="ratings">
            <i class="bx bxs-star bx-sm text-warning"></i>
            <i class="bx bxs-star bx-sm text-warning"></i>
            <i class="bx bxs-star bx-sm text-warning"></i>
            <i class="bx bxs-star bx-sm text-warning"></i>
            <i class="bx bxs-star bx-sm text-lighter"></i>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <span class="badge bg-label-primary me-3">+5.0</span>
          <span>Points from last month</span>
        </div>
      </div>
      <div id="customerRatingsChart"></div>
    </div>
  </div>
  <!--/ Customer Ratings -->
  <!-- Overview & Sales Activity -->
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title mb-0">Overview & Sales Activity</h5>
        <small class="card-subtitle">Check out each column for more details</small>
      </div>
      <div id="salesActivityChart"></div>
    </div>
  </div>
  <!--/ Overview & Sales Activity -->
  <div class="col-12 col-md-12 col-lg-4">
    <div class="row">
      <div class="col-sm-6 col-md-3 col-lg-6 mb-4">
        <div class="card">
          <div class="card-body pb-0">
            <span class="d-block fw-medium mb-1">Sessions</span>
            <h3 class="card-title mb-2">2,845</h3>
          </div>
          <div id="sessionsChart" class="mb-3"></div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/cube-secondary.png')}}" alt="cube" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <span class="fw-medium d-block mb-1">Order</span>
            <h4 class="card-title mb-2">$1,286</h4>
            <small class="text-danger fw-medium"><i class='bx bx-down-arrow-alt'></i> -13.24%</small>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column">
                <div class="card-title mb-auto">
                  <h5 class="mb-0">Generated Leads</h5>
                  <small>Monthly Report</small>
                </div>
                <div class="chart-statistics">
                  <h3 class="card-title mb-1">4,230</h3>
                  <small class="text-success text-nowrap fw-medium"><i class='bx bx-up-arrow-alt'></i> +12.8%</small>
                </div>
              </div>
              <div id="leadsReportChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">

  <!-- Top Products by -->
  <div class="col-12 col-lg-8 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-md-6">
          <div class="card-header d-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title m-0 me-2">Top Products by <span class="text-primary">Sales</span></h5>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="topSales" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topSales">
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/oneplus.png')}}" alt="oneplus">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Oneplus Nord</h6>
                    <small class="text-muted d-block mb-1">Oneplus</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <span class="fw-medium">$98,348</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/watch-primary.png')}}" alt="smart band">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Smart Band 4</h6>
                    <small class="text-muted d-block mb-1">Xiaomi</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <span class="fw-medium">$15,459</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/surface.png')}}" alt="Surface">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Surface Pro X</h6>
                    <small class="text-muted d-block mb-1">Miscrosoft</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <span class="fw-medium">$4,589</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/iphone.png')}}" alt="iphone">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">iphone 13</h6>
                    <small class="text-muted d-block mb-1">Apple</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <span class="fw-medium">$84,345</span>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/earphone.png')}}" alt="Bluetooth Earphone">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Bluetooth Earphone</h6>
                    <small class="text-muted d-block mb-1">Beats</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <span class="fw-medium">$10,374</span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-header d-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title m-0 me-2">Top Products by <span class="text-primary">Volume</span></h5>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="topVolume" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topVolume">
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/laptop-secondary.png')}}" alt="ENVY Laptop" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">ENVY Laptop</h6>
                    <small class="text-muted d-block mb-1">HP</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-3">
                    <span class="fw-medium">124k</span>
                    <span class="badge bg-label-success">+12.4%</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/computer.png')}}" alt="Apple" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Apple</h6>
                    <small class="text-muted d-block mb-1">iMac Pro</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-3">
                    <span class="fw-medium">74.9k</span>
                    <span class="badge bg-label-danger">-8.5%</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/watch.png')}}" alt="Smart Watch" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Smart Watch</h6>
                    <small class="text-muted d-block mb-1">Fitbit</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-3">
                    <span class="fw-medium">4.4k</span>
                    <span class="badge bg-label-success">+62.6%</span>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/oneplus-success.png')}}" alt="Oneplus RT" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Oneplus RT</h6>
                    <small class="text-muted d-block mb-1">Oneplus</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-3">
                    <span class="fw-medium">12,3k.71</span>
                    <span class="badge bg-label-success">+16.7%</span>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('assets/img/icons/unicons/pixel.png')}}" alt="Pixel 4a" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Pixel 4a</h6>
                    <small class="text-muted d-block mb-1">Google</small>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-3">
                    <span class="fw-medium">834k</span>
                    <span class="badge bg-label-danger">-12.9%</span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Top Products by -->

  <!-- Earning Reports -->
  <div class="col-md-6 col-lg-4 col-xl-4 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Earning Reports</h5>
          <small class="text-muted">Weekly Earnings Overview</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="earningReports" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReports">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body pb-0">
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-trending-up'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Net Profit</h6>
                <small class="text-muted">12.4k Sales</small>
              </div>
              <div class="user-progress">
                <small class="fw-medium">$1,619</small><i class='bx bx-chevron-up text-success ms-1'></i> <small class="text-muted">18.6%</small>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-success"><i class='bx bx-dollar'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Total Income</h6>
                <small class="text-muted">Sales, Affiliation</small>
              </div>
              <div class="user-progress">
                <small class="fw-medium">$3,571</small><i class='bx bx-chevron-up text-success ms-1'></i> <small class="text-muted">39.6%</small>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-secondary"><i class='bx bx-credit-card'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Total Expenses</h6>
                <small class="text-muted">ADVT, Marketing</small>
              </div>
              <div class="user-progress">
                <small class="fw-medium">$430</small><i class='bx bx-chevron-up text-success ms-1'></i> <small class="text-muted">52.8%</small>
              </div>
            </div>
          </li>
        </ul>
        <div id="reportBarChart"></div>
      </div>
    </div>
  </div>
  <!--/ Earning Reports -->

  <!-- Sales Analytics -->
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-start justify-content-between">
        <div>
          <h5 class="card-title m-0 me-2 mb-2">Sales Analytics</h5>
          <span class="badge bg-label-success me-1">+42.6%</span> <span>Than last year</span>
        </div>
        <div class="dropdown">
          <button class="btn btn-sm btn-label-primary dropdown-toggle" type="button" id="salesAnalyticsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            2022
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesAnalyticsId">
            <a class="dropdown-item" href="javascript:void(0);">2021</a>
            <a class="dropdown-item" href="javascript:void(0);">2020</a>
            <a class="dropdown-item" href="javascript:void(0);">2019</a>
          </div>
        </div>
      </div>
      <div class="card-body pb-0">
        <div id="salesAnalyticsChart"></div>
      </div>
    </div>
  </div>
  <!--/ Sales Analytics -->

  <!-- Sales By Country -->
  <div class="col-md-6 col-lg-4 col-xl-4 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between mb-3">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Sales by Countries</h5>
          <small class="text-muted">Monthly Sales Overview</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="salesByCountry" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountry">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <i class="fis fi fi-us rounded-circle fs-1"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-1">$8,567k</h6>
                  <small class="text-success fw-medium">
                    <i class='bx bx-chevron-up'></i>
                    25.8%
                  </small>
                </div>
                <small class="text-muted">United states of america</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">884k</h6>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <i class="fis fi fi-br rounded-circle fs-1"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-1">$2,415k</h6>
                  <small class="text-danger fw-medium">
                    <i class='bx bx-chevron-down'></i>
                    6.2%
                  </small>
                </div>
                <small class="text-muted">Brazil</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">645k</h6>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <i class="fis fi fi-in rounded-circle fs-1"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-1">$865k</h6>
                  <small class="text-success fw-medium">
                    <i class='bx bx-chevron-up'></i>
                    12.4%
                  </small>
                </div>
                <small class="text-muted">India</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">148k</h6>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <i class="fis fi fi-au rounded-circle fs-1"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-1">$745k</h6>
                  <small class="text-danger fw-medium">
                    <i class='bx bx-chevron-down'></i>
                    11.9%
                  </small>
                </div>
                <small class="text-muted">Australia</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">86k</h6>
              </div>
            </div>
          </li>
          <li class="d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <i class="fis fi fi-fr rounded-circle fs-1"></i>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-1">$45</h6>
                  <small class="text-success fw-medium">
                    <i class='bx bx-chevron-up'></i>
                    16.2%
                  </small>
                </div>
                <small class="text-muted">France</small>
              </div>
              <div class="user-progress">
                <h6 class="mb-0">42k</h6>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Sales By Country -->

  <!-- Sales Stats -->
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between mb-30">
        <h5 class="card-title m-0 me-2">Sales Stats</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="salesStatsID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesStatsID">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div id="salesStats"></div>
      <div class="card-body">
        <div class="d-flex justify-content-around">
          <div class="d-flex align-items-center lh-1 mb-3 mb-sm-0">
            <span class="badge badge-dot bg-success me-2"></span> Conversion Ratio
          </div>
          <div class="d-flex align-items-center lh-1 mb-3 mb-sm-0">
            <span class="badge badge-dot bg-label-secondary me-2"></span> Total requirements
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Sales Stats -->

  <!-- Team Members -->
  <div class="col-md-6 col-lg-5 mb-md-0 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Team Members</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-borderless">
          <thead>
            <tr>
              <th>Name</th>
              <th>Project</th>
              <th>Task</th>
              <th>Progress</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <img src="{{asset('assets/img/avatars/17.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Nathan Wagner</h6><small class="text-truncate text-muted">iOS Developer</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-primary rounded-pill text-uppercase">Zipcar</span></td>
              <td><small class="fw-medium">87/135</small></td>
              <td>
                <div class="chart-progress" data-color="primary" data-series="65"></div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <img src="{{asset('assets/img/avatars/8.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Emma Bowen</h6><small class="text-truncate text-muted">UI/UX Designer</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-danger rounded-pill text-uppercase">Bitbank</span></td>
              <td><small class="fw-medium">320/440</small></td>
              <td>
                <div class="chart-progress" data-color="danger" data-series="85"></div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <span class="avatar-initial rounded-circle bg-label-warning">AM</span>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Adrian McGuire</h6><small class="text-truncate text-muted">PHP Developer</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-warning rounded-pill text-uppercase">Payers</span></td>
              <td><small class="fw-medium">50/82</small></td>
              <td>
                <div class="chart-progress" data-color="warning" data-series="73"></div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <img src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Alma Gonzalez</h6><small class="text-truncate text-muted">Product Manager</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-info rounded-pill text-uppercase">Brandi</span></td>
              <td><small class="fw-medium">98/260</small></td>
              <td>
                <div class="chart-progress" data-color="info" data-series="61"></div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar me-2">
                    <img src="{{asset('assets/img/avatars/11.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0 text-truncate">Allan kristian</h6><small class="text-truncate text-muted">Frontend Designer</small>
                  </div>
                </div>
              </td>
              <td><span class="badge bg-label-success rounded-pill text-uppercase">Crypter</span></td>
              <td><small class="fw-medium">690/760</small></td>
              <td>
                <div class="chart-progress" data-color="success" data-series="77"></div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Team Members -->

  <!-- Customer Table -->
  <div class="col-md-6 col-lg-7 mb-0">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="invoice-list-table table">
          <thead>
            <tr>
              <th>Customer</th>
              <th>Amount</th>
              <th>Status</th>
              <th class="cell-fit">Paid By</th>
              <th class="cell-fit">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="{{url('/pages/profile-user')}}" class="text-body text-truncate fw-medium">Henry Barnes</a>
                    <small class="text-truncate text-muted">jok@puc.co.uk</small>
                  </div>
                </div>
              </td>
              <td>$459.65</td>
              <td><span class="badge bg-label-success"> Paid </span></td>
              <td><img src="{{asset('assets/img/icons/payments/master-'.$configData['style'].'.png')}}" class="img-fluid" width="50" alt="masterCard" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="{{asset('assets/img/avatars/20.png')}}" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="{{url('/pages/profile-user')}}" class="text-body text-truncate fw-medium">Hallie Warner</a>
                    <small class="text-truncate text-muted">hellie@war.co.uk</small>
                  </div>
                </div>
              </td>
              <td>$93.81</td>
              <td><span class="badge bg-label-warning"> Pending </span></td>
              <td><img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png')}}" class="img-fluid" width="50" alt="visaCard" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="{{asset('assets/img/avatars/9.png')}}" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="{{url('/pages/profile-user')}}" class="text-body text-truncate fw-medium">Gerald Flowers</a>
                    <small class="text-truncate text-muted">initus@odemi.com</small>
                  </div>
                </div>
              </td>
              <td>$934.35</td>
              <td><span class="badge bg-label-warning"> Pending </span></td>
              <td><img src="{{asset('assets/img/icons/payments/visa-'.$configData['style'].'.png')}}" class="img-fluid" width="50" alt="visaCard" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="{{asset('assets/img/avatars/14.png')}}" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="{{url('/pages/profile-user')}}" class="text-body text-truncate fw-medium">John Davidson</a>
                    <small class="text-truncate text-muted">jtum@upkesja.gov</small>
                  </div>
                </div>
              </td>
              <td>$794.97</td>
              <td><span class="badge bg-label-success"> Paid </span></td>
              <td><img src="{{asset('assets/img/icons/payments/paypal-'.$configData['style'].'.png')}}" class="img-fluid" width="50" alt="paypalCard" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.png"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><span class="avatar-initial rounded-circle bg-label-warning">JH</span></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="{{url('/pages/profile-user')}}" class="text-body text-truncate fw-medium">Jayden Harris</a>
                    <small class="text-truncate text-muted">wipare@tin.com</small>
                  </div>
                </div>
              </td>
              <td>$19.49</td>
              <td><span class="badge bg-label-success"> Paid </span></td>
              <td><img src="{{asset('assets/img/icons/payments/master-'.$configData['style'].'.png')}}" class="img-fluid" width="50" alt="masterCard" data-app-light-img="icons/payments/master-light.png" data-app-dark-img="icons/payments/master-dark.png"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-2"><img src="{{asset('assets/img/avatars/8.png')}}" alt="Avatar" class="rounded-circle"></div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="{{url('/pages/profile-user')}}" class="text-body text-truncate fw-medium">Rena Ferguson</a>
                    <small class="text-truncate text-muted">nur@kaomor.edu</small>
                  </div>
                </div>
              </td>
              <td>$636.27</td>
              <td><span class="badge bg-label-danger"> Failed </span></td>
              <td><img src="{{asset('assets/img/icons/payments/paypal-'.$configData['style'].'.png')}}" class="img-fluid" width="50" alt="paypalCard" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.png"></td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                      <a href="javascript:;" class="dropdown-item">Duplicate</a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Customer Table -->
</div>
@endsection
