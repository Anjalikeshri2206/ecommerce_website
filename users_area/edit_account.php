<?php
if(isset($_GET['edit_account']))
{
   $user_session_name=$_SESSION['username'];
   $select_query="Select * from `user_table` where username='$user_session_name'";
   $result_query=mysqli_query($con,$select_query);
   $row_fetch=mysqli_fetch_assoc($result_query);
   $user_id=$row_fetch['user_id'];
   $username=$row_fetch['username'];
   $user_email=$row_fetch['user_email'];
   $user_address=$row_fetch['user_address'];
   $user_mobile=$row_fetch['user_mobile'];
}

   if(isset($_POST['user_update']))
   {
      $update_id=$user_id;
      $username=$_POST['user_username'];
      $user_email=$_POST['user_email'];
      $user_address=$_POST['user_address'];
      $user_mobile=$_POST['user_mobile'];
      $user_image=$_FILES['user_image']['name'];
      $user_image_tmp=$_FILES['user_image']['tmp_name'];
      move_uploaded_file($user_image_tmp,"./user_images/$user_image");
   

      // update query

      $update_data="update `user_table` set username='$username',user_email='$user_email',user_image='$user_image',
      user_address='$user_address',user_mobile='$user_mobile' where user_id=$update_id";
      $result_query_update=mysqli_query($con,$update_data);

      if($result_query_update)
      {
         echo "<script>alert('Data updated successfully')</script>";
         echo "<script>window.open('logout.php','_self')</script>";
      }


   }
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
     <!-- bootstrap css link -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">

    <style>
    .edit_image{
    width:100px;
    height: 100px;
    object-fit: contain;
}

    

    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-outline mb-4">
           <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_username">
        </div>

        <div class="form-outline mb-4">
           <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
        </div>

        <div class="form-outline mb-4 d-flex w-50 m-auto">
           <input type="file" class="form-control m-auto" name="user_image">
           <img src="./user_images/girl.jpg"  class="edit_image" alt="">
        </div>

        <div class="form-outline mb-4">
           <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>"name="user_address">
        </div>

        <div class="form-outline mb-4">
           <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>"name="user_mobile">
        </div>

        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">

    </form>
    
</body>
</html>
