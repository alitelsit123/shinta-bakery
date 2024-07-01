<?php

namespace App\Livewire;

use Livewire\Component;

class OutletSingle extends Component
{
  public $item;
  public function mount($item) {
    $this->item = $item;
  }
  public function render()
  {
    return view('livewire.outlet-single');
  }
}
