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
import { watch } from 'vue';

const page = usePage();
    const props = defineProps({
        supplierId: {
            type: Number,
            required: true
        },
        searchTerm: {
          type: String,
          required: false
        }
    });

    const emit = defineEmits(['closeModal']);

    function deleteItem() {
        console.log(props.searchTerm);
        /* If the current number of elements on the page is equal to 1
        * and we make a delete request we are going to be a on a page that has no elements
        * and the table will be empty. So, if the data.length of suppliers is equal to 1
        * the page we need next time is current_page -1
        */
        const redirectPage = (page.props.suppliers.data.length == 1) ? page.props.suppliers.current_page - 1 : page.props.suppliers.current_page;
        router.delete(`/supplier/${props.supplierId}`, {
        preserveScroll: true,
        preserveState: true,
        data: {

            page: redirectPage,
            term: props.searchTerm ? props.searchTerm : undefined
        }
        });
        emit('closeModal');
    }

    function cancelDelete() {
        emit('closeModal');
    }

    
</script>