<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Tests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProdukPelangganTest extends TestCase
{
  /** @test */
  public function renders_successfully()
  {
    $data = collect([
      'name' => 'member',
      'email' => 'member@gmail.com',
      'phone' => '089237487234',
      'role' => 'member',
      'password' => \Hash::make('member'), // password
    ]);
    $user = \App\Models\User::where($data->except(['password'])->toArray())->first();
    if (!$user) {
      $user = \App\Models\User::firstOrCreate($data->toArray());
    } 
    
    $this->actingAs($user);
    Livewire::test(\App\Livewire\Product::class)
      ->assertStatus(200);
  }
}