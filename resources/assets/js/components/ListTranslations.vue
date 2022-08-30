<template>
    <form @submit.prevent="save">
        <header class="flex items-center px-8 border-b border-slate-200 dark:border-slate-800">
            <Tabs>
                <Tab id="all" :count="counters.all">
                    All
                </Tab>
                <Tab id="missing" :count="counters.missing">
                    Missing
                </Tab>
            </Tabs>

            <div class="ml-auto">
                <button class="px-3 py-2 rounded-md hover:bg-black/10 transition duration-300" @click="sort('desc')" v-if="sortingBy === 'asc'">
                    <svg class="w-4 fill-slate-800 dark:fill-slate-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M104.4 470.1c12.12 13.26 35.06 13.26 47.19 0l87.1-96.09c11.94-13.05 11.06-33.31-1.969-45.27c-13.02-11.95-33.27-11.04-45.22 1.973L160 366.1V64.03c0-17.7-14.33-32.03-32-32.03S96 46.33 96 64.03v302l-32.4-35.39c-6.312-6.883-14.94-10.39-23.61-10.39c-7.719 0-15.47 2.785-21.61 8.414c-13.03 11.95-13.9 32.22-1.969 45.27L104.4 470.1zM320 96h50.75l-73.38 73.38c-9.156 9.156-11.89 22.91-6.938 34.88s16.63 19.74 29.56 19.74h127.1C465.7 223.1 480 209.7 480 192s-14.33-32-32-32h-50.75l73.38-73.38c9.156-9.156 11.89-22.91 6.938-34.88S460.9 32 447.1 32h-127.1C302.3 32 288 46.31 288 64S302.3 96 320 96zM492.6 433.3l-79.99-160.1c-10.84-21.81-46.4-21.81-57.24 0l-79.99 160.1c-7.906 15.91-1.5 35.24 14.31 43.19c15.87 7.922 35.04 1.477 42.93-14.4l7.154-14.39h88.43l7.154 14.39c6.174 12.43 23.97 23.87 42.93 14.4C494.1 468.6 500.5 449.2 492.6 433.3zM367.8 391.4L384 358.7l16.22 32.63H367.8z"/>
                    </svg>
                </button>
                <button class="px-3 py-2 rounded-md hover:bg-black/10 transition duration-300" @click="sort('asc')" v-else>
                    <svg class="w-4 fill-slate-800 dark:fill-slate-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M239.6 373.1c11.94-13.05 11.06-33.31-1.969-45.27c-13.55-12.42-33.76-10.52-45.22 1.973L160 366.1V64.03c0-17.7-14.33-32.03-32-32.03S96 46.33 96 64.03v302l-32.4-35.39C51.64 317.7 31.39 316.7 18.38 328.7c-13.03 11.95-13.9 32.22-1.969 45.27l87.1 96.09c12.12 13.26 35.06 13.26 47.19 0L239.6 373.1zM448 416h-50.75l73.38-73.38c9.156-9.156 11.89-22.91 6.938-34.88S460.9 288 447.1 288H319.1C302.3 288 288 302.3 288 320s14.33 32 32 32h50.75l-73.38 73.38c-9.156 9.156-11.89 22.91-6.938 34.88S307.1 480 319.1 480h127.1C465.7 480 480 465.7 480 448S465.7 416 448 416zM492.6 209.3l-79.99-160.1c-10.84-21.81-46.4-21.81-57.24 0L275.4 209.3c-7.906 15.91-1.5 35.24 14.31 43.19c15.87 7.922 35.04 1.477 42.93-14.4l7.154-14.39h88.43l7.154 14.39c6.174 12.43 23.97 23.87 42.93 14.4C494.1 244.6 500.5 225.2 492.6 209.3zM367.8 167.4L384 134.7l16.22 32.63H367.8z"/>
                    </svg>
                </button>
            </div>
        </header>

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
const sortingBy = ref('')

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

function sort(order) {
    store.translations = Object.fromEntries(Object.entries(store.translations).sort(([a], [b]) => {
        if (order === 'asc') {
            sortingBy.value = 'asc'

            return a > b ? 1 : -1
        } else {
            sortingBy.value = 'desc'

            return a < b ? 1 : -1
        }
    }))
}
</script>
