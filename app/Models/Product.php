<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Fillable attributes to allow mass-assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image', // Add image to fillable attributes
    ];

    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
