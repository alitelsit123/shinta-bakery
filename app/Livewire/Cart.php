<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
  public function checkout() {
    $myCarts = auth()->user()->carts;
    $total = 0;
    foreach ($myCarts as $row) {
      $total = $total + ($row->quantity * $row->product->price);
    }
    $tx = \App\Models\Transaction::create([
      'status' => 'pending',
      'token' => null,
      'delivery_address' => auth()->user()->address,
      'delivery_pinpoint' => auth()->user()->address_pinpoint,
      'subtotal' => $total,
      'total' => $total,
      'user_id' => auth()->id(),
      'confirmed_at' => null,
    ]);
    $tx->detailProducts()->delete();
    foreach ($myCarts as $row) {
      $txProducts = $tx->detailProducts()->create([
        'product_id' => $row->product_id,
        'quantity' => $row->quantity,
        'price' => $row->product->price
      ]);
    }
    auth()->user()->carts()->delete();
    $this->dispatch('pay-now', message: 'Pembayaran sedang disiapkan', token: '');
    $this->redirect('invoice-detail/'.$tx->id, navigate: true);
  }
  public function updateQuantity($id, $quantity) {
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
