<template>
    <div class="ml-auto flex items-center gap-3">
        <transition
            enter-active-class="transition ease-out duration-300"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-100"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <p
                class="text-slate-800 dark:text-slate-200 text-sm italic"
                v-if="saved"
            >
                {{ message }}
            </p>
        </transition>

        <button
            class="px-4 py-2 uppercase text-teal-50 dark:text-teal-900 inline-flex gap-3 items-center bg-teal-500 shadow-md rounded-full font-semibold text-sm tracking-wider transition duration-300 hover:bg-teal-600 group"
            @click="scan"
        >
            <i class="fa-solid fa-rotate transition duration-300 text-teal-700 group-hover:text-teal-800"></i>
            Scan Files
        </button>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { api } from '../api'

const saved = ref(false)
const message = ref('')

async function scan() {
    const data = await api.post('/scan')

    saved.value = true
    message.value = data.message

    setTimeout(() => {
        saved.value = false
    }, 1500)
}
</script>
