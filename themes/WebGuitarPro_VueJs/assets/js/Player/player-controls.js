import Vue from 'vue'
import App from './PlayerControls'

var playerControls = new Vue({
    delimiters: ['${', '}'],
    el: '#player-controls',
    template: '<App/>',
    components: { App }
})
