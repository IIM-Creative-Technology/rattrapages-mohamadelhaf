<template>
    <!-- Your template code for the cart page -->
    <div class="container">
      <h1>Cart</h1>
      <div v-for="cartItem in cartItems" :key="cartItem.id">
        <h2>{{ cartItem.category?.name }}</h2>
        <!-- You can display other properties of the cartItem as needed -->
      </div>
      <p>Total Items: {{ cartItems.length }}</p>
      
    </div>
  </template>
<!--   
  <script>
  import { ref, onMounted, computed } from 'vue';
  import { Link } from '@inertiajs/inertia-vue3';
  import axios from 'axios';
  
  export default {
    setup() {
      const cartItems = ref([]); // Use ref to make the cartItems reactive
  
      // Fetch cart items from the server
      const fetchCartItems = async () => {
        try {
          const response = await axios.get('/api/cart-items');
          if (Array.isArray(response.data.cartItems)) {
            cartItems.value = response.data.cartItems; // Use .value to update the ref
          }
        } catch (error) {
          console.error('Error fetching cart items:', error);
        }
      };
  
      // Call the fetchCartItems function when the component is mounted
      onMounted(fetchCartItems);
  
      // Calculate the total cart items
      const totalCartItems = computed(() => cartItems.value.length);
  
      return {
        cartItems,
        totalCartItems,
      };
    },
    components: {
      Link, // Register the Link component for use in the template
    },
  };
  </script> -->

  <script>
import { reactive, onMounted } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';

export default {
  setup() {
    const cartItems = reactive([]); // Use reactive to make the cartItems reactive
    let totalCategories = 0; // Declare totalCategories variable

    // Fetch cart items from the server
    const fetchCartItems = async () => {
      try {
        const response = await axios.get('/api/cart-items');
        cartItems.length = 0; // Clear the cartItems array
        cartItems.push(...response.data); // Add new items to the cartItems array

        // Calculate the total count of unique categories in the cart_items table
        totalCategories = response.data.reduce((count, cartItem) => {
          return count.add(cartItem.category_id);
        }, new Set()).size;
      } catch (error) {
        console.error('Error fetching cart items:', error);
      }
    };

    // Call the fetchCartItems function when the component is mounted
    onMounted(fetchCartItems);

    return {
      cartItems,
      totalCategories,
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
  