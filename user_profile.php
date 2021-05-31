<?php
session_start();
include('database_connection.php');

if(!isset($_SESSION['user_id']) or isset($_SESSION['org-id']))
{
  header('location:login.php');
}

if(isset($_SESSION['user_id']))
{
  $user_id = $_SESSION['user_id'];
  $stmt = $pdo->query("select * from user where user_id='$user_id;'");

  $row = $stmt->fetch();

  $userPicture = !empty($row[17])?$row[17]:'assets/img/user.jpg';
  $userPictureURL = $userPicture;
  $username = $row[1];

} elseif (isset($_SESSION['org_id'])) {
  $org_id = $_SESSION['org_id'];
  $stmt = $pdo->query("select * from organization where org_id='$org_id;'");

  $row = $stmt->fetch();

  $userPicture = !empty($row[13])?$row[13]:'assets/img/user.jpg';
  $userPictureURL = $userPicture;
  $username = $row[2];
  
} else{ 
  $userPicture = 'assets/img/user.jpg';
  $userPictureURL = $userPicture;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->query("select fullname,username,dob,maritalstatus,city,state,address,mobilenumber,language,hq,yop,institute,percentage,uploaddate,image,image_name from user where user_id='$user_id;'");

$row = $stmt->fetch();

$userPicture = !empty($row['image'])?$row['image']:'assets/img/user.jpg';
$userPictureURL = $userPicture;

$stmt2 = $pdo->query("Select skill from skills where user_id = '$user_id;'");

$row2 = $stmt2->fetchAll(PDO::FETCH_COLUMN, 0);
// var_dump($row2);
// echo strpos(implode(',',$row2),'municational');

$stmt3 = $pdo->query("Select typeofemp,skill,duration,description from exp where user_id = '$user_id;'");

$row3 = $stmt3->fetchAll();

// Display in popup form
if(isset($_SESSION['user_id'])) {
  $query = "SELECT * FROM user WHERE user_id = :user_id";
  $statement = $pdo->prepare($query);
  $statement->execute(
    array(
      ':user_id' => $_SESSION['user_id']
    )
  ); 
  $result = $statement->fetchAll();

  }

 if(isset($_SESSION['user_id'])) {
  $query1 = "SELECT * FROM exp WHERE user_id = :user_id";
  $statement1 = $pdo->prepare($query1);
  $statement1->execute(
    array(
      ':user_id' => $_SESSION['user_id']
    )
  ); 
  $result1 = $statement1->fetchAll();
 
// var_dump($result1);
  }






// Form SUBMIT

if(isset($_POST['submit1'])){


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

      $sql = 'UPDATE user SET fullname = :fullname, mobilenumber=:mobilenumber, gender=:gender,dob=:dob, state = :state, city= :city, address= :address, maritalstatus= :maritalstatus, language= :chk WHERE user_id = :user_id;';
    
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
            ':user_id'=>$user_id
          ];
     $pdoExec = $handle->execute($params);

        if($pdoExec)
      {
          echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Updated';
          header("refresh: 0");
                    
           
    } else{
      echo 'ERROR Data Not Updated';
    }

}



if(isset($_POST['submit2'])){


       $hq = $_POST['hq'];
       $yop = $_POST['yop'];
       $institute = $_POST['institute'];
       $percentage = $_POST['percentage'];


      $sql = 'UPDATE user SET hq= :hq, yop= :yop, institute= :institute, percentage=:percentage WHERE user_id = :user_id;';
    
     $handle = $pdo->prepare($sql);
          $params = [
            ':hq'=>$hq,
            ':yop'=>$yop,
            ':institute'=>$institute,
            ':percentage'=>$percentage,
            ':user_id'=>$user_id
          ];
     $pdoExec = $handle->execute($params);

        if($pdoExec)
      {
          echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Updated';
          header("refresh: 0");
                    
           
    } else{
      echo 'ERROR Data Not Updated';
    }

}



?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Profile | Pahal</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css'> -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic|Open+Sans:300,400,500,700|Waiting+for+the+Sunrise|Shadows+Into+Light' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> <!--Skills css--> 
  <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <!-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
  <script  src="assets/js/profile-cities.js"></script>
  <link rel="stylesheet" href="assets/css/profile-skill.css">
  <link rel="stylesheet" href="assets/css/profile-style.css">
  <link rel="stylesheet" href="assets/css/profile-form.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="assets/css/dash-image.css">
  
</head>

