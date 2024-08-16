<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:authentication_login.php");
}
$result;
include "show.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="account_job_check.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
</head>
<body class="body">
    <header class="navbar">
        <div class="heading"><button type="button" class="button"><a href="account_job_post_search.php" class="inbox">Search for Job</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="account_job_post_applied_list.php" class="inbox">List of job Applied</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="logout.php" class="inbox">Logout</a></button></div>
    </header>
<form action="account_job_post_search.php" method="post" class="form">
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Job Post</span>
    <input type="text" class="form-control" name="job_post_place" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">Salary</span>
    <textarea class="form-control" aria-label="With textarea" name="salary"></textarea> 
    </div>

    <div class="input-group mb-3">
  <span class="input-group-text">Choose State</span>
  <select id="countrySelect" class="form-control" name="state" size="1" onchange="makeSubmenu(this.value)">
    <option value="null" >Choose State</option>
    <option value="Odisha">Odisha</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Kerala">Kerala</option>
    <option value="Andhra_Pradesh">Andhra_Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chhattisgrah">Chhattisgrah</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal_Pradesh">Himachal_Pradesh</option>
    <option value="Jammu_Kashmir">Jammu_Kashmir</option>
    <option value="Jharkahnd">Jharkahnd</option>
    <option value="West_Bengal">West_Bengal</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="Uttar_Pradesh">Uttar_Pradesh</option>
    <option value="Tamil_Nadu">Tamil_Nadu</option>
  </select>
  </div>
  <div class="input-group mb-3">
  <span class="input-group-text">Choose City</span>
    <select id="citySelect" size="1" name="city" class="form-control">
    <option value="null">Choose City</option>
    </select>
  </div>
    <button type="submit" name="submit">submit</button>
</form>
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
                if(isset($_POST['submit'])){										
                  $job_post_place=$_POST["job_post_place"];
                  $salary=$_POST["salary"];
                  $state=$_POST["state"];
                  $city=$_POST["city"];
                  $result=mysqli_query($conn,"SELECT *from `job_form_application` WHERE `job_post_place`='$job_post_place' OR `salary`='$salary' OR `state`='$state' OR `city`='$city'");
                $i = 1;
                while ($row = mysqli_fetch_array($result)){ ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $row['date']; ?> </td>
                        <td> <?php echo $row['job_post_place'];
                        echo "<br>";
                        echo $row['organization_name']?></td>
                        <td class="update">
                            <button><a href="show_form.php?open_task=<?php echo $row['id'] ?>">OPEN</a></button>
                            <button><a href="apply_form.php?apply=<?php echo $row['id'] ?>">APPLY</a></button> 
                        </td>
                      </tr>
                <?php $i++; }} ?> 
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