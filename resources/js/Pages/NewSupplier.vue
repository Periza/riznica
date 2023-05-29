<template>
    <div>
        <div class="container mx-auto px-4 py-10">
            <div class="bg-yellow-300 p-8 rounded-lg shadow">
                <h1 class="text-2xl font-bold mb-6">Unos dobavljača</h1>
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
                        <input v-model="hidden" id="vidljivost" name="vidljivost" type="checkbox" class="mr-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <label for="vidljivost" class="text-sm font-medium text-gray-700">Ovaj dobavljač treba biti vidljiv samo meni</label>
                    </div>

                    <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-green-700" :disabled="isSubmitting">{{ isSubmitting ? 'Unosim...':  'Unesi'}}</button>
                </form>
            </div>
        </div>
        <div class="text-center mb-10">
            <button @click="toggleTablicu" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4">{{showTable ? 'Sakrij dobavljače' : 'Prikaži dobavljače'}}</button>
        </div>
        <SupplierTable v-if="showTable" :headers="headers"/>
    </div>
</template>


<script>
import Layout from "@/Layouts/Layout.vue";
import SupplierTable from "@/Components/SupplierTable.vue";

const headers = ref(['ime', 'email', 'telefon', 'adresa', 'grad', 'oib'].map(stupac => stupac.toUpperCase()));

export default {
    layout: [Layout]
}

</script>

<script setup>
import InputError from "@/Components/InputError.vue";
import { useForm, usePage, router } from '@inertiajs/vue3';
import { ref, defineProps } from "vue";
import axios from "axios";

const props = defineProps(
    {
        courses: Object
    }
);


const form = useForm({
    name: '',
    oib: '',
    email: '',
    phone: '',
    address: '',
    city: '',
    visible_to_all: true
});

const hidden = ref(false);
const showTable = ref(false);
const isSubmitting = ref(false);

const submitForm = () => {
    isSubmitting.value = true;
    form.visible_to_all = !hidden.value;
    form.post('/new-supplier', {
        onSuccess: () => {
            form.reset();
        },
        onFinish: () => {
            isSubmitting.value = false; 
        }
    });
}


function toggleTablicu() {
    showTable.value = !showTable.value;
    router.get('/suppliers', {
        preserveScroll: true
    });
}



</script>