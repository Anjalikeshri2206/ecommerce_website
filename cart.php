<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website-Cart Details</title>
  <!-- bootstrap css link -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">

  <style>
    .cart_img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }

    .foot {
      position: absolute;
      bottom: 0;
      width: 100%;

    }
  </style>

</head>

<body>
  <nav>
    <!-- navbar -->
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <img src="images/shop.jpg" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users_area/user_registration.php">Register</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                <sup> <?php cart_item(); ?> </sup></a>
            </li>

          </ul>
        </div>
    </div>
  </nav>

  <!----- calling cart function ------->

  <?php
  cart();

  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">


      <?php

      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
      <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
      } else {
        echo " <li class='nav-item'> <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a> </li>";
      }

      if (!isset($_SESSION['username'])) {
        echo " <li class='nav-item'> <a class='nav-link' href='./users_area/user_login.php'>Login </a> </li>";
      } else {
        echo " <li class='nav-item'> <a class='nav-link' href='./users_area/logout.php'>Logout </a> </li>";
      }
      ?>

    </ul>
  </nav>
  <!-- third child-->
  <div class="bg-light">
    <h3 class="text-center">Mini Mart</h3>
    <p class="text-center">Communication is at the heart of e-commerce and community</p>
  </div>


  <!---- Fourth child-table ------>

  <div class="container">
    <div class="row">
      <form action="" method="post">

        <table class="table table-bordered text-center">

          <tbody>
            <!---- php code to display dynamic data ------>

            <?php

            $get_ip_add = getIPAddress();
            $total_price = 0;
            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count > 0) {
              echo "
                <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operation</th>
                </tr>
                </thead>";
              while ($row = mysqli_fetch_array($result)) {
                $product_id = $row['product_id'];
                $select_products = "Select * from `products` where product_id='$product_id'";
                $result_products = mysqli_query($con, $select_products);

                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price = array($row_product_price['product_price']);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_image1 = $row_product_price['product_image1'];
                  $product_values = array_sum($product_price);
                  $total_price += $product_values;


            ?>


                  <tr>
                    <td> <?php echo $product_title  ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1  ?>" alt="" class="cart_img"></td>
                    <td> <input type="text" name="qty" class="form-input w-50"> </td>
                    <?php


                    $get_ip_add = getIPAddress();
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['qty'];
                      $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                      $result_products_quantity = mysqli_query($con, $update_cart);
                      $total_price = $total_price * $quantities;
                    }
                    ?>

                    <td> <?php echo $price_table ?>/- </td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php
                                                                          echo $product_id ?>"></td>
                    <td>
                      <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">

                      <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">

                    </td>
                  </tr>

            <?php
                }
              }
            } else {
              echo "<h2 class='text-danger text-center'> Cart is Empty </h2>";
            }

            ?>
          </tbody>
        </table>

        <!---- Subtotal ------>

        <div class="d-flex mb-5">

          <?php
          $get_ip_add = getIPAddress();
          $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          if ($result_count > 0) {
            echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>  $total_price /- </strong></h4>
            <input type='submit' value='Continue Shopping'
            class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
            <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
          } else {
            echo "  <input type='submit' value='Continue Shopping'
            class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'> ";
          }

          if (isset($_POST['continue_shopping'])) {
            echo "<script> window.open('index.php','_self') </script>";
          }
          ?>
        </div>
    </div>
  </div>
  </form>

  <!--- Fnction to remove items ----->

  <?php
  function remove_cart_item()
  {
    global $con;

    if (isset($_POST['remove_cart'])) {
      foreach ($_POST['removeitem'] as $remove_id) {
        echo $remove_id;
        $delete_query = "Delete from `cart_details` where product_id=$remove_id";
        $run_delete = mysqli_query($con, $delete_query);

        if ($run_delete) {
          echo "<script> window.open('cart.php','_self') </script>";
        }
      }
    }
  }

  echo $remove_item = remove_cart_item();




  ?>

  <!-- last child -->
  <footer class="foot">
    <div class="bg-info p-3 text-center">
      <p>All rights reserved </p>
    </div>
  </footer>
  </div>
</body>

</html>