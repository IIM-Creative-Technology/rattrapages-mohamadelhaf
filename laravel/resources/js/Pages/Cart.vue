<template>
  <div class="container">
    <h1 class="text-3xl font-semibold mb-4 text-center">Cart</h1>
    <div v-for="cartItem in cartItems" :key="cartItem.id">
      <h2>{{ cartItem.name }}</h2>
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
import { useToast } from 'vue-toastification';

export default {
  
  setup() {
    const cartItems = reactive([]); 
    let totalCategories = 0; 
    const initialCartItems = []; 
    const toast = useToast();

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
        toast.success(`Cart Cleared!`);
        fetchCartItems();
      } catch (error) {
        console.error('Error clearing cart:', error);
        toast.error('Failed to Clear Cart');
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
          toast.success(`${cartId} checkout successful!`);
          await checkout(cartId); 
        } catch (error) {
          toast.error('Failed to checkout');
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
       
        await resetInterface(); 
      } catch (error) {
        console.error('Error during checkout:', error);
       
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
    Link, 
  },
};
</script>

<style>
.container {
}

.cart-items {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.cart-item {
  width: 300px;
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

</style>
