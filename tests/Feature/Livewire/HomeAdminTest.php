<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Tests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HomeAdminTest extends TestCase
{
  /** @test */
  public function renders_successfully()
  {
    $data = collect([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'phone' => '089237487234',
        'role' => 'admin',
        'password' => \Hash::make('admin'), // password
      ]);
      $user = \App\Models\User::where($data->except(['password'])->toArray())->first();
      if (!$user) {
        $user = \App\Models\User::firstOrCreate($data->toArray());
      } 
      
      $this->actingAs($user);
    Livewire::test(\App\Livewire\HomeAdmin::class)
      ->assertStatus(200);
  }
}