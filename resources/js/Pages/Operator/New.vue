<template>
<div class="flex justify-center mt-10">
  <div class="grid grid-cols-1 gap-4">
    <form @submit.prevent="submitForm">
        <div>
        <label for="operator-code" class="block text-sm font-medium text-gray-700">šifra operatera</label>
        <input id="operator-code" v-model="form.sifra" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
        <label for="partner-code" class="block text-sm font-medium text-gray-700">šifra partnera</label>
        <select v-model="form.partner_id" id="partner-code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            <option></option>
            <option v-for="(partner, id) in page.props.partners" :value="partner.id">{{partner.id}} - {{ partner.naziv }}</option>
        </select>
        </div>

        <div>
        <label for="operator-name" class="block text-sm font-medium text-gray-700">ime operatera</label>
        <input v-model="form.name" id="operator-name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input v-model="form.email" id="email" name="email" type="email" class="w-64 px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-green-700" :disabled="form.processing">{{ form.processing ? 'Dodajem...':  'Dodaj operatora'}}</button>
    </form>
  </div>
</div>

</template>

<script>
import Layout from '@/Layouts/Layout.vue';
import { onMounted } from 'vue';
export default {
    layout: [Layout]
}
</script>

<script setup>
import { usePage, useForm } from '@inertiajs/vue3';

const page = usePage();

const form = useForm({
    sifra: '',
    partner_id: '',
    name: '',
    email: ''
});

function submitForm() {
    form.post(route('operator.new'));
}

onMounted(() => {

});

</script>
