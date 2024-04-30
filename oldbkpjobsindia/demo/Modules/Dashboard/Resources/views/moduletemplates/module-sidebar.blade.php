@can('candidate')
<style>
    .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>
<li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
	<a class="nav-link" href="{{ url('dashboard') }}">
		<i class="fas fa-tachometer-alt"></i>
		<span>@lang('Dashboard')</span></a>
</li>
<li class="nav-item" style="background: #3e4095;">
	<a class="nav-link" href="{{ url('jobs') }}">
		<i class="fas fa-address-book" style="color: #ffffff;"></i>
		<span style="color: #ffffff;" class="blink_me">@lang('More Jobs Search')</span></a>
</li>
@endcan