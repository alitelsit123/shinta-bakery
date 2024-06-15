<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'image',
    'description',
    'status',
    'price',
    'outlet_id'
  ];
  public function outlet() {
    return $this->belongsTo('App\Models\Outlet','outlet_id');
  }
}
