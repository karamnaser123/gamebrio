<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class games extends Model
{
    use HasFactory;
    protected $fillable = [
        'namegames',
        'account',

    ];

    public function products()
    {
        return $this->belongsTo(products::class, 'namegames');
    }
}
