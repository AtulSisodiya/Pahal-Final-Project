<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('database_connection.php');

if(isset($_SESSION['user_id'])) {
  $query = "SELECT * FROM user WHERE user_id = :user_id";
  $statement = $pdo->prepare($query);
  $statement->execute(
    array(
      ':user_id' => $_SESSION['user_id']
    )
  );  
  $result = $statement->fetchAll();
  
  if(isset($_POST['submit'])){


  $atul = $_POST['atul'];
  $user_id=$_SESSION['user_id'];



foreach ($atul as $key => $value) 

{
  
$sql = 'INSERT INTO skills (user_id, skill)
VALUES (:user_id,:skill);';
    
        $handle = $pdo->prepare($sql);
          $params = [
            ':user_id'=>$user_id,
            ':skill'=>$value
            
          ];

          $handle->execute($params);
          
  }
       


       $user_id=$_SESSION['user_id'];
       $fullname = $_POST['fullname'];
       $mobilenumber = $_POST['mobilenumber'];
       $dob = $_POST['dob'];
       $gender = $_POST['gender'];
       $state = $_POST['state'];
       
       if(!isset($_POST['city']) || $_POST['city']==null ||  $_POST['city']=='')
      {$_POST['city']=" ";}

       $city = $_POST['city'];

       $address = $_POST['address'];
       $maritalstatus =$_POST['maritalstatus'];
       
              
      $chk = implode( ',',$_POST['language'] );

       $hq = $_POST['hq'];

       if(!isset($_POST['yop']) || $_POST['yop']==null ||  $_POST['yop']=='')
      {$_POST['yop']=0;}
       $yop = $_POST['yop'];
       $institute = $_POST['institute'];
       $percentage = $_POST['percentage'];

       


       $sql = 'UPDATE user SET fullname = :fullname, mobilenumber=:mobilenumber, gender=:gender,dob=:dob, state = :state, city= :city, address= :address, maritalstatus= :maritalstatus, language= :chk, hq= :hq, yop= :yop, institute= :institute, percentage=:percentage WHERE user_id = :user_id;';
    
        $handle = $pdo->prepare($sql);
          $params = [
            ':fullname'=>$fullname,
            ':mobilenumber'=>$mobilenumber,
            ':gender'=>$gender,
            ':dob'=>$dob,
            ':state'=>$state,
            ':city'=>$city,
            ':address'=>$address,
            ':maritalstatus'=>$maritalstatus,
            ':chk'=>$chk,
            ':hq'=>$hq,
            ':yop'=>$yop,
            ':institute'=>$institute,
            ':percentage'=>$percentage,
            ':user_id'=>$user_id
          ];
                      
         $rank = 1;
            for($i=1; $i<=9; $i++) {
                if ( ! isset($_POST['emps'.$i]) ) continue;
                if ( ! isset($_POST['skill'.$i]) ) continue;
                if ( ! isset($_POST['duration'.$i]) ) continue;
                if ( ! isset($_POST['descp'.$i]) ) continue;

                $emps = $_POST['emps'.$i];
                $skill = $_POST['skill'.$i];
                $duration = $_POST['duration'.$i];
                $descp = $_POST['descp'.$i];

                $stmt = $pdo->prepare('INSERT INTO exp (user_id, typeofemp, skill, duration,  description) VALUES ( :user_id, :emps, :skill, :duration, :descp)');
                $stmt->execute(array(
                    ':user_id' => $user_id,
                    ':emps' => $emps,
                    ':skill' => $skill,
                    ':duration' => $duration,
                    ':descp' => $descp)
                );
                $rank++;
                $pdoExec = $handle->execute($params);
            }
            $rank++;
        $pdoExec = $handle->execute($params);

  


        if($pdoExec)
      {
          echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Updated';
          header('location:user-feed.php');
          
           
    } else{
      echo 'ERROR Data Not Updated';
    }

  }
}

else{
  header('location:signup.php');
}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Form | Pahal</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <script src="assets/js/profile-cities.js"></script>
  
  <link rel="stylesheet" href="assets/css/initial-form.css">
  <link rel="stylesheet" href="assets/css/profile-skill.css">
  <script src="assets/js/initial-form.js"></script>
  <script src="assets/js/profile-skill.js"></script>
  <script src="assets/js/profile-script.js"></script>


