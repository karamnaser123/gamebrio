<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  use HasFactory;

  protected $table = 'order_product';
  protected $fillable = ['order_id', 'product_id', 'name', 'image', 'quantity'];

  public function product()
  {
    return $this->hasOneThrough(products::class, 'product_id');
  }
}
