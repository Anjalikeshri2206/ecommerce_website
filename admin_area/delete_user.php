<?php

if (isset($_GET['delete_user'])) {
    $delete_user = $_GET['delete_user'];
    // echo $delete_user;

    $delete_query = "Delete from `user_table` where user_id=$delete_user";
    $result = mysqli_query($con, $delete_query);
    if ($result) {
        echo "<script> alert ('User is been Deleted Successfully')</script>";
        echo "<script> window.open ('./index.php?list_users','_self')</script>";
    }
}
