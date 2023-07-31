<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; // Import the Inertia facade
use App\Models\Category; // Import the Category model

class CartController extends Controller
{
    // Assume the cart items are stored in the session as an array
    public function index()
    {
        $cartItems = session('cart', []);

        // Calculate the cart total
        $cartTotal = array_reduce($cartItems, function ($total, $item) {
            return $total + $item['price'];
        }, 0);

        return Inertia::render('Cart', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ]);
    }

    public function addToCart(Request $request)
    {
        // Handle adding a category to the cart based on the request data
        // Add your logic here to update the cart
        // For example:

        // Get the category ID from the request
        $categoryId = $request->input('category_id');

        // Fetch the category from the database based on the category ID (assuming you have a "categories" table)
        $category = Category::find($categoryId);

        // Add the category details to the cart (assuming you have the "cart" stored in the session)
        $cartItems = session('cart', []);
        $cartItems[] = [
            'id' => $category->id,
            'name' => $category->name,
            'price' => $category->price, // Assuming your category model has a "price" attribute
        ];

        // Store the updated cart items back in the session
        session(['cart' => $cartItems]);

        // You can add additional logic here, such as showing a notification that the category was added to the cart

        return redirect()->route('cart');
    }

    public function removeFromCart(Request $request)
    {
        // Get the item ID to remove from the cart
        $itemId = $request->input('item_id');

        // Get the cart items from the session
        $cartItems = session('cart', []);

        // Remove the item with the given ID from the cart
        $cartItems = array_filter($cartItems, function ($item) use ($itemId) {
            return $item['id'] !== $itemId;
        });

        // Store the updated cart items back in the session
        session(['cart' => $cartItems]);

        return redirect()->route('cart');
    }

    public function submitCart()
    {
        // Get the cart items from the session
        $cartItems = session('cart', []);

        // Add your logic here to process the submitted cart
        // For example, you can save the cart items to the database and show a thank you message.

        // Clear the cart after submission
        session(['cart' => []]);

        return redirect()->route('cart')->with('success', 'Cart submitted successfully!');
    }
}
