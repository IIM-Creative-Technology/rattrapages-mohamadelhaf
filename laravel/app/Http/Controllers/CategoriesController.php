<?php
namespace App\Http\Controllers;

use App\Models\Category; // Import the Category model
use Inertia\Inertia;

class CategoriesController extends Controller
{
    public function index()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        return Inertia::render('Categories', ['categories' => $categories]);
    }
}
