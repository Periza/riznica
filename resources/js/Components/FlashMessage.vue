<template>
    <div :class="getAlertClasses">
      {{ page.props.flash?.message }}
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, defineProps, computed, watch } from 'vue';
  import { usePage } from '@inertiajs/vue3';
  const page = usePage();
  
  const getAlertClasses = computed(() => [
    'fixed',
    'bottom-4',
    'right-4',
    'p-4',
    'rounded-lg',
    {
      'bg-blue-500': page.props.flash?.type === 'info',
      'bg-green-500': page.props.flash?.type === 'success',
      'bg-red-500': page.props.flash?.type === 'error',
    },
  ]);


  </script>
  