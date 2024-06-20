<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class Message extends Component
{
  #[Validate('required', onUpdate: false)]
  public $name;
  #[Validate('required', onUpdate: false)]
  public $email;
  #[Validate('required', onUpdate: false)]
  public $phone;
  #[Validate('required', onUpdate: false)]
  public $message;
  public function store() {
    $this->validate();
    \App\Models\Message::create([
      'name' => $this->name,
      'email' => $this->email,
      'phone' => $this->phone,
      'message' => $this->message
    ]);
    $this->dispatch('alert-success',message: "Pesan dikirim!");
  }
  public function render()
  {
    return view('livewire.message');
  }
}
