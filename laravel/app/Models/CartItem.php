<?php

// app/Models/CartItem.php

// CartItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}


