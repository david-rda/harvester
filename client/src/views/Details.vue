<template>
    <div>
        <Header />
        <div class="container bg-white mt-5 p-5">
            <div class="row">
                <h6 class="col-lg-4 col-md-4">ზოგადი ინფორმაცია განმცხადებელზე</h6>
            </div>

            <div class="row">
                <div class="col-md-7 col-lg-7">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>განმცხადებლის სახელი</th>
                                <td>{{ this.statement?.applicant_name }}</td>
                            </tr>
                            <tr>
                                <th>განმცხადებლის გვარი</th>
                                <td>{{ this.statement?.applicant_lastname }}</td>
                            </tr>
                            <tr>
                                <th>მობილური ტელეფონის ნომერი</th>
                                <td>{{ this.statement?.applicant_phone }}</td>
                            </tr>
                            <tr>
                                <th>დამატებითი ტელეფონის ნომერი</th>
                                <td>{{ this.statement?.applicant_additional_phone }}</td>
                            </tr>
                            <tr>
                                <th>ელ. ფოსტა</th>
                                <td>{{ this.statement?.beneficiary_email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <h6 class="col-lg-6 col-md-6">ზოგადი ინფორმაცია პოტენციურ ბენეფიციარზე</h6>
                </div>

                <div class="row">
                    
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
    import Header from "../components/Header.vue";
    import Footer from "../components/Footer.vue";
    import axios, { AxiosError } from 'axios';

    export default {
        name : "Details",

        components : {
            Header,
            Footer
        },

        data() {
            return {
                statement : ""
            }
        },

        async mounted() {
            document.title = "დეტალები";
            this.$store.dispatch("setRole");

            try {
                const statement_data = await axios.get("/statement/get/" + this.$route.params.id, {
                    headers : {
                        "Authorization" : `Bearer ${this.$store.state.token}`
                    }
                });
                this.statement = statement_data?.data;
                console.log(this.statement);
            }catch(err) {
                if(err instanceof AxiosError) {
                    console.log(err?.response);
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    table {
        font-family: "frutiger_light_caps";
        font-size: 14px;
    }
</style>