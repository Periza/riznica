<template>
  <div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="modal-overlay absolute inset-0 bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-96 mx-auto rounded shadow-lg z-50 overflow-y-auto">
      <div class="modal-content py-4 px-6">
        <slot></slot>
      </div>
      <div class="modal-footer bg-gray-100 py-4 px-6 flex justify-end">
        <button class="btn btn-red mr-2" @click="deleteItem">Da</button>
        <button class="btn btn-gray" @click="cancelDelete">Odustani</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { router, usePage } from '@inertiajs/vue3';

const page = usePage();
    const props = defineProps({
        supplierId: {
            type: Number,
            required: true
        }
    });

    const emit = defineEmits(['closeModal']);

    function deleteItem() {
        router.delete(`/supplier/${props.supplierId}`, {
        preserveScroll: true,
        preserveState: true,
        data: {
            page: page.props.suppliers.current_page
        }
        });
        emit('closeModal');
    }

    function cancelDelete() {
        emit('closeModal');
    }
</script>