<body>
<div class="container">
  <div class="flex-container1"> 

    <div class="card1" href="#">
      <h3>Personal Details</h3>  
      <table class="cleft">
        <tr>
          <td class="aayuedit">Full Name</td><td>:</td><td><?php echo $row['fullname'];?></td>
        </tr>
        <tr>
          <td class="aayuedit">Contact</td><td>:</td><td><?php echo $row[7];?></td>
        </tr>
        <tr>
          <td class="aayuedit">Email id</td><td>:</td><td><?php echo $row[1];?></td>
        </tr>
        <tr>
          <td class="aayuedit">Location</td><td>:</td><td><?php echo $row[4];?>, <?php echo $row[5];?></td>
        </tr>
        <tr>
          <td class="aayuedit">Address</td><td>:</td><td><?php echo $row[6];?></td>
        </tr>
      </table>
      <table class="cright">
        <tr>
          <td class="aayuedit2">Date of Birth</td><td>:</td><td><?php echo $row[2];?></td>
        </tr>
        <tr>
          <td class="aayuedit2">Marital Status</td><td>:</td><td><?php echo $row[3];?></td>
        </tr>
        <tr>
          <td class="aayuedit2">Language(s)</td><td>:</td><td><?php echo $row[8];?></td>
        </tr>  
      </table>
      <div class="go-corner" href="#">
        <div class="go-arrow"><i onclick="openForm1()" class="fa fa-pencil" style="color:white; cursor: pointer;"></i></div>
      </div>
    </div>

    <div class="card2" href="#">
      <h3>Highest Qualfication</h3> 
      <div class="aayueducation">
        <div class="aayudegree"><?php echo $row[9];?></div>
        <div class="aayuinstitute"><?php echo $row[11];?></div>
        <div class="aayuyear"><?php echo $row[10];?> Passout</div>
        <div class="aayumarks"><?php echo $row[12];?>%</div>
      </div> 
      <div class="go-corner" href="#">
        <div class="go-arrow">
          <i onclick="openForm2()" class="fa fa-pencil" style="color:white; cursor: pointer;"></i>
        </div>
      </div>
    </div>
   
    <div class="card3" href="#">
        <h3>Skills</h3>    
        <div class="wrapper clearfix">
          <div class="right">
            <div class="inner">
              <section>
                <ul class="skill-set">
                  <?php 
                  foreach( $row2 as $val ){ 
                  echo "<li>"; echo $val; echo "</li>";
                    }
                  ?>
                </ul>
              </section>
            </div>
          </div>
        </div>
        <div class="go-corner" href="#">
          <div class="go-arrow"><i onclick="openForm3()" class="fa fa-pencil" style="color:white; cursor: pointer;"></i></div>
        </div>
    </div>
      
    <div class="card4" href="#">
      <h3>Experience</h3>
      <?php 
      foreach( $row3 as $val ){
      ?>
      <div class="aayuexp">
        <table style="width:100%">
          <tr>
            <td class="aayucomp"><?php echo $val[0]; ?></td><td class="aayuprofile"><?php echo $val[1]; ?></td>
          </tr>
          <tr valign="top">
            <td class="aayudur"><?php echo $val[2]; ?></td><td class="aayudesc"><?php echo $val[3]; ?></td>
          </tr>
        </table>
      </div>
      <?php 
      }
      ?>  
      <div class="go-corner" href="#">
        <div class="go-arrow">
          <i onclick="openForm4()" class="fa fa-pencil" style="color:white; cursor: pointer;"></i>
        </div>
      </div>
    </div>
 
  </div>

