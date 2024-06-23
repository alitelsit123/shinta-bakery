<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Checkout extends Component
{
  public $type;
  public $date_order;
  public $date_pickup;
  public $address;
  public $driver_id;
  public function selectDriver($id) {
    $this->driver_id = $id;
    $this->dispatch('alert-success', message: "Driver dipilih!");
    $this->dispatch('reloadchekout');
  }
  public function checkout() {
    if (!$this->date_pickup) {
      $this->dispatch('alert-error', message: "Silahkan pilih tanggal pengambilan!");
      return;
    }
    if ($this->type == 'delivery' && !$this->driver_id) {
      $this->dispatch('alert-error', message: "Silahkan pilih driver!");
      return;
    }
    $myCarts = auth()->user()->carts;
    $total = 0;
    foreach ($myCarts as $row) {
      $total = $total + ($row->quantity * $row->product->price);
    }
    $tx = \App\Models\Transaction::create([
      'status' => 'pending',
      'token' => null,
      'delivery_address' => $this->address,
      'delivery_pinpoint' => auth()->user()->address_pinpoint,
      'subtotal' => $total,
      'total' => $total,
      'user_id' => auth()->id(),
      'confirmed_at' => null,
      'date_order' => $this->date_order,
      'type' => $this->type
    ]);
    if ($this->date_pickup) {
      $tx->date_pickup = $this->date_pickup;
      $tx->save();
    }
    if ($this->type == 'delivery') {
      $tx->courier_id = $this->driver_id;
      $tx->save();
    }
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
  public function mount() {
    $this->address = auth()->user()->address;
    $this->date_order = \Carbon\Carbon::now()->format('Y-m-d H:i');
  }
  #[On('reloadchekout')]
  public function render()
  {
    return view('livewire.checkout');
  }
}
