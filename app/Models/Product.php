<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
  use HasFactory,SoftDeletes;
  protected $fillable = [
    'name',
    'image',
    'description',
    'status',
    'price',
    'outlet_id',
    'stock'
  ];
  public function outlet() {
    return $this->belongsTo('App\Models\Outlet','outlet_id');
  }
}
