<template>
    <div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
      <div class="sm:flex sm:justify-center sm:items-center min-h-screen">
        <div class="p-6 text-center">
          <h1 class="text-3xl font-semibold mb-4">Welcome</h1>
          <p class="text-gray-500 dark:text-gray-400 text-sm">
            To enter the application, please select your table number:
          </p>
  
          <div class="mt-8">
            <label for="tableNumber" class="block text-gray-600 dark:text-gray-400">
              Table Number
            </label>
            <select
              v-model="state.selectedTableNumber"
              id="tableNumber"
              class="block w-full mt-1 p-2 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg"
            >
              <option value="" disabled>Select Table Number</option>
              <option v-for="tableNumber in tableNumbers" :value="tableNumber" :key="tableNumber">
                Table {{ tableNumber }}
              </option>
            </select>
          </div>
  
          <div class="mt-6">
            <Link
              v-if="state.selectedTableNumber"
              :href="route('dashboard')"
              @click="navigateToDashboard"
              class="block w-full p-4 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg cursor-pointer"
            >
              Enter
            </Link>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { reactive } from 'vue';
  import { Link } from '@inertiajs/inertia-vue3';
  import axios from 'axios';
  
  const tableNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
  const state = reactive({
    selectedTableNumber: '',
  });
  
  // Modify the function to save the selected table to the database
  async function navigateToDashboard() {
    if (state.selectedTableNumber) {
      console.log(`User selected Table ${state.selectedTableNumber}`);
  
      // Make an API request to save the selected table to the database
      const response = await axios.post('/save-selected-table', {
        selectedTableNumber: state.selectedTableNumber,
      });
  
      console.log(response.data); // Log the response from the server
    }
  }
  </script>
  
  <style>
  /* Your style code */
  </style>
  