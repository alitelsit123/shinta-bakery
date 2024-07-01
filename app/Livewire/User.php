<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
class User extends Component
{
  use WithFileUploads;
  public $id;
  #[Validate('required')]
  public $name;
  #[Validate('required')]
  public $email;
  #[Validate('required')]
  public $phone;
  #[Validate('required')]
  public $address;
  public $password;
  #[Validate('required')]
  public $role;
  public $image;
  public function update() {
    $this->validate();
    try {
      $email = $this->email;
      $phone = $this->phone;
      $existing = \App\Models\User::where(function($query) use ($email,$phone) {
        $query->where('email', $email)->orWhere('phone', $phone);
      })->where('id', '<>', $this->id)->first();
      if ($existing) {
        $this->dispatch('alert-error', message: "Email / Nomor HP sudah ada!");
      } else {
        \App\Models\User::whereId($this->id)->update([
          'name' => $this->name,
          'email' => $this->email,
          'phone' => $this->phone,
          'role' => $this->role,
          'address' => $this->address,
        ]);
        $user = \App\Models\User::find($this->id);
        if ($this->password) {
          $user->password = \Hash::make($this->password);
        }
        if ($this->image) {
          $path = $this->image->store(path: 'public/users');
          $user->photo = str_replace('public/','',$path);
        }
        $user->save();
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->role = '';
        $this->address = '';
        $this->dispatch('alert-success', message: "User diubah!");
        $this->dispatch('reloaduser');
      }
    } catch (\Throwable $th) {
      $this->dispatch('alert-error', message: "Gagal!");
    }
  }
  public function updatedId() {
    $user = \App\Models\User::find($this->id);
    $this->name = $user->name;
    $this->email = $user->email;
    $this->phone = $user->phone;
    $this->role = $user->role;
    $this->address = $user->address;
  }
  public function delete($id) {
    \App\Models\User::find($id)->delete();
    $this->dispatch('alert-success', message: "User dihapus!");
    $this->dispatch('reloaduser');
  }
  #[On('reloaduser')]
  public function render()
  {
    return view('livewire.user');
  }
}
