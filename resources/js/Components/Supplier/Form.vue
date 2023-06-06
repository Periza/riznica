<template>
    <form @submit.prevent="$emit('form-submitted')">
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
                <input id="vidljivost" name="vidljivost" type="checkbox" :checked="!form.visible_to_all" @change="toggle" class="mr-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                <label for="vidljivost" class="text-sm font-medium text-gray-700">Ovaj dobavljač treba biti vidljiv samo meni</label>
            </div>

            <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-green-700" :disabled="form.processing">{{ form.processing ? 'Spremam...':  'Spremi'}}</button>
    </form>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";


const props = defineProps({
    form: {
        type: Object,
        required: true
    },
});

function toggle() {
    console.log("toggle");
    props.form.visible_to_all = !props.form.visible_to_all;
}

const emits = defineEmits(['form-submitted']);
</script>