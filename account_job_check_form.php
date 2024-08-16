<?php
session_start();
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
  $insert="INSERT INTO `job_form_application`(`organization_name`, `job_post_place`, `organization_description`, `about_job`, `skill_required`, `who_can_apply`, `salary`, `additional_information`, `state`, `city`, `email`, `phone`,`admin_email`) VALUES ('$organization_name','$job_post_place','$organization_description','$about_job','$skill_required','$who_can_apply','$salary','$additional_information','$state','$city','$email','$phone','$email_admin')";
  mysqli_query($conn,$insert);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="accountstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    </head>
    <body class="body">
    <header class="navbar">
        <div class="heading"><button type="button" class="button"><a href="account_job_check_application_received.php" class="inbox">Application Received</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="account_job_check_form.php" class="inbox">Job Posting Form</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="account_job_check_form_list.php" class="inbox">Form List</a></button></div>
        <div class="heading"><button type="button" class="button"><a href="logout.php" class="inbox">Logout</a></button></div>
    </header>

<script type="text/javascript">
let citiesByState = {
Odisha: ["Bhubaneswar","Puri","Cuttack"],
Maharashtra: ["Mumbai","Pune","Nagpur"],
Kerala: ["kochi","Kanpur"],
Andhra_Pradesh: ["Adoni","Amaravati","Anantapur","Chandragiri","Chittoor","Dowlaiswaram","Eluru","Guntur","Kadapa","Kakinada","Kurnool","Machilipatnam","Nagarjunakoṇḍa","Rajahmundry","Srikakulam","Tirupati","Vijayawada","Visakhapatnam","Vizianagaram","Yemmiganur"],
Assam: ["Dhuburi","Dibrugarh","Dispur","Guwahati","Jorhat","Nagaon","Sivasagar","Silchar","Tezpur","Tinsukia"],
Bihar: ["Ara","Barauni","Begusarai","Bettiah","Bhagalpur","Bihar Sharif","Bodh Gaya","Buxar","Chapra","Darbhanga","Dehri","Dinapur Nizamat","Gaya","Hajipur","Jamalpur","Katihar","Madhubani","Motihari","Munger","Muzaffarpur","Patna","Purnia","Pusa","Saharsa","Samastipur","Sasaram","Sitamarhi","Siwan"],
Chhattisgrah: ["Ambikapur","Bhilai","Bilaspur","Dhamtari","Durg","Jagdalpur","Raipur","Rajnandgaon"],
Gujarat: ["Ahmadabad","mreli","haruch","havnagar","huj","warka","andhinagar","odhra","amnagar","unagadh","andla","hambhat","heda","ahesana","orbi","adiad","avsari","kha","alanpur","atan","orbandar","ajkot","urat","urendranagar","alsad","eraval"],
Haryana: ["Ambala","Bhiwani","Chandigarh","Faridabad","Firozpur Jhirka","Gurugram","Hansi","Hisar","Jind","Kaithal","Karnal","Kurukshetra","Panipat","Pehowa","Rewari","Rohtak","Sirsa","Sonipat"],
Himachal_Pradesh:["Bilaspur","Chamba","Dalhousie","Dharmshala","Hamirpur","Kangra","Kullu","Mandi","Nahan","Shimla","Una"],
Jammu_Kashmir: ["Anantnag","Baramula","Doda","Gulmarg","Jammu","Kathua","Punch","Rajouri","Srinagar","Udhampur"],
Jharkahnd: ["Bokaro","Chaibasa","Deoghar","Dhanbad","Dumka","Giridih","Hazaribag","Jamshedpur","Jharia","Rajmahal","Ranchi","Saraikela"],
West_Bengal: ["Alipore","lipur Duar","sansol","aharampur","ally","alurghat","ankura","aranagar","arasat","arrackpore","asirhat","hatpara","ishnupur","udge Budge","urdwan","handernagore","arjeeling","iamond Harbour","um Dum","urgapur","alisahar","aora","ugli","ngraj Bazar","alpaiguri","alimpong","amarhati","anchrapara","haragpur","ooch Behar","olkata","rishnanagar","alda","idnapore","urshidabad","abadwip","alashi","anihati","urulia","aiganj","antipur","hantiniketan","hrirampur","iliguri","iuri","amluk","itagarh"],
Uttarakhand: ["Almora","Dehra Dun","Haridwar","Mussoorie","Nainital","Pithoragarh"],
Uttar_Pradesh: ["Agra","Aligarh","Amroha","Ayodhya","Azamgarh","Bahraich","Ballia","Banda","Bara Banki","Bareilly","Basti","Bijnor","Bithur","Budaun","Bulandshahr","Deoria","Etah","Etawah","Faizabad","Farrukhabad-cum-Fatehgarh","Fatehpur","Fatehpur Sikri","Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hardoi","Hathras","Jalaun","Jaunpur","Jhansi","Kannauj","Kanpur","Lakhimpur","Lalitpur","Lucknow","Mainpuri","Mathura","Meerut","Mirzapur-Vindhyachal","Moradabad","Muzaffarnagar","Partapgarh","Pilibhit","Prayagraj","Rae Bareli","Rampur","Saharanpur","Sambhal","Shahjahanpur","Sitapur","Sultanpur","Tehri","Varanasi"],
Tamil_Nadu: ["Arcot","Chengalpattu","Chennai","Chidambaram","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanniyakumari","Kodaikanal","Kumbakonam","Madurai","Mamallapuram","Nagappattinam","Nagercoil","Palayamkottai","Pudukkottai","Rajapalayam","Ramanathapuram","Salem","Thanjavur","Tiruchchirappalli","Tirunelveli","Tiruppur","Thoothukudi","Udhagamandalam","Vellore"]
}
function makeSubmenu(value) {
if(value.length==0) document.getElementById("citySelect").innerHTML = "<option></option>";
else {
var citiesOptions = "";
for(cityId in citiesByState[value]) {
citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
}
document.getElementById("citySelect").innerHTML = citiesOptions;
}
}
function resetSelection() {
document.getElementById("countrySelect").selectedIndex = 0;
document.getElementById("citySelect").selectedIndex = 0;
}
</script>
<form action="/training/search/account_job_check_form.php" method="post" class="form">
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">ORGANIZATION NAME</span>
    <input type="text" class="form-control"  name="organization_name" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Job Post</span>
    <input type="text" class="form-control" name="job_post_place" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon2">Organization Describtion</span>
    <textarea class="form-control" aria-label="With textarea" name="organization_description"></textarea>  
  </div>

    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">About Job</span>
    <textarea class="form-control" aria-label="With textarea" name="about_job"></textarea>  
  </div>

    <div class="input-group mb-3">
    <span class="input-group-text">Skill Required</span>
    <textarea class="form-control" aria-label="With textarea" name="skill_required"></textarea> 
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon2">Who can apply</span>
    <textarea class="form-control" aria-label="With textarea" name="who_can_apply"></textarea> 
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">Salary</span>
    <textarea class="form-control" aria-label="With textarea" name="salary"></textarea> 
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text">Additional Information</span>
    <textarea class="form-control" aria-label="With textarea" name="additional_information"></textarea>
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text">Organization Email</span>
    <input type="text" class="form-control" name="email" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon2">Contact Number</span>
    <input type="number" class="form-control" name="phone" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
  <span class="input-group-text">Choose State</span>
  <select id="countrySelect" class="form-control" name="state" size="1" onchange="makeSubmenu(this.value)">
    <option value="" >Choose State</option>
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
    <select id="citySelect" size="1" class="form-control" name="city" >
    <option value="" >Choose City</option>
    <option></option>
    </select>
  </div>
    <button type="submit" name="submit">submit</button>
</form>
</body>
</html>
