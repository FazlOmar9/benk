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
        background-image: url('./images/im-663680.jpeg');
    }
  </style>
</head>

<body>
<?php include './navbar.php'; ?>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Register</h5>
            <!-- onsubmit="validateForm(event)" -->
            <form id="registerForm" action="send_data.php" method="post">
                <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>
                <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" required>
                </div>
                <div class="form-group">
                <label for="aadharCard">Aadhar Card Number</label>
                <input type="text" class="form-control" id="aadharCard" name="aadharCard" required>
                </div>
                <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                </div>
                <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                <label for="address">Full Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block" onclick="validateForm(event)">Validate</button>
                <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">Submit</button>
                <p>Already Registered? <a href="index.php">Click Here to Login</a></p>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    <script src="register.js"></script>
</body>

</html>
