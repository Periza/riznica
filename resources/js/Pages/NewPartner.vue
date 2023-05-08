<template>
<div>
 <div class="container mx-auto px-4 py-10">
        <div class="bg-yellow-300 p-8 rounded-lg shadow">
            <h1 class="text-2xl font-bold mb-6">Partner Registration</h1>
            <form>
                <div class="mb-4">
                    <label for="naziv" class="block text-sm font-medium text-gray-700">Naziv</label>
                    <input id="naziv" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="telefon" class="block text-sm font-medium text-gray-700">Telefon</label>
                    <input id="telefon" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="oib" class="block text-sm font-medium text-gray-700">OIB</label>
                    <input id="oib" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="adresa" class="block text-sm font-medium text-gray-700">Adresa</label>
                    <input id="adresa" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="mjesto" class="block text-sm font-medium text-gray-700">Mjesto</label>
                    <input id="mjesto" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded-md hover:bg-red-800">Submit</button>
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
