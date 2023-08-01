<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
    ];

    protected $table = 'cart';
    // Define any relationships with other models, if needed
    // For example, if a cart belongs to a user, you can define a user relationship like this:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
