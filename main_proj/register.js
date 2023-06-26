// Email validation
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Phone number validation
function validatePhone(phoneNumber) {
    const phoneRegex = /^\d+$/;
    return phoneRegex.test(phoneNumber);
}

// Password validation
function validatePassword(password) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return passwordRegex.test(password);
}

// Confirm password validation
function validateConfirmPassword(password, confirmPassword) {
    return password === confirmPassword;
}

// Aadhar card validation
function validateAadharCard(aadharCard) {
    const aadharRegex = /^\d{12}$/;
    return aadharRegex.test(aadharCard);
}

// Form validation
async function validateForm(event) {
    event.preventDefault();

    // Fetch form input values
    const fullName = document.getElementById('fullName').value;
    const phoneNumber = document.getElementById('phoneNumber').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const aadharCard = document.getElementById('aadharCard').value;
    const gender = document.getElementById('gender').value;
    const dob = document.getElementById('dob').value;
    const address = document.getElementById('address').value;

    // Perform form validation
    if (!fullName || fullName.trim() === "") {
        alert("Please enter Full Name.");
        return;
    }

    if (!phoneNumber || !validatePhone(phoneNumber)) {
        alert("Please enter a valid Phone Number.");
        return;
    }

    if (!email || !validateEmail(email)) {
        alert("Please enter a valid Email.");
        return;
    }

    if (!password || !validatePassword(password)) {
        alert("Please enter a valid Password. It must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long.");
        return;
    }

    if (!confirmPassword || !validateConfirmPassword(password, confirmPassword)) {
        alert("Passwords do not match.");
        return;
    }

    if (!aadharCard || !validateAadharCard(aadharCard)) {
        alert("Please enter a valid Aadhar Card Number (12 digits).");
        return;
    }

    if (!gender || gender.trim() === "") {
        alert("Please select a Gender.");
        return;
    }

    if (!dob || dob.trim() === "") {
        alert("Please enter Date of Birth.");
        return;
    }

    if (!address || address.trim() === "") {
        alert("Please enter Full Address.");
        return;
    }

    alert("Proceed to submit form.");
}
