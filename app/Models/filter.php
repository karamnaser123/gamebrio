<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filter extends Model
{
  use HasFactory;
  protected $table = 'filter';
  protected $fillable =
  [
    'name',
    'data_filter',
    'namear',
    'data_filter_ar',
  ];
}
