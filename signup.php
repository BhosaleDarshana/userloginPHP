<?php
$showErr = false;
$showAlert = false;
include 'partial/_dbconnect.php';

if($_SERVER['REQUEST_METHOD']== 'POST'){
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$alreadyexituser = "SELECT * FROM `loggers` WHERE username='$username'";
$result = mysqli_query($conn,$alreadyexituser);
$numUser = mysqli_num_rows($result);

if($numUser > 0){
    $showErr = "user already exit make new username";
}else{
if($password == $cpassword){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    //$sql = "INSERT INTO `loggers` (`username`, `password`, `ts`) VALUES ('$username', '$password', current_timestamp())";
    $sql = "INSERT INTO `loggers` (`username`, `password`, `ts`) VALUES ('$username', '$hash', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
        $showAlert = true;
    }
}else{
     $showErr="password does not matched";
}
}
} 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>register first...</title>
  </head>
  <body>
  <?php require 'partial/nav.php' ?>
  
  <?php if($showAlert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS</strong> You insert value successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

header("location:welcome.php");

}
  ?>

  <?php 
  if ($showErr){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>ERROR</strong> '.$showErr.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
 ?>

   <!--  form create for login -->
    
   <div class="container">
   <h2> Registration page </h2>
   <form action="/loginPHP/signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="mb-3">
    <label for="cpassword" class="form-label"> confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">password must be matched</div>
  </div>

  <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>