</div>
<span style="color: rgb(43,43,43,0.5);">
  <div class="body form-popup" id="myForm1" style="background-color: #000000ad">
    <div class="form-container">
      <form method="POST" enctype="multipart/form-data">
        <h2 style="color: #222222; font-weight: 600; font-size: 30px;">Personal Details</h2>

        <label for="name" class="ash-label"><b>Full Name</b></label>
        <input type="text" class="ash-input" placeholder="Enter your Full Name" name="fullname" value="<?php echo $result[0][1]; ?>" required><br>
        <label for="mobile" class="ash-label"><b>Mobile Number</b></label>
        <input type="text" class="ash-input" placeholder="Enter your Mobile Number" name="mobilenumber" value="<?php echo $result[0][3]; ?>" required><br>
        <label for="gender" class="ash-label"><b>Gender</b></label>
        <input list="gender" name="gender"  id="browser" class="ash-input" value="<?php echo $result[0][5]; ?>" placeholder="Select your gender" required/>
        <datalist id="gender" class="ash-datalist">
          <option value="" selected>Enter your gender</option>
          <option value="Female">
          <option value="Rather Not to Say">
        </datalist><br>
        <label for="state" class="ash-label"><b>State</b></label>
        <input list="state" name="state" id="browser" class="ash-input" value="<?php echo $result[0][7]; ?>" placeholder="Select your State" required/>
        <datalist id="state" class="ash-datalist">
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
          <option value="Assam">Assam</option>
          <option value="Bihar">Bihar</option>
          <option value="Chandigarh">Chandigarh</option>
          <option value="Chhattisgarh">Chhattisgarh</option>
          <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
          <option value="Daman and Diu">Daman and Diu</option>
          <option value="Delhi">Delhi</option>
          <option value="Lakshadweep">Lakshadweep</option>
          <option value="Puducherry">Puducherry</option>
          <option value="Goa">Goa</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
          <option value="Jharkhand">Jharkhand</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Manipur">Manipur</option>
          <option value="Meghalaya">Meghalaya</option>
          <option value="Mizoram">Mizoram</option>
          <option value="Nagaland">Nagaland</option>
          <option value="Odisha">Odisha</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Sikkim">Sikkim</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Telangana">Telangana</option>
          <option value="Tripura">Tripura</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="Uttarakhand">Uttarakhand</option>
          <option value="West Bengal">West Bengal</option>
        </datalist>
        <br>
        
        <label for="city" class="ash-label"><b>City</b></label>
        <input type="text" name="city" id="browser" class="ash-input" value="<?php echo $result[0][8]; ?>" placeholder="Select your City" required/><br>
        <label for="address" class="ash-label"><b>Address</b></label>
        <input type="text" class="ash-input" placeholder="Enter your address" name="address" value="<?php echo $result[0][9]; ?>" required><br>
        
        <label for="dob" class="ash-label"><b>Date of Birth</b></label>
        <input type="text" onfocus="(this.type='date')" class="ash-input" placeholder="Enter your Date of Birth" name="dob" value="<?php echo $result[0][4]; ?>" min="1940-01-01" max="2021-05-25" required><br>
       
        <label for="mstatus" class="ash-label"><b>Maritial Status</b></label>
        <input list="mstatus" name="maritalstatus" class="ash-input" id="browser" value="<?php echo $result[0][10]; ?>" placeholder="Select your Maritial Status" required>
          <datalist id="mstatus">
            <option value="" disabled selected>Enter your marital status</option>
            <option value="Married">
            <option value="Unmarried">
            <option value="Widowed">
            <option value="Divorced">
          </datalist>
        <br>
        
     <label for="lan" class="ash-label">Choose Language(s)</label>
  
    <br>
    <input type="checkbox" name="language[]" id="lan" class="ash-select" value="Hindi" <?php echo (strpos($result[0][11],'indi') ? 'checked' : '');?> >
    <label for="styled-checkbox-1"  class="ash-label">Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
  
    <input type="checkbox" name="language[]" id="lan" class="ash-select" value="English" <?php echo (strpos($result[0][11],'nglish') ? 'checked' : '');?> >
    <label for="styled-checkbox-2"  class="ash-label">English&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
  
    <input type="checkbox" name="language[]" id="lan" class="ash-select" value="Other Local Language" <?php echo (strpos($result[0][11],'ther') ? 'checked' : '');?> >
    <label for="styled-checkbox-3"  class="ash-label">Other Local Language</label>
    <br> 
    <br>
        <script language="javascript">print_state("sts");</script>

        <center><button type="submit" class="btn" name="submit1" style="font-size: 15px; font-weight: 600;">SAVE</button></center>
      </form>
      <div class="go-corner-form" href="#">
        <div class="go-arrow">
          <i onclick="closeForm()" class="fa fa-close" style="color:white; cursor: pointer;"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="body form-popup" id="myForm2" style="background-color: #000000ad">
    <div class="form-container">
     

      <form method="post" enctype="multipart/form-data">
        <h2>Highest Qualification</h2>
        <label for="degree" class="ash-label"><b>Select your Degree</b></label>
        <input list="Qualfication" class="ash-input" name="hq" id="browser" value="<?php echo $result[0][12]; ?>" placeholder="Highest Qualfication" required>
        <datalist id="Qualfication" >
              <option value="Secondary)(X)"> 
              <option value="Senior Secondary(XII)">
              <option value="Diploma">
              <option value="Diploma">
              <option value="Bachelors">
              <option value="Masters">
              <option value="PhD">
      </datalist><br>
        <label for="yop" class="ash-label"><b>Year Of Passing</b></label>
        <input type="number" class="ash-input" name="yop"  min="1940" max="2021" value="<?php echo $result[0][13]; ?>" placeholder="Year of Passing" required/>
        <label for="institute" class="ash-label"><b>Institute</b></label>
        <input type="text" class="ash-input" name="institute" value="<?php echo $result[0][14]; ?>" placeholder="Institution" required/>
        <label for="percentage" class="ash-label"><b>Aggregate/Percentage</b></label>
        <input type="number" class="ash-input" name="percentage"  min="1" max="100" value="<?php echo $result[0][15]; ?>" placeholder="Percentage" required/>
        
         <center><button type="submit" class="btn" name="submit2" style="font-size: 15px; font-weight: 600;">SAVE</button></center>
      </form>


      <div class="go-corner-form" href="#">
        <div class="go-arrow">
          <i onclick="closeForm()" class="fa fa-close" style="color:white; cursor: pointer;"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="body form-popup" id="myForm3" style="background-color: #000000ad">
    <div class="form-container">
      <form>
        <h2 style="font-size: 30px; font-weight: 600; color: #222222;">Skills</h2>
        <div>
          <label for="skill" class="ash-label"><b>Select your skills</b></label>
          <select name="skills" class="ash-select" multiple data-multi-select-plugin>
            <option value="Art and Craft" <?php echo (strpos(implode(',',$row2),'rt and Craf') ? 'selected' : '');?>>Art and Craft</option>
            <option value="Communicational Skills" <?php echo (strpos(implode(',',$row2),'tional Skill') ? 'selected' : '');?>>Communicational Skills</option>
            <option value="Cooking" <?php echo (strpos(implode(',',$row2),'ooking') ? 'selected' : '');?>>Cooking</option>
            <option value="Creativity" <?php echo (strpos(implode(',',$row2),'tivity') ? 'selected' : '');?>>Creativity</option>
            <option value="Data Entry" <?php echo (strpos(implode(',',$row2),'ta Entry') ? 'selected' : '');?>>Data Entry</option>
            <option value="Decision Making" <?php echo (strpos(implode(',',$row2),'ision Makin') ? 'selected' : '');?>>Decision Making</option>
            <option value="Embroidery" <?php echo (strpos(implode(',',$row2),'mbroider') ? 'selected' : '');?>>Embroidery</option>
            <option value="Filing and paper management" <?php echo (strpos(implode(',',$row2),'paper') ? 'selected' : '');?>>Filing and paper management</option>
            <option value="Leadership" <?php echo (strpos(implode(',',$row2),'adershi') ? 'selected' : '');?>>Leadership</option>
            <option value="Listening Skills" <?php echo (strpos(implode(',',$row2),'ing Skill') ? 'selected' : '');?>>Listening Skills</option>
            <option value="Management" <?php echo (strpos(implode(',',$row2),'gemen') ? 'selected' : '');?>>Management</option>
            <option value="Mehandi" <?php echo (strpos(implode(',',$row2),'ehand') ? 'selected' : '');?>>Mehandi</option>
            <option value="Marketing" <?php echo (strpos(implode(',',$row2),'arketing') ? 'selected' : '');?>>Marketing</option>
            <option value="MS Excel" <?php echo (strpos(implode(',',$row2),'Excel') ? 'selected' : '');?>>MS Excel</option>
            <option value="Painting" <?php echo (strpos(implode(',',$row2),'ainting') ? 'selected' : '');?>>Painting</option>
            <option value="Planning" <?php echo (strpos(implode(',',$row2),'lanning') ? 'selected' : '');?>>Planning</option>
            <option value="Problem Solving" <?php echo (strpos(implode(',',$row2),'blem Sol') ? 'selected' : '');?>>Problem Solving</option>
            <option value="Public Speaking" <?php echo (strpos(implode(',',$row2),'blic Speak') ? 'selected' : '');?>>Public Speaking</option>
            <option value="Research Skills" <?php echo (strpos(implode(',',$row2),'search Skil') ? 'selected' : '');?>>Research Skills</option>
            <option value="Self Confidence" <?php echo (strpos(implode(',',$row2),'elf Con') ? 'selected' : '');?>>Self Confidence</option>
            <option value="Sewing" <?php echo (strpos(implode(',',$row2),'ewing') ? 'selected' : '');?>>Sewing </option>
            <option value="Sketching" <?php echo (strpos(implode(',',$row2),'ketching') ? 'selected' : '');?>>Sketching</option>
            <option value="Story telling" <?php echo (strpos(implode(',',$row2),'tory telli') ? 'selected' : '');?>>Story telling</option>
            <option value="Teamwork" <?php echo (strpos(implode(',',$row2),'eamwork') ? 'selected' : '');?>>Teamwork</option>
            <option value="Time Management" <?php echo (strpos(implode(',',$row2),'ime Managemen') ? 'selected' : '');?>>Time Management</option>
            <option value="Writing" <?php echo (strpos(implode(',',$row2),'riting') ? 'selected' : '');?>>Writing</option>
          </select>
        </div><br>

        <center><button type="submit" class="btn" style="font-size: 13px; font-weight: 600;">SAVE</button>
        </center>
      </form>
      <div class="go-corner-form" href="#">
        <div class="go-arrow">
          <i onclick="closeForm()" class="fa fa-close" style="color:white; cursor: pointer;"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="body form-popup" id="myForm4" style="background-color: #000000ad">
    <div class="form-container">
      <form>
        <h2 style="color: #222222; font-weight: 600; font-size: 30px;">Experience</h2>
        <div>
          <?php 
          $count_pos = 1;
          foreach( $row3 as $val ){
          ?>
          <div class="customer_records1">
            <label for="types" class="ash-label"><b>Employement Type</b></label>
            <input list="types" class="ash-input" name="emps<?php echo $count_pos; ?>" id="browser" value="<?php echo $val[0]; ?>" placeholder="Type of Employement">
            <datalist id="types">
              <option value="Self Employed">
              <option value="Employee">
            </datalist><br>
            <label for="lan" class="ash-label"><b>Skill</b></label>
            <input name="skill<?php echo $count_pos; ?>" list="skill" class="ash-input" placeholder="Skill" value="<?php echo $val[1]; ?>">
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
            </datalist><br>
            <label for="dur" class="ash-label"><b>Duration</b></label>
            <input name="duration<?php echo $count_pos; ?>" list="dur" class="ash-input" placeholder="Duration of Experience" value="<?php echo $val[2]; ?>">
              <datalist id="dur">
                <option value="Less than 1 month">
                <option value="Between 1 month and 6 month">
                <option value="Between 6 month and a year">
                <option value="Between 1 year and 2 year">
                <option value="Between 2 year and 5 year">
                <option value="More than 5 years">  
              </datalist><br>
            <label for="desc" class="ash-label"><b>Short Description</b></label>
            <input type="text" name="desc<?php echo $count_pos; ?>" class="ash-input" value="<?php echo $val[3]; ?>" placeholder="Short Description"><br>
          </div><br><br>
          <?php $count_pos = $count_pos + 1; } ?>
          <div class="customer_records_dynamic1"></div>
        </div>
        <!-- <a class="extra-fields-customer1" href="#"><i class="fa fa-plus"></i> Add other</a><br> -->
        <button type="submit" class="btn" style="margin: auto; float:right;">SAVE</button>
      </form>
      <div class="go-corner-form" href="#">
        <div class="go-arrow">
          <i onclick="closeForm()" class="fa fa-close" style="color:white; cursor: pointer;"></i>
        </div>
      </div>
    </div>
  </div>
