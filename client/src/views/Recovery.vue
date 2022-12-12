<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 offset-md-3">
                <div class="container">
                    <RecoveryForm />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import RecoveryForm from "../components/RecoveryForm.vue";

    export default {
        name : "Recovery",

        components : {
            RecoveryForm
        },

        data() {
            return {
                
            }
        },

        mounted() {
            
        },
    }
</script>

<style scoped lang="scss">
    
</style>