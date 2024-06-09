<div>
  @if (auth()->user() && auth()->user()->role == 'admin')
  <livewire:home-admin>
  @else
  <livewire:home-member>
  @endif
</div>
