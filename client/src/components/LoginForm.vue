<template>
    <div class="loginForm">
        <div class="d-flex justify-content-center p-4">
            <img src="../assets/images/RDA-Logo-Geo.png" class="w-50" />
        </div>
        <div class="card p-4 mb-5">
            <form method="POST" @submit.prevent="login()">
                <div class="mb-3">
                    <label for="email" class="mb-1">ელ.&nbsp;ფოსტა</label>
                    <input type="text" v-model.trim="email" name="email" id="email" autocomplete="off" class="login_email">
                </div>
                <div class="mb-3 password-block">
                    <label for="password" class="mb-1">პაროლი</label>
                    <input type="password" v-model.trim="password" name="password" id="password" class="login_pass">
                    <router-link to="/recovery" class="link">აღდგენა</router-link>
                </div>
                <div class="row d-felx align-items-baseline">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 mb-3">
                        <span>არ გაქვთ ანგარიში?&nbsp;&nbsp;</span><router-link to="/register" class="link">რეგისტრაცია</router-link>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-grid">
                        <button type="submit" class="mb-3">ავტორიზაცია</button>
                    </div>
                </div>
                <div class="d-grid mb-5" v-if="login_errors">
                    <div class="alert alert-danger" v-for="(item, index) in login_errors" :key="index">
                        <p>{{ item[0] }}</p>
                    </div>
                </div>
            </form>
        </div>
        <p class="disabled text-center text-muted">&copy;&nbsp;2022&nbsp;{{ this.year }}&nbsp;Created&nbsp;by&nbsp;<strong>RDA</strong>&nbsp;IT&nbsp;team</p>
    </div>
</template>

<script>
    import axios, { AxiosError } from "axios";

    export default {
        name : "LoginForm",

        data() {
            return {
                email : "",
                password : "",
                
                year : "",
                
                login_errors : null
            }
        },

        mounted() {
            document.title = "სისტემაში შესვლა";

            var date = new Date();
            
            if("2022" != date.getFullYear()) {
                this.year = " - " + date.getFullYear();
            }
        },

        methods : {
            async login() {
                try {
                    if(this.email == null || this.email == "") {
                        this.$swal({
                            title : "ელ. ფოსტა აუცილებელია",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(!this.email.match(/^[a-zA-Z0-9]*\.+[a-zA-Z0-9]+@{1}[a-zA-Z]+\.[a-zA-Z]{2,3}$/)) {
                        this.$swal({
                            title : "შეიყვანეთ სწორი ფორმატის ელ. ფოსტა",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                    }else if(this.password == null || this.password == "") {
                        this.$swal({
                            title : "პაროლი აუცილებელია",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else {
                        const login_data = await axios.post("/login", {
                            email : this.email.trim(), // ელ.ფოსტის ველის მნიშვნელობა
                            password : this.password.trim() // პაროლის ველის მნიშვნელობა
                        });
                        // ლოკალურ საცავში შეინახება ავტორიზაციისას დაგენერირებული access ტოკენი
                        window.localStorage.setItem("token", login_data?.data?.token);
                        window.localStorage.setItem("user_id", login_data?.data?.user?.id);

                        this.$router.push("/user/info");
                    }
                }catch(err) {
                    if(err instanceof AxiosError) {
                        this.$swal({
                            title : "ელ. ფოსტა ან პაროლი არასწორია",
                            icon : "error",
                        });
                    }
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    .text-muted {
        user-select: none;
        font-size: 14px !important;
    }

    p {
        font-family: "frutiger_light";
        font-size: 14px;
    }

    .link, span {
        font-family: "frutiger_regular";
        text-decoration: none;
        font-size: 14px;
    }

    .password-block {
        overflow: hidden;
        position: relative;

        .link {
            position: absolute;
            padding: 10px;
            right: 0;
            color: #005019;
            margin-top: 3px;
            margin-right: 3px;
            background: rgba(#005019, .2);
            border-radius: 6px;
        }
    }
</style>