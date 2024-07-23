<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductSingle extends Component
{
  public $item;
  use WithFileUploads;
  public $name;
  public $status;
  public $price = 0;
  public $description;
  public $image;
  public $realImage;
  public $outlet_id;
  public $stock = 0;
  public function addToCart($id,$quantity) {
    $product = \App\Models\Product::findOrFail($id);
    if ($product->stock < $quantity) {
      $this->dispatch('alert-error', message: 'Stok tersisa '.$product->stock.'!');
      return false;
    }

    $existingCart = \App\Models\Cart::whereProduct_id($id)->whereUser_id(auth()->id())->first();
    if ($existingCart) {
      $existingCart->quantity = $quantity ? $quantity: 1;
      $existingCart->save();
    } else {
      $existingCart = \App\Models\Cart::create([
        'quantity' => $quantity ? $quantity: 1,
        'product_id' => $id,
        'user_id' => auth()->id()
      ]);
    }
    $this->dispatch('alert-success', message: 'Produk dimasukan keranjang!');
  }
  public function updatedDescription() {
    if ($this->description) {
      $this->item->description = $this->description;
      $this->item->save();
    }
  }
  public function updatedStock() {
    if ($this->stock) {
      $this->item->stock = $this->stock;
      $this->item->save();
    }
  }
  public function updatedName() {
    if ($this->name) {
      $this->item->name = $this->name;
      $this->item->save();
    }
  }
  public function updatedOutletId() {
    if ($this->outlet_id) {
      $this->item->outlet_id = $this->outlet_id;
      $this->item->save();
    }
  }
  public function updatedStatus() {
    if ($this->status) {
      $this->item->status = $this->status;
      $this->item->save();
    }
  }
  public function updatedPrice() {
    if ($this->price) {
      $this->item->price = $this->price;
      $this->item->save();
    }
  }
  public function updatedImage() {
    if ($this->image) {
      $path = $this->image->store(path: 'public/products');
      $this->item->image = str_replace('public/','',$path);
      $this->item->save();
      $this->realImage = $this->item->image;
    }
  }
  public function delete($id) {
    \App\Models\Product::whereId($id)->delete();
    $this->dispatch('alert-success', message: 'Data berhasil dihapus!');
    $this->dispatch('reloadproduct')->to(Product::class);
  }
  public function updateAction() {
    $this->dispatch('alert-success', message: 'Data berhasil diubah!');
    $this->dispatch('reloadproduct')->to(Product::class);
  }
  public function mount($id) {
    $this->item = \App\Models\Product::findOrFail($id);
    $this->name = $this->item->name;
    $this->status = $this->item->status;
    $this->description = $this->item->description;
    $this->price = $this->item->price;
    $this->realImage = $this->item->realImage;
    $this->stock = $this->item->stock;
  }
  public function render()
  {
    return view('livewire.product-single');
  }
}
