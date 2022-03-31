<template>
    <form @submit.prevent="save">
        <Tabs>
            <Tab id="all" :count="counters.all">
                All
            </Tab>
            <Tab id="missing" :count="counters.missing">
                Missing
            </Tab>
        </Tabs>

        <ul id="missing" class="p-8">
            <li
                class="group pl-4 pr-2 py-2.5"
                :class="{ 'bg-slate-50 dark:bg-slate-600 rounded-md': i % 2 !== 0 }"
                v-for="(translation, source, i) in store.translations"
            >
                <label class="grid grid-cols-2 items-center gap-3">
                    <span class="text-slate-800 dark:text-slate-50 text-[13px] tracking-wider">
                        {{ source }}
                    </span>
                    <textarea
                        type="text"
                        class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-400 transition duration-300 flex w-full px-4 py-2 rounded focus:outline-none focus:border-teal-500 dark:focus:border-teal-200 focus:ring-1 focus:ring-teal-500 dark:focus:ring-teal-200 shadow-inner text-sm font-light text-slate-800 dark:text-white dark:placeholder-slate-600 h-full resize-y min-h-[2.375rem]"
                        :placeholder="!translation ? 'To be translated...' : ''"
                        v-model="store.translations[source]"
                        rows="1"
                        @keyup.ctrl.enter="save"
                    ></textarea>
                </label>
            </li>

            <li v-if="store.translations.count === 0">
                <i class="font-italic text-slate-800 dark:text-slate-200">
                    {{ store.currentTab === 'missing' ? 'All done!' : 'No translations have been extracted.' }}
                </i>
            </li>
        </ul>

        <footer class="flex gap-3 items-center px-8 py-4 bg-slate-50 dark:bg-slate-600 rounded-b-md">
            <button type="submit" class="bg-teal-600 shadow-md text-white rounded uppercase text-sm px-4 py-3 tracking-widest transition duration-300 hover:bg-teal-700">
                <i class="fa-solid fa-floppy-disk text-teal-300 mr-2"></i>
                Save
            </button>

            <p class="text-xs text-slate-500 italic">Ctrl + Enter to save</p>
        </footer>
    </form>
</template>

<script setup>
import { ref } from 'vue'
import Tabs from './Tabs'
import Tab from './Tab'
import { api } from '../api'
import { useStore } from '../store'

const store = useStore()
const counters = ref({
    all: 0,
    missing: 0,
})

const unsubscribe = store.$subscribe((mutation, state) => {
    if (state.currentLocale) {
        fetchCounters()
    }
})

async function fetchCounters() {
    const data = await api.get('/counters', {
        query: {
            lang: store.currentLocale,
            tab: store.currentTab,
        },
    })

    counters.value.all = data.all
    counters.value.missing = data.missing

    unsubscribe()
}

async function save() {
    await api.put('/save', {
        translations: store.translations,
    }, {
        query: {
            lang: store.currentLocale,
            tab: store.currentTab,
        },
    })

    store.addFeedback('Success', 'Your changes were saved!')
}
</script>
