document.getElementById("checkout").onsubmit = validate;
function validate() {

    //flag variable
    let isValid = true;

    // clear error messages
    let errors = document.getElementsByClassName("err")
    for (let i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";
    }

    //check first
    let firstName = document.getElementById("fname").value;
    if (firstName === "") {
        let errFirstName = document.getElementById("err-fname");
        errFirstName.style.display = "inline";
        isValid = false;
    }

    // check last
    let lName = document.getElementById("lname").value;
    if (lName === "") {
        let errLastName = document.getElementById("err-lname");
        errLastName.style.display = "inline";
        isValid = false;
    }

    //check Username
    let userName = document.getElementById("username").value;
    if (userName === "") {
        let errUserName = document.getElementById("err-username");
        errUserName.style.display = "inline";
        isValid = false;
    }

    //check Password
    let passWord = document.getElementById("password").value;
    if (passWord === "") {
        let errPass = document.getElementById("err-password");
        errPass.style.display = "inline";
        isValid = false;
    }



    // Check email
    let Email = document.getElementById("email").value;
    if (Email === "") {
        let errEmail = document.getElementById("err-email");
        errEmail.style.display = "inline";
        isValid = false;
    }

    return isValid;
}

