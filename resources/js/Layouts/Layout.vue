
<template>
    <Header />
    <main>
        <slot />
    </main>
    <FlashMessage v-if="page.props.flash"/>
</template>

<script setup>

import Header from '@/Components/Header.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { watch } from 'vue';

const page = usePage();

const showFlash = ref(true);

watch(() => page.props.flash, (newValue) => {
    if(page.props.flash) {
        if (!['success', 'error', 'info'].includes(newValue.type)) {
            console.log(`Invalid flash type: ${newValue.type}`);
        }
        setTimeout(() => {
            page.props.flash = null;
        }, 3000);
    }
})

</script>