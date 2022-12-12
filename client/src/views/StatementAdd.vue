<template>
    <div>
        <Header />

        <div class="container mt-5 bg-white p-4">
            <div class="row">
                <div class="card p-4 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <form method="POST" @submit.prevent="add_statement()">
                        <h6 class="col-md-4">ზოგადი ინფორმაცია განმცხადებელზე</h6>

                        <div class="row">
                            <div class="mt-4 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="name" class="mb-2">განმცხადებლის სახელი</label>
                                <input type="text" class="form-control" placeholder="სახელი" name="name" id="name" v-model="name">
                            </div>
                            <div class="mt-4 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="lastname" class="mb-2">განმცხადებლის გვარი</label>
                                <input type="text" class="form-control" placeholder="გვარი" name="lastname" id="lastname" v-model="lastname">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="phone" class="mb-2">მობილური ტელეფონის ნომერი</label>
                                <input type="text" class="form-control" placeholder="ნომერი" name="phone" id="phone" v-model="phone">
                            </div>
                            <div class="mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="additional_phone" class="mb-2">დამატებითი ტელეფონის ნომერი</label>
                                <input type="text" class="form-control" placeholder="ნომერი" name="additional_phone" id="additional_phone" v-model="additional_phone">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="mt-3 mb-3 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="email" class="mb-2">ელ. ფოსტა</label>
                                <input type="text" class="form-control" placeholder="ელ. ფოსტა" name="email" id="email" v-model="email">
                            </div>
                        </div>

                        <h6 class="col-md-5">ზოგადი ინფორმაცია პოტენციურ ბენეფიციარზე</h6>

                        <div class="row">
                            <div class="mt-4 mb-3 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label class="mb-2">ბენეფიციარის იურიდიული სტატუსი</label>
                                <select type="text" class="form-select" v-model="beneficiary_status">
                                    <option value="" disabled selected>აირჩიეთ</option>
                                    <option value="ინდ. მეწარმე">ინდ. მეწარმე</option>
                                    <option value="იურიდიული პირი">იურიდიული პირი</option>
                                    <option value="ფიზიკური პირი">ფიზიკური პირი</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="address1" class="mb-2">ფაქტობრივი მისამართი</label>
                                <input type="text" class="form-control" placeholder="მისამართი" name="address1" id="address1" v-model="address1">
                            </div>
                            <div class="mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="address2" class="mb-2">იურიდიული მისამართი</label>
                                <input type="text" class="form-control" placeholder="მისამართი" name="address2" id="address2" v-model="address2">
                            </div>
                        </div>

                        <h6 class="col-md-5 mt-4">თანადაფინანსების განაცხადის მიზნობრიობა</h6>

                        <div class="row">
                            <div class="mt-4 mb-3 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label class="mb-2">სტანდარტული ან სპეციალური თანადაფინანსების პირობა</label>
                                <select type="text" class="form-select" v-model="special_co_finance">
                                    <option value="" disabled selected>აირჩიეთ</option>
                                    <option value="კომბაინი">კომბაინი</option>
                                    <option value="სხვა ტიპის მოსავლის ამღები ტექნიკა (გარდა ყურძნის)">სხვა ტიპის მოსავლის ამღები ტექნიკა (გარდა ყურძნის)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="container-fluid mt-3 p-3" v-for="key in count" :key="key">
                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">მოსავლის ამღები ტექნიკის დასახელება</label>
                                        <input type="text" class="form-control" placeholder="დასახელება" v-model="values['technic_name' + key]">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">მოდელი</label>
                                        <input type="text" class="form-control" placeholder="მოდელი" v-model="values['technic_model' + key]">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ძრავის სიმზლავრე (ცხ/ძ - მხოლოდ ძრავიანი ტექნიკის შემთხვევაში)</label>
                                        <input type="text" class="form-control" placeholder="ძრავის სიმძლავრე (ცხ/ძ)" v-model="technic_engine">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის გამოშვების თარიღი <span class="text-danger">(არაუმეტეს 2 წლის)</span></label>
                                        <input type="date" class="form-control" placeholder="თარიღი" v-model="technic_issue_date">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მწარმოებელი ქვეყანა</label>
                                        <input type="text" class="form-control" placeholder="ქვეყანა" v-model="technic_manufacturer_country">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის დანიშნულება (რისთვის გამოიყენება)</label>
                                        <input type="text" class="form-control" placeholder="დანიშნულება" v-model="technic_use_to">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მომწოდებელი კომპანიის დასახელება</label>
                                        <input type="text" class="form-control" placeholder="კომპანია" v-model="technic_supplier_company">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მომწოდებელი კომპანიის საიდენტიფიკაციო ნომერი</label>
                                        <input type="text" class="form-control" placeholder="ს/კ" v-model="company_id">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">1 ერთეული ტექნიკის ღირებულება</label>
                                        <input type="text" class="form-control" placeholder="1 ერთეული ტექნიკის ღირებულება" v-model="price_of_technic">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">რაოდენობა</label>
                                        <input type="number" class="form-control" v-model="number_of_technic" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <button type="button" v-on:click="addTechnicForm()">ტექნიკის დამატება <BIconPlusLg /></button>
                                <button type="button" v-if="this.count > 1" class="danger ms-2" @click="removeForm()">ტექნიკის წაშლა</button>
                            </div>
                        </div>

                        <div class="alert alert-danger mb-5">
                            <span>ტექნიკა არ უნდა იყოს ექსპლუატაციაში ნამყოფი.</span>
                        </div>

                        <div class="row">
                            <p>სულ <big><b>0 GEL</b></big></p>
                        </div>

                        <h6 class="col-md-4 mt-4">წარმოსადგენი დოკუმენტაციის ნუსხა</h6>
                        
                        <!-- პირადობის მოწმობის ასლის ფაილის ბლოკი-->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handlePersonalId($event)" ref="personal_id_file">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openPid()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>პოტენციური ბენეფიციარის პირადობის მოწმობის ასლი.</span>
                                </div>
                            </div>
                        </div>
                        <!-- პირადობის მოწმობის ასლის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handlePersonalId1($event)" ref="personal_id_file1">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openPid1()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>წარმომადგენლობაზე უფლებამოსილი პირის პირადობის მოწმობის ასლი და უფლებამოსილების დამადასტურებელი დოკუმენტი (ასეთის არსებობის შემთხვევაში).</span>
                                </div>
                            </div>
                        </div>
                        <!-- კომერციული პირის ამონაწერის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile3($event)" ref="file3">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile3()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>ამონაწერი მეწარმეთა და არასამეწარმეო (არაკომერციული) იურიდიული პირების რეესტრიდან (იურიდიული პირის შემთხვევაში).</span>
                                </div>
                            </div>
                        </div>

                        <!-- იურიდიული პირის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile4($event)" ref="file4">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile4()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>იურიდიული პირების შემთხვევაში − ნოტარიული წესით დამოწმებული დამფუძნებლების/პარტნიორების კრების ოქმი პროგრამაში მონაწილეობისა და სააგენტოსთან გასაფორმებელი ხელშეკრულებით გათვალისწინებული ვალდებულებების აღების თაობაზე (ასეთის საჭიროების შემთხვევაში).</span>
                                </div>
                            </div>
                        </div>

                        <!-- ინვოისის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile5($event)" ref="file5">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile5()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>შესასყიდი მიზნობრიობის ინვოისი ან/და ხელშეკრულება ქართულ ენაზე (ტექნიკის იმპორტის შემთხვევაში ნოტარიულად დამოწმებული თარგმანი), რომელიც აუცილებელი წესით უნდა მოიცავდეს შემდეგ ინფორმაციას: მოსავლის ამღები სასოფლო-სამეურნეო ტექნიკის დასახელება, მახასიათებლები (მოდელი, ცხ.ძ (ასეთის არსებობის შემთხვევაში), გამოშვების წელი, ექსპლუატაციაში არ ყოფნის შესახებ სტატუსი, მწარმოებელი ქვეყანა, დანიშნულება (აღწერილი უნდა იყოს თუ რა სასოფლო-სამეურნეო დანიშნულებით გამოიყენება წარმოდგენილი ტექნიკა), მხარეთა რეკვიზიტები, მიწოდების ვადა (არაუმეტეს 5 თვისა), გადახდის პირობები. შენიშვნა: ტექნიკის ადგილობრივი მომწოდებლის შემთხვევაში გადახდის პირობა აუცილებელი წესით უნდა მოიცავდეს შემდეგ ინფორმაციას, რომ სააგენტოს თანადაფინანსების თანხის გადახდა მოხდება ტექნიკის მიწოდების შემდეგ.</span>
                                </div>
                            </div>
                        </div>

                        <!-- სასოფლო სამეურნეო ტექნიკის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile6($event)" ref="file6">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile6()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>სასოფლო-სამეურნეო ტექნიკის საგარანტიო დოკუმენტი (საგარანტიო პირობები უნდა ვრცელდებოდეს განაცხადის წარდგენიდან არანაკლებ 6 თვის ვადით) გაცემული მწარმოებლის ან/და მიმწოდებლის მიერ.</span>
                                </div>
                            </div>
                        </div>

                        <!-- სნობის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile7($event)" ref="file7">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile7()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>ცნობა ან/და შედარების აქტი სსიპ - შემოსავლების სამსახურიდან დავალიანების არარსებობის შესახებ.</span>
                                </div>
                            </div>
                        </div>

                        <!-- თანამონაწილეობის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile8($event)" ref="file8">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile8()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>თანამონაწილეობის თანხის დამადასტურებელი დოკუმენტი - ცნობა/ამონაწერი/ხელშეკრულება ბანკიდან შესაბამისი თანხის ანგარიშზე არსებობის შესახებ ან/და ცნობა ბანკიდან / საფინანსო ინსტიტუტიდან კრედიტის/ლიზინგის/ დამტკიცების თაობაზე.</span>
                                </div>
                            </div>
                        </div>

                        <!-- საბანკო რეკვიზიტების ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile9($event)" ref="file9">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile9()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>საბანკო რეკვიზიტები.</span>
                                </div>
                            </div>
                        </div>

                        <!-- სამხარაულის დოკუმენტების ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile10($event)" ref="file10">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile10()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>სსიპ ლევან სამხარაულის სახელობის სასამართლო ექსპერტიზის ბიუროს ან/და სსიპ „აკრედიტაციის ეროვნული ორგანოს - აკრედიტაციის ცენტრის“ მიერ აკრედიტირებული პირების ან/და საქართველოს ფინანსთა სამინისტროს სისტემაში შემავალი სახელმწიფო საქვეუწყებო დაწესებულების - ბუღალტრული აღრიცხვის, ანგარიშგებისა და აუდიტის ზედამხედველობის სამსახურის მიერ წარმოებულ რეესტრში არსებული პირის საექსპერტო/აუდიტორული დასკვნა წარმოდგენილი პროექტის საინვესტიციო ღირებულების საბაზრო ფასებთან შესაბამისობის შესახებ.</span>
                                </div>
                            </div>
                        </div>

                        <!-- დამატებითი დოკუმენტების ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile11($event)" ref="file11">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile11()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>სხვა დამატებითი დოკუმენტაცია, სააგენტოს მიერ მოთხოვნის შემთხვევაში.</span>
                                </div>
                            </div>
                        </div>

                        <h6 class="col-md-3 mt-4">დაფინანსების წყაროები</h6>

                        <div class="row">
                            <div class="mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="finance" class="mb-2">საკუთარი სახსრები/დაფინანსების სხვა ფულადი წყარო</label>
                                <input type="text" class="form-control" placeholder="0 GEL" name="finance" id="finance" v-model="finance" disabled>
                            </div>
                            <div class="mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="agency_finance" class="mb-2">სააგენტოს დაფინანსება</label>
                                <input type="text" class="form-control" placeholder="0 GEL" name="agency_finance" id="agency_finance" v-model="agency_finance" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <p><strong>გადასანაწილებელი {{ 0 }}</strong></p>
                            <p><strong>სულ</strong>&nbsp;<strong>{{ 0 }}</strong></p>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="mt-4 mb-3">
                                    <button type="submit">განაცხადის დამატება</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <Footer />
    </div>
