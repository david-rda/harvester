<template>
    <div class="loginForm">
        <div class="d-flex justify-content-center p-4">
            <img src="../assets/images/RDA-Logo-Geo.png" class="w-50" />
        </div>
        <div class="card p-4 mb-5">
            <form method="POST" @submit.prevent="register()">
                <div class="mb-3">
                    <input type="text" placeholder="სახელი" class="form-control" v-model.trim="firstname">
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="გვარი" class="form-control" v-model.trim="lastname">
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" v-model.trim="bdate">
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="პირადი ნომერი" class="form-control" v-model.trim="pid" minlength="11" maxlength="11">
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="მობილური ტელეფონის ნომერი" class="form-control" v-model.trim="phone">
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="ელ. ფოსტის მისამართი" class="form-control" v-model.trim="email">
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="პაროლი" class="form-control" v-model.trim="password">
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="გაიმეორეთ პაროლი" class="form-control" v-model.trim="confirm_password">
                </div>
                <div class="mb-3">
                    <div class="row d-felx align-items-baseline">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 mb-3">
                            <span>გაქვთ ანგარიში?&nbsp;&nbsp;</span><router-link to="/" class="link">ავტორიზაცია</router-link>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 d-grid">
                            <button type="submit" class="mb-3">რეგისტრაცია</button>
                        </div>
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
        name : "RegisterForm",

        data() {
            return {
                firstname : "",
                lastname : "",
                bdate : "",
                pid : "",
                phone : "",
                email : "",
                password : "",
                confirm_password : ""
            }
        },

        mounted() {
            document.title = "რეგისტრაცია";

            var date = new Date();
            
            if("2022" != date.getFullYear()) {
                this.year = " - " + date.getFullYear();
            }
        },

        setup() {
            const regexp_phone = new RegExp(/^[0-9]{9}/); // რეგულარული გამოსაცულება ტელეფონის ნომრისთვის
            const regexp_email = new RegExp(/^[a-zA-Z0-9]+@{1}[a-zA-Z]+\.[a-zA-Z]{2,3}$/); // რეგულარული გამოსაცულება ელ. ფოსტისთვის

            return {
                regexp_phone,
                regexp_email
            }
        },

        methods : {
            async register() {
                try {
                    if(this.firstname == "" || this.firstname == null) {
                        this.$swal({
                            title : "შეიყვანეთ სახელი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.lastname == "" || this.lastname == null) {
                        this.$swal({
                            title : "შეიყვანეთ გვარი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.bdate == null || this.bdate == "") {
                        this.$swal({
                            title : "შეიყვანეთ დაბადების თარიღი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(!this.bdate.match(/^[0-9]{4}-[0-9]{2}-[0-9]{2}/)) {
                        this.$swal({
                            title : "შეიყვანეთ დაბადების თარიღი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.pid == null || this.pid == "") {
                        this.$swal({
                            title : "შეიყვანეთ პირადი ნომერი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(!this.pid.match(/^\d{11}/)) {
                        this.$swal({
                            title : "შეიყვანეთ სწორი ფორმატის პირადი ნომერი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.phone == null || this.phone == "") {
                        this.$swal({
                            title : "შეიყვანეთ მობილური ტელეფონის ნომერი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(!this.phone.match(this.regexp_phone)) {
                        this.$swal({
                            title : "შეიყვანეთ სწორი ფორმატის მობილური ტელეფონის ნომერი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.email == null || this.email == "") {
                        this.$swal({
                            title : "შეიყვანეთ ელ. ფოსტა",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(!this.email.match(this.regexp_email)) {
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
                            title : "შეიყვანეთ პაროლი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.confirm_password == "" || this.confirm_password == null) {
                        this.$swal({
                            title : "გაიმეორეთ პაროლი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.confirm_password != this.password) {
                        this.$swal({
                            title : "პაროლები არ ემთხვევა ერთმანეთს",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else {
                        const register = await axios.post("/register", {
                            name : this.firstname,
                            lastname : this.lastname,
                            birth_date : this.bdate,
                            personal_id : this.pid,
                            mobile_number : this.phone,
                            email : this.email,
                            password : this.password,
                            confirm_password : this.confirm_password
                        });

                        console.log(register?.data);
                    }
                }catch(err) {
                    if(err instanceof AxiosError) {
                        console.log(err);
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

    input {
        border-radius: 8px;
        border: 1px solid lighten(#787878, 45%) !important;
        background-color: #FFF;
        outline: none;
        padding: 12px 14px;
        width: 100%;
        font-family: "frutiger_light";
        font-size: 14px;
    }

    .link, span {
        font-family: "frutiger_regular";
        text-decoration: none;
        font-size: 14px;
    }
</style>