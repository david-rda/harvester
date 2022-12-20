<template>
    <div>
        <Header />

        <div class="container mt-5 bg-white p-4">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 offset-md-3">
                    <div class="card p-4">
                        <form method="POST" @submit.prevent="change_password()">
                            <div class="mb-3">
                                <label for="old_password" class="mb-2">ძველი პეროლი</label>
                                <input type="password" class="form-control" name="old_password" id="old_password" v-model="current_password" placeholder="ძველი პაროლი">
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="mb-2">ახალი პაროლი</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" v-model="new_password" placeholder="ახალი პაროლი">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="mb-2">ახალი პაროლი</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" v-model="confirm_password" placeholder="გაიმეორეთ ახალი პაროლი">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit">პაროლის ცვლილება</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <Footer />
    </div>
</template>

<script>
    import Header from "../components/Header.vue";
    import Footer from "../components/Footer.vue";
    import axios, { AxiosError } from "axios";
    
    export default {
        name : "Settings",

        components : {
            Header,
            Footer
        },

        data() {
            return {
                current_password : "",
                new_password : "",
                confirm_password : ""
            }
        },

        methods : {
            async change_password() {
                try {
                    if(this.current_password == null || this.current_password == "") {
                        this.$swal({
                            title : "შეიყვანეთ მიმდინარე პაროლი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.new_password == null || this.new_password == "") {
                        this.$swal({
                            title : "შეიყვანეთ ახალი პაროლი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.confirm_password == null || this.confirm_password == "") {
                        this.$swal({
                            title : "გაიმეორეთ პაროლი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(this.new_password != this.confirm_password) {
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
                        await axios.put("/password/change", {
                            current_password : this.current_password,
                            new_password : this.new_password,
                            confirm_password : this.confirm_password
                        }, {
                            headers : {
                                "Authorization" : `Bearer ${this.$store.state.token}`
                            }
                        });

                        this.$swal({
                            title : "პაროლი ცვლილება წარმატებით განხორციელდა",
                            icon : "success"
                        });
                    }
                }catch(err) {
                    if(err instanceof AxiosError) {
                        this.$swal({
                            title : "დაფიქსირდა შეცდომა",
                            icon : "error"
                        });
                    }
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    input[type="password"] {
        border-radius: 8px;
        border: 1px solid lighten(#787878, 45%) !important;
        background-color: #FFF;
        outline: none;
        padding: 12px 14px;
        width: 100%;
        font-family: "frutiger_light";
        font-size: 14px;
    }
</style>