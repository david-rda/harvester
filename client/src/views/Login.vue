<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 offset-md-3">
                <div class="container">
                    <LoginForm />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LoginForm from "../components/LoginForm.vue";

    export default {
        name : "LoginView",

        data() {
            return {
                
            }
        },

        components : {
            LoginForm
        },

        mounted() {
            
        },
    }
</script>

<style scoped lang="scss">
    
</style>