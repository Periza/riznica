<template>
    <thead>
      <tr>
        <td v-for="header in headers" :key="header" class="border border-gray-300">{{ header }}</td>
      </tr>
    </thead>
  </template>
  

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    headers: {
        type: Array,
        required: true
    }
});
</script>