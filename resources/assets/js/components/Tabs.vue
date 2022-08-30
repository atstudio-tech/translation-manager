<template>
    <nav class="-mb-px flex space-x-4" aria-label="Tabs">
        <slot />
    </nav>
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
