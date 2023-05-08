<template>
  <header class="bg-blue-900 text-white py-4">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center ">
        <div class="text-lg font-bold">
          Riznica {{ currentYear }}
        </div>
        <div class="flex items-center">
          <div class="mr-4">
            Prijavljeni ste kao: {{ $page.props.auth.user.name }}
          </div>
          <button @click="logout" class="bg-red-600 py-2 px-4 rounded-lg hover:bg-red-800 focus:outline-none focus:bg-gold-700">
            Logout
          </button>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps(
    {
        loggedInUser: Object,
        currentYear: Number
    }
);

const logout = () => {
  // Implement your logout logic here
};
</script>