<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;


class CheckoutController extends Controller
{
    // Method to display the checkout page
    public function index()
    {
        // You can pass any necessary data to the checkout view here
        return view('checkout.index');
    }

    // Method to create a new cart record and store it in the database
    public function createCart(Request $request)
    {
        // Generate a unique cart ID (you can use any method to generate a unique ID)
        $cartId = uniqid();
    
        // Log the cartId to see if it's generated correctly
        \Log::info('Generated Cart ID: ' . $cartId);
    
        try {
            // Create a new cart record in the database
            $cart = Cart::create([
                'cart_id' => $cartId,
            ]);
    
            // You can also store any other relevant data related to the cart in the database
            // For example, you can associate it with the user ID, add timestamps, etc.
    
            return response()->json([
                'message' => 'Cart created successfully',
                'cartId' => $cartId,
            ]);
        } catch (\Exception $e) {
            // Log any exception that occurs during cart creation
            \Log::error('Error creating cart: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error creating cart',
            ], 500);
        }
    }

    // Method to confirm the checkout and complete the purchase
    public function checkout(Request $request)
    {
        // Retrieve the cart ID from the request
        $cartId = $request->input('cart_id');
    
        // Implement your logic for the checkout process here...
    
        // Assuming the checkout was successful, clear the cart
        Cart::where('cart_id', $cartId)->delete();
    
        // Redirect to the "Welcome" page after successful checkout
        return Redirect::route('welcome')->with('success', 'Checkout successful! Thank you for your order.');
    }
    
}
