<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
    \App\Models\User::query()->delete();
    \App\Models\User::create([
      'name' => 'admin',
      'email' => 'admin@gmail.com',
      'phone' => '089000000000',
      'role' => 'admin',
      'password' => \Hash::make('admin')
    ]);
    \App\Models\User::create([
      'name' => 'driver',
      'email' => 'driver@gmail.com',
      'phone' => '089000000000',
      'role' => 'driver',
      'password' => \Hash::make('driver')
    ]);
    \App\Models\User::create([
      'name' => 'member',
      'email' => 'member@gmail.com',
      'phone' => '089000000000',
      'role' => 'member',
      'password' => \Hash::make('member')
    ]);
  }
}
