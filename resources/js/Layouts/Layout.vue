
<template>
    <Header />
    <main>
        <slot />
    </main>
    <FlashMessage v-if="flash"/>
</template>

<script setup>

import Header from '@/Components/Header.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { watch, provide } from 'vue';

const page = usePage();

const flash = ref(false);

provide('showFlash', showFlash);


function showFlash() {
    flash.value = true;
    const timeout = setTimeout(() => {
        flash.value = false;
        // if duration is not defined from the backend set it to tree seconds
    }, page.props.flash.duration || 3000);
}

</script>