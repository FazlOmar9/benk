<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once('connection.php');

    $sql = "SELECT * FROM user_profile WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $account_number = $result->fetch_assoc()['account_number'];
    setcookie('account_number', $account_number, time() + (86400 * 30), "/");
    header("Location: dashboard.php");
    } else {
    // Login failed
    echo "<script>window.alert('Incorrect email or password')</script>";
    echo "<script>window.location.href='index.php'</script>";
    }
    // Close the database connection
    $conn->close();
}
?>
