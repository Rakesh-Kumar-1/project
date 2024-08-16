<?php
$id=$_REQUEST['open_task'];
include "show.php";
$result=mysqli_query($conn,"SELECT *from `job_form_application` WHERE `id`='$id'");
$result=mysqli_fetch_array($result); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <section>
            <h4>ORANIZATION NAME</h4>
            <p><?php echo $result['organization_name'];?></p>
        </section>
        <section>
            <H4>JOB POST PLACE</H4>
            <p><?php echo $result['job_post_place'];?></p>
        </section>
        <section>
            <H4>ORGANIZATION DESCRIPTION</H4>
            <p><?php echo $result['organization_description'];?></p>
        </section>
        <section>
            <H4>ABOUT JOB</H4>
            <p><?php echo $result['about_job'];?></p>
        </section>
        <section>
            <H4>SKILL REQUIRED</H4>
            <p><?php echo $result['skill_required'];?></p>
        </section>
        <section>
            <H4>WHO CAN APPLY</H4>
            <p><?php echo $result['who_can_apply'];?></p>
        </section>
        <section>
            <H4>SALARY</H4>
            <p><?php echo $result['salary'];?></p>
        </section>
        <section>
            <H4>ADDITIONAL INFORMATION</H4>
            <p><?php echo $result['additional_information'];?></p>
        </section>
        <section>
            <H4>STATE</H4>
            <p><?php echo $result['state'];?></p>
        </section>
        <section>
            <H4>CITY</H4>
            <p><?php echo $result['city'];?></p>
        </section>
        <section>
            <H4>EMAIL</H4>
            <p><?php echo $result['email'];?></p>
        </section>
        <section>
            <H4>PHONE</H4>
            <p><?php echo $result['phone'];?></p>
        </section>
    </div>
</body>
<script>
</script>
</html>