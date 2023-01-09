<template>
    <div>
        <Header />

        <div class="container mt-5 bg-white p-4">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 offset-md-3">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="p-3">სტატუსი</td>
                                <td class="p-3"><strong class="status">{{ this?.user_info?.role_name }}</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">დამატებული განცხადებები</td>
                                <td class="p-3"><strong class="status">{{ 0 }}</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">სახელი, გვარი</td>
                                <td class="p-3"><strong>{{ this?.user_info?.name + " " + this?.user_info?.lastname }}</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">ტელეფონის ნომერი</td>
                                <td class="p-3"><strong>{{ this?.user_info?.mobile_number }}</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">ელ. ფოსტა</td>
                                <td class="p-3"><strong>{{ this?.user_info?.email }}</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">პირადი ნომერი</td>
                                <td class="p-3"><strong>{{ this?.user_info?.personal_id }}</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">დაბადების თარიღი</td>
                                <td class="p-3"><strong>{{ this?.user_info?.birth_date }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <Footer />
    </div>
</template>

<script>
    import Header from "../components/Header.vue";
    import Footer from "../components/Footer.vue";
    import axios from "axios";

    export default {
        name : "UserInfo",

        components : {
            Header,
            Footer
        },

        data() {
            return {
                user_info : ""
            }
        },

        async mounted() {
            this.$store.dispatch("setToken");
            document.title = "ინფორმაცია";

            const id = window.localStorage.getItem("user_id");

            const info = await axios.get("/user/get/" + Number.parseInt(id), {
                headers : {
                    "Authorization" : `Bearer ${this.$store.state.token}`
                }
            });
            this.user_info = info?.data;
        },
    }
</script>

<style scoped lang="scss">
    .table {
        font-family: "frutiger_light";
        font-size: 14px;
        user-select: none;
    }

    td {
        border-color: #F1F1F1;
    }

    .status {
        background-color: #82BE00;
        padding: 6px;
        border-radius: 6px;
        user-select: none;
        pointer-events: none;
    }
</style>