// contact.js
console.log("Contact page loaded.");
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".wpcf7-form");
    const nameInput = document.querySelector('input[name="your-name"]');
    const emailInput = document.querySelector('input[name="your-email"]');
    const messageInput = document.querySelector('textarea[name="your-message"]');
    const errorMessage = document.createElement("div");
    const successMessage = document.createElement("div");

    errorMessage.classList.add("error-message");
    successMessage.classList.add("success-message");

    form.insertBefore(errorMessage, form.firstChild);
    form.insertBefore(successMessage, form.firstChild);

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form from submitting immediately
        errorMessage.style.display = "none";
        successMessage.style.display = "none";

        let errors = [];

        if (nameInput.value.trim() === "") {
            errors.push("Please enter your name.");
        }

        if (!validateEmail(emailInput.value)) {
            errors.push("Please enter a valid email address.");
        }

        if (messageInput.value.trim() === "") {
            errors.push("Please enter your message.");
        }

        if (errors.length > 0) {
            errorMessage.innerHTML = errors.join("<br>");
            errorMessage.style.display = "block";
        } else {
            successMessage.innerHTML = "Thank you! Your message has been sent successfully.";
            successMessage.style.display = "block";
            form.reset();
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
});
