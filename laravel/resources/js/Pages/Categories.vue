<template>
  <div class="container mx-auto mt-8">
    <h1 class="text-3xl font-semibold mb-4 text-center">Categories</h1>
    <div class="container">
      <h5 class="text-3xl text-center">Choose Categories For the Open Buffet, you can choose each Category Once.</h5>
    </div>

    <div class="card-container">
      <!-- Render each category as a card -->
      <div v-for="category in categories" :key="category.id" class="category-card" @click="addCategoryToCart(category)">
        <h2 class="text-xl font-semibold">{{ category.name }}</h2>
        
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
    Link, 
  },
};
</script>
  
<style>


.container {
 
}

.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
  align-items: center;
  height: 100vh;
  padding: 1rem;
}

.category-card {
  width: 300px;
  min-height: 200px;
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
  margin: 1rem;
}

.category-card:hover {
  transform: scale(1.05);
}



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
}</style>
  