<template>
    <div>
        <THead :headers="myHeaders" />
        <TBody :dataArray="array" @partner-deleted="emitDelete"></TBody>
    </div>
</template>


<script setup>
import THead from './THead.vue';
import TBody from './TBody.vue';
import { ref, defineProps } from 'vue';

const emit = defineEmits(['partner-deleted']);

const prop = defineProps({
    array: {
        type: Array,
        required: true
    }
});

const myHeaders = ref([]);

myHeaders.value  = Object.keys(prop.array[0]).filter(key => key != 'id').map((key) => key.toUpperCase());

function emitDelete(id) {
    emit('partner-deleted', id);
}



</script>

