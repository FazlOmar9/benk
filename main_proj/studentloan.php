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
        $balance = $row['balance'];
    } else {
        // Login failed
        echo "<script>window.alert('Incorrect email or password')</script>";
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'connection.php';

    $loanAmount = $_POST['weight'];

    $query = "UPDATE user_profile SET balance = balance + $loanAmount WHERE account_number = '$account_number'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>window.alert('Loan applied successfully!')</script>";
        echo "<script>window.location.href='studentloan.php'</script>";
    } else {
        echo "Error updating balance: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Loan</title>
    <link rel="stylesheet" href="goldloan.css">
    <style>
        body {
            background-image: url("images/students.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <?php include('navbar2.php'); ?>
    <div class="transfer-container" style="height: 460px;">
        <h2 class="font-weight-bold mb-4">Student Loan</h2>
        <hr>
        <table style="width: 30%;">
            <tr>
                <td style="padding: 8px 0;">
                    <p class="transfer-containerp">Enter Amount: </p>
                </td>
                <td style="padding: 8px 0;"><input type="number" id="goldWeight"></td>
            </tr>
            <tr>
                <td style="padding: 8px 0;">
                    <p class="transfer-containerp">Enter tenure (in months): </p>
                </td>
                <td style="padding: 8px 0;"><input type="number" id="loanTenure"></td>
            </tr>
            <tr>
                <td style="padding: 8px 0;">
                    <p class="transfer-containerp">Our interest rate: </p>
                </td>
                <td style="padding: 8px 0;">
                    <p>12.40% p.a.*</p>
                </td>
            </tr>
            <tr>
                <td style="padding: 8px 0;"><button onclick="calculateLoan()">Calculate Loan</button></td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="padding: 8px 0;">
                    <p class="transfer-containerp" id="loanResult"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="transfer-containerp" id="monthResult"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>*Interest rates are subject to change at the sole discretion of the
                        Bank.</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="transfer-container" style="height: 300px;">
        <h2 class="font-weight-bold mb-4">Apply</h2>
        <hr>
        <form action="" method="post">
            <table style="width: 30%;">
                <tr>
                    <td style="padding: 8px 0;">
                        <p class="transfer-containerp">Enter loan amount: </p>
                    </td>
                    <td style="padding: 8px 0;"><input type="number" id="weight" name="weight"></td>
                </tr>
                <tr>
                    <td style="padding: 8px 0;">
                        <p class="transfer-containerp">Enter tenure (in months): </p>
                    </td>
                    <td style="padding: 8px 0;"><input type="number" id="loanTenure"></td>
                </tr>
                <tr>
                    <td style="padding: 8px 0;">
                        <input type="submit" value="Apply" style="border: 2px solid black;background-color:white;">
                    </td>
                    <td style="padding: 8px 0;"></td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        function calculateLoan() {
            const goldWeight = parseFloat(document.getElementById("goldWeight").value);
            const loanTenure = parseInt(document.getElementById("loanTenure").value);

            const annualInterestRate = 12.40;
            const monthlyInterestRate = annualInterestRate / 12 / 100;

            const loanAmount = goldWeight;
            const monthlyInterest = (loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, loanTenure)) /
                (Math.pow(1 + monthlyInterestRate, loanTenure) - 1);

            const result1 = `Loan Amount: ₹${loanAmount.toFixed(2)}`;
            const result2 = `Monthly Interest: ₹${monthlyInterest.toFixed(2)}`;

            document.getElementById("loanResult").innerHTML = result1;
            document.getElementById("monthResult").innerHTML = result2;
        }
    </script>
</body>
