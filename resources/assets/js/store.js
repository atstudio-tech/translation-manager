import { defineStore } from 'pinia'
import { api } from './api'

export const useStore = defineStore('default', {
    state: () => ({
        menu: [],
        translations: [],
        currentLocale: null,
        currentTab: '',
        feedback: null,
    }),

    actions: {
        changeLocale(locale) {
            const params = new URLSearchParams(document.location.search)
            params.set('lang', locale)
            history.pushState({}, '', '?' + params.toString())

            this.currentLocale = locale
            this.fetchTranslations()
        },

        changeTab(tab) {
            const params = new URLSearchParams(document.location.search)
            params.set('tab', tab)
            history.pushState({}, '', '?' + params.toString())

            this.currentTab = tab
        },

        addFeedback(title, message) {
            this.feedback = { title, message }

            setTimeout(this.removeFeedback, 1500)
        },

        removeFeedback() {
            this.feedback = null
        },

        async fetchTranslations() {
            this.translations = await api.get('/all', {
                query: {
                    lang: this.currentLocale,
                    tab: this.currentTab,
                },
            })
        },
    },
})
