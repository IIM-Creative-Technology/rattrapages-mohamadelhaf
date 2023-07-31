<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    public function index()
{
    $categories = [
        ['id' => 1, 'name' => 'Entree'],
        ['id' => 2, 'name' => 'Maki'],
        ['id' => 3, 'name' => 'Sushi'],
        ['id' => 4, 'name' => 'Desserts'],
        ['id' => 5, 'name' => 'Boisson'],
    ];

    return Inertia::render('Categories', ['categories' => $categories]);
}

}





