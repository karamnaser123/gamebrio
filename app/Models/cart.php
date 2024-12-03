<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
  use HasFactory;

  protected $fillable = [
    'products_id',
    'user_id',
    'quantity',
    'total_price',
  ];

  public function product()
  {
    return $this->belongsTo(products::class, 'products_id');
  }
}