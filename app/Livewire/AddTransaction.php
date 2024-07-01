<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class AddTransaction extends Component
{
  public $search;
  public $selectedProductIds = [];
  public $selectedCarts = [];
  #[Validate('required', onUpdate: false)]
  public $status;
  #[Validate('required', onUpdate: false)]
  public $user_id;
  #[Validate('required', onUpdate: false)]
  public $date_order;
  #[Validate('required', onUpdate: false)]
  public $type;
  public function addToSelectedProduct($id) {
    $t = $this->selectedProductIds;
    if (($key = array_search($id, $t)) !== false) {
      unset($t[$key]);
    } else {
      $t[] = $id;
    }

    $this->selectedProductIds = array_values($t);
  }
  public function updateQuantity($id, $quantity) {
    $this->selectedCarts[$id] = $quantity;
  }
  public function store() {
    $this->validate();
    $products = \App\Models\Product::whereIn('id', $this->selectedProductIds)->get();
    $total = 0;
    foreach ($products as $row) {
      $total = $total + ($row->price * $this->selectedCarts[$row->id]);
    }
    $tx = \App\Models\Transaction::create([
      'status' => $this->status,
      'token' => null,
      'delivery_address' => auth()->user()->address,
      'subtotal' => $total,
      'total' => $total,
      'user_id' => $this->user_id,
      'confirmed_at' => null,
      'type' => $this->type,
      'date_order' => $this->date_order
    ]);
    $tx->detailProducts()->delete();
    foreach ($products as $row) {
      $txProducts = $tx->detailProducts()->create([
        'product_id' => $row->id,
        'quantity' => $this->selectedCarts[$row->id],
        'price' => $row->price
      ]);
    }
    $this->dispatch('alert-success', message: "Transaksi dibuat!");
    $this->dispatch('reloadtransaction')->to(Transaction::class);
  }
  public function render()
  {
    if ($this->search) {
      $searchedProducts = \App\Models\Product::query();
      $searchedProducts->where('name','like', '%'.$this->search.'%');
      $searchedProducts = $searchedProducts->take(3)->get();
    } else {
      $searchedProducts = [];
    }
    return view('livewire.add-transaction',compact('searchedProducts'));
  }
}
