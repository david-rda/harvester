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
                                <select type="text" class="form-select" v-model="finance_condition">
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
                                        <input type="text" class="form-control" placeholder="დასახელება" v-model="values['technic_name_' + key]">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">მოდელი</label>
                                        <input type="text" class="form-control" placeholder="მოდელი" v-model="values['technic_model_' + key]">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ძრავის სიმზლავრე (ცხ/ძ - მხოლოდ ძრავიანი ტექნიკის შემთხვევაში)</label>
                                        <input type="text" class="form-control" placeholder="ძრავის სიმძლავრე (ცხ/ძ)" v-model="values['technic_engine_' + key]">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის გამოშვების თარიღი <span class="text-danger">(არაუმეტეს 2 წლის)</span></label>
                                        <input type="date" class="form-control" placeholder="თარიღი" v-model="values['technic_issue_date_' + key]">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მწარმოებელი ქვეყანა</label>
                                        <input type="text" class="form-control" placeholder="ქვეყანა" v-model="values['technic_manufacturer_country_' + key]">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის დანიშნულება (რისთვის გამოიყენება)</label>
                                        <input type="text" class="form-control" placeholder="დანიშნულება" v-model="values['technic_use_to_' + key]">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მომწოდებელი კომპანიის დასახელება</label>
                                        <input type="text" class="form-control" placeholder="კომპანია" v-model="values['technic_supplier_company_' + key]">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მომწოდებელი კომპანიის საიდენტიფიკაციო ნომერი</label>
                                        <input type="text" class="form-control" placeholder="ს/კ" v-model="values['company_id_' + key]">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">1 ერთეული ტექნიკის ღირებულება</label>
                                        <input type="text" class="form-control" placeholder="1 ერთეული ტექნიკის ღირებულება" v-model="values['price_of_technic_' + key]">
                                    </div>
                                    <div class="mb3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">რაოდენობა</label>
                                        <input type="number" class="form-control" v-model="values['number_of_technic_' + key]" min="0">
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
                            <p>სულ <big><b ref="total">0 GEL</b></big></p>
                        </div>

                        <h6 class="col-md-4 mt-4">წარმოსადგენი დოკუმენტაციის ნუსხა</h6>
                        
                        <!-- პირადობის მოწმობის ასლის ფაილის ბლოკი-->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handlePersonalId($event)" ref="personal_id_file">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openPersonalIdFile()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>პოტენციური ბენეფიციარის პირადობის მოწმობის ასლი.</span>
                                </div>
                            </div>
                        </div>
                        <!-- პირადობის მოწმობის ასლის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handlePersonalId1($event)" ref="personal_id_file1">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFile()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>წარმომადგენლობაზე უფლებამოსილი პირის პირადობის მოწმობის ასლი და უფლებამოსილების დამადასტურებელი დოკუმენტი (ასეთის არსებობის შემთხვევაში).</span>
                                </div>
                            </div>
                        </div>
                        <!-- კომერციული პირის ამონაწერის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile3($event)" ref="entrepreneurFile">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openEntrepreneurDocument()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>ამონაწერი მეწარმეთა და არასამეწარმეო (არაკომერციული) იურიდიული პირების რეესტრიდან (იურიდიული პირის შემთხვევაში).</span>
                                </div>
                            </div>
                        </div>

                        <!-- იურიდიული პირის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile4($event)" ref="notaryFile">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openFileNotary()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>იურიდიული პირების შემთხვევაში − ნოტარიული წესით დამოწმებული დამფუძნებლების/პარტნიორების კრების ოქმი პროგრამაში მონაწილეობისა და სააგენტოსთან გასაფორმებელი ხელშეკრულებით გათვალისწინებული ვალდებულებების აღების თაობაზე (ასეთის საჭიროების შემთხვევაში).</span>
                                </div>
                            </div>
                        </div>

                        <!-- ინვოისის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile5($event)" ref="invoiceFile">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openInvoiceFile()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>შესასყიდი მიზნობრიობის ინვოისი ან/და ხელშეკრულება ქართულ ენაზე (ტექნიკის იმპორტის შემთხვევაში ნოტარიულად დამოწმებული თარგმანი), რომელიც აუცილებელი წესით უნდა მოიცავდეს შემდეგ ინფორმაციას: მოსავლის ამღები სასოფლო-სამეურნეო ტექნიკის დასახელება, მახასიათებლები (მოდელი, ცხ.ძ (ასეთის არსებობის შემთხვევაში), გამოშვების წელი, ექსპლუატაციაში არ ყოფნის შესახებ სტატუსი, მწარმოებელი ქვეყანა, დანიშნულება (აღწერილი უნდა იყოს თუ რა სასოფლო-სამეურნეო დანიშნულებით გამოიყენება წარმოდგენილი ტექნიკა), მხარეთა რეკვიზიტები, მიწოდების ვადა (არაუმეტეს 5 თვისა), გადახდის პირობები. შენიშვნა: ტექნიკის ადგილობრივი მომწოდებლის შემთხვევაში გადახდის პირობა აუცილებელი წესით უნდა მოიცავდეს შემდეგ ინფორმაციას, რომ სააგენტოს თანადაფინანსების თანხის გადახდა მოხდება ტექნიკის მიწოდების შემდეგ.</span>
                                </div>
                            </div>
                        </div>

                        <!-- სასოფლო სამეურნეო ტექნიკის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile6($event)" ref="grantFile">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openGrantDocumentFile()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>სასოფლო-სამეურნეო ტექნიკის საგარანტიო დოკუმენტი (საგარანტიო პირობები უნდა ვრცელდებოდეს განაცხადის წარდგენიდან არანაკლებ 6 თვის ვადით) გაცემული მწარმოებლის ან/და მიმწოდებლის მიერ.</span>
                                </div>
                            </div>
                        </div>

                        <!-- სნობის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile7($event)" ref="inquiryFile">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openInquiryFile()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>ცნობა ან/და შედარების აქტი სსიპ - შემოსავლების სამსახურიდან დავალიანების არარსებობის შესახებ.</span>
                                </div>
                            </div>
                        </div>

                        <!-- თანამონაწილეობის ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile8($event)" ref="complicityFile">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openComplicityFile()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>თანამონაწილეობის თანხის დამადასტურებელი დოკუმენტი - ცნობა/ამონაწერი/ხელშეკრულება ბანკიდან შესაბამისი თანხის ანგარიშზე არსებობის შესახებ ან/და ცნობა ბანკიდან / საფინანსო ინსტიტუტიდან კრედიტის/ლიზინგის/ დამტკიცების თაობაზე.</span>
                                </div>
                            </div>
                        </div>

                        <!-- საბანკო რეკვიზიტების ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile9($event)" ref="accountFile">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="bankAccountDetails()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>საბანკო რეკვიზიტები.</span>
                                </div>
                            </div>
                        </div>

                        <!-- სამხარაულის დოკუმენტების ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile10($event)" ref="examinFile">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openExaminationFile()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>სსიპ ლევან სამხარაულის სახელობის სასამართლო ექსპერტიზის ბიუროს ან/და სსიპ „აკრედიტაციის ეროვნული ორგანოს - აკრედიტაციის ცენტრის“ მიერ აკრედიტირებული პირების ან/და საქართველოს ფინანსთა სამინისტროს სისტემაში შემავალი სახელმწიფო საქვეუწყებო დაწესებულების - ბუღალტრული აღრიცხვის, ანგარიშგებისა და აუდიტის ზედამხედველობის სამსახურის მიერ წარმოებულ რეესტრში არსებული პირის საექსპერტო/აუდიტორული დასკვნა წარმოდგენილი პროექტის საინვესტიციო ღირებულების საბაზრო ფასებთან შესაბამისობის შესახებ.</span>
                                </div>
                            </div>
                        </div>

                        <!-- დამატებითი დოკუმენტების ფაილის ბლოკი -->
                        <div class="row">
                            <div class="mb-3 mt-4 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="file_block p-3">
                                    <input type="file" v-on:change="handleFile11($event)" ref="additional">
                                    <button type="button" class="col-md-3 col-lg-3" v-on:click="openAdditionalFiles()">ფაილის არჩევა&nbsp;<BIconFolder2 /></button>
                                    <span>სხვა დამატებითი დოკუმენტაცია, სააგენტოს მიერ მოთხოვნის შემთხვევაში.</span>
                                </div>
                            </div>
                        </div>

                        <h6 class="col-md-3 mt-4">დაფინანსების წყაროები</h6>

                        <div class="row">
                            <div class="mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="finance" class="mb-2">საკუთარი სახსრები/დაფინანსების სხვა ფულადი წყარო</label>
                                <input type="text" class="form-control" placeholder="0 GEL" name="finance" id="finance" disabled v-model="own_finance">
                            </div>
                            <div class="mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="agency_finance" class="mb-2">სააგენტოს დაფინანსება</label>
                                <input type="text" class="form-control" placeholder="0 GEL" name="agency_finance" id="agency_finance" disabled v-model="agency_finance">
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

                    <div class="row">
                        <div class="alert alert-danger alert-dismissible fade show" v-for="(item, index) in statement_errors" :key="index">
                            <strong>{{ item[0] }}</strong>
                            <a href="javascript:void(0)" class="btn-close" data-bs-dismiss="alert"></a>
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
    import axios, { AxiosError } from "axios";
    import {
        openPersonalIdFile,
        openFile,
        openEntrepreneurDocument,
        openFileNotary,
        openInvoiceFile,
        openGrantDocumentFile,
        openInquiryFile,
        openComplicityFile,
        bankAccountDetails,
        openExaminationFile,
        openAdditionalFiles
    } from "../helpers/openFile"
    
    export default {
        name : "StatementAdd",

        components : {
            Header,
            Footer,
        },

        data() {
            return {
                count : 1,
                statement_errors : "", // აქ შეინახება ვალიდაციისას დაბრუნებული შეცდომის შეტყობინებები

                name : "", // ბენეფიციარის სახელი
                lastname : "", // ბენეფიციარის გვარი
                phone : "", // ბენეფიციარის ტელეფონის ნომერი
                additional_phone : "", // ბენეფიციარის დამატებითი ტელეფონის ნომერი
                email : "", // ბენეფიციარის იმეილი
                beneficiary_status : "", // ბენეფიციარის იურიდიული სტატუსი
                address1 : "", // ბენეფიციარის ფაქტობრივი მისამართი
                address2 : "", // ბენეფიციარის იურიდიული მისამართი
                finance_condition : "", // თანადაფინანსების პირობები
                agency_finance : "", // სააგენტოს თანადაფინანსება
                own_finance : "", // ბენეფიციარის საკუთარი ფინანსები,
                values : {}, // მოცემულ მნიშვნელობებში ინახება
            }
        },

        async mounted() {
            document.title = "განაცხადის დამატება";
        },

        methods : {
            addTechnicForm() {
                this.count++;
            },

            removeForm() {
                this.count--;
            },

            // განაცხადის დამატების ფუნქცია
            async add_statement() {
                try {
                    const formData = new FormData(); // მოცემულ ობიექტში შეინახება ფორმიდან შეყვანილი მონაცემები(ბენეფიციარის)

                    formData.append("beneficiary_name", this.name); // ბენეფიციარის სახელი
                    formData.append("beneficiary_lastname", this.lastname); // ბენეფიციარის გვარი
                    formData.append("beneficiary_phone", this.phone); // ბენეფიციარის მობილური
                    formData.append("beneficiary_additional_phone", this.additional_phone); // ბენეფიციარის დამატებითი მობილური
                    formData.append("beneficiary_email", this.email); // ბენეფიციარის ელ. ფოსტა
                    formData.append("beneficiary_juridical_status", this.beneficiary_status); // ბენეფიციარის იურიდიული სტატუსი
                    formData.append("beneficiary_address1", this.address1); // ბენეფიციარის ფაქტობრივი მისამართი
                    formData.append("beneficiary_address2", this.address2); // ბენეფიციარის იურიდიული მისამართი
                    formData.append("finance_condition", this.finance_condition); // ბენეფიციარის თანადაფინანსების პირობა
                    formData.append("own_finance", this.own_finance); // საკუთარი ფინანსები
                    formData.append("agency_finance", this.agency_finance); // სააგენტოს ფინანსები

                    for(let i = 1; i <= Object.keys(this.values).length; i++) {
                        formData.append("names[]", this.values?.['technic_name_' + i]); // ტექნიკის დასახელება
                        formData.append("models[]", this.values?.['technic_model_' + i]); // ტექნიკის მოდელი
                        formData.append("engines[]", this.values?.['technic_engine_' + i]); // ტექნიკის ძრავის სიმძლავრე
                        formData.append("issue_dates[]", this.values?.['technic_issue_date_' + i]); // ტექნიკის გამოშვების თარიღი
                        formData.append("manufacturers[]", this.values?.['technic_manufacturer_country_' + i]); // ტექნიკის მწარმოებელი ქვეყანა
                        formData.append("use_fors[]", this.values?.['technic_use_to_' + i]); // ტექნიკის დანიშნულება
                        formData.append("suppliers[]", this.values?.['technic_supplier_company_' + i]); // მომწოდებელი კომპანია
                        formData.append("company_ids[]", this.values?.['company_id_' + i]); // კომპანიის ს/კ
                        formData.append("prices[]", this.values?.['price_of_technic_' + i]); // ტექნიკის ერთეულის ღირებულება
                        formData.append("quantities[]", this.values?.['number_of_technic_' + i]); // ტექნიკის ღირებულება
                    }

                    await axios.post("/statement/add", formData);
                }catch(err) {
                    if(err instanceof AxiosError) {
                        this.statement_errors = err?.response?.data?.errors;
                    }
                }
            },

            // ფაილების ატვირთვისთვის ფანჯრის გახსნის მეტოდები
            openPersonalIdFile,
            openFile,
            openEntrepreneurDocument,
            openFileNotary,
            openInvoiceFile,
            openGrantDocumentFile,
            openInquiryFile,
            openComplicityFile,
            bankAccountDetails,
            openExaminationFile,
            openAdditionalFiles
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