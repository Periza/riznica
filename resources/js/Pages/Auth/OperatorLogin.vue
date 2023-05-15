<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import Layout from '@/Layouts/Layout.vue'
import { watch, ref } from 'vue';

const form = useForm(
  {
    sifra: '',
    password: '',
    remember: false
  }
);

const showError = ref(true);
let errorTimeout = null;

const submit = () => {
  form.post(route('operatorLoginPost'), {
    onFinish: () => form.reset('password')
  })
}



</script>

<script>
  export default {
    layout: Layout
  }
</script>

<template>
  <Head title="Riznica - Prijava" />

  <div class="min-h-screen bg-white-900 flex flex-col justify-center sm:py-12">
    <h2 class="text-center text-lg font-bold mb-5 text-black">P R I J A V A</h2>
    <div class="bg-500 p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
      <div class="bg-yellow-300 shadow w-full rounded-lg divide-y divide-white">
        <div class="px-5 py-7">
          <form @submit.prevent="submit">
            <div class="mb-6">
              <InputLabel for="id" value="ŠIFRA" class="text-xs text-black"/>
              <TextInput
                id="sifra"
                type="sifra"
                class="mt-1 block w-full border rounded-lg py-2 px-3 text-black w-full bg-white focus:outline-none focus:border-gold-500 focus:ring-2 focus:ring-yellow-500"
                v-model="form.sifra"
                required
                autofocus
                autocomplete="sifra"
              />
            </div>
            <div class="mb-6">
              <InputLabel for="password" value="LOZINKA" class="text-xs text-black"/>
              <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full border rounded-lg py-2 px-3 text-black w-full bg-white-800 focus:outline-none focus:border-gold-500 focus:ring-2 focus:ring-yellow-500"
                v-model="form.password"
                required
                autofocus
                autocomplete="password"
              />
            </div>
            <div class="mb-6">
              <label for="remember" class="flex items-center">
                <input
                  id="remember"
                  type="checkbox"
                  class="form-checkbox h-4 w-4 text-red-600 border-red-400 focus:ring-red-500"
                  v-model="form.remember"
                />
                <span class="ml-2 text-black">Remember Me</span>
              </label>
            </div>

            <InputError class="mt-2" v-if="showError" :message="form.errors.sifra" />
            <button
              type="submit"
              class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-800 focus:outline-none focus:bg-gold-700"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Login
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>