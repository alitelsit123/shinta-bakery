<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
  use WithFileUploads;
  public $name;
  public $email;
  public $phone;
  public $photo;
  public $address;
  public function updatedPhoto() {
    if ($this->photo) {
      $path = $this->photo->store(path: 'public');
      auth()->user()->update([
        'photo' => str_replace('public', '', $path)
      ]);
      $this->dispatch('alert-success', message: 'Foto diupdate!');
    }
  }
  public function updateProfile() {
    auth()->user()->update([
      'name' => $this->name,
      'phone' => $this->phone,
      'email' => $this->email,
      'address' => $this->address
    ]);
    $this->dispatch('alert-success', message: 'Profile diupdate!');
  }
  public function mount() {
    $this->name = auth()->user()->name;
    $this->phone = auth()->user()->phone;
    $this->email = auth()->user()->email;
    $this->address = auth()->user()->address;
  }
  public function render()
  {
    return view('livewire.profile');
  }
}
