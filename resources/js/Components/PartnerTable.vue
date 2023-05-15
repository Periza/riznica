<template>
    <div>
        <THead :headers="myHeaders" />
        <TBody :dataArray="array"></TBody>
    </div>
</template>


<script setup>
import THead from './THead.vue';
import TBody from './TBody.vue';
import { ref, onMounted, defineProps } from 'vue';

const prop = defineProps({
    array: {
        type: Array,
        required: true
    }
});

const myHeaders = ref([]);

myHeaders.value  = Object.keys(prop.array[0]).filter(key => key != 'id').map((key) => key.toUpperCase());



</script>

