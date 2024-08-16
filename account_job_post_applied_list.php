<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:authentication_login.php");
}
include "show.php";
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
    <body class="body">
    <header class="navbar">
        <div class="heading"><button type="button" class="button"><a href="account_job_post_search.php" class="inbox">Search for Job</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="account_job_post_applied_list.php" class="inbox">List of job Applied</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="logout.php" class="inbox">Logout</a></button></div>
</header>

	<div class="container mt-5">
        <h2>Resume will automatically remove when you are reject</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>Date</th>
                    <th>Job Post</th>
                    <th>Organization Name</th>
                    <th>File Name</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody class='table-group-divider'>
              <?php 
                // select all show$show if page is visited or refreshed
                $email=$_SESSION['email'];
                $show=mysqli_query($conn,"SELECT *FROM `application` where `email_sender`='$email'");
                $i = 1; 
                while ($row = mysqli_fetch_array($show)) {
                    $file_path = "uploads/" . $row['filename'];
                    ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $row['date']; ?> </td>
                        <td> <?php echo $row['job_post']; ?> </td>
                        <td> <?php echo $row['organization_name']; ?> </td>
                        <td> <?php echo $row['filename']; ?> </td>
                        <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Download</a></td>
                      </tr>
                <?php $i++; } ?>

        </table>
    </div>
</body>
</html>