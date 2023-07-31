<template>
    <div class="container mx-auto mt-8">
      <h1 class="text-3xl font-semibold mb-4 text-center">Categories</h1>
      <div class="card-container">
        <!-- Render each category as a card -->
        <div v-for="category in categories" :key="category.id" class="category-card">
          <h2 class="text-xl font-semibold">{{ category.name }}</h2>
          <!-- You can add additional information or buttons related to each category here -->
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { Link } from '@inertiajs/inertia-vue3';
  
  const categories = ref([
    { id: 1, name: 'Entree' },
    { id: 2, name: 'Maki' },
    { id: 3, name: 'Sushi' },
    { id: 4, name: 'Desserts' },
    { id: 5, name: 'Boisson' },
  ]);
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
  </style>
  