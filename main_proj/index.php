<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Portal</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      background-image: url('images/im-663680.jpeg')
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .box-left {
      border-radius: 10px;
      overflow: hidden;
    }

    .box-left .carousel-item img {
      height: 100%;
      width: 100%;
      object-fit: cover;
    }

    .box-right {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .box-right .form-group {
      margin-bottom: 20px;
    }

    .box-right .form-control {
      border-radius: 5px;
    }

    .box-right .btn-primary {
      width: 100%;
    }
  </style>
</head>

<body>
    <!-- <img src="images/im-663680.jpeg" alt="helloworld"> -->
    <?php include 'navbar.php'; ?>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <!-- Left box - Carousel of images using Bootstrap for ads -->
        <div class="box-left">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/lifeins.png" class="d-block w-100" alt="Image 1">
                </div>
                <div class="carousel-item">
                <img src="images/lifeins.png" class="d-block w-100" alt="Image 2">
                </div>
                <div class="carousel-item">
                <img src="images/lifeins.png" class="d-block w-100" alt="Image 3">
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <!-- Right box - Email ID, password, login button for login part -->
        <div class="box-right">
            <form>
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            </form><br>
            <p>Not registered? <a href="register.php">Register</a></p>
        </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
