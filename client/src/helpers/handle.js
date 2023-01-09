// ბენეფიციარის პირადობის მოწმობის ასლის ფაილი
function handlePersonalId(e) {
    window.alert(e.target.files[0].name);
}

// წარმომადგენლობაზე უფლებამოსილი პირის პირადობის მოწმობის ასლის ფაილი
function handlePersonalId1(e) {
    window.alert(e.target.files[0].name);
}

// ამონაწერი
function entrepreneurFile(e) {
    window.alert(e.target.files[0].name);
}

// ნოტარიუსის ფაილი
function notaryFile(e) {
    window.alert(e.target.files[0].name);
}

// ინვოისის ფაილი
function invoiceFile(e) {
    window.alert(e.target.files[0].name);
}

// ტექნიკის გარანტიის ფაილი
function warantyFile(e) {
    window.alert(e.target.files[0].name);
}

// ცნობის ფაილი
function inquiryFile(e) {
    window.alert(e.target.files[0].name);
}

// თანამონაწილეობის დამადასტურებელი თანხის ფაილი
function complicityFile(e) {
    window.alert(e.target.files[0].name);
}

// საბანკო რეკვიზიტების ფაილი
function bankFile(e) {
    window.alert(e.target.files[0].name);
}

// სამხარაულის ექსპერტიზის ფაილი
function experticeFile(e) {
    window.alert(e.target.files[0].name);
}

function additionalDocuments(e) {
    for(let i = 0; i < e.target.files.length; i++) {
        console.log(e.target.files[i].name);
    }
}

export { handlePersonalId, handlePersonalId1, entrepreneurFile, notaryFile, invoiceFile, warantyFile, inquiryFile, complicityFile, bankFile, experticeFile, additionalDocuments }