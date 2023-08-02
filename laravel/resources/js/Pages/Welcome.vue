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
          <button
            v-if="state.selectedTableNumber"
            @click="reserveTable"
            class="block w-full p-4 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg cursor-pointer"
          >
            Enter
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref, onMounted } from 'vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import axios from 'axios';

const tableNumbers = ref([]); // Use ref to make tableNumbers reactive
const state = reactive({
  selectedTableNumber: '',
});

// Fetch the table numbers from the backend API
async function fetchTableNumbers() {
  try {
    const response = await axios.get(route('tables.index')); 
    tableNumbers.value = response.data; 
  } catch (error) {
    console.error(error); 
  }
}

// Call the fetchTableNumbers function when the component is mounted
onMounted(fetchTableNumbers);

// Modify the function to save the selected table to the database
async function reserveTable() {
  if (state.selectedTableNumber) {
    console.log(`User selected Table ${state.selectedTableNumber}`);

    // Make an API request to reserve the selected table
    try {
      const response = await axios.post(route('tables.reserve', { tableNumber: state.selectedTableNumber }));
     
      console.log(response.data.message); 

      
      window.location.href = route('categories');
    } catch (error) {
      console.error(error);
    }
  }
}
</script>

<style>

</style>
