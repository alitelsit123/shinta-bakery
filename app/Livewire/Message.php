<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

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
  public function delete($id) {
    \App\Models\Message::whereId($id)->delete();
    $this->dispatch('alert-success', message: "Pesan dihapus!");
    $this->dispatch('reloadmsg');
  }
  #[On('reloadmsg')]
  public function render()
  {
    return view('livewire.message');
  }
}
