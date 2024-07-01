<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Product extends Component
{
  #[On('reloadproduct')]
  public function render()
  {
    $list = \App\Models\Product::latest()->get();
    return view('livewire.product', compact('list'));
  }
}
