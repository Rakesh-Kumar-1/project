<?php
    $login=false;
    $showError=false;
    if(isset($_POST['login'])){
      include "show.php";
        $email=$_POST['email'];
        $password=$_POST['password'];
        $result=mysqli_query($conn,"SELECT *FROM `authentication` where email='$email' AND password ='$password'");
        $num =mysqli_num_rows($result);
        if($num ==1){
            $login =true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location:home_board.php");
        }
        else{
            $showError ="Invalid Credentials";
        }
    }
    if(isset($_POST['signup'])){
      header("location:authentication_signup.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup_form.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="body">
  <?php
if($showError){
        echo '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <p>Write correct Email and Password.</p>
          </div>';
    }
?>
<div>
<form action="authentication_login.php" method="post" class="login_form">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <a href="forgot_password.php">Forgot Password</a>
  </div>
  <div class="mb-3 form-check">
  <button type="submit" class="btn btn-primary" name="login">LOGIN IN</button>
  <button type="submit" class="btn btn-primary" name="signup">SIGN UP</button>
  </div>
</form>
</div>
</body>
</html>