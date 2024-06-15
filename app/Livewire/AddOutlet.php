<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class AddOutlet extends Component
{
  use WithFileUploads;
  #[Validate('required')]
  public $name;
  #[Validate('required')]
  public $address;
  #[Validate('required')]
  public $close_time;
  #[Validate('required')]
  public $open_time;
  #[Validate('required')]
  public $image;
  public function store() {
    try {
      $this->validate();
      $existing = \App\Models\Outlet::where(['name' => $this->name])->first();
      if ($existing) {
        $this->dispatch('alert-error', message: "Outlet sudah ada!");
      } else {
        $outlet = \App\Models\Outlet::create([
          'name' => $this->name,
          'open_time' => $this->open_time,
          'close_time' => $this->close_time,
          'address' => $this->address
        ]);
        $path = $this->image->store(path: 'public/outlets');
        $outlet->image = str_replace('public/','',$path);
        $outlet->save();
        $this->name = null;
        $this->open_time = null;
        $this->close_time = null;
        $this->address = null;
        $this->image = null;
        $this->dispatch('alert-success', message: "Outlet dibuat!");
        $this->dispatch('reloadtableoutlet');
      }
    } catch (\Throwable $th) {
      $this->dispatch('alert-error', message: "Gagal!");
      dd($th);
    }
  }
  public function render()
  {
    return view('livewire.add-outlet');
  }
}
