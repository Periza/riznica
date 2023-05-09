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
    </div>
</template>
<script>
    import Layout from '@/Layouts/Layout.vue'

    export default {
        layout: [Layout]
    }
</script>


<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    naziv: '',
    oib: '',
    email: '',
    telefon: '',
    adresa: '',
    mjesto: '',
});

const isSubmitting = ref(false);

const submitForm = function () {
    console.log("form submit");
    isSubmitting.value = true;
    form.post('/new-partner', {
        onSuccess: () => {
            preserveState: true;
            isSubmitting.value = false;
        },
        onError: () => {
            isSubmitting.value = false;
        }
    });
}

</script>