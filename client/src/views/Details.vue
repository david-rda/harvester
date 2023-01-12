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
                    <div class="container-fluid bg-white p-4 mb-4" v-for="(data, index) in this.statement?.technics" :key="index">
                        <h4>#{{ index + 1 }}</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>მოსავლის ამღები ტექნიკის დასახელება</th>
                                    <td>{{ data?.technic_name }}</td>
                                </tr>
                                <tr>
                                    <th>მოდელი</th>
                                    <td>{{ data?.technic_model }}</td>
                                </tr>
                                <tr>
                                    <th>რაოდენობა</th>
                                    <td>{{ data?.technic_quantity }}</td>
                                </tr>
                                <tr>
                                    <th>ძრავის სიმძლავრე ( ცხ/ძ - მხოლოდ ძრავიანი ტექნიკის შემთხვევაში )</th>
                                    <td>{{ data?.technic_engine_speed }}</td>
                                </tr>
                                <tr>
                                    <th>ტექნიკის გამოშვების თარიღი <span class="text-danger" data-v-33d3f4ec="">(არაუმეტეს 2 წლის)</span></th>
                                    <td>{{ data?.technic_issue_date }}</td>
                                </tr>
                                <tr>
                                    <th>ტექნიკის მწარმოებელი ქვეყანა</th>
                                    <td>{{ data?.technic_manufacturer_country }}</td>
                                </tr>
                                <tr>
                                    <th>ტექნიკის დანიშნულება (რისთვის გამოიყენება)</th>
                                    <td>{{ data?.technic_use_for }}</td>
                                </tr>
                                <tr>
                                    <th>ტექნიკის მომწოდებელი კომპანიის დასახელება</th>
                                    <td>{{ data?.technic_supplier_company }}</td>
                                </tr>
                                <tr>
                                    <th>ტექნიკის მომწოდებელი კომპანიის საიდენტიფიკაციო ნომერი</th>
                                    <td>{{ data?.technic_supplier_company_id_number }}</td>
                                </tr>
                                <tr>
                                    <th>ტექნიკის ღირებულება</th>
                                    <td>{{ data?.technic_price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="alert alert-danger mb-3 mt-3">
                        <span>ტექნიკა არ უნდა იყოს ექსპლუატაციაში ნამყოფი.</span>
                    </div>
                </div>

                <div class="row mb-2">
                    <h6 class="col-lg-6 col-md-6">დაფინანსების წყაროები</h6>
                </div>

                <div class="row">
                    <div class="mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <label for="finance" class="mb-2">საკუთარი სახსრები/დაფინანსების სხვა ფულადი წყარო</label>
                        <input type="text" ref="own_finance" class="form-control" placeholder="0 GEL" name="finance" id="finance" disabled>
                    </div>
                    <div class="mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <label for="agency_finance" class="mb-2">სააგენტოს დაფინანსება</label>
                        <input type="text" ref="agency_finance" class="form-control" placeholder="0 GEL" name="agency_finance" id="agency_finance" disabled>
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

    .alert {
        font-family: "frutiger_light";
        font-size: 14px;
        border: none !important;
        user-select: none;
    }

    input[type="text"] {
        border-radius: 8px;
        border: 1px solid lighten(#787878, 45%) !important;
        background-color: #FFF;
        outline: none;
        padding: 12px 14px;
        width: 100%;
        font-family: "frutiger_light";
        font-size: 14px;
    }

    input[type="text"]:disabled {
        background-color: rgb(236, 235, 235);
        border: 1px solid #d2d0d0 !important;
    }
</style>