<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  use HasFactory;
  protected $fillable = [
    'quantity','product_id','user_id','note'
  ];
  public function product() {
    return $this->belongsTo('App\Models\Product', 'product_id');
  }
}
