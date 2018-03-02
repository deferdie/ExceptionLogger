require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

//Realtime
Vue.component(
    'exception-realtime',
    require('./components/Exception/exception-real-time.vue')
);

const app = new Vue({
    el: '#app'
});
