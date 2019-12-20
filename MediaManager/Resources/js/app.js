window.Vue = window.Vue || require('vue');

require('../vendor/js/manager')

Vue.component('media-manager-modal', require('./components/MediaManagerModal.vue').default)
Vue.component('image-picker', require('./components/ImagePicker.vue').default)

new Vue({
    el: '#app'
})
