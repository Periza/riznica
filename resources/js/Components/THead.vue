<template>
    <thead>
        <tr class="bg-blue-300 border-b-2">
            <th v-for="header in headers">{{ header }}</th>
        </tr>
    </thead>
</template>

<script setup>

defineProps({
    headers: {
        type: Array,
        required: true
    }
});
</script>
