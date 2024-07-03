<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  use HasFactory;
  protected $fillable = [
    'status',
    'token',
    'delivery_address',
    'delivery_pinpoint',
    'subtotal',
    'total',
    'user_id',
    'courier_id',
    'provider_id',
    'confirmed_at',
    'notified_at',
    'type',
    'date_order',
    'date_pickup',
    'note',
    'delivered_to'
  ];
  public function user() {
    return $this->belongsTo('App\Models\User', 'user_id');
  }
  public function courier() {
    return $this->belongsTo('App\Models\User', 'courier_id');
  }
  public function detailProducts() {
    return $this->hasMany('App\Models\TransactionProduct', 'transaction_id');
  }
}
