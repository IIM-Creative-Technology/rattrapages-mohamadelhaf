<template>
    <!-- Your template code for the cart page -->
    <div class="container">
      <h1>Cart</h1>
      <div v-for="cartItem in cartItems" :key="cartItem.id">
        <h2>{{ cartItem.category.name }}</h2>
        <!-- You can display other properties of the cartItem as needed -->
      </div>
      <p>Total Items: {{ cartTotal }}</p>
    </div>
  </template>
  
  
  <script>
  import { useCart } from '../Components/Cart';
  import { Link } from '@inertiajs/inertia-vue3';
  
  export default {
    setup() {
      const { cartItems, cartTotal } = useCart();
  
    //   const submitCart = () => {
    //     // Logic to submit the cart items
    //     // For example, you can send the cart items to the server or perform any other action
    //     // After successful submission, you might want to display a success message or redirect the user
    //     // For now, we'll just clear the cart
    //     clearCart();
    //   };
  
    //   const emptyCart = () => {
    //     // Logic to empty the cart
    //     // For now, we'll just clear the cart
    //     clearCart();
    //   };
  
      return {
        cartItems,
        cartTotal, 
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
  