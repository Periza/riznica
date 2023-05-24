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
import { provide, onBeforeUnmount } from 'vue';

const page = usePage();

const flash = ref(false);
const timeoutId = ref(null);
const showTimestamp = ref(null);

provide('showFlash', showFlash);

function showFlash() {
    flash.value = true;

    if (timeoutId.value) {
        clearTimeout(timeoutId.value);
    }

    showTimestamp.value = Date.now(); // Store the timestamp when the flash message is shown

    timeoutId.value = setTimeout(() => {
        flash.value = false;
        timeoutId.value = null; // Reset the timeout ID after it has completed
        showTimestamp.value = null; // Reset the showTimestamp variable
    }, calculateRemainingDuration());
}

function calculateRemainingDuration() {
    const elapsed = Date.now() - showTimestamp.value;
    const remaining = page.props.flash.duration - elapsed;
    return remaining > 0 ? remaining : 0;
}

onBeforeUnmount(() => {
    // Clear the timeout when the component is unmounted
    if (timeoutId.value) {
        clearTimeout(timeoutId.value);
    }
});
</script>
