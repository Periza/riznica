<template>
<div>
 <div class="container mx-auto px-4 py-10">
        <div class="bg-yellow-300 p-8 rounded-lg shadow">
            <h1 class="text-2xl font-bold mb-6">Partner Registration</h1>
            <form @submit.prevent="submitForm">
                <div class="mb-4">
                    <label for="naziv" class="block text-sm font-medium text-gray-700">Naziv</label>
                    <input v-model="form.naziv" id="naziv" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <InputError class="mt-2" :message="form.errors.naziv" />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input v-model="form.email" id="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mb-4">
                    <label for="telefon" class="block text-sm font-medium text-gray-700">Telefon</label>
                    <input v-model="form.telefon" id="telefon" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <InputError class="mt-2" :message="form.errors.telefon" />
                </div>
                <div class="mb-4">
                    <label for="oib" class="block text-sm font-medium text-gray-700">OIB</label>
                    <input v-model="form.oib" id="oib" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <InputError class="mt-2" :message="form.errors.oib" />
                </div>
                <div class="mb-4">
                    <label for="adresa" class="block text-sm font-medium text-gray-700">Adresa</label>
                    <input v-model="form.adresa" id="adresa" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <InputError class="mt-2" :message="form.errors.adresa" />
                </div>
                <div class="mb-4">
                    <label for="mjesto" class="block text-sm font-medium text-gray-700">Mjesto</label>
                    <input v-model="form.mjesto" id="mjesto" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <InputError class="mt-2" :message="form.errors.mjesto" />
                </div>
                <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-red-800" :disabled="isSubmitting">{{ isSubmitting ? 'Dodajem...':  'Dodaj'}}</button>
            </form>
        </div>
    </div>
    <div class="text-center">
      <button @click.prevent="prikaziTablicu" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4">
        {{ showTable ? 'Sakrij partnere' : 'Prikaži partnere' }}
      </button>
      <div class="overflow-x-auto mx-20" v-if="showTable && partners.length > 0">
  <table class="w-full border-l-2 border-gray-400">
    <thead>
        <tr>
            <th class="border-2 border-gray-400 px-4 py-2">Naziv</th>
            <th class="border-2 border-gray-400 px-4 py-2">Email</th>
            <th class="border-2 border-gray-400 px-4 py-2">Telefon</th>
            <th class="border-2 border-gray-400 px-4 py-2">OIB</th>
            <th class="border-2 border-gray-400 px-4 py-2">Adresa</th>
            <th class="border-2 border-gray-400 px-4 py-2">Mjesto</th>
        </tr>
</thead>
    <tbody>
      <tr v-for="(partner, index) in partners" :key="index" class="border-b-2 border-gray-300">
        <td class="px-4 py-2 border-r-2 border-gray-300">{{ partner.naziv }}</td>
        <td class="px-4 py-2 border-r-2 border-gray-300">{{ partner.email }}</td>
        <td class="px-4 py-2 border-r-2 border-gray-300">{{ partner.telefon }}</td>
        <td class="px-4 py-2 border-r-2 border-gray-300">{{ partner.oib }}</td>
        <td class="px-4 py-2 border-r-2 border-gray-300">{{ partner.adresa }}</td>
        <td class="px-4 py-2 border-r-2 border-gray-300">{{ partner.mjesto }}</td>
        <td class="px-10"><button @click.prevent="deletePartner(partner.id)" class="bg-red-500 hover:bg-red-700 rounded p-2" >Obriši</button></td>
      </tr>
    </tbody>
  </table>
</div>

    </div>
    </div>
</template>
<script>
import Layout from '@/Layouts/Layout.vue'
import axios from 'axios';

    export default {
        layout: [Layout]
    }
</script>


<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';

const deletePartner = async function(id) {
    await axios.delete(`/partners/${id}`);
    if(showTable.value)
        await fetchPartners();
}

const form = useForm({
    naziv: '',
    oib: '',
    email: '',
    telefon: '',
    adresa: '',
    mjesto: '',
});

const isSubmitting = ref(false);

const showTable = ref(false);
const partners = ref([]);

const fetchPartners = async function() {
    const response = await axios.get('/partners');
    partners.value = response.data;

}

const prikaziTablicu = function() {
    showTable.value = !showTable.value;
    if(showTable.value) {
        fetchPartners();
    }
}


const submitForm = function () {
    isSubmitting.value = true;
    form.post('/new-partner', {
        onSuccess: () => {
            form.reset();
            isSubmitting.value = false;
            if(showTable.value) {
                fetchPartners();
            }
        },
        onError: () => {
            isSubmitting.value = false;
        }
    });
}

</script>