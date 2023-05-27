<script setup>
import ToastListItem from './ToastListItem.vue'
import { usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import { onUnmounted, TransitionGroup } from 'vue';
import toast from '@/Stores/toast';


const page = usePage();

let removeFinishEventListener = router.on('success', (event) => {
  if(page.props.toast) {
    toast.add({
      message: page.props.toast.message,
      type: page.props.toast.type
    });
  }
});


function remove(index) {
  toast.remove(index);
}

onUnmounted(() => {
  removeFinishEventListener();
});

</script>


<template>
  <transition-group
    name="toast"
    class="fixed top-20 right-4 z-50 space-y-4 w-full max-w-xs" 
    tag="div"
  >
    <ToastListItem v-for="(item, index) in toast.items" :message="item.message" :type="item.type" :key="item.key" @remove="remove(index)"></ToastListItem>
  </transition-group>
</template>

<style>
.toast-enter-active,
.toast-leave-active {
  transition: opacity 0.7s;
}

.toast-enter-from,
.toast-leave-to {
  opacity: 0;
}
</style>





