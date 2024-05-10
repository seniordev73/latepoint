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

])
@endsection

@section('vendor-script')
@vite([
    'resources/assets/vendor/libs/flatpickr/flatpickr.js',

])
@endsection

@section('page-script')
@vite([
    'resources/assets/js/ui-cards-analytics.js',
])
@endsection
@section('content')

<link href="{{asset('/assets/css/services_custom.css')}}" rel="stylesheet">
<style type="text/css">
    .service-disabled {
        box-shadow: inset 0px 3px 0px 0px #ca1616;
        color: #ca1616
    }
    .service-disabled-card {
        opacity: 0.5;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/resource/services') }}" class="agent-status-active text-center service_title mx-2">
                <h4 class="m-0 me-2">Services</h4>
            </a>
            <a href="{{ url('/admin/resource/categories') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Categories</h4>
            </a>
            <a href="{{ url('/admin/resource/serviceextras') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Service Extras</h4>
            </a>
            <hr>
        </div>
        <div class="">
            <div class="os-form-sub-header sub-level">
                <h3>Uncategorized</h3>
            </div>
            <div class="index-agent-boxes">
                @foreach ($services as $serv)
                @if($serv->category_id == '0')               
                    <a href="{{route('admin.resource-editservices', $serv->id) }}" class="agent-box-w agent-status-active text-center os-service {{ $serv->status === 'disabled' ? 'service-disabled-card' : '' }}">
                    
                        <div class="agent-info-w {{ $serv->status === 'disabled' ? 'service-disabled' : '' }}">
                            <div class="agent-info mt-2">
                                <div class="agent-name">{{$serv->name}}</div>
                            </div>
                        </div>
                        <div class="os-service-body">
                        @php
                           $short_description = json_decode($serv->short_description, true);
                           $offer = $short_description['offer'] ?? [];
                           $displayedAgents = [];
                           $extraAgentsCount = 0;

                          foreach ($offer as $agentId => $isOffered) {
                             if ($isOffered) {
                                 $displayedAgents[] = $agentId;
                             }
                           }
                         $extraAgentsCount = count($displayedAgents) - 2;
                        @endphp
                        <div class="os-service-agents">
                           <div class="label">Agents:</div>
    
                           <div class="agents-avatars">
                            @foreach(array_slice($displayedAgents, 0, 2) as $agentId)
                             @php
                               $agent = App\Models\Agent::find($agentId);
                             @endphp
                            @if($agent)
                               <div class="agent-avatar" style="background-image: url('{{ $agent->avatar ? asset($agent->avatar) : asset("assets/img/avatar.png") }}')"></div>
                            @endif
                           @endforeach
                           @if($extraAgentsCount > 0)
                            <div class="agents-more">+{{ $extraAgentsCount }} more</div>
                           @endif
                          </div>
                        </div>
                            <div class="os-service-info">
                                <div class="service-info-row">
                                    <div class="label">Duration:</div>
                                    <div class="value">
                                        <strong>{{$serv->duration}}</strong> min
                                    </div>
                                </div>
                                <div class="service-info-row">
                                    <div class="label">Price:</div>
                                    <div class="value">
                                      <strong>${{ number_format($serv->price_max, 2) }}</strong>
                                    </div>
                                </div>
                                <div class="service-info-row">
                                    <div class="label">Buffer:</div>
                                    <div class="value">
                                        <strong>{{$serv->buffer_before}}/{{$serv->buffer_after}}</strong> min
                                    </div>
                                </div>
                                <div class="service-info-row">
                                    <div class="label">Capacity:</div>
                                    <div class="value">
                                        <strong>{{$serv->capacity_min}} - {{$serv->capacity_max}}</strong> person
                                    </div>
                                </div>
                           </div>
                        </div>

                        <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit Service</button>
                    </a>
                    @endif
                    @endforeach
                    <a class="create-service-link-w" href="{{url('/admin/resource/createservices')}}">
                        <div class="create-service-link-i">
                            <div class="add-service-graphic-w">
                                <div class="add-service-plus"><i class="latepoint-icon latepoint-icon-plus4 fa fa-plus"></i></div>
                            </div>
                            <div class="add-service-label">Add Service</div>
                        </div>
                    </a>
                </div>

        </div>

        @foreach ($categories as $cat)  
        <div class="">
            <div class="os-form-sub-header sub-level">
                <h3>{{ $cat->name }}</h3>
            </div>
            <div class="index-agent-boxes">
                @foreach ($services as $serv)     
                 @if($serv->category_id == $cat->id)          
                    <a href="{{route('admin.resource-editservices', $serv->id) }}" class="agent-box-w agent-status-active text-center os-service {{ $serv->status === 'disabled' ? 'service-disabled-card' : '' }}">
                        <div class="agent-info-w {{ $serv->status === 'disabled' ? 'service-disabled' : '' }}">
                            <div class="agent-info mt-2">
                                <div class="agent-name">{{$serv->name}}</div>
                            </div>
                        </div>
                        <div class="os-service-body">
                            
                        @php
                           $short_description = json_decode($serv->short_description, true);
                           $offer = $short_description['offer'] ?? [];
                           $displayedAgents = [];
                           $extraAgentsCount = 0;

                          foreach ($offer as $agentId => $isOffered) {
                             if ($isOffered) {
                                 $displayedAgents[] = $agentId;
                             }
                           }
                         $extraAgentsCount = count($displayedAgents) - 2;
                        @endphp
                        <div class="os-service-agents">
                           <div class="label">Agents:</div>
    
                           <div class="agents-avatars">
                            @foreach(array_slice($displayedAgents, 0, 2) as $agentId)
                             @php
                               $agent = App\Models\Agent::find($agentId);
                             @endphp
                            @if($agent)
                               <div class="agent-avatar" style="background-image: url('{{ $agent->avatar ? asset($agent->avatar) : asset("assets/img/avatar.png") }}')"></div>
                            @endif
                           @endforeach
                           @if($extraAgentsCount > 0)
                            <div class="agents-more">+{{ $extraAgentsCount }} more</div>
                           @endif
                          </div>
                        </div>
                            <div class="os-service-info">
                                <div class="service-info-row">
                                    <div class="label">Duration:</div>
                                    <div class="value">
                                        <strong>{{$serv->duration}}</strong> min
                                    </div>
                                </div>
                                <div class="service-info-row">
                                    <div class="label">Price:</div>
                                    <div class="value">
                                        <strong>${{ number_format($serv->price_max, 2) }}</strong>
                                    </div>
                                </div>
                                <div class="service-info-row">
                                    <div class="label">Buffer:</div>
                                    <div class="value">
                                        <strong>{{$serv->buffer_before}}/{{$serv->buffer_after}}</strong> min
                                    </div>
                                </div>
                                <div class="service-info-row">
                                    <div class="label">Capacity:</div>
                                    <div class="value">
                                        <strong>{{$serv->capacity_min}} - {{$serv->capacity_max}}</strong> person
                                    </div>
                                </div>
                           </div>
                        </div>

                        <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit Service</button>
                    </a>
                    @endif
                @endforeach
                <a class="create-service-link-w" href="{{ url('/admin/resource/createservices?category_id=' . $cat->id) }}">
                    <div class="create-service-link-i">
                        <div class="add-service-graphic-w">
                            <div class="add-service-plus"><i class="latepoint-icon latepoint-icon-plus4 fa fa-plus"></i></div>
                        </div>
                        <div class="add-service-label">Add Service</div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
