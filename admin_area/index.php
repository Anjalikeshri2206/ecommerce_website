<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
    .admin_image {
        width: 100px;
        object-fit: contain;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .product_img {
        width: 100px;
        object-fit: contain;
    }
    </style>


</head>

<body>
    <div class="container-fluid p-0">
        <!-- first-child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/shop.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">


                        <?php

                        if (!isset($_SESSION['admin_name'])) {
                            echo "<li class='nav-item'>
                            <a href='#' class='nav-link'>Welcome Guest</a>
                        </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a href='#' class='nav-link'>Welcome " . $_SESSION['admin_name'] . "</a>
                        </li>";
                        }

                        if (!isset($_SESSION['admin_name'])) {
                            echo "<li class='nav-item'>
                            <a href='admin_login.php' class='nav-link'>Login</a>
                        </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a href='logout.php' class='nav-link'>Logout</a>
                        </li>";
                        }


                        ?>






                    </ul>

                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/mango.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center"> Welcome </p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert
                            Products</a></button>

                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View
                            Products</a></button>

                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert
                            Categories</a></button>

                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View
                            Categories</a></button>

                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert
                            Brand</a></button>

                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View
                            Brands</a></button>

                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All
                            Orders</a></button>

                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All
                            Payments</a></button>

                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List
                            Users</a></button>





                </div>
            </div>
        </div>
        <!-- Forth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }

            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brands'])) {
                include('edit_brands.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brands'])) {
                include('delete_brands.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['delete_user'])) {
                include('delete_user.php');
            }





            ?>
        </div>


        <!--- include footer--->

        <?php
        include("../includes/footer.php")

        ?>
    </div>

</body>

</html>