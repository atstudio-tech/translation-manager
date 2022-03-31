<template>
    <button
        class="whitespace-nowrap flex p-4 border-b-2 font-medium text-sm"
        :class="isActive() ? 'border-teal-500 text-teal-600 dark:border-teal-300 dark:text-teal-400' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-200 dark:text-slate-200 dark:hover:text-slate-400 dark:hover:border-slate-400'"
        @click.prevent="changeTab"
    >
        <slot />

        <span
            class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block"
            :class="isActive() ? 'bg-teal-100 text-teal-600 dark:bg-teal-700 dark:text-teal-200' : 'bg-slate-100 text-slate-900 dark:bg-slate-500 dark:text-slate-300'"
        >
            {{ count }}
        </span>
    </button>
</template>

<script setup>
import { useStore } from '../store'

const props = defineProps({
    id: String,
    count: {
        type: Number,
        default: 0,
    },
})

const store = useStore()

function changeTab() {
    store.changeTab(props.id)
    store.fetchTranslations()
}

function isActive() {
    return store.currentTab === props.id
}
</script>
