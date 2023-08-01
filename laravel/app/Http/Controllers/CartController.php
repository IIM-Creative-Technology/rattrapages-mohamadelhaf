<?php
// CartController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CartItem;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();
        $cartTotal = $cartItems->count();

        return Inertia::render('Cart', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ]);
    }

    public function addToCart(Request $request)
    {
        $categoryId = $request->input('category_id');

        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
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
