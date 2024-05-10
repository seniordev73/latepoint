@php
$configData = agent_Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  @if(!isset($navbarFull))
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{asset('assets/img/short-logo.png')}}" alt="footer-logo" class="float-right" style="width: 25px; ">
        <!-- @include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)']) -->
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2" style="text-transform: uppercase;font-size:large;">Appointment</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  @endif

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @foreach ($agent_menuData[0]->agent_menu as $agent_menu)

    {{-- adding active and open class if child is active --}}

    {{-- menu headers --}}
    @if (isset($agent_menu->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ __($agent_menu->menuHeader) }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $agent_menu->slug) {
    $activeClass = 'active';
    }
    elseif (isset($agent_menu->submenu)) {
    if (gettype($agent_menu->slug) === 'array') {
    foreach($agent_menu->slug as $slug){
    if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
    $activeClass = 'active open';
    }
    }
    }
    else{
    if (str_contains($currentRouteName,$agent_menu->slug) and strpos($currentRouteName,$agent_menu->slug) === 0) {
    $activeClass = 'active open';
    }
    }

    }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($agent_menu->url) ? url($agent_menu->url) : 'javascript:void(0);' }}" class="{{ isset($agent_menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($agent_menu->target) and !empty($agent_menu->target)) target="_blank" @endif>
        @isset($agent_menu->icon)
        <i class="{{ $agent_menu->icon }}"></i>
        @endisset
        <div class="text-truncate">{{ isset($agent_menu->name) ? __($agent_menu->name) : '' }}</div>
        @isset($agent_menu->badge)
          <div class="badge bg-{{ $agent_menu->badge[0] }} rounded-pill ms-auto">{{ $agent_menu->badge[1] }}</div>
        @endisset
      </a>

      {{-- submenu --}}
      @isset($agent_menu->submenu)
      @include('layouts.sections.menu.agent_submenu',['menu' => $agent_menu->submenu])
      @endisset
    </li>
    @endif
    @endforeach
  </ul>

</aside>
