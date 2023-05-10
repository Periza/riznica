<template>
    <div class="overflow-x-auto mx-20 mb-10 py-5" v-if="showTable && partners.length > 0">
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
</template>

<script setup>

import { defineProps } from 'vue';
import { ref } from 'vue';

const partners = ref([]);

const props = defineProps(
    {
        fetchPartners: {
            type: Function,
            requred: true
        }
    }
);

</script>