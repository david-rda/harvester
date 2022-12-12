<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name : "App"
    }
</script>

<style lang="scss">
    @import url("./assets/scss/style.scss"); // მთავარი scss ფაილი
    @import url("./assets/scss/fonts.scss"); // ფონტების დაიმპორტება გლობალურად
</style>