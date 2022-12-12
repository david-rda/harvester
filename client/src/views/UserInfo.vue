<template>
    <div>
        <Header />

        <div class="container mt-5 bg-white p-4">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 offset-md-3">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="p-3">სტატუსი</td>
                                <td class="p-3"><strong class="status">ბენეფიციარი</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">დამატებული განცხადებები</td>
                                <td class="p-3"><strong class="status">{{ 0 }}</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">სახელი, გვარი</td>
                                <td class="p-3"><strong>{{ "სახელი გვარი" }}</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">ტელეფონის ნომერი</td>
                                <td class="p-3"><strong>595871123</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">ელ. ფოსტა</td>
                                <td class="p-3"><strong>beneficiary@rda.gov.ge</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">პირადი ნომერი</td>
                                <td class="p-3"><strong>59001112323</strong></td>
                            </tr>
                            <tr>
                                <td class="p-3">დაბადების თარიღი</td>
                                <td class="p-3"><strong>07/06/1999</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from "../components/Header.vue";
    import axios from "axios";

    export default {
        name : "UserInfo",

        components : {
            Header
        },

        data() {
            return {
                user_info : ""
            }
        },

        async mounted() {
            document.title = "ინფორმაცია";

            const info = await axios.get("/user/info");
            this.user_info = info?.data;
            console.log(info?.data);
        },

        methods : {
            
        }
    }
</script>

<style scoped lang="scss">
    .table {
        font-family: "frutiger_light";
        font-size: 14px;;
    }

    td {
        border-color: #F1F1F1;
    }

    .status {
        background-color: #82BE00;
        padding: 6px;
        border-radius: 6px;
        user-select: none;
        pointer-events: none;
    }
</style>