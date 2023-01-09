// ბენეფიციარის პირადობის მოწმობის ასლის ფაილი
function handlePersonalId(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// წარმომადგენლობაზე უფლებამოსილი პირის პირადობის მოწმობის ასლის ფაილი
function handlePersonalId1(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// ამონაწერი
function entrepreneurFile(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// ნოტარიუსის ფაილი
function notaryFile(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// ინვოისის ფაილი
function invoiceFile(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// ტექნიკის გარანტიის ფაილი
function warantyFile(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// ცნობის ფაილი
function inquiryFile(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// თანამონაწილეობის დამადასტურებელი თანხის ფაილი
function complicityFile(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// საბანკო რეკვიზიტების ფაილი
function bankFile(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

// სამხარაულის ექსპერტიზის ფაილი
function experticeFile(e) {
    this.statement_files.push(e.target.files[0]);
    window.alert(this.statement_files);
}

function additionalDocuments(e) {
    for(let i = 0; i < e.target.files.length; i++) {
        this.statement_files.push(e.target.files[i]);
    }

    window.alert(this.statement_files);
}

export { handlePersonalId, handlePersonalId1, entrepreneurFile, notaryFile, invoiceFile, warantyFile, inquiryFile, complicityFile, bankFile, experticeFile, additionalDocuments }