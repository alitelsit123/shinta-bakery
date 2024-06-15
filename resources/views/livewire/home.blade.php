<div>
  @if (auth()->user() && auth()->user()->role == 'admin')
  <livewire:home-admin>
  @elseif(auth()->user() && auth()->user()->role == 'driver')
  <livewire:home-driver>
  @else
  <livewire:home-member>
  @endif
</div>
