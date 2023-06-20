<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
  <title>Customized Navbar</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <style>
    /* Custom CSS */
    .navbar {
      background-color: rgba(0,0,0,0.8);
    }
    
    .navbar-brand {
      margin-right: auto;
      color: white; /* Set logo font color to black */
      font-size: 30px; /* Increase or decrease the font size for the logo */
    }
    
    .navbar-nav {
      justify-content: flex-end;
    }
    
    .navbar-light .navbar-brand {
      color: white; /* Set logo font color to black */
    }
    
    .navbar-light .navbar-nav .nav-link {
      color: white; /* Set button font color to black */
      font-size: 18px; /* Increase or decrease the font size for the buttons */
      margin-left: 15px; /* Increase or decrease the distance between buttons */
    }
    
    /* Custom CSS for text highlight */
    .navbar .nav-item .nav-link:hover {
      background-color: transparent;
      color: #4bcc2b;
    }
  </style>
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">Benk</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  
  <!-- Add Bootstrap JS (optional, if you need dropdowns or other JS features) -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
</body>
</html>

</body>
</html>