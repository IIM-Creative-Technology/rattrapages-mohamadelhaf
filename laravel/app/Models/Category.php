<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Add any additional custom logic or relationships here
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
