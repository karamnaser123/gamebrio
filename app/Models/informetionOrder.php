<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informetionOrder extends Model
{
  use HasFactory;
  protected $table = 'informetion_orders';
  protected $fillable =
  [
    'email',
    'phone',
    'note'
  ];
}
