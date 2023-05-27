<template>
    <div>
      <table>
        <tbody>
          <tr v-for="(data, index) in dataArray" :key="index" class="border-b-2 border-gray-300">
            <td v-for="(key, index) in Object.keys(data).filter(key => key !== 'id')" :key="index" class="px-4 py-2 border-r-2 border-gray-300">
              {{ data[key] }}
            </td>
            <td>
              <button @click.prevent="deleteFunction(data['id'])" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">OBRIŠI</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  import { router } from '@inertiajs/vue3';
  const emit = defineEmits(['partner-deleted']);
  defineProps({
    dataArray: {
      type: Array,
      required: true
    }
  });
  
  function deleteFunction(id) {
    router.delete(`/partners/${id}`, {
      preserveScroll: true,
      onSuccess: function() {
        emit('partner-deleted');
      }
    });
  }
</script>
  