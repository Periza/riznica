<template>
    <div class="container mx-auto px-4 py-10">
            <div class="bg-yellow-300 p-8 rounded-lg shadow">
                <h1 class="text-2xl font-bold mb-6">Uređivanje dobavljača</h1>
                <Form :form="form" @form-submitted="submitForm"></Form>
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
import Form from '@/Components/Supplier/Form.vue';
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