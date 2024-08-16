<?php
session_start();
$update=$_SESSION['update_task'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:authentication_login.php");
}
include "show.php";
if(isset($_POST['submit'])){										
  $organization_name=$_POST["organization_name"];
  $job_post_place=$_POST["job_post_place"];
  $organization_description=$_POST["organization_description"];
  $about_job=$_POST["about_job"];
  $skill_required=$_POST["skill_required"];
  $who_can_apply=$_POST["who_can_apply"];
  $salary=$_POST["salary"];
  $additional_information=$_POST["additional_information"];
  $state=$_POST["state"];
  $city=$_POST["city"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $email_admin=$_SESSION['email'];
  $insert= "UPDATE `job_form_application` SET organization_name='$organization_name',job_post_place='$job_post_place',organization_description='$organization_description',about_job='$about_job',skill_required='$skill_required',who_can_apply='$who_can_apply',salary='$salary',additional_information='$additional_information',state='$state',city='$city',email='$email',phone='$phone' WHERE id='$update'";
  mysqli_query($conn,$insert);
  echo "<h3>FORM HAS BEEN UPDATE</h3>";
  echo "<a href='account_job_check_form_list.php'>CLICK HERE TO REFRESH</a>";

}
?>
