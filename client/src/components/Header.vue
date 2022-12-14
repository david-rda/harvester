<template>
    <div class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <router-link to="/user/info">
                        <img src="../assets/images/RDA-Logo-Geo.png" />
                    </router-link>
                </div>
            </div>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#collNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/statement/add" class="nav-link text-center">განაცხადის დამატება</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/statement/list" class="nav-link text-center">განაცხადების სია</router-link>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><strong>{{ this.user }}</strong></a>

                        <ul class="dropdown-menu">
                            <li>
                                <router-link to="/user/info" class="dropdown-item">ინფორმაცია</router-link>
                            </li>
                            <li>
                                <router-link to="/user/profile" class="dropdown-item">პროფილი</router-link>
                            </li>
                            <li>
                                <router-link to="/user/settings" class="dropdown-item">პაროლის შეცვლა</router-link>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="dropdown-item" v-on:click="logout()">გასვლა</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import axios, { AxiosError } from "axios";

    export default {
        name : "Header",

        data() {
            return {
                user : "" // ამ ცვლადში ინახება ავტორიზირებული მომხმარებლის სახელი და გვარი
            }
        },

        async mounted() {
            const logged_in = window.localStorage.getItem("logged_in"); // სტორიჯიდან ლოგიკური მნიშვნელობის წამოღება არის თუ არა მომხმარებელი ავტორიზირებული
            const id = window.localStorage.getItem("user_id"); // სტორიჯიდან ავტორიზირებული მომხმარებლის აიდის წამოღება
            
            if(!logged_in) this.$router.push("/"); // თუ მომხმარებელი არაა ავტორიზირებული არ მოხდება გვერდების ჩატვირთვა და გადამისამართდება ავტორიზაციის გვერდზე
            
            try {
                const user = await axios.get("/user/get/" + Number.parseInt(id)); // ავტორიზირებული მომხმარებლის ინფორმაციის წამოღება
                this.user = user?.data?.name + " " + user?.data?.lastname;
            }catch(err) {
                if(err instanceof AxiosError) {
                    if(err?.response?.status == 401) {
                        this.$router.push("/");
                    }
                }
            }
        },

        methods : {
            // სისტემიდან გამოსვლის ფუნქცია
            async logout() {
                try {
                    await axios.post("/logout"); // გაიგზავნება მოთხოვნა logout მარსუტზე რათა მოხდეს სისტემიდან გამოსვლა

                    window.localStorage.clear(); // სტორიჯის გასუფთავება შენახული ინფორმაცისგან

                    this.$router.push("/");
                }catch(err) {
                    this.$router.push("/user/info");
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    .navbar-brand {
        img {
            width: 120px;
        }
    }

    .navbar {
        border-bottom: 1px solid lighten(#787878, 45%);
    }
</style>