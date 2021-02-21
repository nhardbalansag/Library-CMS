<div class="wrapper ">
  {{-- @include('layouts.navbars.sidebar') --}}
  @livewire('admin.dash-board-side-bar', ['activePage' => $activePage])
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>
