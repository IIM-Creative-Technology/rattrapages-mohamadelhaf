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
        
        return view('checkout.index');
    }

    // Method to create a new cart record and store it in the database
    public function createCart(Request $request)
    {
       
        $cartId = uniqid();

       
        \Log::info('Generated Cart ID: ' . $cartId);

        try {
            // Create a new cart record in the database
            $cart = Cart::create([
                'cart_id' => $cartId,
            ]);

           
            return response()->json([
                'message' => 'Cart created successfully',
                'cartId' => $cartId,
            ]);
        } catch (\Exception $e) {
           
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

  
        Cart::where('cart_id', $cartId)->delete();

        
        return Redirect::route('welcome')->with('success', 'Checkout successful! Thank you for your order.');
    }

}