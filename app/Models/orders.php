<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class orders extends Model
{
  use HasFactory;
  protected $fillable = [
    'user_id',
    'order_id',
    'email',
    'phone',
    'total_price',
    'informetion_orders',
  ];

  public function products()
  {
    return $this->belongsToMany(products::class, 'order_product')
      ->withPivot('name', 'image', 'quantity', 'price');
  }

  public function Users()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  public function Status()
  {
    return $this->belongsTo(status_orders::class, 'status');
  }
  public function informationOrder()
  {
    return $this->belongsTo(informetionOrder::class, 'informetion_orders');
  }


  public function hasReview()
  {
    return $this->reviews()->exists();
  }

  public function reviews()
  {
    return $this->hasMany(review_orders::class, 'order_id');
  }
}
