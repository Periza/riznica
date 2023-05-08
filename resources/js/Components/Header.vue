<template>
  <header class="bg-blue-900 text-white py-4">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center ">
        <div class="text-lg font-bold">
          RIZNICA VUKOVARSKO-SRIJEMSKE ŽUPANIJE
        </div>
        <div class="flex items-center">
          <div class="mr-4" v-if="$page.props.auth.user">
            Prijavljeni ste kao: {{ $page.props.auth.user.name }}
          </div>
          <button v-if="$page.props.auth.user" @click="logout" class="bg-red-600 py-2 px-4 rounded-lg hover:bg-red-800 focus:outline-none focus:bg-gold-700">
            Logout
          </button>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from 'vue';

const user = ref("");

const logout = () => {
  // Implement your logout logic here
};
</script>