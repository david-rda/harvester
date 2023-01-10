import { createRouter, createWebHistory } from "vue-router";

// START კომპონენტები
import LoginView from "../views/Login.vue";
import Profile from "../views/Profile.vue";
import Settings from "../views/Settings.vue";
import UserInfo from "../views/UserInfo.vue";
import StatementAdd from "../views/StatementAdd.vue";
import Register from "../views/Register.vue";
import Recovery from "../views/Recovery.vue";
import List from "../views/List.vue";
import Details from "../views/Details.vue";
import NotFound from "../components/NotFound.vue";
// END კომპონენტები

const routes = [
    {
        path : "/",
        component : LoginView
    },
    {
        path : "/user/profile",
        component : Profile
    },
    {
        path : "/user/settings",
        component : Settings
    },
    {
        path : "/user/info",
        component : UserInfo
    },
    {
        path : "/statement/add",
        component : StatementAdd
    },
    {
        path : "/register",
        component : Register
    },
    {
        path : "/recovery",
        component : Recovery
    },
    {
        path : "/statement/list",
        component : List
    },
    {
        path : "/details/:id",
        component : Details
    },
    {
        path : "/:pathMatch(.*)*",
        component : NotFound
    }
];

var router = createRouter({
    routes : routes,
    history : createWebHistory()
});

export default router;