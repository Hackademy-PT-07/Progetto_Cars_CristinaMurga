<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'model', 'engine', 'price'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function extras()
    {
        return $this->belongsToMany(Extra::class);
    }
}
