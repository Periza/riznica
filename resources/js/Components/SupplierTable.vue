<template>
    <table v-if="props.show">
        <SupplierTableHeader v-if="headers" :headers="headers" />
        <tbody>
            <tr v-for="supplier in page.props.suppliers.data" :key="supplier.id" :class="{'bg-green-200': supplier.partner_id == page.props.auth.user.partner.id}">
                <td>{{ supplier.name }}</td>
                <td>{{ supplier.email }}</td>
                <td>{{ supplier.phone }}</td>
                <td>{{supplier.address}}</td>
                <td>{{supplier.city}}</td>
                <td>{{supplier.oib}}</td>
                <td v-if="supplier.partner_id == page.props.auth.user.partner.id || page.props.auth.user.partner.id == 1"><button @click="deleteSupplier(supplier.id)">OBRIŠI</button></td>
                <td v-if="supplier.partner_id == page.props.auth.user.partner.id"><button>UREDI</button></td>
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
import { router, usePage, useForm } from '@inertiajs/vue3';
import { onUnmounted } from 'vue';
import axios from 'axios';


function nextPage(page) {
    localStorage.setItem('scrollPosition', window.scrollY);
    form.get(page, {
        preserveScroll: true,
        onSuccess: () => {
            console.log("get is done!");
            console.log(this);
            console.log(localStorage.getItem('scrollPosition'));
            window.scrollTo(0, localStorage.getItem('scrollPosition'));
        }
    });
}

const form = useForm({});

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
        preserveState: true,
        data: {
            page: page.props.suppliers.current_page
        }
    });
}

onMounted(() => {
    if(localStorage.getItem('scrollPosition'))
    {
        window.scrollTo(0, localStorage.getItem('scrollPosition'));
    }
});

</script>