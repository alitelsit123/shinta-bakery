<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
  public function render()
  {
    $list = \App\Models\Product::has('outlet')->get();
    return view('livewire.product', compact('list'));
  }
}
