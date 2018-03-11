require('./bootstrap');

let _ = require('lodash');


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

// Realtime
Vue.component(
    'exception-realtime',
    require('./components/Exception/exception-real-time.vue')
);

// Status code
Vue.component(
    'status-code',
    require('./components/StatusCodes/status-code.vue')
);

const app = new Vue({
    el: '#app'
});
