document.addEventListener("DOMContentLoaded", () => {
    const $form = document.querySelector("form");
    const $nameError = document.querySelector("#name");
    const $emailError = document.querySelector("#email");
    const $emailrError = document.querySelector("#emailr");
    const $passwordError = document.querySelector("#password");
    // Used to display or not ther error messages
    const $nameMessage = document.querySelector(".name-error-message");
    const $emailMessage = document.querySelector(".email-error-message");
    const $emailrMessage = document.querySelector(".emailr-error-message");
    const $passswordMessage = document.querySelector(".password-error-message");


    const getValidations = ({name, email, emailr, password}) => {
        let nameValid = false;
        let emailValid = false;
        let passwordValid = false;

        // Name validation
        if (name == "") {
            $nameError.classList.add("is-invalid");
            $nameMessage.classList.remove("d-none");
        } else {
            $nameError.classList.remove("is-invalid");
            $nameMessage.classList.add("d-none");
            nameValid = true;
            console.log("Name ok");
        }
        // Email Validation
        if (email == "") {
            $emailError.classList.add("is-invalid");
            $emailMessage.classList.remove("d-none");
        } else {
            $emailError.classList.remove("is-invalid");
            $emailMessage.classList.add("d-none");
        }
        if (emailr === email) {
            $emailrError.classList.remove("is-invalid");
            $emailrMessage.classList.add("d-none");
            emailValid = true;
            console.log("emails ok");
        } else {
            $emailrError.classList.add("is-invalid");
            $emailrMessage.classList.remove("d-none");  
        }
        // Password Validation
        if (password.length < 8) {
            $passwordError.classList.add("is-invalid");
            $passswordMessage.classList.remove("d-none");
        } else {
            $passwordError.classList.remove("is-invalid");
            $passswordMessage.classList.add("d-none");
            passwordValid = true;
            console.log("Password ok");
        }

        if (nameValid && emailValid && passwordValid) {
            console.log("Submit now!");
            $form.submit();
        } 
    }

    $form.addEventListener("submit", (e) => {
        e.preventDefault();
        console.log("clicked");
        
        const { name, email,emailr, password } = e.target.elements;
        // Using id names
        const values = {
            name: name.value,
            email: email.value,
            emailr: emailr.value,
            password: password.value,
        }
        
        getValidations(values);       
    });
});


