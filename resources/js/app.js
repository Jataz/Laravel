import "./bootstrap";

//window.Vue = require("vue");
//window.Fire = new Vue();
import Vue from "vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";

//import Vue from "vue";

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

// ES6 Modules or TypeScript
import Swal from "sweetalert2";
window.swal = Swal;
// CommonJS
//const Swal = require("sweetalert2");

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

window.toast = Toast;

import { Form } from "vform";
import { HasError, AlertError } from "vform/src/components/bootstrap5";
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

//require("./component");
Vue.component("role", require("./components/role.vue").default);
Vue.component("user", require("./components/user.vue").default);

const app = new Vue({
    el: "#app",
});
