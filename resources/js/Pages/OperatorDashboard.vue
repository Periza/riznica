

<template>

    <main class="min-h-screen w-full bg-blue-900 flex flex-col justify-center items-center py-12">
        <div class="bg-gray-900 shadow-lg rounded-lg p-8 divide-y divide-gray-200">
        <div class="flex flex-col items-center space-y-12">
            <!-- svi -->
            <a href="novi_racun.php" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Unos računa</a>
            <Link v-if="$page.props.auth.user.id == 1"  href="/new-partner" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Novi partner</Link>
            <!-- svi -->
            <Link  href="/new-supplier" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Novi dobavljač</Link>
            <!-- svi -->
            <a href="plan.php" class="btn w-full bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Plan</a>
            <!-- svi -->
            <a href="azurirano.php" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Poslani računi</a>
            <a href="operateri.php" class="btn bg-red-600 text-white py-2 px-20 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-center">Novi operater</a>
            </div>
        </div>
    </main>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';
import { defineProps, computed } from 'vue';


export default {
    layout: [Layout]
}


</script>


