<template>
    <div class="container mx-auto mt-8">
      <h1 class="text-3xl font-semibold mb-4 text-center">Categories</h1>
      <div class="card-container">
        <!-- Render each category as a card -->
        <div v-for="category in categories" :key="category.id" class="category-card" @click="addCategoryToCart(category)">
          <h2 class="text-xl font-semibold">{{ category.name }}</h2>
          <!-- You can add more details of the category here if needed -->
        </div>
      </div>
      <!-- Add the button or link to the cart page -->
      <a :href="route('cart')" class="btn-open-cart mt-4">Open Cart</a>
    </div>
  </template>
  
  
  <script>
  import { useCart } from '../Components/Cart';
  import { Link } from '@inertiajs/inertia-vue3';
  import { useToast } from 'vue-toastification';
  
  export default {
    props: {
      categories: {
        type: Array,
        required: true,
      },
    },
    setup() {
      const { addToCart } = useCart();
      const toast = useToast();
  
      const addCategoryToCart = async (category) => {
        try {
            const response = await addToCart(category);
          // Assuming your addToCart function returns a response with cartItems and cartTotal
          // If it's returning something else, adjust the following lines accordingly
          toast.success(`${category.name} added to cart!`);
        } catch (error) {
          console.error('Error adding category to cart:', error);
          toast.error('Failed to add category to cart');
        }
      };
  
      return {
        addCategoryToCart,
      };
    },
    components: {
      Link, // Register the Link component for use in the template
    },
  };
  </script>
  
  <style>
  /* Your custom styles for the categories page */
  
  .container {
    /* Add container styles if needed */
  }
  
  .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    align-items: center;
    height: 100vh; /* Set the height to fill the entire screen */
    padding: 1rem; /* Add padding between cards */
  }
  
  .category-card {
    width: 300px; /* Set the width of each card */
    min-height: 200px; /* Set the minimum height of each card */
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    transition: transform 0.2s ease;
    cursor: pointer;
    margin: 1rem; /* Add margin between cards */
  }
  
  .category-card:hover {
    transform: scale(1.05); /* Add a subtle scale effect on hover */
  }
  
  /* Add more media queries for larger screens if needed */
  
  .btn-open-cart {
    padding: 0.75rem 1rem;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
  }
  
  .btn-open-cart:hover {
    background-color: #45a049;
  }
  </style>
  