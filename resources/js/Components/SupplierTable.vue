<template>
    <div class="flex justify-center">
      <table v-if="props.show" class="w-full max-w-lg bg-white shadow-md rounded-lg border mb-10">
        <SupplierTableHeader v-if="headers" :headers="headers" />
        <tbody>
          <tr v-for="supplier in page.props.suppliers.data" :key="supplier.id" :class="{'bg-green-200': supplier.partner_id == page.props.auth.user.partner.id}">
            <td class="border px-4 py-2">{{ supplier.name }}</td>
            <td class="border px-4 py-2">{{ supplier.email }}</td>
            <td class="border px-4 py-2">{{ supplier.phone }}</td>
            <td class="border px-4 py-2">{{ supplier.address }}</td>
            <td class="border px-4 py-2">{{ supplier.city }}</td>
            <td class="border px-4 py-2">{{ supplier.oib }}</td>
            <td v-if="supplier.partner_id == page.props.auth.user.partner.id || page.props.auth.user.partner.id == 1" class="border px-4 py-2">
              <button @click="deleteSupplier(supplier.id, supplier.name)" class="px-4 py-2 bg-red-500 text-white rounded">OBRIŠI</button>
            </td>
            <td v-if="supplier.partner_id == page.props.auth.user.partner.id" class="border px-4 py-2">
              <button class="px-4 py-2 bg-blue-500 text-white rounded">UREDI</button>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="7">
              <div class="flex justify-between">
                <button v-if="page.props.suppliers.prev_page_url" @click="nextPage(page.props.suppliers.prev_page_url)" class="text-sm">Prev</button>
                <div v-else></div>
                <button v-if="page.props.suppliers.next_page_url" @click="nextPage(page.props.suppliers.next_page_url)" class="text-sm ml-auto">Next</button>
              </div>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <DeleteModal v-if="showDeleteConfirmation" :supplier-id="selectedSupplierId" @close-modal="closeModal">
      <template #default>
        <p class="text-red-600">
          Jeste li sigurni da želite obrisati dobavljača {{selectedSupplierName}}?
        </p>
      </template>
    </DeleteModal>
  </template>



<script setup>
import { onMounted, ref } from 'vue';
import SupplierTableHeader from './SupplierTableHeader.vue';
import { router, usePage, useForm } from '@inertiajs/vue3';
import DeleteModal from './DeleteModal.vue';


const showDeleteConfirmation = ref(false);
const selectedSupplierName = ref('');
const selectedSupplierId = ref(-1);

function closeModal() {
  showDeleteConfirmation.value = false;
}

function nextPage(page) {
    localStorage.setItem('scrollPosition', window.scrollY);
    form.get(page, {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            window.scrollTo(0, document.body.scrollHeight);
        }
    });
}

const form = useForm({});

const page = usePage();

const props = defineProps(
    {
        show: {
            type: Boolean,
            required: true
        },
        headers: {
            type: Array,
            required: false
        }
    }
);

function deleteSupplier(id, name)
{
    selectedSupplierName.value = name;
    selectedSupplierId.value = id;
    showDeleteConfirmation.value = true;
}

onMounted(() => {
    if(localStorage.getItem('scrollPosition'))
    {
        window.scrollTo(0, localStorage.getItem('scrollPosition'));
    }
});

</script>