</span>
<span id="uploaded_image"></span>
<?php 
    require_once("sidebar.php");
    sidebar($userPicture,$username,"sidebar-dropdown active-tab",'','','','','','','','','');
  ?>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<!-- <script src="assets/js/main.js"></script> -->
<!-- <script src="assets/js/dashboard.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
  function openForm1() {
    document.getElementById("myForm1").style.display = "block";
  }
  function openForm2() {
    document.getElementById("myForm2").style.display = "block";
  }
  function openForm3() {
    document.getElementById("myForm3").style.display = "block";
  }
  function openForm4() {
    document.getElementById("myForm4").style.display = "block";
  }
  function closeForm() {
    document.getElementById("myForm1").style.display = "none";
    document.getElementById("myForm2").style.display = "none";
    document.getElementById("myForm3").style.display = "none";
    document.getElementById("myForm4").style.display = "none";
  }
</script>
<script>
     
    $('.extra-fields-customer1').click(function() {
      $('.customer_records1').clone().appendTo('.customer_records_dynamic1');
      $('.customer_records_dynamic1 .customer_records1').addClass('single1 remove1');
      $('.single1 .extra-fields-customer1').remove();
      $('.single1').append('<a href="#" class="remove-field1 btn-remove-customer1">Remove</a>');
      $('.customer_records_dynamic1 > .single1').attr("class", "remove");

      $('.customer_records_dynamic input1').each(function() {
        var count = 0;
        var fieldname = $(this).attr("name");
        $(this).attr('name', fieldname + count);
        count++;
      });

    });

    $(document).on('click', '.remove-field1', function(e) {
      $(this).parent('.remove').remove();
      e.preventDefault();      
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
  <script src="assets/js/profile-skill.js"></script>
  <script  src="assets/js/profile-cities.js"></script>
  <script  src="assets/js/dash-image.js"></script>
</body>
</html>