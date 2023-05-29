<template>
    <table>
        <SupplierTableHeader v-if="headers" :headers="headers" />
        <tbody>
            
        </tbody>
    </table>
</template>

<script setup>
import { defineProps, onMounted, ref } from 'vue';
import SupplierTableHeader from './SupplierTableHeader.vue';
import { router, usePage } from '@inertiajs/vue3';

const props = defineProps(
    {
        headers: {
            type: Array,
            required: false
        },
    }
);

const suppliers = ref([]);
const page = usePage();

let removeFinishEventListener = router.on('finish', () => {
    suppliers.value = page.props.suppliers;
    console.log(suppliers.value);
});

onMounted(() => {
    router.reload({only: ['suppliers']});
});

</script>