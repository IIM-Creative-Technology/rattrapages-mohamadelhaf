<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedTable extends Model
{
    use HasFactory;

    protected $fillable = ['table_number'];

    // Add any additional custom logic or relationships here
}
