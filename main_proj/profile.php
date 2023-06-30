<?php
// Check if cookie exists
if (!isset($_COOKIE['account_number'])) {
    header("Location: index.php");
} else {
    require_once('connection.php');
    $account_number = $_COOKIE['account_number'];
    $sql = "SELECT * FROM user_profile WHERE account_number='$account_number'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $full_name = $row['full_name'];
        $balance = $row['balance'];
        $phone = $row['phone'];
        $email = $row['email'];
        $aadhar = $row['aadhar_card_number'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $address = $row['full_address'];
        $pass = $row['password'];
    } else {
        // Login failed
        echo "<script>window.alert('Incorrect email or password')</script>";
    }
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($old === $pass) {
        if ($new === $confirm) {
            $query = "UPDATE user_profile SET password = '$new' WHERE account_number='$account_number'";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>window.alert('Password updated successfully!')</script>";
                echo "<script>window.location.href='profile.php'</script>";
            } else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('New password and confirm password do not match.')</script>";
            echo "<script>window.location.href='profile.php'</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect.')</script>";
        echo "<script>window.location.href='profile.php'</script>";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="dashboard.css">
    <style>
        body {
            background-color: rgb(112, 181, 255);
        }

        #passDiv {
            display: none;
            margin-left: 23px;
        }

        #up-pass {
            margin-left: 23px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }

        #up-pass:hover {
            box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <?php include('navbar2.php'); ?>
    <div class="custom-container">
        <div class="user-details">
            <h2 class="font-weight-bold mb-4">User Details</h2>
            <hr>
            <table style="width: 70%;">
                <tr>
                    <th>Full Name:</th>
                    <td>
                        <?php echo $full_name; ?>
                    </td>
                </tr>
                <tr>
                    <th>Account Number:</th>
                    <td>
                        <?php echo $account_number; ?>
                    </td>
                </tr>
                <tr>
                    <th>Balance:</th>
                    <td>
                        <?php echo '₹' . $balance; ?>
                    </td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>
                        <?php echo $phone; ?>
                    </td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>
                        <?php echo $email; ?>
                    </td>
                </tr>
                <tr>
                    <th>Aadhar No.:</th>
                    <td>
                        <?php echo $aadhar; ?>
                    </td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>
                        <?php echo $gender; ?>
                    </td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td>
                        <?php echo $dob; ?>
                    </td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>
                        <?php echo $address; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <button onclick="toggleForm()" id="up-pass">Update Password</button>
    <div class="user-details" id="passDiv">
        <h2 class="font-weight-bold mb-4">Update Password</h2>
        <hr>
        <form id="passwordForm" method="post" action="">
            <table>
                <tr>
                    <td><label for="old_password">Old Password:</label></td>
                    <td><input type="password" id="old_password" name="old_password" required></td>
                </tr>
                <tr>
                    <td><label for="new_password">New Password:</label></td>
                    <td><input type="password" id="new_password" name="new_password" required></td>
                </tr>
                <tr>
                    <td><label for="confirm_password">Confirm New Password:</label></td>
                    <td><input type="password" id="confirm_password" name="confirm_password" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Submit" style="border:none;background-color:gray;"></td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        document.body.style.backgroundColor = "rgb(203, 228, 255)";
        function toggleForm() {
            var x = document.getElementById("passDiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none"
            }
        }
    </script>
</body>

</html>