<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    require_once('connection.php');

    // Prepare the SQL statement
    $sql = "SELECT * FROM user_profile WHERE email='$email' AND password='$password'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    // Check if there is a match in the database
    if ($result->num_rows > 0) {
    //Create a cookie with account_number of user in it
    $account_number = $result->fetch_assoc()['account_number'];
    setcookie('account_number', $account_number, time() + (86400 * 30), "/");
    header("Location: dashboard.php");
    } else {
    // Login failed
    echo "<script>window.alert('Incorrect email or password')</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
