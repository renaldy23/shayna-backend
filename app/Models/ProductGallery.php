<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        "products_id","photo","is_default"
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/'.$value);
    }
}
