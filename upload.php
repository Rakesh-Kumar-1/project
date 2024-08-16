<?php
session_start();
include "show.php";
$id=$_SESSION['id'];
$result=mysqli_query($conn,"SELECT *from `job_form_application` WHERE `id`='$id'");
$result=mysqli_fetch_array($result); 
$job_post=$result['job_post_place'];
$email_reciever=$result['admin_email'];
$organization_name=$result['organization_name'];
$authentication_id=$id;
$email_sender=$_SESSION['email'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; 
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
            
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $filename = $_FILES["file"]["name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];
                $sql= "INSERT INTO `application`(`email_sender`, `authentication_id`, `job_post`, `email_reciever`,`filename`, `filesize`, `filetype`,`organization_name`) VALUES ('$email_sender','$authentication_id','$job_post','$email_reciever','$filename', $filesize, '$filetype','$organization_name')";
                if ($conn->query($sql) === TRUE) {
                    echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded and the information has been stored in the database.";
                } else {
                    echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>

