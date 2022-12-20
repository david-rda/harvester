/**
 * @description დამხმარე ფუნქციები
 * @author RDA_IT_TEAM
 * @version 1.0
 */

// პირადობის მოწმობის ფაილის ატვირთვის ფანჯრის გახსნა
function openPersonalIdFile() {
    this.$refs.personal_id_file.click();
}

// წარმომადგენლობაზე უფლებამოსილი პირის პირადობის მოწმობის ასლი და უფლებამოსილების დამადასტურებელი დოკუმენტი (ასეთის არსებობის შემთხვევაში).
function openFile() {
    this.$refs.personal_id_file1.click();
}

// ამონაწერი მეწარმეთა და არასამეწარმეო (არაკომერციული) იურიდიული პირების რეესტრიდან (იურიდიული პირის შემთხვევაში).
function openEntrepreneurDocument() {
    this.$refs.entrepreneurFile.click();
}

/**
 * იურიდიული პირების შემთხვევაში − ნოტარიული წესით დამოწმებული დამფუძნებლების/პარტნიორების კრების ოქმი პროგრამაში მონაწილეობისა და სააგენტოსთან გასაფორმებელი ხელშეკრულებით
 * გათვალისწინებული ვალდებულებების აღების თაობაზე (ასეთის საჭიროების შემთხვევაში).
 */
function openFileNotary() {
    this.$refs.notaryFile.click();
}

/**
 * შესასყიდი მიზნობრიობის ინვოისი ან/და ხელშეკრულება ქართულ ენაზე (ტექნიკის იმპორტის შემთხვევაში ნოტარიულად დამოწმებული თარგმანი), რომელიც აუცილებელი წესით უნდა მოიცავდეს შემდეგ
 * ინფორმაციას: მოსავლის ამღები სასოფლო-სამეურნეო ტექნიკის დასახელება, მახასიათებლები (მოდელი, ცხ.ძ (ასეთის არსებობის შემთხვევაში), გამოშვების წელი, ექსპლუატაციაში არ ყოფნის შესახებ
 * სტატუსი, მწარმოებელი ქვეყანა, დანიშნულება (აღწერილი უნდა იყოს თუ რა სასოფლო-სამეურნეო დანიშნულებით გამოიყენება წარმოდგენილი ტექნიკა), მხარეთა რეკვიზიტები, მიწოდების ვადა
 * (არაუმეტეს 5 თვისა), გადახდის პირობები. შენიშვნა: ტექნიკის ადგილობრივი მომწოდებლის შემთხვევაში გადახდის პირობა აუცილებელი წესით უნდა მოიცავდეს შემდეგ ინფორმაციას, რომ სააგენტოს
 * თანადაფინანსების თანხის გადახდა მოხდება ტექნიკის მიწოდების შემდეგ.
 */
function openInvoiceFile() {
    this.$refs.invoiceFile.click();
}

/**
 * სასოფლო-სამეურნეო ტექნიკის საგარანტიო დოკუმენტი (საგარანტიო პირობები უნდა ვრცელდებოდეს
 * განაცხადის წარდგენიდან არანაკლებ 6 თვის ვადით) გაცემული მწარმოებლის ან/და მიმწოდებლის მიერ.
 */
function openGrantDocumentFile() {
    this.$refs.grantFile.click();
}

// ცნობა ან/და შედარების აქტი სსიპ - შემოსავლების სამსახურიდან დავალიანების არარსებობის შესახებ.
function openInquiryFile() {
    this.$refs.inquiryFile.click();
}

/**
 * თანამონაწილეობის თანხის დამადასტურებელი დოკუმენტი - ცნობა/ამონაწერი/ხელშეკრულება ბანკიდან შესაბამისი თანხის ანგარიშზე არსებობის შესახებ
 * ან/და ცნობა ბანკიდან / საფინანსო ინსტიტუტიდან კრედიტის/ლიზინგის/ დამტკიცების თაობაზე.
 */
function openComplicityFile() {
    this.$refs.complicityFile.click();
}

// საბანკო რეკვიზიტები
function bankAccountDetails() {
    this.$refs.accountFile.click();
}

/**
 * სსიპ ლევან სამხარაულის სახელობის სასამართლო ექსპერტიზის ბიუროს ან/და სსიპ „აკრედიტაციის ეროვნული ორგანოს - აკრედიტაციის ცენტრის“ მიერ აკრედიტირებული პირების ან/და საქართველოს
 * ფინანსთა სამინისტროს სისტემაში შემავალი სახელმწიფო საქვეუწყებო დაწესებულების - ბუღალტრული აღრიცხვის, ანგარიშგებისა და აუდიტის ზედამხედველობის სამსახურის მიერ წარმოებულ რეესტრში
 * არსებული პირის საექსპერტო/აუდიტორული დასკვნა წარმოდგენილი პროექტის საინვესტიციო ღირებულების საბაზრო ფასებთან შესაბამისობის შესახებ.
 */
function openExaminationFile() {
    this.$refs.examinFile.click();
}

// სხვა დამატებითი დოკუმენტაცია, სააგენტოს მიერ მოთხოვნის შემთხვევაში.
function openAdditionalFiles() {
    this.$refs.additional.click();
}

export {
    openPersonalIdFile, openFile, openEntrepreneurDocument,
    openFileNotary, openInvoiceFile, openGrantDocumentFile, openInquiryFile,
    openComplicityFile, bankAccountDetails, openExaminationFile, openAdditionalFiles
}