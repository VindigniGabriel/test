import Vue from "vue";
import Vuex from "vuex";
import consultans from "./modules/consultants";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        consultans
    }
});

export default store;