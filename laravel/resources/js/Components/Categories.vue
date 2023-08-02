<template>
  <div class="container mx-auto mt-8">
    <h1 class="text-3xl font-semibold mb-4">Categories</h1>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
      <!-- Render each category as a card -->
      <div v-for="category in categories" :key="category.id" class="bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold">{{ category.name }}</h2>
        
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';


// Create a ref to store the categories
const categories = ref([]);

// Get the inertia object to fetch data from the backend
const { props } = usePage();

// Fetch the categories from the backend on component mount
onMounted(async () => {
  if (props.categories) {
    categories.value = props.categories;
  } else {
    // Handle the case when categories are not passed from the backend
    console.error('Categories not found in the page props.');
  }
});


</script>

<style>

</style>
