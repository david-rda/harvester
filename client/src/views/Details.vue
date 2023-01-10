<template>
    <div>
        <Header />

        {{ this.$route.params.id }}

        <Footer />
    </div>
</template>

<script>
    import Header from "../components/Header.vue";
    import Footer from "../components/Footer.vue";

    export default {
        name : "Details",

        components : {
            Header,
            Footer
        },

        async mounted() {
            document.title = "დეტალები";
            this.$store.dispatch("setRole");
        }
    }
</script>

<style scoped>

</style>