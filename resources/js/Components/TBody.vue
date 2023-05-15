<template>
    <tbody>
        <tr v-for="(data, index) in dataArray" :key="index" class="border-b-2 border-gray-300">
            <td v-for="(key, index) in Object.keys(data).filter(key => key !== 'id')" :key="index" class="px-4 py-2 border-r-2 border-gray-300">
                {{ data[key] }}
            </td>
            <td>{{ data.id }}</td>
        </tr>
    </tbody>
</template>

<script setup>
defineProps({
    dataArray: {
        type: Array,
        required: true
    }
});
</script>
