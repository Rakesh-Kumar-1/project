<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:authentication_login.php");
}
include "show.php";
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    mysqli_query($conn, "DELETE FROM `job_form_application` WHERE `id`='$id'");
    mysqli_query($conn,"DELETE FROM `application` WHERE `authentication_id`='$id'");
    header('location:account_job_check_form_list.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="accountstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    <style>
        .update{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>
    </head>
<body class="body">
    <header class="navbar">
        <div class="heading"><button type="button" class="button"><a href="account_job_check_application_received.php" class="inbox">Application Received</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="account_job_check_form.php" class="inbox">Job Posting Form</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="account_job_check_form_list.php" class="inbox">Form List</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="logout.php" class="inbox">Logout</a></button></div>
    </header>

    <table class="table" id="table">
        <thead>
          <tr>
            <th scope="col">S.NO</th>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody class='table-group-divider'>
              <?php 
                // select all show$show if page is visited or refreshed
                $email_admin=$_SESSION['email'];
                $show = mysqli_query($conn, "SELECT *from `job_form_application` where `admin_email`='$email_admin'");
                $i = 1; 
                while ($row = mysqli_fetch_array($show)) { ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $row['date']; ?> </td>
                        <td> <?php echo $row['about_job']; ?> </td>
                        <td class="update">
                            <button><a href="documentopen.php?open_task=<?php echo $row['id'] ?>">OPEN</a></button>
                            <button><a href="documentedit.php?update_task=<?php echo $row['id'] ?>">EDIT</a></button>
                            <button><a href="documentdelete.php?del_task=<?php echo $row['id'] ?>">DELETE</a></button> 
                        </td>
                      </tr>
                <?php $i++; } ?> 
        </tbody>
      </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.table').DataTable();
        });
    </script>
</body>
</html>