<?php
// CartController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        // Fetch all cart items from the database
        $cartItems = CartItem::all();

        // Calculate the total count of unique categories in the cart_items table
        $totalCategories = DB::table('cart_items')->distinct('category_id')->count();

        return Inertia::render('Cart', [
            'cartItems' => $cartItems,
            'totalCategories' => $totalCategories,
        ]);
    }

    public function getCartItems()
    {
        $cartItems = CartItem::all();
        return response()->json($cartItems);
    }

    public function addToCart(Request $request)
    {
        $categoryId = $request->input('category_id');
        $name = $request->input('name'); 

        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        // Check if the category is already in the cart
        if (CartItem::where('category_id', $categoryId)->exists()) {
            return response()->json(['message' => 'Category already in cart'], 400);
        }

        $cartItem = new CartItem([
            'category_id' => $category->id,
            'name' => $category->name,
            // Add other properties as needed, such as price
        ]);

        $cartItem->save();

        $cartItems = CartItem::all();
        $cartTotal = $cartItems->count();

        return response()->json([
            'message' => 'Category added to cart successfully',
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $itemId = $request->input('item_id');

        $cartItem = CartItem::find($itemId);

        if (!$cartItem) {
            return response()->json(['message' => 'Item not found in cart'], 404);
        }

        $cartItem->delete();

        $cartItems = CartItem::all();
        $cartTotal = $cartItems->count();

        return response()->json([
            'message' => 'Item removed from cart successfully',
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ]);
    }

    public function clearCart()
    {
        CartItem::truncate();

        $cartItems = CartItem::all();
        $cartTotal = $cartItems->count();

        return response()->json([
            'message' => 'Cart cleared successfully',
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ]);
    }
}