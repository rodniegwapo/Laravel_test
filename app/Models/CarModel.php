<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function types()
    {
        return $this->hasMany(Type::class);
    }
}
