<template>
    <div class="loginForm">
        <div class="d-flex justify-content-center p-4">
            <img src="../assets/images/RDA-Logo-Geo.png" class="w-50" />
        </div>
        <div class="card p-4 mb-5">
            <form method="POST" @submit.prevent="recovery()">
                <div class="mb-3">
                    <label for="email" class="mb-2">ელ. ფოსტა</label>
                    <input type="text" class="form-control" name="email" id="email" v-model.trim="email">
                </div>
                <div class="mb-3">
                    <label for="pid" class="mb-2">პირადი ნომერი</label>
                    <input type="text" class="form-control" name="pid" id="pid" v-model.trim="pid" maxlength="11" minlength="11">
                </div>
                <div class="mb-3 d-grid">
                    <button type="submit">მოთხოვნის გაგზავნა</button>
                </div>
            </form>
        </div>
        <p class="disabled text-center text-muted">&copy;&nbsp;2022&nbsp;{{ this.year }}&nbsp;Created&nbsp;by&nbsp;<strong>RDA</strong>&nbsp;IT&nbsp;team</p>
    </div>
</template>

<script>
    import axios, { AxiosError } from "axios";

    export default {
        name : "RecoveryForm",

        data() {
            return {
                email : "",
                pid : ""
            }
        },

        mounted() {
            document.title = "პაროლის აღდგენა";

            var date = new Date();
            
            if("2022" != date.getFullYear()) {
                this.year = " - " + date.getFullYear();
            }
        },

        methods : {
            async recovery() {
                try {
                    if(this.email == "" || this.email == null) {
                        this.$swal({
                            title : "ელ. ფოსტა აუცილებელია",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(!this.email.match(/^[a-zA-Z0-9]+@{1}[a-zA-Z]+\.[a-zA-Z]{2,3}$/)) {
                        this.$swal({
                            title : "შეიყვანეთ სწორი ფორმატის პირადი ნომერი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                    }else if(this.pid == "" || this.pid == null) {
                        this.$swal({
                            title : "პირადი ნომერი აუცილებელია",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(!this.pid.match(/^[0-9]{11}/)) {
                        this.$swal({
                            title : "შეიყვანეთ სწორი ფორმატის პირადი ნომერი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                    }else {
                        const recovery = await axios.post("/password/recovery", {}, {
                            headers : {
                                "Authorization" : `Bearer ${this.$store.state.token}`
                            }
                        });
                        console.log(recovery?.data);
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

    p {
        font-family: "frutiger_light";
        font-size: 14px;

        .link {
            font-family: "frutiger_regular";
            text-decoration: none;
        }
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
</style>