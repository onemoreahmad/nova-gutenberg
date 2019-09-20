Nova.booting((Vue, router, store) => {
    Vue.component('index-NovaGutenberg', require('./components/IndexField'))
    Vue.component('detail-NovaGutenberg', require('./components/DetailField'))
    Vue.component('form-NovaGutenberg', require('./components/FormField'))
})
