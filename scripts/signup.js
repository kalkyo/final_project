document.getElementById("signup").onsubmit = validate;

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

    //check address
    let userAddress = document.getElementById("address").value;
    if (userAddress === "") {
        let erruserAddress = document.getElementById("err-address");
        erruserAddress.style.display = "inline";
        isValid = false;
    }

    //check city
    let userCity = document.getElementById("city").value;
    if (userCity === "") {
        let erruserCity = document.getElementById("err-city");
        erruserCity.style.display = "inline";
        isValid = false;
    }

    //check zipcode
    let userZipcode = document.getElementById("zipcode").value;
    let regexp;
    /*if (userZipcode === "" || userZipcode < 10 || userZipcode > 10) {
        let erruserZipcode = document.getElementById("err-zipcode");
        erruserZipcode.style.display = "inline";
        isValid = false;
    }*/
    regexp = /^[0-9]{5}(?:-[0-9]{4})?$/;
    if (!regexp.test(userZipcode)) {
        let erruserZipcode = document.getElementById("err-zipcode");
        erruserZipcode.style.display = "inline";
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

