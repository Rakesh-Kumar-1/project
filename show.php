<?php
$conn=mysqli_connect("localhost","root","","training");
if(!$conn){
    die("Database is not connected".mysqli_connect_errno());
}
?>