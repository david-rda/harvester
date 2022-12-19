import { createStore } from "vuex";

let store = createStore({
    state : {
        role : "",
        token : window.localStorage.getItem("token")
    },

    mutations : {
        role(state) {
            state.role = window.localStorage.getItem("role");
        },

        token(state) {
            state.token = window.localStorage.getItem("token");
        }
    },

    actions : {
        setRole(context) {
            context.commit("role");
        },

        setToken(context) {
            context.commit("token");
        }
    }
});

export default store;