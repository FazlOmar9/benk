<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            function generateAccountNumber() {
                $min = 100000000000; // Minimum 12-digit number
                $max = 999999999999; // Maximum 12-digit number
                $accountNumber = rand($min, $max);
                return strval($accountNumber);
            }
            $accountNumber = generateAccountNumber();
            echo "<script>";
            echo "var accountNumber = '$accountNumber';";
            echo "alert('Account Number: ' + accountNumber);";
            echo "</script>";

            require_once('./connection.php');
            $fullName = $_POST['fullName'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $aadharCard = $_POST['aadharCard'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];

            $sql = "INSERT INTO user_profile (`account_number`, `full_name`, `phone`, `email`, `password`, `aadhar_card_number`, `gender`, `dob`, `full_address`) VALUES ('$accountNumber', '$fullName', '$phoneNumber', '$email', '$password', '$aadharCard', '$gender', '$dob', '$address')";
            

            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>window.alert('Registration Successful!')</script>";
                echo "<script>window.location.href='./index.php'</script>";
            }
            else{
                echo "<script>window.alert('Registration Failed!')</script>";
                echo "<script>window.location.href='./register.php'</script>";
            }
        }
?>
