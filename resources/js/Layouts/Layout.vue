<template>
    <Header />
    <ToastList></ToastList>
    <main>
        <slot />
    </main>

    
</template>

<script setup>
import Header from '@/Components/Header.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
import ToastList from '@/Components/ToastList.vue';


</script>
