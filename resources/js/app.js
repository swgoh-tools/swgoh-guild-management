
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

import Vue from 'vue'

import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

const authorizations = require('./authorizations');

Vue.prototype.authorize = function (...params) {
    if (! window.App.signedIn) return false;

    if (typeof params[0] === 'string') {
        return authorizations[params[0]](params[1]);
    }

    return params[0](window.App.user);
};

Vue.prototype.signedIn = window.App.signedIn;

//credit to @Bill Criswell for this filter
Vue.filter('truncate', function (text, stop, clamp) {
    return text.slice(0, stop) + (stop < text.length ? clamp || '...' : '');
})

// // https://forum.vuejs.org/t/how-to-format-date-for-display/3586/4
// import moment from 'moment'
// Vue.filter('formatDate', function(value) {
//   if (value) {
//     return moment(String(value)).format('MM/DD/YYYY hh:mm')
//   }
// }

// TODO: Please check! Why separate Vue instance? Where does it come from?
window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', { message, level });
};


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
import Flash from './components/Flash.vue'
Vue.component('flash', Flash);
import Paginator from './components/Paginator.vue'
Vue.component('paginator', Paginator);
import UserNotifications from './components/UserNotifications.vue'
Vue.component('user-notifications', UserNotifications);
import AvatarForm from './components/AvatarForm.vue'
Vue.component('avatar-form', AvatarForm);
import Wysiwyg from './components/Wysiwyg.vue'
Vue.component('wysiwyg', Wysiwyg);

import Thread from './pages/Thread.vue'
Vue.component('thread-view', Thread);
import Memo from './pages/Memo.vue'
Vue.component('memo-edit', Memo);

const app = new Vue({
  el: '#app'
});
