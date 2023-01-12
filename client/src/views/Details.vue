<template>
    <div>
        <Header />
        <div class="container bg-white mt-5 p-5">
            <div class="row">
                <h6 class="col-lg-4 col-md-4">ზოგადი ინფორმაცია განმცხადებელზე</h6>
            </div>

            <div class="row">
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
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
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                        <table class="table">
                            <tbody v-if="this.statement?.beneficiary_juridical_status == 'იურიდიული პირი'">
                                <tr>
                                    <th>ბენეფიციარის იურიდიული სტატუსი</th>
                                    <td>{{ this.statement?.beneficiary_juridical_status }}</td>
                                </tr>
                                <tr>
                                    <th>კომპანიის დასახელება</th>
                                    <td>{{ this.statement?.beneficiary_company_name }}</td>
                                </tr>
                                <tr>
                                    <th>კომპანიის საიდენტიფიკაციო ნომერი</th>
                                    <td>{{ this.statement?.beneficiary_company_id_number }}</td>
                                </tr>
                                <tr>
                                    <th>კომპანიის დირექტორის სახელი, გვარი</th>
                                    <td>{{ this.statement?.beneficiary_company_director }}</td>
                                </tr>
                                <tr>
                                    <th>მობილური ტელეფონის ნომერი</th>
                                    <td>{{ this.statement?.beneficiary_company_phone }}</td>
                                </tr>
                                <tr>
                                    <th>დამატებითი ტელეფონის ნომერი</th>
                                    <td>{{ this.statement?.beneficiary_company_additional_phone }}</td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <th>ბენეფიციარის იურიდიული სტატუსი</th>
                                    <td>{{ this.statement?.beneficiary_juridical_status }}</td>
                                </tr>
                                <tr>
                                    <th>კომპანიის დასახელება</th>
                                    <td>{{ this.statement?.applicant_phone }}</td>
                                </tr>
                                <tr>
                                    <th>კომპანიის საიდენტიფიკაციო ნომერი</th>
                                    <td>{{ this.statement?.applicant_additional_phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mb-2">
                    <h6 class="col-lg-6 col-md-6">თანადაფინანსების განაცხადის მიზნობრიობა</h6>
                </div>

                <div class="row">
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>სტანდარტული ან სპეციალური თანადაფინანსების პირობა</th>
                                    <td>{{ this.statement?.finance_condition }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="container-fluid bg-white p-4 mb-3" v-for="(data, index) in this.statement?.technics" :key="index">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>მოსავლის ამღები ტექნიკის დასახელება</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>მოდელი</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ძრავის სიმძლავრე ( ცხ/ძ - მხოლოდ ძრავიანი ტექნიკის შემთხვევაში )</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ტექნიკის გამოშვების თარიღი <span class="text-danger" data-v-33d3f4ec="">(არაუმეტეს 2 წლის)</span></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ტექნიკის მწარმოებელი ქვეყანა</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ტექნიკის დანიშნულება (რისთვის გამოიყენება)</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ტექნიკის მომწოდებელი კომპანიის დასახელება</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ტექნიკის მომწოდებელი კომპანიის საიდენტიფიკაციო ნომერი</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>ტექნიკის ღირებულება</th>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

    .container-fluid {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
</style>