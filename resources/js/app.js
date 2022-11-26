import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import ChatMessages from './components/ChatMessages.vue';
import ChatForm from './components/ChatForm.vue';

const app = createApp({
    components: {
        ChatMessages,
        ChatForm
    }
})

app.mount('#app')
