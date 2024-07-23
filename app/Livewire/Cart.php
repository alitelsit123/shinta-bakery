<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
  public $note;
  public function updatedNote() {
    auth()->user()->carts()->update([
      'note' => $this->note
    ]);
  }
  public function mount() {
    $this->note = auth()->user()->carts()->first()->note ?? null;
  }
  public function updateQuantity($id, $quantity) {
    $singleCart = auth()->user()->carts()->whereId($id)->first();
    $product = \App\Models\Product::findOrFail($singleCart->product_id);
    if ($product->stock < $quantity) {
      $this->dispatch('alert-error', message: 'Stok tersisa '.$product->stock.'!');
      return false;
    }
    $cart = auth()->user()->carts()->whereId($id)->update([
      'quantity' => $quantity
    ]);
    $this->dispatch('alert-success', message: "Keranjang diupdate");
  }
  public function deleteCart($id) {
    $cart = auth()->user()->carts()->whereId($id)->delete();
    $this->dispatch('alert-success', message: "Keranjang dihapus");
  }
  public function render()
  {
    return view('livewire.cart');
  }
}
