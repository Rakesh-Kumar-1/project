<?php
$showError=false;
if(isset($_POST['submit'])){
    include "show.php";
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $result=mysqli_query($conn,"SELECT *FROM `authentication` where email='$email' ");
    $num =mysqli_num_rows($result);
    if($num ==0 and $email!=null){
    mysqli_query($conn,"INSERT INTO `authentication` (`firstname`, `lastname`, `phone`, `email`, `password`, `state`, `city`) VALUES ('$firstname', '$lastname', '$phone', '$email', '$password', '$state', '$city')");
    header("location:index.html");
    }
    else{
      $showError ="Invalid Credentials";
  }
  }
?>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup_form.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="body">
<?php
if($showError){
      if($email==null){
        echo '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">ERROR! Details are not filled.</h4></div>';
          $showError=false;
      }
      else{
        echo '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error! This Email Id is already used.</h4></div>';
          $showError=false;
      }
        
    }
?>
<form action="authentication_signup.php" method="post" class="signup_form">
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">FIRST NAME</span>
    <input type="text" class="form-control" placeholder="Firstname" name="firstname" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">LAST NAME</span>
    <input type="text" class="form-control" placeholder="Lastname" name="lastname" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="email" name="email" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <span class="input-group-text" id="basic-addon2">@gmail.com</span>
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">Password</span>
    <input type="text" class="form-control" name="password" id="basic-url" aria-describedby="basic-addon3">
    </div>

    <div class="input-group mb-3">
    <span class="input-group-text">Phone</span>
    <input type="text" class="form-control" name="phone" aria-label="Amount (to the nearest dollar)">
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
  <div class="input-group mb-3">
    <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
  </div>
</form>
</body>
</html>
