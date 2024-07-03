<?php

namespace App\Livewire;

use Livewire\Component;

class InvoiceDetail extends Component
{
  public $transaction;
  public function cetak() {

  }
  public function getToken() {
    if (!$this->transaction->token) {
      $midtrans = new \App\Midtrans\CreateSnapTokenService($this->transaction);
      $snapToken = $midtrans->getSnapToken();

      $this->transaction->token = $snapToken;
      $this->transaction->save();
      $this->transaction = \App\Models\Transaction::findOrFail($this->transaction->id);
    } elseif(auth()->user()->transactions()->whereId($this->transaction->id)->whereNotNull('token')->whereStatus('pending')->whereDate('created_at', '<', \Carbon\Carbon::now()->subDays(1))) {
      $midtrans = new \App\Midtrans\CreateSnapTokenService($this->transaction);
      $snapToken = $midtrans->getSnapToken();

      $this->transaction->token = $snapToken;
      $this->transaction->save();
      $this->transaction = \App\Models\Transaction::findOrFail($this->transaction->id);
    }
    $this->dispatch('pay-now', token: $this->transaction->token);
  }
  public function finishConfirmation($id) {
    $tx = \App\Models\Transaction::findOrFail($id);
    $tx->status = 'settlement';
    $tx->save();
    $this->dispatch('alert-success', message: 'Pesanan Diterima, terimakasih.');
    $this->dispatch('reload-page');
  }
  public function mount($transaction_id) {
    $this->transaction = \App\Models\Transaction::findOrFail($transaction_id);
  }
  public function render()
  {
    return view('livewire.invoice-detail');
  }
}
