<template>
    <div>
        <div class="container mx-auto px-4 py-10">
            <div class="bg-yellow-300 p-8 rounded-lg shadow">
                <h1 class="text-2xl font-bold mb-6">Unos dobavljača</h1>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="naziv" class="block text-sm font-medium text-gray-700">Naziv</label>
                        <input id="naziv" name="naziv" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="naziv" />
                    </div>

                    <div class="mb-4">
                        <label for="oib" class="block text-sm font-medium text-gray-700">OIB</label>
                        <input id="oib" name="oib" type="text" pattern="[0-9]{11}" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="oib" />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="email" />
                    </div>

                    <div class="mb-4">
                        <label for="telefon" class="block text-sm font-medium text-gray-700">Telefon</label>
                        <input id="telefon" name="telefon" type="tel" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="telefon" />
                    </div>

                    <div class="mb-4">
                        <label for="adresa" class="block text-sm font-medium text-gray-700">Adresa</label>
                        <input id="adresa" name="adresa" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="adresa" />
                    </div>

                    <div class="mb-4">
                        <label for="mjesto" class="block text-sm font-medium text-gray-700">Mjesto</label>
                        <input id="mjesto" name="mjesto" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="mjesto" />
                    </div>

                    <div class="mb-4">
                        <input id="vidljivost" name="vidljivost" type="checkbox" class="mr-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <label for="vidljivost" class="text-sm font-medium text-gray-700">Ovaj dobavljač treba biti vidljiv samo meni</label>
                    </div>

                    <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-green-700" :disabled="isSubmitting">{{ isSubmitting ? 'Unosim...':  'Unesi'}}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";

export default {
    layout: [Layout]
}

</script>

<script setup>
import InputError from "@/Components/InputError.vue";
import { ref } from "vue";

const isSubmitting = ref(false);

const submitForm = () => {
    console.log("submitForm");
    isSubmitting.value = true;
}

</script>