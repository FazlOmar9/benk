<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Custom styles */
    .navbar-nav .nav-link {
      margin-right: 10px;
      margin-left: 10px;
    }

    .navbar-nav .dropdown-menu {
      margin-top: 0.5rem;
    }

    .navbar-nav .dropdown-menu .dropdown-item {
      white-space: nowrap;
    }

    .dropdown-menu .dropdown-item i {
      margin-right: 10px;
    }

    @media (min-width: 992px) {
      .navbar-nav .nav-item.dropdown:hover > .dropdown-menu {
        display: block;
      }
    }
  </style>
  <title>Banking Website</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Logo -->
    <a class="navbar-brand" href="dashboard.php"><img src="images/logo.jpg" alt="Logo" style='width:40px'></a>

    <!-- Toggler Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="transfer.php"><i class="fas fa-exchange-alt"></i> Account Transfer</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="loansDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fas fa-money-bill-alt"></i> Loans</a>
          <div class="dropdown-menu" aria-labelledby="loansDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-home"></i> Home</a>
            <a class="dropdown-item" href="#"><i class="fas fa-car"></i> Car</a>
            <a class="dropdown-item" href="#"><i class="fas fa-coins"></i> Gold</a>
            <a class="dropdown-item" href="#"><i class="fas fa-graduation-cap"></i> Student</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="insuranceDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fas fa-shield-alt"></i> Insurance</a>
          <div class="dropdown-menu" aria-labelledby="insuranceDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-heartbeat"></i> Life</a>
            <a class="dropdown-item" href="#"><i class="fas fa-medkit"></i> Health</a>
            <a class="dropdown-item" href="#"><i class="fas fa-car-crash"></i> Vehicle</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-piggy-bank"></i> Fixed Deposit</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="investDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fas fa-chart-line"></i> Invest</a>
          <div class="dropdown-menu" aria-labelledby="investDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-hand-holding-usd"></i> SIP</a>
            <a class="dropdown-item" href="#"><i class="fas fa-chart-bar"></i> Stocks</a>
            <a class="dropdown-item" href="#"><i class="fas fa-file-invoice-dollar"></i> Bank Bonds</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-money-check-alt"></i> EMI</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i> Settings</a>
          <div class="dropdown-menu" aria-labelledby="settingsDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
            <a class="dropdown-item" href="#"><i class="fas fa-language"></i> Language</a>
            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>
 Logout</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Your page content here -->

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
