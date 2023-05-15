<template>
  <header class="bg-blue-900 text-white py-4">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center ">
        <div class="text-lg font-bold">
          <Link href="/odashboard">RIZNICA VUKOVARSKO-SRIJEMSKE ŽUPANIJE</Link>
        </div>
        <div class="flex items-center">
          <div class="mr-4" v-if="$page.props.auth.user">
           {{ $page.props.auth.user.partner.naziv.toUpperCase() }}
          </div>
          <button v-if="$page.props.auth.user" @click="logout" class="bg-red-600 py-2 px-4 rounded-lg hover:bg-red-800 focus:outline-none focus:bg-gold-700">
            ODJAVA
          </button>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({});

const logout = () => {
  form.post('/logout');
};
</script>