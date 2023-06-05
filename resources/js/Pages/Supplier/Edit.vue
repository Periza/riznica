<template>
    <div class="container mx-auto px-4 py-10">
            <div class="bg-yellow-300 p-8 rounded-lg shadow">
                <h1 class="text-2xl font-bold mb-6">Uređivanje dobavljača</h1>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="naziv" class="block text-sm font-medium text-gray-700">Naziv</label>
                        <input required v-model="form.name" id="naziv" name="naziv" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="naziv" :message="form.errors.name" />
                    </div>

                    <div class="mb-4">
                        <label for="oib" class="block text-sm font-medium text-gray-700">OIB</label>
                        <input pattern="[0-9]{11}" maxlength="11" required v-model="form.oib" id="oib" name="oib" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="oib" :message="form.errors.oib" />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input required v-model="form.email" id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="email" :message="form.errors.email"/>
                    </div>

                    <div class="mb-4">
                        <label for="telefon" class="block text-sm font-medium text-gray-700">Telefon</label>
                        <input required v-model="form.phone" id="telefon" name="telefon" type="tel" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="telefon" :message="form.errors.phone"/>
                    </div>

                    <div class="mb-4">
                        <label for="adresa" class="block text-sm font-medium text-gray-700">Adresa</label>
                        <input required v-model="form.address" id="adresa" name="adresa" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="adresa" :message="form.errors.address"/>
                    </div>

                    <div class="mb-4">
                        <label for="mjesto" class="block text-sm font-medium text-gray-700">Mjesto</label>
                        <input required id="mjesto" v-model="form.city" name="mjesto" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <InputError class="mt-2" name="mjesto" :message="form.errors.city"/>
                    </div>

                    <div class="mb-4">
                        <input id="vidljivost" name="vidljivost" type="checkbox" :checked="!props.supplier.visible_to_all" @change="toggle" class="mr-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <label for="vidljivost" class="text-sm font-medium text-gray-700">Ovaj dobavljač treba biti vidljiv samo meni</label>
                    </div>

                    <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-green-700" :disabled="form.processing">{{ form.processing ? 'Spremam...':  'Spremi'}}</button>
                </form>
            </div>
        </div>
</template>

<script>
export default {
    layout: [Layout]
}

</script>

<script setup>
import Layout from '@/Layouts/Layout.vue';
import { useForm } from '@inertiajs/vue3';
import { computed, watch, ref } from 'vue';
import InputError from "@/Components/InputError.vue";
import { onMounted } from 'vue';

const props = defineProps({
    supplier: {
        type: Object,
        requred: true
    }
});


function toggle() {
    form.visible_to_all = !form.visible_to_all;
}

function submitForm() {
    console.log("submit Form");
    form.put(`/supplier/${props.supplier.id}`);
}

const form = useForm({
    name: props.supplier.name || '',
    oib: props.supplier.oib || '',
    email: props.supplier.email || '',
    phone: props.supplier.phone || '',
    address: props.supplier.address || '',
    city: props.supplier.city || '',
    visible_to_all: props.supplier.visible_to_all
});

</script>