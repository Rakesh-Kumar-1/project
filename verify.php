<?php
include "show.php";
if(isset($_POST['submit'])){
    session_start();
    $otp1=(int)$_SESSION['otp'];
    $otp_name=(int)$_POST['otp_name'];
    if($otp1==$otp_name){
        header("location:reset_password.php");
    }
    else{
        echo "<p>YOUR OTP IS WRONG</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container{
    border: 1px solid rgba(170, 155, 155, 0.39);;
    border-radius: 10px;
    position: absolute;
    top: 10%;
    left: 5%;
}
.title{
    font-size: 35px;
}
.click{
    font-size: 20px;
    border-radius: 10px;
    width: 100%;
    padding: 3px;
    border-color: rgba(170, 155, 155, 0.39);
    margin-bottom: 10px;
}
    </style>
</head>
<body>
    <div class="container">
		<div class="title">Verify OTP</div>
		<form action="verify.php" method="post" class="form">
				<div class="mb-3">
                <label for="">ENTER OTP HERE</label>
  				<input class="form-control" type="number" id="formFileMultiple" name="otp_name">
				</div>
			<button type="submit" class="click" name="submit">CLICK HERE</button>
		</form>
	</div>
</body>
</html>