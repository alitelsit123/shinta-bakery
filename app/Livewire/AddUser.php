<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
class AddUser extends Component
{
  use WithFileUploads;
  #[Validate('required')]
  public $name;
  #[Validate('required')]
  public $email;
  #[Validate('required')]
  public $phone;
  #[Validate('required')]
  public $address;
  #[Validate('required')]
  public $password;
  #[Validate('required')]
  public $role;
  #[Validate('required')]
  public $image;
  public function store() {
    $this->validate();
    try {
      $existing = \App\Models\User::where('email', $this->email)->orWhere('phone', $this->phone)->first();
      if ($existing) {
        $this->dispatch('alert-error', message: "Email / Nomor HP sudah ada!");
      } else {
        $user = \App\Models\User::create([
          'name' => $this->name,
          'email' => $this->email,
          'phone' => $this->phone,
          'role' => $this->role,
          'password' => \Hash::make($this->password),
          'address' => $this->address,
        ]);
        $path = $this->image->store(path: 'public/users');
        $user->photo = str_replace('public/','',$path);
        $user->save();
        $this->dispatch('alert-success', message: "User dibuat!");
        $this->dispatch('reloaduser')->to(User::class);
      }
    } catch (\Throwable $th) {
      $this->dispatch('alert-error', message: "Gagal!");
    }
  }
  public function render()
  {
    return view('livewire.add-user');
  }
}
