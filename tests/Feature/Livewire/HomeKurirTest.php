<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Tests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HomeKurirTest extends TestCase
{
  /** @test */
  public function renders_successfully()
  {
    $data = collect([
        'name' => 'driver',
        'email' => 'driver@gmail.com',
        'phone' => '089237487234',
        'role' => 'driver',
        'password' => \Hash::make('driver'), // password
      ]);
      $user = \App\Models\User::where($data->except(['password'])->toArray())->first();
      if (!$user) {
        $user = \App\Models\User::firstOrCreate($data->toArray());
      } 
      
      $this->actingAs($user);
    Livewire::test(\App\Livewire\Home::class)
      ->assertStatus(200);
  }
}