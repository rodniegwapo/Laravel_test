<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}