<?php

namespace App\Livewire;

use Livewire\Component;

class HomeDriver extends Component
{
  public $deliveredto;
  public function finishConfirmation($id) {
    $tx = \App\Models\Transaction::findOrFail($id);
    $tx->status = 'settlement';
    $tx->delivered_to = $this->deliveredto;
    $tx->delivered_by_driver = now();
    $tx->save();
    $this->dispatch('alert-success', message: 'Pesanan Diterima, terimakasih.');
  }
  public function render()
  {
    return view('livewire.home-driver');
  }
}
