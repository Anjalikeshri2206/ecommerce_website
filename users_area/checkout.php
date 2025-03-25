<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <!-- bootstrap css link -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        overflow-x: hidden;
    }

    .logo {
        width: 7%;
        height: 7%;
    }
    </style>
</head>

<body>
    <div>
        <!-- navbar -->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <img src="..\images\shop.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>


                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">


                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </nav>


            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <ul class="navbar-nav me-auto">


                    <?php

if(!isset($_SESSION['username']))
{
  echo "<li class='nav-item'>
      <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
}
else{
  echo " <li class='nav-item'> <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a> </li>";

}

    if(!isset($_SESSION['username']))
    {
      echo " <li class='nav-item'> <a class='nav-link' href='./user_login.php'>Login </a> </li>";
    }
    else{
      echo " <li class='nav-item'> <a class='nav-link' href='logout.php'>Logout </a> </li>";

    }
    ?>

                </ul>
            </nav>

            <div class="bg-light">
                <h3 class="text-center">Mini Mart</h3>
                <p class="text-center">Communication is at the heart of e-commerce and community</p>
            </div>


            <!-- Forth Child -->
            <div class="row px-1">
                <div class="col-md-12">
                    <!-- products -->
                    <div class="row">

                        <?php
    if(!isset($_SESSION['username']))
    {
include('user_login.php');
    }
    else{
      include('payment.php');

    }

    ?>

                    </div>
                </div>




            </div>

            <!-- last child -->
            <!--- include footer--->
            <?php
include("../includes/footer.php")

?>
        </div>
</body>

</html>