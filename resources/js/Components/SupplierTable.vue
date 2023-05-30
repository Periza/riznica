<template>
    <table v-if="props.show">
        <SupplierTableHeader v-if="headers" :headers="headers" />
        <tbody>
            <tr v-for="supplier in page.props.suppliers.data" :key="supplier.id">
                <td>{{ supplier.name }}</td>
                <td>{{ supplier.email }}</td>
                <td>{{ supplier.phone }}</td>
                <td>{{supplier.address}}</td>
                <td>{{supplier.city}}</td>
                <td>{{supplier.oib}}</td>
                <td><button @click="deleteSupplier(supplier.id)">OBRIŠI</button></td>
            </tr>
        </tbody>
        <div>
            <button v-if="page.props.suppliers.next_page_url" @click="nextPage(page.props.suppliers.next_page_url)">Next</button>
            <button v-if="page.props.suppliers.prev_page_url" @click="nextPage(page.props.suppliers.prev_page_url)">Previous</button>
        </div>
    </table>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import SupplierTableHeader from './SupplierTableHeader.vue';
import { router, usePage } from '@inertiajs/vue3';
import { onUnmounted } from 'vue';

function nextPage(page) {
    router.get(page, {preserveState: true, preserveScroll: true});
}

const page = usePage();

const props = defineProps(
    {
        show: {
            type: Boolean,
            required: true
        },
        headers: {
            type: Array,
            required: false
        }
    }
);

function deleteSupplier(id)
{
    router.delete(`/supplier/${id}`, {
        preserveScroll: true,
        preserveState: true
    });
}

</script>