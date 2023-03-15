<?php
  include "includes/database.php";
  include "includes/users.php";
  $database = new database();

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $db = $database->connect();
    $new_user = new user($db);
    $new_user->v_email = $_POST['email'];
    $new_user->v_password = md5($_POST['password']);
    $result = $new_user->user_login();
    $num = $result->rowCount();
    $row_user = $result->fetch();
    print_r($num);
      if($num>0){
        session_start();
        $_SESSION['user_id'] = $row_user['n_user_id'];
        header("location:index.php");
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";
        

      }else{
        $flag = "Login false!";
        // echo "<pre>";
        // print_r( $new_user->v_password );
        // echo "</pre>";
      }
  }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Administrator Login</title>

   

    

    <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
  <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<form class="form-signin" method="POST" action="">
  <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <?php
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($flag)){
      ?>
      <div class="alert alert-danger">
        <strong><?php echo $flag ?></strong>
      </div>
  <?php
    }
  ?>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
</form>


    
  </body>
</html>
