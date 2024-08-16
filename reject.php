<?php
include "show.php";
include "reject_reset_code.php";
$reject_id=$_REQUEST['reject_id'];
    $sql=mysqli_query($conn,"SELECT *from `application` WHERE id='$reject_id'");
    if(mysqli_num_rows($sql)==1){
        $reject_row=mysqli_fetch_array($sql);
        $email=$reject_row['email_sender'];
        $organization_name=$reject_row['organization_name'];
        $job_post=$reject_row['job_post'];
        send_message($email,$organization_name,$job_post);
        mysqli_query($conn,"DELETE from `application` where id='$reject_id'");
    }