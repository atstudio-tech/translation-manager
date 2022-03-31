<template>
    <header>
        <div class="border-b border-slate-200 dark:border-slate-800">
            <nav class="-mb-px flex space-x-4 pl-8" aria-label="Tabs">
                <slot />
            </nav>
        </div>
    </header>
</template>

<script setup>
import { onMounted } from 'vue'
import { useStore } from '../store'

const store = useStore()

onMounted(() => {
    const tab = new URLSearchParams(location.search).get('tab')

    store.changeTab(tab || 'all')
})
</script>
