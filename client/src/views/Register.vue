<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 offset-md-3">
                <div class="container">
                    <RegisterForm />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import RegisterForm from "../components/RegisterForm.vue";

    export default {
        name : "Register",

        data() {
            return {
                
            }
        },

        components : {
            RegisterForm
        },

        mounted() {
            
        },
    }
</script>

<style scoped lang="scss">
    
</style>