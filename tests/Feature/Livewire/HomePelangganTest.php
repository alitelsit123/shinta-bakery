<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Tests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HomePelangganTest extends TestCase
{
  /** @test */
  public function renders_successfully()
  {
    Livewire::test(\App\Livewire\HomeMember::class)
      ->assertStatus(200);
  }
}
