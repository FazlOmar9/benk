<?php
// Check if cookie exists
if (!isset($_COOKIE['account_number'])) {
    header("Location: index.php");
} else {
    require_once('connection.php');
    $account_number = $_COOKIE['account_number'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fdAmount = $_POST['fdAmount'];
    $tenure = $_POST['tenure'];

    // Validate input
    if ($fdAmount < 5000) {
        die("FD Amount should be minimum 5000.");
    }

    if ($tenure < 6) {
        die("Tenure should be minimum 6 months.");
    }

    // Calculate FD maturity amount using quarterly compounding
    $interestRate = 5.8 / 100;
    $quarters = $tenure * 4;
    $compoundInterest = $fdAmount * (pow((1 + $interestRate / 4), $quarters));
    $maturityAmount = round($compoundInterest, 2);

    // Update user's balance in the database (replace with your database update logic)
    require_once('connection.php');
    $query = "SELECT balance FROM user_profile WHERE account_number = '$account_number'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentBalance = $row['balance'];

        if ($currentBalance >= $fdAmount) {
            $newBalance = $currentBalance - $fdAmount;

            $updateQuery = "UPDATE user_profile SET balance = $newBalance WHERE account_number = '$account_number'";
            if ($conn->query($updateQuery) === TRUE) {
                echo "<script>window.alert('Fixed Deposit applied successfully. Maturity Amount: ₹$maturityAmount')</script>";
                echo "<script>window.location.href='fixed.php'</script>";
            } else {
            }
        } else {
            echo "<script>window.alert('Insufficient balance.')</script>";
        }
    } else {
        echo "<script>window.alert('Account not found.')</script>";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Fixed Deposit Application</title>
    <link rel="stylesheet" href="goldloan.css">
    <style>
        body {
            background-image: url("images/oink.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        td {
            padding: 8px 0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include('navbar2.php'); ?>
    <div class="transfer-container">
        <h2 class="font-weight-bold mb-4">Fixed Deposit Application</h2>
        <hr>
        <form action="" method="POST">
            <table style="width: 40%;">
                <tr>
                    <td><label for="fdAmount">FD Amount (minimum 5000):</label></td>
                    <td><input type="number" id="fdAmount" name="fdAmount" min="5000" required></td>
                </tr>
                <tr>
                    <td><label for="tenure">Tenure (minimum 6 - in months):</label></td>
                    <td><input type="number" id="tenure" name="tenure" min="6" required></td>
                </tr>
                <tr>
                    <td><p>Our interest rate: </p></td>
                    <td><p>5.8% p.a.*</p></td>
                </tr>
            </table>
            <br>
            <button type="submit" style="border:none;">Apply</button>
        </form>
        <br>
        <button id="showMonthlyInterest" style="border:none;">Show Monthly Interest</button>
        <p id="MonthlyInterest" style="font-weight:bold;margin-top:23px;"></p>
    </div>

    <script>
        const showMonthlyInterestButton = document.getElementById("showMonthlyInterest");
        showMonthlyInterestButton.addEventListener("click", function () {
            const fdAmount = document.getElementById("fdAmount").value;
            const tenure = document.getElementById("tenure").value;

            const interestRate = 5.8 / 100;
            const months = tenure * 12;
            const monthlyInterest = (fdAmount * interestRate) / months;

            document.getElementById("MonthlyInterest").innerHTML = "Monthly Interest: ₹" + monthlyInterest.toFixed(2);
        });
    </script>
</body>

</html>