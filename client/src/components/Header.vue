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
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><strong>პროექტები/პროგრამები</strong></a>

                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <router-link to="/statement/add" class="dropdown-item">განაცხადის დამატება</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/statement/list" class="dropdown-item">განაცხადების სია</router-link>
                            </li>
                        </ul>
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
    import axios from "axios";

    export default {
        name : "Header",

        data() {
            return {
                user : "" // ამ ცვლადში ინახება ავტორიზირებული მომხმარებლის სახელი და გვარი
            }
        },

        props : {
            full_name : String
        },

        async mounted() {
            const logged_in = window.localStorage.getItem("logged_in"); // სტორიჯიდან ლოგიკური მნიშვნელობის წამოღება არის თუ არა მომხმარებელი ავტორიზირებული
            const id = window.localStorage.getItem("user_id"); // სტორიჯიდან ავტორიზირებული მომხმარებლის აიდის წამოღება
            
            if(!logged_in) this.$router.push("/"); // თუ მომხმარებელი არაა ავტორიზირებული არ მოხდება გვერდების ჩატვირთვა და გადამისამართდება ავტორიზაციის გვერდზე
            
            const user = await axios.get("/user/get/" + Number.parseInt(id), {
                headers : {
                    "Authorization" : `Bearer ${this.$store.state.token}`
                }
            }); // ავტორიზირებული მომხმარებლის ინფორმაციის წამოღება
            this.user = user?.data?.name + " " + user?.data?.lastname;

            this.$store.dispatch("setRole"); // ჰედერის ყოველი ჩატვირთვისას store-ში ჩაიწერება ავტორიზირებული მომხმარებლის როლის აიდი
            this.$store.dispatch("setToken"); // ტოკენის შენახვა vuex სტორიში
        },

        methods : {
            // სისტემიდან გამოსვლის ფუნქცია
            async logout() {
                try {
                    await axios.post("/logout", {}, {
                        headers : {
                            "Authorization" : `Bearer ${this.$store.state.token}`
                        }
                    }); // გაიგზავნება მოთხოვნა logout მარსუტზე რათა მოხდეს სისტემიდან გამოსვლა

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