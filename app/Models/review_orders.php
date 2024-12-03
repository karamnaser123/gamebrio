<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review_orders extends Model
{
  use HasFactory;
  protected $fillable = [
    'order_id',
    'user_id',
    'opinion',
    'rating',
  ];
  public function Users()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

}
