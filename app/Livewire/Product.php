<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
  public function render()
  {
    $list = \App\Models\Product::all();
    return view('livewire.product', compact('list'));
  }
}
