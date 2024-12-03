<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typegames extends Model
{
    use HasFactory;
    protected $table = 'typegames';
    protected $fillable =
    [
        'name',
        'namear',
    ];
}
