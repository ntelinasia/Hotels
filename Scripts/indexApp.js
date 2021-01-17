document.addEventListener("DOMContentLoaded", () => {

    // Get form submit to check fields
    const $form = document.querySelector("#search-form");

    // Get error messages for date inputs
    const $checkinError = document.querySelector(".checkin-error-message");
    const $checkoutError = document.querySelector(".checkout-error-message");

    
    $form.addEventListener("submit", (e) => {
        // Pause to check if dates are given
        e.preventDefault();
        // Get date values
        const { checkin, checkout } = e.target.elements;
        const values = {
            checkin: checkin.value,
            checkout: checkout.value,
        }
        checkFields(values);
    });


    // Check if date fields are empty
    const checkFields = ({ city, room, checkin, checkout }) => {
            
        let checkinDate = false;
        let checkoutDate = false;

        // Check if Check-In date is given
        if (!checkin) {
            $checkinError.classList.remove("no-display");
            $checkinError.classList.add("error-message");
            checkinDate = false;
        } else {
            $checkinError.classList.remove("error-message");
            $checkinError.classList.add("no-display");
            checkinDate = true;
        }
        // Check if Check-Out date is given
        if (!checkout) {
            $checkoutError.classList.remove("no-display");
            $checkoutError.classList.add("error-message");
            checkoutDate = false;
        } else {
            $checkoutError.classList.remove("error-message");
            $checkoutError.classList.add("no-display");
            checkoutDate = true;
        }
        
        // If both check-In and check-Out are given proceed
        if (checkoutDate && checkoutDate) {
            console.log("Submit now!");
            $form.submit();
        }
    }
});