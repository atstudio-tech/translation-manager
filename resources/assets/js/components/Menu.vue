<template>
    <aside class="w-72">
        <nav class="space-y-2">
            <template v-for="item in store.menu">
                <span class="px-3 py-2 rounded text-slate-800 dark:text-slate-50 flex items-center opacity-30" v-if="item.source">
                    {{ item.label }}

                    <span class="ml-auto rounded bg-slate-200 px-2 py-0.5 text-slate-800 text-[11px] uppercase">
                        Source
                    </span>
                </span>

                <button
                    class="px-3 py-2 rounded text-slate-800 dark:text-slate-300 flex items-center transition duration-300 w-full"
                    :class="isActive(item) ? 'bg-black/[.02] dark:bg-white/[.03]' : 'hover:bg-black/[.03] dark:hover:bg-white/[.05]'"
                    @click.prevent="store.changeLocale(item.locale)"
                    v-else
                >
                    <i class="fa-solid fa-circle text-teal-600 text-[8px] mr-2" v-if="isActive(item)"></i>

                    {{ item.label }}
                </button>
            </template>
        </nav>
    </aside>
</template>

<script setup>
import { onMounted } from 'vue'
import { api } from '../api'
import { useStore } from '../store'

const store = useStore()

onMounted(async () => {
    const data = await api.get('/menu')
    const lang = new URLSearchParams(location.search).get('lang')

    store.$patch(state => {
        state.menu = data
    })

    store.changeLocale(lang || data.find(item => !item.source).locale)
})

function isActive(item) {
    return item.locale === store.currentLocale
}
</script>