</template>

<script>
    import Header from "../components/Header.vue";
    import Footer from "../components/Footer.vue";
    //import TechnicForm from "../components/TechnicForm.vue";
    //import axios, { AxiosError } from "axios";
    
    export default {
        name : "StatementAdd",

        components : {
            Header,
            Footer,
            //TechnicForm
        },

        data() {
            return {
                count : 1,

                name : "", // ბენეფიციარის სახელი
                lastname : "", // ბენეფიციარის გვარი
                phone : "", // ბენეფიციარის ტელეფონის ნომერი
                additional_phone : "", // ბენეფიციარის დამატებითი ტელეფონის ნომერი
                email : "", // ბენეფიციარის იმეილი
                beneficiary_status : "", // ბენეფიციარის იურიდიული სტატუსი
                address1 : "", // ბენეფიციარის ფაქტობრივი მისამართი
                address2 : "", // ბენეფიციარის იურიდიული მისამართი
                agency_finance : "", // სააგენტოს თანადაფინანსება
                finance : "", // ბენეფიციარის საკუთარი ფინანსები,

                values : {}
            }
        },

        async mounted() {
            document.title = "განაცხადის დამატება";
        },

        methods : {
            addTechnicForm() {
                this.count++;
            },

            // განაცხადის დამატების ფუნქცია
            add_statement() {
                for(let data of Object.keys(this.values)) {
                    console.log(data);
                    console.log(this.values);
                }
            },

            removeForm() {
                this.count--;
            },

            openPid() {
                this.$refs.personal_id_file.click();
            },

            openPid1() {
                this.$refs.personal_id_file1.click();
            },

            openFile3() {
                this.$refs.file3.click();
            },

            openFile4() {
                this.$refs.file4.click();
            }
        }
    }
</script>

<style scoped lang="scss">
    .container {
        border-radius: 4px;
    }

    input[type="text"], input[type="date"], input[type="number"], select {
        border-radius: 8px;
        border: 1px solid lighten(#787878, 45%) !important;
        background-color: #FFF;
        outline: none;
        padding: 12px 14px;
        width: 100%;
        font-family: "frutiger_light";
        font-size: 14px;
    }

    .alert {
        font-family: "frutiger_light";
        font-size: 14px;
        border: none !important;
        user-select: none;
    }

    .danger {
        background-color: #d9534f;
        color: #fff;

        &:hover {
            background-color: darken(#d9534f, 20%);
            color: #fff;
        }
    }

    p {
        font-family: "frutiger_light";
        user-select: none;
        font-size: 15px;
    }

    .container-fluid {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
</style>