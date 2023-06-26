<?php
require_once('connection.php');

// Get the email from the URL
$email = urldecode($_GET['email']);

// Query to retrieve user data from the database
$query = "SELECT * FROM user_profile WHERE email = '$email'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch the row from the result set
    $row = mysqli_fetch_assoc($result);

    // Store the data in local variables
    $full_name = $row['full_name'];
    $account_number = $row['account_number'];
    $balance = $row['balance'];
    $phone = $row['phone'];
    $email = $row['email'];

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the query error
    echo "<script>window.alert('Lmao how did you get in?')</script>";
}
?>
<?php include('navbar2.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="custom-container">
        <div class="user-details">
            <h2 class="font-weight-bold mb-4">User Details</h2>
            <table>
                <tr>
                    <th>Full Name:</th>
                    <td><?php echo $full_name; ?></td>
                </tr>
                <tr>
                    <th>Account Number:</th>
                    <td><?php echo $account_number; ?></td>
                </tr>
                <tr>
                    <th>Balance:</th>
                    <td><?php echo '₹' . $balance; ?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?php echo $phone; ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $email; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="articles-container">
            <h2 class="font-weight-bold mb-4" style="margin-left:5px;">Articles</h2>
            <a class="article-button" href="https://economictimes.indiatimes.com/definition/systematic-investment-plan" target="_blank">What is an SIP?</a>
            <a class="article-button" href="https://www.investopedia.com/articles/basics/06/invest1000.asp" target="_blank">Get Started with Stocks</a>
            <a class="article-button" href="article3.php" target="_blank">Article 3</a>
            <a class="article-button" href="article4.php" target="_blank">Article 4</a>
    </div>

    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
    intent="WELCOME"
    chat-title="Benk_FAQ"
    agent-id="ccbc25b8-34d7-455a-8208-a93981194fcc"
    language-code="en"
    ></df-messenger>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




