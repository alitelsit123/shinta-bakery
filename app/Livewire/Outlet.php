<?php

namespace App\Livewire;

use Livewire\Component;

class Outlet extends Component
{
  public function render()
  {
    $list = \App\Models\Outlet::all();
    return view('livewire.outlet', compact('list'));
  }
}
