function validateForm() {
    let groupName = document.forms["group_validation"]["name"].value;
    let message = document.getElementById("validation_message");
    let messageText = "*Šis lauks ir obligāts!"
    let letters = /^[A-zĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽž]+(\s[A-zĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽž])*$/; // /^[a-zA-Z\u00C0-\u017F]+(\s[a-zA-Z\u00C0-\u017F])*$/;
    if (groupName == "") {
        message.textContent = messageText;
        return false;
    }
    if (groupName.match(letters)) {
        return true;
    } else {
        let messageText = "*Ievadītie dati neatbilst datu formātam!";
        message.textContent = messageText;
        return false;
    }
}

function validateForm_child() {
    let groupName = document.forms["child_validation"]["name"].value;
    let groupSurname = document.forms["child_validation"]["surname"].value;
    let message = document.getElementById("validation_message_name");
    let messageSurname = document.getElementById("validation_message_surname");
    let messageText = "*Šis lauks ir obligāts!"
    let messageTextTwo = "*Ievadītie dati neatbilst datu formātam!";
    let letters = /^[A-zĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽž]+(\s[A-zĀāČčĒēĢģĪīĶķĻļŅņŠšŪūŽž])*$/;
    let bool = true;
    if (true) {
        if (groupName == "") {
            message.textContent = messageText;
            bool = false;
        } else {
            message.textContent = "";
        }
        if (!groupName.match(letters) && groupName != "") {
            message.textContent = messageTextTwo;
            bool = false;
        }
        if (groupSurname == "") {
            messageSurname.textContent = messageText;
            bool = false;
        } else {
            messageSurname.textContent = "";
        }
        if (!groupSurname.match(letters) && groupSurname != "") {
            messageSurname.textContent = messageTextTwo;
            bool = false;
        }
        return bool;
    }
}