</head>
<body>
<!-- partial:index.partial.html -->
<!-- multistep form -->
<form method="POST" id="msform" action="initial-form.php">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Personal Details</li>
    <li>Education</li>
    <li>Experience</li>
    <li>Skills</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">It will help us to represent you</h3>
    <input type="text" name="fullname" value="<?php echo $_SESSION['fullname'];?>"  />
    <input type="tel" name="mobilenumber" value="<?php echo $result[0][3]; ?>"  />
    <select type="text" list="gender" name="gender" placeholder="Gender">
      <datalist id="gender">
        <option>Female</option>
        <option>Prefer Not to Say</option>
      </datalist>
    </select>
    <select name="state" onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt"></select>
    <select id ="state" name="city" ><option value="" disabled selected hidden>Select City</option></select>
    <input type="text" name="address" placeholder="Address" />
    <input type="text" onfocus="(this.type='date')" name="dob" min="1940-01-01" max="2021-05-25" placeholder="Date of Birth" />
    <select type="text" list="Marital Status"  name="maritalstatus" id="Marital Status"  placeholder="Marital Status">
      <datalist id="Marital Status">
            <option value="Married">Married</option>
            <option value="Unmarried">Unmarried</option>
            <option value="Widowed">Widowed</option>
            <option value="Divorced">Divorced</option>
      </datalist>
    </select>
    
 

 <div class="unstyled centered">
      <br>
  <label style="float: left; font-size: 14px;">Choose Language(s)</label>
  <br>
  <br>
  
    <input type="checkbox" class="styled-checkbox" name="language[]" id="styled-checkbox-1" value="Hindi">
    <label for="styled-checkbox-1">Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
  
    <input type="checkbox" class="styled-checkbox" name="language[]" id="styled-checkbox-2" value="English" checked>
    <label for="styled-checkbox-2">English&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
  
    <input type="checkbox" class="styled-checkbox" name="language[]" id="styled-checkbox-3" value="Other Local Language" checked>
    <label for="styled-checkbox-3">Other Local Language</label>
    <br> 
    <br>
  <br>
</div>
 
  <input type="button" name="next" class="next action-button" value="Next" />

    <script language="javascript">print_state("sts");</script>
  </fieldset>
  <fieldset>
      <h2 class="fs-title">Add Education Details</h2>
      <h3 class="fs-subtitle">Your Highest Qualfication details</h3>
      <input list="Qualfication" name="hq" id="browser" placeholder="Highest Qualfication">

      <datalist id="Qualfication">
            <option value="Secondary(X)"> 
            <option value="Senior Secondary(XII)">
            <option value="Diploma">
            <option value="Bachelors">
            <option value="Masters">
            <option value="PhD">
      </datalist> 

      <!-- <input type="number" name="yop"  min="1940" max="2021" placeholder="Year of Passing" /> -->
      <select id="ddlYears" list="ddlYears" name="yop" placeholder="Select Year of Passing" >
        <option value="" disabled selected hidden>Year of Passing</option>
      </select>
      <script type="text/javascript">
          window.onload = function () {
              var ddlYears = document.getElementById("ddlYears");
              var currentYear = (new Date()).getFullYear();
              for (var i = currentYear; i >= 1950; i--) {
                  var option = document.createElement("OPTION");
                  option.innerHTML = i;
                  option.value = i;
                  ddlYears.appendChild(option);
              }
          };
      </script>
      <input type="text" name="institute" placeholder="Institution" />
      <input type="number" name="percentage"  min="1" max="100" placeholder="Percentage" />
       <input type="button" name="previous" class="previous action-button" value="Previous" />
       <input type="button" name="next" class="next action-button" value="Next" />



    </fieldset>
    <fieldset>
      <h2 class="fs-title">Experience</h2>
      <h3 class="fs-subtitle">Share your Previous Expeiences</h3>
      <div>
        <div class="customer_records1">
          <input list="types" name="emps1" id="browser" placeholder="Type of Employement">
          <datalist id="types">
            <option value="Self Employed">
            <option value="Employee">
          </datalist>
          <input name="skill1" list="skill" placeholder="Skill">
          <datalist id="skill">
            <option value="Art and Craft">Art and Craft</option>
            <option value="Communicational Skills">Communicational Skills</option>
            <option value="Cooking">Cooking</option>
            <option value="Creativity">Creativity</option>
            <option value="Data Entry">Data Entry</option>
            <option value="Decision Making">Decision Making</option>
            <option value="Embroidery">Embroidery</option>
            <option value="Filing and paper management">Filing and paper management</option>
            <option value="Leadership">Leadership</option>
            <option value="Listening Skills">Listening Skills</option>
            <option value="Management">Management</option>
            <option value="Mehandi">Mehandi</option>
            <option value="Marketing">Marketing</option>
            <option value="MS Excel">MS Excel</option>
            <option value="Painting">Painting</option>
            <option value="Planning">Planning</option>
            <option value="Problem Solving">Problem Solving</option>
            <option value="Public Speaking">Public Speaking</option>
            <option value="Research Skills">Research Skills</option>
            <option value="Self Confidence">Self Confidence</option>
            <option value="Sewing">Sewing</option>
            <option value="Sketching">Sketching</option>
            <option value="Story telling">Story telling</option>
            <option value="Teamwork">Teamwork</option>
            <option value="Time Management">Time Management</option>
            <option value="Writing">Writing</option>
          </datalist>
          <input name="duration1" list="dur" placeholder="Duration of Experience">
          <datalist id="dur">
            <option value="Less than 1 month">
            <option value="Between 1 month and 6 month">
            <option value="Between 6 month and a year">
            <option value="Between 1 year and 2 year">
            <option value="Between 2 year and 5 year">
            <option value="More than 5 years">  
          </datalist>
          <textarea name="descp1" rows="7" placeholder="Short Description" style="resize: vertical;"></textarea>
           
           
        </div>
        <div id="position_fields"></div>
       

      </div>
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="submit" name="addPos" value="+ Add" id="addPos">
      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Skills</h2>
      <h3 class="fs-subtitle">Add your skills to get perfect job</h3>
         <div>
          <select multiple data-multi-select-plugin name="atul[]">
              <option value="Art and Craft">Art and Craft</option>
              <option value="Communicational Skills">Communicational Skills</option>
              <option value="Cooking">Cooking</option>
              <option value="Creativity">Creativity</option>
              <option value="Data Entry">Data Entry</option>
              <option value="Decision Making">Decision Making</option>
              <option value="Embroidery">Embroidery</option>
              <option value="Filing and paper management">Filing and paper management</option>
              <option value="Leadership">Leadership</option>
              <option value="Listening Skills">Listening Skills</option>
              <option value="Management">Management</option>
              <option value="Mehandi">Mehandi</option>
              <option value="Marketing">Marketing</option>
              <option value="MS Excel">MS Excel</option>
              <option value="Painting">Painting</option>
              <option value="Planning">Planning</option>
              <option value="Problem Solving">Problem Solving</option>
              <option value="Public Speaking">Public Speaking</option>
              <option value="Research Skills">Research Skills</option>
              <option value="Self Confidence">Self Confidence</option>
              <option value="Sewing">Sewing</option>
              <option value="Sketching">Sketching</option>
              <option value="Story telling">Story telling</option>
              <option value="Teamwork">Teamwork</option>
              <option value="Time Management">Time Management</option>
              <option value="Writing">Writing</option>
          </select>

          </div>
      
      
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <button type="submit" name="submit" id="submit" style="width: 100px; background: white; font-weight: bold; color: #ff6d2a; border: 0 none; border-radius: 20px; cursor: pointer; padding: 12px 5px; margin: 10px 5px;">Submit</button>
    </fieldset>
