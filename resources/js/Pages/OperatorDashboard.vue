<script setup>
import Header from '@/Components/Header.vue';
import { Head } from '@inertiajs/vue3';

import { defineProps } from 'vue';

    const props = defineProps({
        name: String,
        currentYear: Number
    });
</script>

<template>
    <Head title="Kontrolna ploča" />

    <Header :loggedInUser="name" :currentYear="currentYear"></Header>

    <main class="min-h-screen w-full bg-blue-900 flex flex-col justify-center items-center py-12">
        <div class="bg-gray-900 shadow-lg rounded-lg p-8 divide-y divide-gray-200">
        <div class="flex flex-col items-center space-y-12">
            <!-- svi -->
            <a href="novi_racun.php" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Unos računa</a>
            <a href="novi_partner.php" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Novi partner</a>
            <!-- svi -->
            <a href="novi_dobavljac.php" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Novi dobavljač</a>
            <!-- svi -->
            <a href="plan.php" class="btn w-full bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Plan</a>
            <!-- svi -->
            <a href="azurirano.php" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Poslani računi</a>
            <a href="operateri.php" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Novi operater</a>
            </div>
        </div>
    </main>
</template>

