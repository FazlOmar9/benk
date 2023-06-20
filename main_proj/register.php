<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="register.css">
  <title>Register Portal</title>
  <style>
    body {
        background-image: url('images/im-663680.jpeg');
    }
  </style>
</head>

<body>
<?php include 'navbar.php'; ?>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Register</h5>
            <form id="registerForm" onsubmit="validateForm(event)">
                <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" required>
                </div>
                <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" required>
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" required>
                </div>
                <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" required>
                </div>
                <div class="form-group">
                <label for="aadharCard">Aadhar Card Number</label>
                <input type="text" class="form-control" id="aadharCard" required>
                </div>
                <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                </div>
                <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" required>
                </div>
                <div class="form-group">
                <label for="address">Full Address</label>
                <textarea class="form-control" id="address" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    <?php
        function generateAccountNumber() {
            $min = 100000000000; // Minimum 12-digit number
            $max = 999999999999; // Maximum 12-digit number
            $accountNumber = rand($min, $max);
            return strval($accountNumber);
        }

        $accountNumber = generateAccountNumber();
    ?>
    <script>
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
        function validateForm(event) {
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
        
            // Submit the form if all validations pass
            submitForm();
        }
        
        function submitForm() {
            var accountNumber = '<?php echo $accountNumber; ?>';

            // Perform form submission logic here
            alert('Form submitted successfully!');
            alert('Account Number: ' + accountNumber);
            // Clear the form after submission
            document.getElementById('registerForm').reset();
            
        }
        
    </script>
</body>

</html>
