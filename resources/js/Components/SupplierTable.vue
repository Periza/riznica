<template>
    <table>
        <SupplierTableHeader v-if="headers" :headers="headers" />
        <tbody>
            
        </tbody>
    </table>
</template>

<script setup>
import { defineProps } from 'vue';
import SupplierTableHeader from './SupplierTableHeader.vue';

const props = defineProps(
    {
        headers: {
            type: Array,
            required: false
        },
        data: {
            type: Array,
            required: false
        }
    }
);

</script>