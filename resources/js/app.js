// resources/js/app.js
import { createApp } from 'vue'
import {router} from './router/router.js'
import './boot/axios'
import App from './App.vue'

createApp(App)
    .use(router)
    .mount('#app')