</form>


<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script  src="assets/js/initial-form.js"></script>


<script>

countPos = 1;
            // http://stackoverflow.com/questions/17650776/add-remove-html-inside-div-using-javascript
            $(document).ready(function(){
                window.console && console.log('Document ready called');
                $('#addPos').click(function(event){
                    // http://api.jquery.com/event.preventdefault/
                    event.preventDefault();
                    if ( countPos >= 9 ) {
                        alert("Maximum of nine position entries exceeded");
                        return;
                    }
                    countPos++;
                    window.console && console.log("Adding position "+countPos);
                    $('#position_fields').append(
                        '<div id="customer_records'+countPos+'"> \
                         <p><input list="types" name="emps'+countPos+'" id="browser" placeholder="Type of Employement">\
                            <datalist id="types">\
                              <option value="Self Employed">\
                              <option value="Employee">\
                            </datalist>\
                            <input name="skill'+countPos+'" list="skill" placeholder="Skill">\
                            <datalist id="skill">\
                              <option value="Art and Craft">Art and Craft</option>\
                              <option value="Communicational Skills">Communicational Skills</option>\
                              <option value="Cooking">Cooking</option>\
                              <option value="Creativity">Creativity</option>\
                              <option value="Data Entry">Data Entry</option>\
                              <option value="Decision Making">Decision Making</option>\
                              <option value="Embroidery">Embroidery</option>\
                              <option value="Filing and paper management">Filing and paper management</option>\
                              <option value="Leadership">Leadership</option>\
                              <option value="Listening Skills">Listening Skills</option>\
                              <option value="Management">Management</option>\
                              <option value="Mehandi">Mehandi</option>\
                              <option value="Marketing">Marketing</option>\
                              <option value="MS Excel">MS Excel</option>\
                              <option value="Painting">Painting</option>\
                              <option value="Planning">Planning</option>\
                              <option value="Problem Solving">Problem Solving</option>\
                              <option value="Public Speaking">Public Speaking</option>\
                              <option value="Research Skills">Research Skills</option>\
                              <option value="Self Confidence">Self Confidence</option>\
                              <option value="Sewing">Sewing</option>\
                              <option value="Sketching">Sketching</option>\
                              <option value="Story telling">Story telling</option>\
                              <option value="Teamwork">Teamwork</option>\
                              <option value="Time Management">Time Management</option>\
                              <option value="Writing">Writing</option>\
                            </datalist>\
                            <input name="duration'+countPos+'" list="dur" placeholder="Duration in Months">\
                            <datalist id="dur">\
                              <option value="Less than 1 month">\
                              <option value="Between 1 month and 6 month">\
                              <option value="Between 6 month and a year">\
                              <option value="Between 1 year and 2 year">\
                              <option value="Between 2 year and 5 year">\
                              <option value="More than 5 years">  \
                            </datalist>\
                            <textarea name="descp'+countPos+'" rows="7" placeholder="Short Description" style="resize: vertical;"></textarea>\
                            <input class="subPos" type="button" value="Remove" onclick="$(\'#customer_records'+countPos+'\').remove();return false;"></p> \
                        </div>');
                });
            });   

</script>

  

</body>
</html>