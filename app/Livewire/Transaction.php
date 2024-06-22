<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Transaction extends Component
{
  public function changeStatus($id,$status) {
    $tx = \App\Models\Transaction::findOrFail($id);
    $tx->status = $status;
    if ($tx->status == 'confirmed') {
      $tx->confirmed_at = now();
    } else if($tx->status == 'settlement') {
      // $tx->courier_id = null;
    }
    $tx->save();
    $this->dispatch('alert-success', message: 'Status diubah'.($status == 'confirmed' ? ' silahkan pilih kurir':''));
  }
  public function changeCourier($id,$courier_id) {
    $tx = \App\Models\Transaction::findOrFail($id);
    $tx->courier_id = $courier_id;
    $tx->save();
    $this->dispatch('alert-success', message: 'Kurir diubah');
  }
  public function delete($id) {
    \App\Models\Transaction::whereId($id)->delete();
    $this->dispatch('alert-success', message: 'Data berhasil dihapus!');
    $this->dispatch('reloadtransaction');
  }
  #[On('reloadtransaction')]
  public function render()
  {
    $list = [];
    if (auth()->user()->role == 'admin') {
      $list = \App\Models\Transaction::get();
    } else {
      $list = \App\Models\Transaction::whereUser_id(auth()->id())->get();
    }

    return view('livewire.transaction', compact('list'));
  }
}
