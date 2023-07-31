<template>
    <div class="container mx-auto mt-8">
      <h1 class="text-3xl font-semibold mb-4 text-center">Cart</h1>
      <div class="cart-items">
        <div v-for="item in cartItems" :key="item.id" class="cart-item">
          <h2 class="text-xl font-semibold">{{ item.name }}</h2>
          <!-- You can display any other relevant information about the item here -->
        </div>
      </div>
      <div class="cart-total mt-4 text-center">
        <p class="text-lg font-semibold">Total Items: {{ cartTotal }}</p>
      </div>
      <div class="cart-actions mt-4 flex justify-center">
        <button class="btn-submit-cart" @click="submitCart">Submit Cart</button>
        <button class="btn-empty-cart" @click="emptyCart">Empty Cart</button>
      </div>
    </div>
  </template>
  
  <script>
  import { useCart } from '../Components/Cart';
  import { Link } from '@inertiajs/inertia-vue3';
  
  export default {
    setup() {
      const { cartItems, cartTotal, clearCart } = useCart();
  
      const submitCart = () => {
        // Logic to submit the cart items
        // For example, you can send the cart items to the server or perform any other action
        // After successful submission, you might want to display a success message or redirect the user
        // For now, we'll just clear the cart
        clearCart();
      };
  
      const emptyCart = () => {
        // Logic to empty the cart
        // For now, we'll just clear the cart
        clearCart();
      };
  
      return {
        cartItems,
        cartTotal: cartItems.length, // Calculate the total number of items in the cart
        submitCart,
        emptyCart,
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
    width: 300px; /* Set the width of each cart item */
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 1rem; /* Add margin between cart items */
  }
  
  .cart-total {
    margin-top: 2rem;
  }
  
  .btn-submit-cart,
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
  }
  
  /* Add more media queries for larger screens if needed */
  </style>
  