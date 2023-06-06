<template>
    <div>
        <div class="container mx-auto px-4 py-10">
            <div class="bg-yellow-300 p-8 rounded-lg shadow">
                <h1 class="text-2xl font-bold mb-6">Unos dobavljača</h1>
                <Form :form="form" @form-submitted="submitForm"></Form>
            </div>
        </div>
        <div class="text-center mb-10">
            <button @click="toggleTable" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4">{{showTable ? 'Sakrij dobavljače' : 'Prikaži dobavljače'}}</button>
        </div>
        <div class="ml-40 mb-5">
            <label for="search">Pretraga</label>
            <input type="text" @keyup="debouncedSearch" v-model="searchTerm">
        </div>
        <SupplierTable :show="showTable" :headers="headers" :searchTerm="searchTerm"></SupplierTable>
    </div>
</template>


<script>
import Layout from "@/Layouts/Layout.vue";
import SupplierTable from "@/Components/SupplierTable.vue";
import { onMounted } from "vue";

const headers = ref(['ime', 'email', 'telefon', 'adresa', 'grad', 'oib'].map(stupac => stupac.toUpperCase()));

export default {
    layout: [Layout]
}

</script>

<script setup>
import InputError from "@/Components/InputError.vue";
import Form from "@/Components/Supplier/Form.vue";
import { router, useForm, usePage } from '@inertiajs/vue3';
import { ref } from "vue";

const props = defineProps(
    {
        suppliers: {
            type: Object,
            required: true
        }
    }
);


const searchTerm = ref('');

let debounceTimer;

function debounce(func, delay) {
    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(func, delay);
}

const debouncedSearch = () => {
    debounce(search, 500);
}

function search() {
    router.get(route('supplier.create'), {
        term: searchTerm.value,
        page: page.props.suppliers.current_page,
    }, {
        preserveState: true,
        preserveScroll: true
    });
}

const showTable = ref(false);

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


const page = usePage();

const submitForm = () => {
    form.transform((data) => ({
        ...data,
        page: page.props.suppliers.current_page,
        term: searchTerm.value ? searchTerm.value : undefined
    })).post(`/new-supplier`, {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            form.reset();
        },
    });
}

function toggleTable() {
    showTable.value = !showTable.value;
    localStorage.setItem('showSupplierTable', showTable.value.toString());
}

onMounted(() => {
    const savedShowTable = localStorage.getItem('showSupplierTable');
    if(savedShowTable !== null)
    {
        showTable.value = savedShowTable === 'true';
    }

    const urlParams = new URLSearchParams(window.location.search);
    const searchT = urlParams.get('term');
    if(searchT)
    {
        searchTerm.value = searchT;
    }
    router.reload({only: ['suppliers']});
});

</script>