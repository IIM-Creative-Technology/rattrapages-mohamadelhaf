<template>
  <!-- Your template code for the cart page -->
  <div class="container">
    <h1 class="text-3xl font-semibold mb-4 text-center">Cart</h1>
    <div v-for="cartItem in cartItems" :key="cartItem.id">
      <h2>{{ cartItem.name }}</h2>
      <!-- You can display other properties of the cartItem as needed -->
    </div>
    <p>Total Items: {{ cartItems.length }}</p>
    <button class="btn-clear" @click="clearCart">Clear Cart</button>
    <br>
    <button class="btn-checkout" @click="handleCheckout">Checkout</button>

  </div>
</template>

<script>
import { reactive, onMounted } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';

export default {
  
  setup() {
    const cartItems = reactive([]); 
    let totalCategories = 0; 
    const initialCartItems = []; 

    // Fetch cart items from the server
    const fetchCartItems = async () => {
      try {
        const response = await axios.get('/api/cart-items');
        cartItems.length = 0; 
        initialCartItems.length = 0; 
        cartItems.push(...response.data); 
        initialCartItems.push(...response.data); 

        // Calculate the total count of unique categories in the cart_items table
        totalCategories = new Set(cartItems.map((cartItem) => cartItem.category_id)).size;
      } catch (error) {
        console.error('Error fetching cart items:', error);
      }
    };

    // Call the fetchCartItems function when the component is mounted
    onMounted(fetchCartItems);

    // Method to clear the entire cart
    const clearCart = async () => {
      try {
        await axios.delete('/api/clear-cart');
        fetchCartItems();
      } catch (error) {
        console.error('Error clearing cart:', error);
      }
    };

    // Method to handle the checkout process
    const handleCheckout = async () => {
      const confirmed = window.confirm('Are you sure you want to proceed with the checkout?');
      if (confirmed) {
        try {
          const response = await axios.post('/api/create-cart');
          const cartId = response.data.cartId;
          console.log('Cart ID:', cartId);
          await checkout(cartId); 
        } catch (error) {
          console.error('Error creating cart:', error);
        }
      }
    };

    const checkout = async (cartId) => {
      try {
        const response = await axios.post('/api/checkout', {
          cart_id: cartId,
        });
        console.log('Checkout response:', response.data);
        // Optionally, you can show a success notification or redirect to a success page
        await resetInterface(); // Call the resetInterface method after successful checkout
      } catch (error) {
        console.error('Error during checkout:', error);
        // Optionally, you can show an error notification or redirect to an error page
      }
    };

    // Method to reset the cart interface to the first page
    const resetInterface = async () => {
      try {
        // Clear the cart on the server
        await axios.delete('/api/clear-cart');
        // Fetch the updated cart items from the server
        await fetchCartItems();
        // Navigate to the Dashboard page
        window.location.href = '/dashboard';
      } catch (error) {

        console.error('Error resetting interface:', error);
      }
    };

    return {
      cartItems,
      totalCategories,
      clearCart,
      handleCheckout,
    };
  },
  components: {
    Link, // Register the Link component for use in the template
  },
};
</script>

<style>
/* Your custom styles for the cart page */
.container {
  /* Add container styles if needed */
}

.cart-items {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.cart-item {
  width: 300px;
  /* Set the width of each cart item */
  padding: 1rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  background-color: #ffffff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin-bottom: 1rem;
  /* Add margin between cart items */
}

.cart-total {
  margin-top: 2rem;
}

.btn-clear {
  margin-bottom: 10px; /* Add margin at the bottom of the button */
  padding: 10px 20px;
  background-color: #f44336;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.btn-clear:hover {
  background-color: #d32f2f;
}

/* Styles for the Checkout button */
.btn-checkout {
  padding: 10px 20px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.btn-checkout:hover {
  background-color: #45a049;
}

/* .btn-submit-cart,
.btn-empty-cart {
  padding: 0.75rem 1rem;
  margin: 0.5rem;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

.btn-submit-cart:hover,
.btn-empty-cart:hover {
  background-color: #45a049;
} */

/* Add more media queries for larger screens if needed */
</style>
