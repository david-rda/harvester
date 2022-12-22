<template>
    <div>
        <Header />

        <div class="container mt-5 bg-white p-5">
            <div class="row">
                <div class="card p-4 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <form method="POST" @submit.prevent="add_statement()" :class="(this.submited) ? 'was-validated' : ''" novalidate>
                        <h6 class="col-md-4">ზოგადი ინფორმაცია განმცხადებელზე</h6>

                        <div class="row">
                            <div class="has-validation position-relative mt-4 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="name" class="mb-2">განმცხადებლის სახელი</label>
                                <input type="text" class="form-control" placeholder="სახელი" name="name" id="name" v-model="name" required>
                                <span class="invalid-tooltip">შეიყვანეთ სახელი</span>
                            </div>
                            <div class="has-validation position-relative mt-4 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="lastname" class="mb-2">განმცხადებლის გვარი</label>
                                <input type="text" class="form-control" placeholder="გვარი" name="lastname" id="lastname" v-model="lastname" required>
                                <span class="invalid-tooltip">შეიყვანეთ გვარი</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="phone" class="mb-2">მობილური ტელეფონის ნომერი</label>
                                <input type="text" required class="form-control" placeholder="ნომერი" name="phone" id="phone" v-model="phone" maxlength="9">
                                <span class="invalid-tooltip">შეიყვანეთ მობილური ტელეფონის ნომერი</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="additional_phone" class="mb-2">დამატებითი ტელეფონის ნომერი</label>
                                <input type="text" required class="form-control" placeholder="ნომერი" name="additional_phone" id="additional_phone" v-model="additional_phone" maxlength="9">
                                <span class="invalid-tooltip">შეიყვანეთ დამატებითი ტელეფონის ნომერი</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="has-validation position-relative mt-3 mb-3 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="email" class="mb-2">ელ. ფოსტა</label>
                                <input type="text" required class="form-control" placeholder="ელ. ფოსტა" name="email" id="email" v-model="email">
                                <span class="invalid-tooltip">შეიყვანეთ ელ. ფოსტა</span>
                            </div>
                        </div>

                        <h6 class="col-md-5">ზოგადი ინფორმაცია პოტენციურ ბენეფიციარზე</h6>

                        <div class="row">
                            <div class="has-validation position-relative mt-4 mb-3 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label class="mb-2">ბენეფიციარის იურიდიული სტატუსი</label>
                                <select type="text" class="form-select" v-model="beneficiary_status" required v-on:change="getStatus($event)">
                                    <option value="" disabled selected>აირჩიეთ</option>
                                    <option value="ინდ. მეწარმე">ინდ. მეწარმე</option>
                                    <option value="იურიდიული პირი">იურიდიული პირი</option>
                                    <option value="ფიზიკური პირი">ფიზიკური პირი</option>
                                </select>
                                <span class="invalid-tooltip">აირჩიეთ ბენეფიციარის იურიდიული სტატუსი</span>
                            </div>
                        </div>
                        <!-- ინდ. მეწარმის ან ფიზიკური პირის ველები -->
                        <div class="row mb-4" v-if="this.status == 'ინდ. მეწარმე' || this.status == 'ფიზიკური პირი'">
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_name" class="mb-2">ბენეფიციარის სახელი</label>
                                <input type="text" required class="form-control" placeholder="სახელი" name="beneficiary_name" id="beneficiary_name" v-model="beneficiary_name">
                                <span class="invalid-tooltip">შეიყვანეთ ბენეფიციარის სახელი</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_lastname" class="mb-2">ბენეფიციარის სახელი</label>
                                <input type="text" required class="form-control" placeholder="გვარი" name="beneficiary_lastname" id="beneficiary_lastname" v-model="beneficiary_lastname">
                                <span class="invalid-tooltip">შეიყვანეთ ბენეფიციარის გვარი</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_gender" class="mb-2">ბენეფიციარის სქესი</label>
                                <select class="form-select" required name="beneficiary_gender" id="beneficiary_gender" v-model="beneficiary_gender">
                                    <option value="" disabled selected>აირჩიეთ</option>
                                    <option value="მამრობითი">მამრობითი</option>
                                    <option value="მდედრობითი">მდედრობითი</option>
                                </select>
                                <span class="invalid-tooltip">აირჩიეთ ბენეფიციარის სქესი</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_pid" class="mb-2">ბენეფიციარის პირადი ნომერი</label>
                                <input type="text" required class="form-control" placeholder="პირადი ნომერი" name="beneficiary_pid" id="beneficiary_pid" v-model="beneficiary_pid">
                                <span class="invalid-tooltip">შეიყვანეთ ბენეფიციარის პირადი ნომერი</span>
                            </div>
                        </div>
                        <!-- ინდ. მეწარმის ველები -->

                        <!-- იურიდიული პირის ველები -->
                        <div class="row mb-4" v-if="this.status == 'იურიდიული პირი'">
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_company_name" class="mb-2">კომპანიის დასახელება</label>
                                <input type="text" required class="form-control" placeholder="კომპანიის დასახელება" name="beneficiary_company_name" id="beneficiary_company_name" v-model="beneficiary_company_name">
                                <span class="invalid-tooltip">შეიყვანეთ კომპანიის დასახელებ</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_company_id" class="mb-2">კომპანიის საიდენტიფიკაციო ნომერი</label>
                                <input type="text" required class="form-control" placeholder="კომპანიის საიდენტიფიკაციო ნომერი" name="beneficiary_company_id" id="beneficiary_company_id" v-model="beneficiary_company_id">
                                <span class="invalid-tooltip">შეიყვანეთ კომპანიის საიდენტიფიკაციო ნომერი</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_company_director" class="mb-2">კომპანიის დირექტორის სახელი, გვარი</label>
                                <input type="text" required class="form-control" placeholder="სახელი, გვარი" name="beneficiary_company_director" id="beneficiary_company_director" v-model="beneficiary_company_director">
                                <span class="invalid-tooltip">შეიყვანეთ სახელი, გვარი</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_company_mobile" class="mb-2">მობილური ტელეფონის ნომერი</label>
                                <input type="text" required class="form-control" placeholder="ნომერი" name="beneficiary_company_mobile" id="beneficiary_company_mobile" v-model="beneficiary_company_mobile">
                                <span class="invalid-tooltip">შეიყვანეთ ნომერი</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-3 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="beneficiary_company_addmobile" class="mb-2">დამატებითი ტელეფონის ნომერი</label>
                                <input type="text" required class="form-control" placeholder="დამატებითი ნომერი" name="beneficiary_company_addmobile" id="beneficiary_company_addmobile" v-model="beneficiary_company_addmobile">
                                <span class="invalid-tooltip">შეიყვანეთ დამატებითი ნომერი</span>
                            </div>
                        </div>
                        <!-- იურიდიული პირის ველები -->

                        <div class="row">
                            <div class="has-validation position-relative mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="address1" class="mb-2">ფაქტობრივი მისამართი</label>
                                <input type="text" required class="form-control" placeholder="მისამართი" name="address1" id="address1" v-model="address1">
                                <span class="invalid-tooltip">შეიყვანეთ ფაქტობრივი მისამართი</span>
                            </div>
                            <div class="has-validation position-relative mt-3 mb-4 col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <label for="address2" class="mb-2">იურიდიული მისამართი</label>
                                <input type="text" required class="form-control" placeholder="მისამართი" name="address2" id="address2" v-model="address2">
                                <span class="invalid-tooltip">შეიყვანეთ იურიდიული მისამართი</span>
                            </div>
                        </div>

                        <h6 class="col-md-5 mt-4">თანადაფინანსების განაცხადის მიზნობრიობა</h6>

                        <div class="row">
                            <div class="has-validation position-relative mt-4 mb-3 col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label class="mb-2">სტანდარტული ან სპეციალური თანადაფინანსების პირობა</label>
                                <select type="text" class="form-select" v-model="finance_condition" required>
                                    <option value="" disabled selected>აირჩიეთ</option>
                                    <option value="კომბაინი">კომბაინი</option>
                                    <option value="სხვა ტიპის მოსავლის ამღები ტექნიკა (გარდა ყურძნის)">სხვა ტიპის მოსავლის ამღები ტექნიკა (გარდა ყურძნის)</option>
                                </select>
                                <span class="invalid-tooltip">აირჩიეთ სტანდარტული ან სპეციალური თანადაფინანსების პირობა</span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="container-fluid mt-3 p-3" v-for="key in count" :key="key">
                                <div class="row">
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">მოსავლის ამღები ტექნიკის დასახელება</label>
                                        <input type="text" required class="form-control" placeholder="დასახელება" v-model="values['technic_name_' + key]">
                                        <span class="invalid-tooltip">შეიყვანეთ მოსავლის ამღები ტექნიკის დასახელება</span>
                                    </div>
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">მოდელი</label>
                                        <input type="text" required class="form-control" placeholder="მოდელი" v-model="values['technic_model_' + key]">
                                        <span class="invalid-tooltip">შეიყვანეთ მოდელი</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ძრავის სიმზლავრე (ცხ/ძ - მხოლოდ ძრავიანი ტექნიკის შემთხვევაში)</label>
                                        <input type="text" required class="form-control" placeholder="ძრავის სიმძლავრე (ცხ/ძ)" v-model="values['technic_engine_' + key]">
                                        <span class="invalid-tooltip">შეიყვანეთ ძრავის სიმძლავრე</span>
                                    </div>
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის გამოშვების თარიღი <span class="text-danger">(არაუმეტეს 2 წლის)</span></label>
                                        <input type="date" required class="form-control" placeholder="თარიღი" v-model="values['technic_issue_date_' + key]">
                                        <span class="invalid-tooltip">შეიყვანეთ გამოშვების თარიღია</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მწარმოებელი ქვეყანა</label>
                                        <input type="text" required class="form-control" placeholder="ქვეყანა" v-model="values['technic_manufacturer_country_' + key]">
                                        <span class="invalid-tooltip">შეიყვანეთ მწარმოებელი ქვეყანაა</span>
                                    </div>
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის დანიშნულება (რისთვის გამოიყენება)</label>
                                        <input type="text" required class="form-control" placeholder="დანიშნულება" v-model="values['technic_use_to_' + key]">
                                        <span class="invalid-tooltip">შეიყვანეთ ტექნიკის დანიშნულება</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მომწოდებელი კომპანიის დასახელება</label>
                                        <input type="text" required class="form-control" placeholder="კომპანია" v-model="values['technic_supplier_company_' + key]">
                                        <span class="invalid-tooltip">შეიყვანეთ ტექნიკის მომწოდებელი კომპანიის დასახელება</span>
                                    </div>
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">ტექნიკის მომწოდებელი კომპანიის საიდენტიფიკაციო ნომერი</label>
                                        <input type="text" required class="form-control" placeholder="ს/კ" v-model="values['company_id_' + key]">
                                        <span class="invalid-tooltip">შეიყვანეთ ტექნიკის მომწოდებელი კომპანიის საიდენტიფიკაციო ნომერი</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">1 ერთეული ტექნიკის ღირებულება</label>
                                        <input ref="price" type="text" required class="form-control" placeholder="1 ერთეული ტექნიკის ღირებულება" v-model="values['price_of_technic_' + key]">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link"><b>GEL</b></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" @click="toUsd(index = key)"><b>USD</b>&nbsp;&nbsp;&nbsp;<span class="badge bg-success p-2">{{ this.usd_course }}</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" @click="toEuro(index = key)"><b>EUR</b>&nbsp;&nbsp;&nbsp;<span class="badge bg-success p-2">{{ this.euro_course }}</span></a>
                                            </li>
                                        </ul>
                                        <span class="invalid-tooltip">შეიყვანეთ 1 ერთეული ტექნიკის ღირებულება</span>
                                    </div>
                                    <div class="has-validation position-relative mb-3 mt-4 col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <label class="mb-2">რაოდენობა</label>
                                        <input ref="quantity" type="number" required class="form-control" v-model="values['number_of_technic_' + key]" min="0" @change="calculate()">
                                        <span class="invalid-tooltip">შეიყვანეთ რაოდენობა</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                        <div class="alert alert-secondary" style="background-color: #f5f8f9 !important">
                                            <p>მიმდინარე კურსი: <span ref="course" :key="key">0</span></p>
                                            <p>თანხა ლარში: <span ref="money" :key="key">{{ (values['price_of_technic_' + key]) ? values['price_of_technic_' + key] : '0.00' }}</span></p>
                                        </div>
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
                            <p>სულ: <big><b ref="total"></b></big>&nbsp;<big><b>GEL</b></big></p>
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
                            <p><strong>გადასანაწილებელი <big>{{ 0 }}&nbsp;GEL</big></strong></p>
                            <p><strong>სულ</strong>&nbsp;<strong><big>GEL&nbsp;<span>{{ this.tot }}</span></big></strong></p>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="mt-4 mb-3">
                                    <button type="submit">განაცხადის დამატება</button>
                                </div>
                            </div>
                        </div>

                        <div class="row" v-if="showError">
                            <div class="alert alert-dismissible alert-danger fade show">
                                <a href="javascript:void" class="btn-close" data-bs-dismiss="alert"></a>
                                <strong>განაცხადი ვერ გაიგზავნა. გთხოვთ გადაამოწმოთ მონაცემები</strong>
                            </div>
                        </div>
                        <div class="row" v-if="showSuccess">
                            <div class="alert alert-dismissible alert-success fade show">
                                <a href="javascript:void" class="btn-close" data-bs-dismiss="alert"></a>
                                <strong>განაცხადი გაიგზავნა</strong>
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
                showError : false,
                showSuccess : false,

                name : "", // განმცხადებლის სახელი
                lastname : "", // განმცხადებლის გვარი
                phone : "", // განმცხადებლის ტელეფონის ნომერი
                additional_phone : "", // განმცხადებლის დამატებითი ტელეფონის ნომერი
                email : "", // განმცხადებლის იმეილი
                beneficiary_status : "", // ბენეფიციარის იურიდიული სტატუსი
                address1 : "", // ბენეფიციარის ფაქტობრივი მისამართი
                address2 : "", // ბენეფიციარის იურიდიული მისამართი
                finance_condition : "", // თანადაფინანსების პირობები
                agency_finance : "", // სააგენტოს თანადაფინანსება
                own_finance : "", // ბენეფიციარის საკუთარი ფინანსები,
                values : {}, // მოცემულ მნიშვნელობებში ინახება
                beneficiary_name : "", // ბენეფიციარის სახელი
                beneficiary_lastname : "", // ბენეფიციარის გვარი
                beneficiary_pid : "", // ბენეფიციარის პირადი ნომერი
                beneficiary_gender : "", // ბენეფიციარის სქესი

                // ========================================================= //
                submited : false, // დადასტურების მნიშვნელობა. ანუ მოხდა თუ არა ფორმის დასაბმითება

                status : "",

                usd_course : "", // ამ ცვლადში ინახება აშშ დოლარის კურსის მონაცემი
                euro_course : "", // ამ ცვლადში ინახება ევროს კურსის მონაცემი
                tot : 0
            }
        },

        async mounted() {
            document.title = "განაცხადის დამატება";

            const data = await axios.get("https://nbg.gov.ge/gw/api/ct/monetarypolicy/currencies/ka/json");
            this.usd_course = Number.parseFloat(data?.data[0]?.currencies[40]?.rateFormated);
            this.euro_course = Number.parseFloat(data?.data[0]?.currencies[13]?.rateFormated);
        },

        methods : {
            addTechnicForm() {
                this.count++;
            },

            removeForm() {
                this.count--;
            },

            calculate() {
                var total = 0;
                
                for(let i = 0; i < this.$refs.price.length; i++) {
                    this.$refs.money[i].innerHTML = (this.$refs.price[i].value * this.$refs.quantity[i].value);
                    total += Number.parseFloat(this.$refs.money[i].innerHTML);
                    this.$refs.total.innerHTML = total;
                    this.tot = total;
                }
            },

            // განაცხადის დამატების ფუნქცია
            async add_statement() {
                this.submited = true;

                try {
                    const formData = new FormData(); // მოცემულ ობიექტში შეინახება ფორმიდან შეყვანილი მონაცემები(ბენეფიციარის)

                    formData.append("applicant_name", this.name); // ბენეფიციარის სახელი
                    formData.append("applicant_lastname", this.lastname); // ბენეფიციარის გვარი
                    formData.append("applicant_phone", this.phone); // ბენეფიციარის მობილური
                    formData.append("applicant_additional_phone", this.additional_phone); // ბენეფიციარის დამატებითი მობილური
                    formData.append("beneficiary_email", this.email); // ბენეფიციარის ელ. ფოსტა
                    formData.append("beneficiary_juridical_status", this.beneficiary_status); // ბენეფიციარის იურიდიული სტატუსი
                    formData.append("beneficiary_address1", this.address1); // ბენეფიციარის ფაქტობრივი მისამართი
                    formData.append("beneficiary_address2", this.address2); // ბენეფიციარის იურიდიული მისამართი
                    formData.append("finance_condition", this.finance_condition); // ბენეფიციარის თანადაფინანსების პირობა
                    formData.append("own_finance", this.own_finance); // საკუთარი ფინანსები
                    formData.append("agency_finance", this.agency_finance); // სააგენტოს ფინანსები
                    formData.append("beneficiary_name", this.beneficiary_name); // ბენეფიციარის სახელი
                    formData.append("beneficiary_lastname", this.beneficiary_lastname); // ბენეფიციარის გვარი
                    formData.append("beneficiary_pid", this.beneficiary_pid); // ბენეფიციარის პ/ნ
                    formData.append("beneficiary_gender", this.beneficiary_gender); // ბენეფიციარის სქესი

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

                    await axios.post("/statement/add", formData, {
                        headers : {
                            "Authorization" : `Bearer ${this.$store.state.token}`
                        }
                    });

                    this.showSuccess = true;
                }catch(err) {
                    if(err instanceof AxiosError) {
                        console.log(err?.response?.data?.errors);
                        this.showError = true;
                    }
                }
            },

            getStatus(event) {
                this.status = event.target.value;
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
        border-radius: 8px;
    }

    .btn-group {
        button:first-child {
            border-radius: 0px 0px 0px 4px !important;
        }
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