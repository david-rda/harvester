import { createStore } from "vuex";

let store = createStore({
    state : {
        role : "",
        token : window.localStorage.getItem("token")
    },

    mutations : {
        role(state) {
            state.role = window.localStorage.getItem("role");
        }
    },

    actions : {
        setRole(context) {
            context.commit("role");
        }
    }
});

export default store;