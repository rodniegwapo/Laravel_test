<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
