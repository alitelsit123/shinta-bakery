<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{

  public function render()
  {
    if (auth()->user() && auth()->user()->role == 'admin') {
      $transactionWaiting = \App\Models\Transaction::whereNull('notified_at')->whereStatus('waiting')->get();
      if ($transactionWaiting->count() > 0) {
        foreach ($transactionWaiting as $row) {
          $row->notified_at = now();
          $row->save();
        }
        $this->dispatch('order-received', message: '('.$transactionWaiting->count().') Pesanan menunggu konfirmasi');
      }
    } elseif (auth()->check() && auth()->user()->role == 'member') {
      $pendings = auth()->user()->transactions()->whereNotNull('provider_id')->whereStatus('pending')->whereDate('created_at', '>', \Carbon\Carbon::now()->subDays(1))->get();
      if ($pendings->count() > 0) {
        foreach ($pendings as $row) {
          if ($row->provider_id) {
            $midtrans = new \App\Midtrans\CreateSnapTokenService($row);
            $status = $midtrans->getStatus();

            if ($status) {
              $row->status = 'waiting';
              $row->save();
              $this->dispatch('alert-success', message: 'Pembayaran berhasil, silahkan refresh halaman.');
            }
            sleep(1);
          }
        }
      }
    }
    return view('livewire.navbar');
  }
}
