
const submit = document.getElementById('submitButton');
const email = document.getElementById('email');

//email and email add again validation function
function checkEmail() {
    const confirmEmail = document.getElementById('confirmEmail');

    if (email.value !== confirmEmail.value) {
        document.getElementById('emailChecker').innerHTML = "Emails DO NOT Match!";
        submit.disabled = true;
    }
    else if (email.value === confirmEmail.value) {
        document.getElementById('emailChecker').innerHTML = "Emails Match!";
        submit.disabled = false;
    }
    else {
        document.getElementById('emailChecker').innerHTML = "";
    }
}

//function for downloading json
function download(filename, text) {
    let element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
}

function ieBackupFunc(fileName, file) {
    // for the IE browser
    if (window.navigator && window.navigator.msSaveOrOpenBlob) {
        var myBlob = new Blob([file], {type: 'application/json'});
        window.navigator.msSaveOrOpenBlob(myBlob, fileName);
    } 
    else {
        // not suitable for ie11
        download(fileName, file);
    }
}

//main function and error catchers
function submitFunction() {
    let firstName = document.getElementById("firstname");
    let lastName = document.getElementById("lastname")
    let age = document.getElementById('age');
    let plan = document.getElementById("plan");
    let mailingList = document.getElementById("mailingList")
    let radioInput = document.getElementsByName('radio');
    let chosenSize = "";

    for (var i = 0, length = radioInput.length; i < length; i++) {
        if (radioInput[i].checked) {
            chosenSize  = radioInput[i].value;
            break;
        }
    }

    if (firstName.value === "") {
        alert('Please enter your first name.')
    }
    else if (lastName.value === "") {
        alert('Please enter your last name.')
    }
    else if (age.value === "") {
        alert('Please enter your age.')
    }
    else if (plan.value === "") {
        alert('Please choose your plan')
    }
    else if (chosenSize === "") {
        alert('Please choose your shirt size')
    }
    else {
        var input = {
            "firstName" : firstName.value,
            "lastName" : lastName.value,
            "emailAddress" : email.value,
            "age" : age.value,
            "plan" : plan.value,
            "addToMailingList" : mailingList.checked,
            "shirtSize" : chosenSize
        };
    
        ieBackupFunc("registrationgarcia.json", JSON.stringify(input))
    }

    
}