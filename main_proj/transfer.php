<?php
// Check if cookie exists
if (!isset($_COOKIE['account_number'])) {
    header("Location: index.php");
}
else{
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

    // $conn->close();
}
?>
<?php
// Include the file with your database connection details
require_once 'connection.php';

// Assume $account_number and $balance are already set

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the account number and amount from the form
    $transfer_account = $_POST['transfer_account'];
    $transfer_amount = $_POST['transfer_amount'];

    // Verify if the transfer account exists
    $query = "SELECT * FROM user_profile WHERE account_number = '$transfer_account'";
    $result = mysqli_query($conn, $query);
    $transfer_account_exists = mysqli_num_rows($result) > 0;

    // Check if the transfer account exists
    if (!$transfer_account_exists) {
        echo "<script>window.alert('The account you want to transfer to does not exist.')</script>";
    } else {
        // Verify if the user has enough balance for the transfer
        if ($balance >= $transfer_amount) {
            // Perform the transfer
            $query = "UPDATE user_profile SET balance = balance - $transfer_amount WHERE account_number = '$account_number'";
            mysqli_query($conn, $query);

            $query = "UPDATE user_profile SET balance = balance + $transfer_amount WHERE account_number = '$transfer_account'";
            mysqli_query($conn, $query);

            // Update the balance variable for the current user
            $balance -= $transfer_amount;

            echo "<script>window.alert('Transfer successful!')</script>";
        } else {
            echo "<script>window.alert('Insufficient balance!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Money Transfer</title>
    <link rel="stylesheet" href="transfer.css">
    <style>
        table {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include 'navbar2.php'; ?>

    <div class="transfer-container2">
        <h2 class="font-weight-bold mb-4">User Details</h2>
        <hr>
        <table style="width: 40%">
            <tr>
                <td style="padding: 8px 0;"><p class="transfer-containerp">Account Number:</p></td>
                <td style="padding: 8px 0;"><p><?php echo $account_number; ?></p></td>
            </tr>
            <tr>
                <td><p class="transfer-containerp">Balance:</p></td>
                <td><p>₹<?php echo $balance; ?></p></td>
            </tr>
        </table>
    </div>

    <div class="transfer-container">
        <h2 class="font-weight-bold mb-4">Transfer Money</h2>
        <hr>
        <form method="post" action="">
        <table style="width: 40%;">
            <tr>
                <td><p class="transfer-containerp">Transfer to:</p>
                <input type="text" name="transfer_account" id="transfer_account" required>
                </td>
            </tr>
            <tr>
                <td><p class="transfer-containerp">Amount:</p>
                <input type="number" name="transfer_amount" id="transfer_amount" required>
                </td>
            </tr>
            <tr>
                <td><button type="submit" class="transfer-button">Transfer</button></td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html>


