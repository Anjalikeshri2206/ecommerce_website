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
    <title> Admin Login </title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .reg {
        height: 80%;
        width: 80%;
        object-fit: contain;
    }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <img src="../images/login.png" alt="Admin Login" class="reg">
            </div>

            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">

                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Your Username"
                            required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password"
                            required="required" class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account ? <a href="admin_registration.php"
                                class="link-danger">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</html>

<?php

if (isset($_POST['admin_login'])) {
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];

    $select_query = "Select * from `admin_table` where admin_name = '$user_name'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    if ($row_count > 0) {
        $_SESSION['admin_name'] = $user_name;
        if (password_verify($user_password, $row_data['admin_password'])) {
            echo "<script> alert('Login Successfully') </script>";
            echo "<script> window.open('index.php') </script>";
        } else {
            echo " <script> alert('Invalid Credentials') </script>";
        }
    } else {
        echo " <script> alert('Invalid Credentials') </script>";
    }
}
?>