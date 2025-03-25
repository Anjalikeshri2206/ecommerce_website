<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Registration </title>

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
        <h2 class="text-center mb-5">Admin Registration </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <img src="../images/registration.webp" alt="Admin Registration" class="reg">
            </div>

            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Your Username"
                            required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" placeholder=" Enter Your email" required="required"
                            class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password"
                            required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="confirm_Password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Enter Your Confirm Password" required="required" class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration"
                            value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php"
                                class="link-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</html>

<!--- php code --->
<?php

if (isset($_POST['admin_registration'])) {
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    // select query 

    $select_query = "Select * from `admin_table` where admin_name = '$user_name' or admin_email = '$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script> alert('Username or email already exist') </script>";
    } else if ($user_password != $confirm_password) {
        echo "<script> alert('Password do not match') </script>";
    } else {
        $insert_query = "insert into `admin_table`  (admin_name,admin_email,admin_password) values
        ('$user_name','$user_email','$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);


        if ($sql_execute) {
            echo "<script> alert('Data Inserted successfully') </script>";
        } else {
            die(mysqli_error($con));
        }
    }
}

?>