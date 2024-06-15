<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'address',
    'open_time',
    'close_time',
    'address_pin',
    'image'
  ];
}
