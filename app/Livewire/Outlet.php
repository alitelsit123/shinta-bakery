<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Outlet extends Component
{
  #[On('reloadoutlet')]
  public function render()
  {
    $list = \App\Models\Outlet::all();
    return view('livewire.outlet', compact('list'));
  }
}
