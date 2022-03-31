<template>
    <header class="flex items-center">
        <i class="fa-solid fa-language text-3xl text-teal-500 mr-4"></i>
        <h1 class="text-slate-700 dark:text-slate-300 text-3xl font-raleway">
            <span class="font-bold">Translation</span> Manager
        </h1>

        <ScanAction />
    </header>

    <div class="flex gap-5 mt-10">
        <Menu />

        <main class="flex-1 bg-white dark:bg-slate-700 rounded-md shadow">
            <ListTranslations />
        </main>
    </div>

    <Notification />
</template>

<script setup>
import ScanAction from './components/ScanAction'
import Menu from './components/Menu'
import ListTranslations from './components/ListTranslations'
import Notification from './components/Notification'
</script>
