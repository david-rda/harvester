// ბენეფიციარის პირადობის მოწმობის ასლის ფაილი
function handlePersonalId(e) {
    this.statement_files.push(e.target.files[0]);
}

// წარმომადგენლობაზე უფლებამოსილი პირის პირადობის მოწმობის ასლის ფაილი
function handlePersonalId1(e) {
    this.statement_files.push(e.target.files[0]);
}

// ამონაწერი
function entrepreneurFile(e) {
    this.statement_files.push(e.target.files[0]);
}

// ნოტარიუსის ფაილი
function notaryFile(e) {
    this.statement_files.push(e.target.files[0]);
}

// ინვოისის ფაილი
function invoiceFile(e) {
    this.statement_files.push(e.target.files[0]);
}

// ტექნიკის გარანტიის ფაილი
function warantyFile(e) {
    this.statement_files.push(e.target.files[0]);
}

// ცნობის ფაილი
function inquiryFile(e) {
    this.statement_files.push(e.target.files[0]);
}

// თანამონაწილეობის დამადასტურებელი თანხის ფაილი
function complicityFile(e) {
    this.statement_files.push(e.target.files[0]);
}

// საბანკო რეკვიზიტების ფაილი
function bankFile(e) {
    this.statement_files.push(e.target.files[0]);
}

// სამხარაულის ექსპერტიზის ფაილი
function experticeFile(e) {
    this.statement_files.push(e.target.files[0]);
}

function additionalDocuments(e) {
    for(let i = 0; i < e.target.files.length; i++) {
        this.statement_files.push(e.target.files[i]);
    }
}

export {
    handlePersonalId, handlePersonalId1, entrepreneurFile, notaryFile,
    invoiceFile, warantyFile, inquiryFile, complicityFile, bankFile,
    experticeFile, additionalDocuments
}