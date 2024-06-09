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
  public function updatedName() {
    if ($this->name) {
      $this->item->name = $this->name;
      $this->item->save();
      $this->dispatch('message-success', id: $this->item->id, message: 'Data berhasil diubah!');
    }
  }
  public function updatedStatus() {
    if ($this->status) {
      $this->item->status = $this->status;
      $this->item->save();
      $this->dispatch('message-success', id: $this->item->id, message: 'Data berhasil diubah!');
    }
  }
  public function updatedPrice() {
    if ($this->price) {
      $this->item->price = $this->price;
      $this->item->save();
      $this->dispatch('message-success', id: $this->item->id, message: 'Data berhasil diubah!');
    }
  }
  public function updatedImage() {
    if ($this->image) {
      $path = $this->image->store(path: 'public/products');
      $this->item->image = str_replace('public/','',$path);
      $this->item->save();
      $this->realImage = $this->item->image;
      $this->dispatch('message-success', id: $this->item->id, message: 'Data berhasil diubah!');
    }
  }
  public function mount($id) {
    $this->item = \App\Models\Product::findOrFail($id);
    $this->name = $this->item->name;
    $this->status = $this->item->status;
    $this->description = $this->item->description;
    $this->price = $this->item->price;
    $this->realImage = $this->item->realImage;
  }
  public function render()
  {
    return view('livewire.product-single');
  }
}
