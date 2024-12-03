<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'description',
    'namear',
    'descriptionar',
    'price',
    'discount',
    'quantity',
  ];

  public function typegame()
  {
    return $this->belongsTo(typegames::class, 'type');
  }
  public function filtergame()
  {
    return $this->belongsTo(filter::class, 'filter');
  }
  public function orders()
  {
    return $this->belongsToMany(orders::class, 'order_product')
      ->withPivot('name', 'image', 'quantity');
  }
}
