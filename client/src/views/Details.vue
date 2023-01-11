<template>
    <div>
        <Header />
        <div class="container bg-white mt-5 p-4">
            <div class="row">
                <h6 class="col-lg-4 col-md-4">ზოგადი ინფორმაცია განმცხადებელზე</h6>
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
                const statement_data = await axios.get("/statement/get/" + this.$route.params.id);
                this.statement = statement_data?.data;
            }catch(err) {
                if(err instanceof AxiosError) {
                    console.log(err?.response);
                }
            }
        }
    }
</script>

<style scoped>

</style>