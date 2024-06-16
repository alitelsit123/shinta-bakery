<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class AddProduct extends Component
{
  use WithFileUploads;
  #[Validate('required')]
  public $name;
  public $outlet_id;
  #[Validate('required')]
  public $price = 0;
  public $description;
  #[Validate('required')]
  public $image;
  public function store() {
    try {
      $this->validate();
      $existing = \App\Models\Product::where(['name' => $this->name])->first();
      if ($existing) {
        $this->dispatch('alert-error', message: "Produk sudah ada!");
      } else {
        $product = \App\Models\Product::create([
          'name' => $this->name,
          'description' => $this->description,
          'status' => 'enabled',
          'price' => $this->price,
          'outlet_id' => $this->outlet_id,
        ]);
        $path = $this->image->store(path: 'public/products');
        $product->image = str_replace('public/','',$path);
        $product->save();
        $this->name = null;
        $this->description = null;
        $this->image = null;
        $this->price = 0;
        $this->outlet_id = null;
        $this->dispatch('alert-success', message: "Produk dibuat!");
      }
    } catch (\Throwable $th) {
      $this->dispatch('alert-error', message: "Gagal!");
      // dd($th);
    }
  }

  public function render()
  {
    return view('livewire.add-product');
  }
}
