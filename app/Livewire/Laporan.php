<?php

namespace App\Livewire;

use Livewire\Component;

class Laporan extends Component
{
  public $startDate;
  public $endDate;
  public function export() {
    redirect('export-transactions?start_date='.$this->startDate.'&end_date='.$this->endDate);
  }
  public function render()
  {
    // dd($this->startDate);
    $list = [];
    if (auth()->user()->role == 'admin') {
      $list = \App\Models\Transaction::query();
      if ($this->startDate && $this->endDate) {
        $list->whereBetween('date_order', [$this->startDate, $this->endDate]);
      }
      $list = $list->get();
    } else {
      $list = \App\Models\Transaction::whereUser_id(auth()->id())->get();
    }
    return view('livewire.laporan', compact('list'));
  }
}
