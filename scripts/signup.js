document.getElementById("signup").onsubmit = validate;
function validate() {
    let Validated = true;

    let errors = document.getElementsByClassName("err")
    for (let i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";
    }

    //check first
    let firstName = document.getElementById("fname").value;
    if (firstName === "") {
        let errFirstName = document.getElementById("err-fname");
        errFirstName.style.display = "inline";
        Validated = false;
    }

    // check last
    let lName = document.getElementById("lname").value;
    if (lName === "") {
        let errLastName = document.getElementById("err-lname");
        errLastName.style.display = "inline";
        Validated = false;
    }

    //check Username
    let userName = document.getElementById("username").value;
    if (userName === "") {
        let errUserName = document.getElementById("err-username");
        errUserName.style.display = "inline";
        Validated = false;
    }

    //check Password
    let passWord = document.getElementById("password").value;
    if (passWord === "") {
        let errPass = document.getElementById("err-password");
        errPass.style.display = "inline";
        Validated = false;
    }



    // Check email
    let Email = document.getElementById("email").value;
    if (Email === "") {
        let errEmail = document.getElementById("err-email");
        errEmail.style.display = "inline";
        Validated = false;
    }

}

