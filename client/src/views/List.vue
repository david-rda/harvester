<template>
    <div>
        <Header />
        <div class="container bg-white p-4 mt-5">
            <div class="table-responsive" v-if="show && this.role == 3">
                <h5 class="mb-5">ჩემი განაცხადები</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th>განაცხადი</th>
                            <th>დამატების თარიღი</th>
                            <th>სტატუსი</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in this.statements" :key="data?.id">
                            <td>{{ data?.id }}</td>
                            <td>{{ data?.created_at }}</td>
                            <td>{{ data?.status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-else>
                <div class="alert alert-primary d-flex align-items-center">
                    <BIconInfoLg /><span>&nbsp;ამ დროისთვის არც ერთი განაცხადი არ არის დამატებული.</span>
                </div>
            </div>

            <div v-if="this.role != 3">
                <h3 class="mb-3 mt-5"><b>განსახილველი განაცხადები</b></h3>

                <div class="row">
                    <div class="col-lg-5 col-md-5 col-xs-12 col-sm-12 mb-5 text-center">
                        <div class="excel-download-bar bg-white">
                            <span><img src="../assets/images/excel.png">&nbsp;&nbsp;&nbsp;განაცხადების გადმოწერა - {{ full_date_string }}</span>
                        </div>
                    </div>
                </div>

                <div class="card p-3 mb-3 col-md-6">
                    <div class="row">
                        <form method="POST" @submit.prevent="search_by_id()">
                            <div class="input-group">
                                <div class="inpur-group-prepend">
                                    <span class="input-group-text">განაცხადის ID-ით ძებნა</span>
                                </div>
                                <input type="text" placeholder="მიუთითეთ განაცხადის ID" class="col-lg-4">
                                <div class="inpur-group-append">
                                    <span class="input-group-text igt" type="submit">ძებნა</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- მოცემული ფილტრი გამოუჩნდება პირველადის უფროსს -->
                <div class="card p-3 mb-3">
                    <h5 class="mb-3">განმხილველი</h5>

                    <div class="btn-group flex-wrap mb-2">
                        <button type="button" class="btn">პირველადი შემფასებელი 1</button>
                        <button type="button" class="btn">პირველადი შემფასებელი 2</button>
                        <button type="button" class="btn">პირველადი შემფასებელი 3</button>
                        <button type="button" class="btn">ყველა</button>
                    </div>
                </div>
                
                <!-- მოცემული ფილტრი გამოუჩნდება ოფიცრების უფროსს -->
                <div class="card p-3 mb-3">
                    <h5 class="mb-3">ოფიცერი (ტესტირება)</h5>

                    <div class="btn-group flex-wrap mb-2">
                        <button type="button" class="btn">საგრანტო ოფიცერი 1</button>
                        <button type="button" class="btn">საგრანტო ოფიცერი 2</button>
                        <button type="button" class="btn">საგრანტო ოფიცერი 3</button>
                        <button type="button" class="btn">ყველა</button>
                    </div>
                </div>

                <div class="card p-3 mb-3">
                    <h5 class="mb-3">სტატუსი</h5>

                    <div class="btn-group flex-wrap mb-2">
                        <button type="button" class="btn">ახალი</button>
                        <button type="button" class="btn">მოთხოვნილი ინფორმაციის დაზუსტება</button>
                        <button type="button" class="btn">დამტკიცებული</button>
                        <button type="button" class="btn">ხელშეკრულება გაფორმებულია</button>
                        <button type="button" class="btn">თანხა ათვისებულია</button>
                        <button type="button" class="btn">ყველა</button>
                    </div>
                </div>

                <div class="card p-3">
                    <h5 class="mb-3">პრობლემურობა</h5>

                    <div class="btn-group">
                        <button type="button" class="btn">უპრობლემო</button>
                        <button type="button" class="btn">შეჩერებული</button>
                        <button type="button" class="btn">უარყოფილი</button>
                    </div>
                </div>

                <div class="table-responsive mt-5 mb-5">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>განაცხადი</th>
                                <th>გაგზავნის თარიღი</th>
                                <th>სტატუსი</th>
                                <th>ოფიცერი</th>
                                <th>სახელი, გვარი</th>
                                <th>მოთხოვნები</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="alert alert-primary d-flex align-items-center">
                        <BIconInfoLg /><span>&nbsp;განაცხადები ვერ მოიძებნა.</span>
                    </div>
                </div>

                <!-- მოცემული ფილტრი გამოუჩნდება პირველადის უფროსს -->
                <div class="card p-3 mb-3">
                    <h5 class="mb-3">განმხილველი</h5>

                    <div class="btn-group flex-wrap mb-2">
                        <button type="button" class="btn">პირველადი შემფასებელი 1</button>
                        <button type="button" class="btn">პირველადი შემფასებელი 2</button>
                        <button type="button" class="btn">პირველადი შემფასებელი 3</button>
                        <button type="button" class="btn">ყველა</button>
                    </div>
                </div>

                <!-- მოცემული ფილტრი გამოუჩნდება ოფიცრების უფროსს -->
                <div class="card p-3 mb-3">
                    <h5 class="mb-3">ოფიცერი (ტესტირება)</h5>

                    <div class="btn-group flex-wrap mb-2">
                        <button type="button" class="btn">საგრანტო ოფიცერი 1</button>
                        <button type="button" class="btn">საგრანტო ოფიცერი 2</button>
                        <button type="button" class="btn">საგრანტო ოფიცერი 3</button>
                        <button type="button" class="btn">ყველა</button>
                    </div>
                </div>

                <div class="card p-3 mb-3">
                    <h5 class="mb-3">სტატუსი</h5>

                    <div class="btn-group flex-wrap mb-2">
                        <button type="button" class="btn">ახალი</button>
                        <button type="button" class="btn">მოთხოვნილი ინფორმაციის დაზუსტება</button>
                        <button type="button" class="btn">დამტკიცებული</button>
                        <button type="button" class="btn">ხელშეკრულება გაფორმებულია</button>
                        <button type="button" class="btn">თანხა ათვისებულია</button>
                        <button type="button" class="btn">ყველა</button>
                    </div>
                </div>

                <div class="card p-3">
                    <h5 class="mb-3">პრობლემურობა</h5>

                    <div class="btn-group">
                        <button type="button" class="btn">უპრობლემო</button>
                        <button type="button" class="btn">შეჩერებული</button>
                        <button type="button" class="btn">უარყოფილი</button>
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
    import axios, { AxiosError } from "axios";
    
    export default {
        name : "List",

        components : {
            Header,
            Footer
        },

        data() {
            return {
                show : false,
                full_date_string : "",
                role : "",
                statements : ""
            }
        },

        async mounted() {
            document.title = "განაცხადების სია";
            this.$store.dispatch("setRole");

            this.role = this.$store.state.role;

            const months = ["იანვარი", "თებერვალი", "მარტი", "აპრილი", "მაისი", "ივნისი", "ივლისი", "აგვისტო", "სექტემბერი", "ოქტომბერი", "ნოემბერი", "დეკემბერი"];

            const date = new Date();

            let day = date.getDate(); // მიმდინარე თვის კონკრეტული რიცხვი
            let year = date.getFullYear(); // მიმდინარე წელი
            let month = months[date.getMonth()]; // მიმდინარე თვე

            this.full_date_string = `${day} ${month}, ${year} წელი`; // სრული თარიღი

            try {
                const statements = await axios.get("/statement/list", {
                    headers : {
                        "Authorization" : `Bearer ${this.$store.state.token}`
                    }
                });
                
                this.statements = statements?.data;
                this.show = true;
            }catch(err) {
                if(err instanceof AxiosError) {
                    console.log(err);
                    this.show = false;
                }
            }
        },
    }
</script>

<style scoped lang="scss">
    .alert {
        font-family: "frutiger_light";
        border: none;
        user-select: none;
    }

    input[type="text"] {
        border-radius: 8px;
        border: 1px solid lighten(#787878, 45%);
        background-color: #FFF;
        outline: none;
        padding: 12px 14px;
        font-family: "frutiger_light";
        font-size: 14px;
    }

    span {
        font-size: 14px;
    }
    
    // ციკლის სასუალებით მოხდება ყველა დონის სათაურის გასტილვა ერთად
    $sizes: 1, 2, 3, 4, 5, 6; // სათაურის დონეები

    @each $data in $sizes {
        h#{$data} {
            font-family: "frutiger_light_caps";
            user-select: none;
            color: gray;
        }
    }

    table > * {
        font-family: "frutiger_light_caps";
        font-size: 14px;
    }

    th {
        user-select: none;
        border-bottom: 1px solid #E7E7E7;
    }

    .btn {
        border: 1px solid $darkgreen;

        &:hover {
            color: #fff;
            background-color: #005019;
        }
    }
</style>
