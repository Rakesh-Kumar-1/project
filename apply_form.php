<?php
include "show.php";
session_start();
$_SESSION['id']=$_GET['apply'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="account_job_check.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
</head>
<body>
    <div class="container">
		<div class="title">Upload Resume</div>
		<form action="upload.php" method="POST" enctype="multipart/form-data" class="form">
				<div class="mb-3">
  				<input class="form-control" type="file" id="formFileMultiple" name="file" multiple>
				</div>
			<button type="submit" class="click" name="click">Click here to Upload file</button>
		</form>
	</div>
</body>

</html>

