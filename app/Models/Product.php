<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","slug","type","description","price","quantity"
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class,'products_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class,'products_id');
    }
}
