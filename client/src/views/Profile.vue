<template>
    <div>
        <Header />

        <div class="container mt-5 bg-white p-4">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 offset-md-3">
                    <div class="card p-4">
                        <form method="POST" @submit.prevent="edit_profile()">
                            <div class="mb-4">
                                <input type="text" class="form-control" v-model.trim="firstname" placeholder="სახელი">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" v-model.trim="lastname" placeholder="გვარი">
                            </div>
                            <div class="mb-4">
                                <input type="date" class="form-control" v-model.trim="bd" placeholder="დაბადების თარიღი">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" v-model.trim="phone" placeholder="ტელეფონის ნომერი">
                            </div>
                            <div class="mb-4 d-grid">
                                <button type="submit">ინფორმაციის განახლება</button>
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
        name : "Profile",

        components : {
            Header,
            Footer
        },

        data() {
            return {
                firstname : "", // ბენეფიციარის სახელი
                lastname : "", // ბენეფიციარის გვარი
                bd : new Date(), // ბენეფიციარის დაბადების თარიღი
                phone : "" // ბენეფიციარის ტელეფონი
            }
        },
        
        async mounted() {
            document.title = "პროფილი - პირადი ინფორმაცია";

            const id = window.localStorage.getItem("user_id");

            const info = await axios.get("/user/get/" + Number.parseInt(id), {
                headers : {
                    "Authorization" : `Bearer ${this.$store.state.token}`
                }
            });
            
            this.firstname = info?.data?.name;
            this.lastname = info?.data?.lastname;
            this.bd = info?.data?.birth_date;
            this.phone = info?.data?.mobile_number;
        },

        methods : {
            async edit_profile() {
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
                    }else if(this.bd == null || this.bd == "") {
                        this.$swal({
                            title : "შეიყვანეთ დაბადების თარიღი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else if(!this.bd.match(/^[0-9]{4}-[0-9]{2}-[0-9]{2}/)) {
                        this.$swal({
                            title : "შეიყვანეთ დაბადების თარიღი",
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
                    }else if(!this.phone.match(/^[0-9]{9}/)) {
                        this.$swal({
                            title : "შეიყვანეთ სწორი ფორმატის მობილური ტელეფონის ნომერი",
                            icon : "warning",
                            timerProgressBar: true,
                            timer : 3000,
                            toast : true,
                            position : "top-end"
                        });
                        return false;
                    }else {
                        try {
                            await axios.put("/user/info/update", {
                                name : this.firstname,
                                lastname : this.lastname,
                                birth_date : this.bd,
                                mobile_number : this.phone,
                            }, {
                                headers : {
                                    "Authorization" : `Bearer ${this.$store.state.token}`
                                }
                            });
                            this.$swal({
                                title : "ინფორმაცია დარედაქტირდა",
                                icon : "success",
                            });
                        }catch(err) {
                            if(err instanceof AxiosError) {
                                this.$swal({
                                    title : "დაფიქსირდა შეცდომა",
                                    icon : "error",
                                });
                            }
                        }
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
    input[type="text"], input[type="date"] {
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