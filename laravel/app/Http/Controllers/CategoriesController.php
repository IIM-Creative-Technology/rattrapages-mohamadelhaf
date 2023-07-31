<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    public function index()
    {
        // Replace 'get-categories' with the appropriate route name for fetching categories
        $categories = [];

        return Inertia::render('Categories', [
            'categories' => $categories,
        ]);
    }
}





