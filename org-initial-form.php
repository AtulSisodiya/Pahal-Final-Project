<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('database_connection.php');

if(!isset($_SESSION['user_id']) and !isset($_SESSION['org_id']))
{
  header('location:index.php');
}

if(isset($_SESSION['user_id']))
{
  header('location:index.php');
}

if(isset($_SESSION['org_id'])) {
  $query = "SELECT * FROM organization WHERE org_id = :org_id";
  $statement = $pdo->prepare($query);
  $statement->execute(
    array(
      ':org_id' => $_SESSION['org_id']
    )
  );  
  $result = $statement->fetchAll();
  
  if(isset($_POST['finalsubmit'])){

    if(!isset($_POST['fullname']) or empty($_POST['fullname']) or $_POST['fullname']==''){
      $_POST['fullname']=" ";
    }
    if(!isset($_POST['additional-email']) or empty($_POST['additional-email']) or $_POST['additional-email']==''){
      $_POST['additional-email']=" ";
    }
    if(!isset($_POST['mobilenumber']) or empty($_POST['mobilenumber']) or $_POST['mobilenumber']==''){
      $_POST['mobilenumber']=" ";
    }
    if(!isset($_POST['website']) or empty($_POST['website']) or $_POST['website']==''){
      $_POST['website']=" ";
    }
    if(!isset($_POST['state']) or empty($_POST['state']) or $_POST['state']==''){
      $_POST['state']=" ";
    }
    if(!isset($_POST['city']) or empty($_POST['city']) or $_POST['city']==''){
      $_POST['city']=" ";
    }
    if(!isset($_POST['address']) or empty($_POST['address']) or $_POST['address']==''){
      $_POST['address']=" ";
    }
    if(!isset($_POST['founder']) or empty($_POST['founder']) or $_POST['founder']==''){
      $_POST['founder']=" ";
    }
    if(!isset($_POST['type']) or empty($_POST['type']) or $_POST['type']==''){
      $_POST['type']=" ";
    }
    if(!isset($_POST['desc']) or empty($_POST['desc']) or $_POST['desc']==''){
      $_POST['desc']=" ";
    }

    $org_id = $result[0][0];
    $fullname = $_POST['fullname'];
    $email = $_POST['additional-email'];
    $mobilenumber = $_POST['mobilenumber'];
    $website = $_POST['website'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $founder = $_POST['founder'];
    $descp = $_POST['desc'];
    $chk = $_POST['type'][0];

    $sql = "UPDATE organization SET org_name = :fullname, org_mobilenumber=:mobilenumber, org_state = :state, org_city= :city, org_address= :address, org_type= :chk, org_email= :email, org_website= :website, org_founder= :founder, org_desc= :descp WHERE org_id = :org_id; ";
    $handle = $pdo->prepare($sql);
    $params = [
      ':fullname'=>$fullname,
      ':mobilenumber'=>$mobilenumber,
      ':email'=>$email,
      ':website'=>$website,
      ':state'=>$state,
      ':city'=>$city,
      ':address'=>$address,
      ':founder'=>$founder,
      ':chk'=>$chk,
      ':descp'=>$descp,
      ':org_id'=>$org_id
    ];
    $pdoExec = $handle->execute($params);
    if($pdoExec){
      echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Updated';
      // header('location:user-feed.php');      
    } else{
      echo 'ERROR Data Not Updated';
    }
    // var_dump($_FILES['logo']);
    if (!empty($_FILES["logo"]["name"])) {
      $targetDir = "upload/";
      $fileName = basename($_FILES["logo"]["name"]);
      $targetFilePath = $targetDir . $org_id . '_' . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      $uploaddate = date('Y-m-d H:i:s');
      move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath);
      $sql = "UPDATE organization SET org_logo= :logo , org_logo_time= :logo_time WHERE org_id = :org_id; ";
      $handle = $pdo->prepare($sql);
      $params = [
        ':logo'=>$targetFilePath,
        ':logo_time'=>$uploaddate,
        ':org_id'=>$org_id
      ];
      $pdoExec = $handle->execute($params);
      if($pdoExec){
      // echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logo Updated';
      header('location:user-feed.php');      
      } else{
      echo 'ERROR Logo Not Updated';
      }
    }
    if (!empty($_FILES["doc"]["name"])) {
      $targetDir = "upload/";
      $fileName = basename($_FILES["doc"]["name"]);
      $targetFilePath = $targetDir . $org_id . '_' . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      $uploaddate = date('Y-m-d H:i:s');
      move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFilePath);
      $sql = "UPDATE organization SET org_doc= :doc , org_doc_time= :doc_time WHERE org_id = :org_id; ";
      $handle = $pdo->prepare($sql);
      $params = [
        ':doc'=>$targetFilePath,
        ':doc_time'=>$uploaddate,
        ':org_id'=>$org_id
      ];
      $pdoExec = $handle->execute($params);
      if($pdoExec){
      echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Document Updated';
      // header('location:user-feed.php');      
      } else{
      echo 'ERROR Document Not Updated';
      }
    }
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Profile Updated Succesfully")';  
    echo '</script>';   //execute query success message
    header("refresh:0;user-feed.php");
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <script src="assets/js/profile-cities.js"></script>
  
  <!-- <link rel="stylesheet" href="assets/css/initial-form.css"> -->
  <link rel="stylesheet" href="assets/css/profile-skill.css">
  <script src="assets/js/initial-form.js"></script>
  <script src="assets/js/profile-skill.js"></script>
  <script src="assets/js/profile-script.js"></script>
  <link rel="stylesheet" href="assets/css/org-initial-form.css">
</head>
<body>
<!-- partial:index.partial.html -->
<!-- multistep form -->
<form method="POST" id="msform" enctype="multipart/form-data">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Essential Details</li>
    <li>What do you do?</li>
    <li>One last step</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Essential Details</h2>
    <h3 class="fs-subtitle">It will help us to represent you</h3>
    <input type="text" name="fullname" placeholder="Name of Organization" value="<?php echo $result[0][2];?>"  />
    <input type="email" name="additional-email" placeholder="Provide your additional email" value=""/>
    <input type="tel" name="mobilenumber" placeholder="Contact Number" value="<?php echo $result[0][3]; ?>"  />
    <input type="text" name="website" placeholder="Your official website link" value=""  />
    <select name="state" onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt"></select>
    <select id ="state" name="city" ><option value="" disabled selected hidden>Select Operational City</option></select>
    <input type="text" name="address" placeholder="Address" />
    <input type="text" name="founder" placeholder="Name of Founder" value=""  />
    <div class="unstyled centered"><br>
      <label style="float: left; font-size: 14px;">Type of your organization</label>
      <br><br>
      <input type="radio" class="styled-checkbox" name="type[]" id="styled-checkbox-1" value="private">
      <label for="styled-checkbox-1">Private&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input type="radio" class="styled-checkbox" name="type[]" id="styled-checkbox-2" value="gov">
      <label for="styled-checkbox-2">Indian Government&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <br><br><br>
    </div>
    <input type="button" name="next" class="next action-button" value="Next" />
    <script language="javascript">print_state("sts");</script>
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Tell us something about your organization</h2>
    <textarea name="desc" rows="7" placeholder="Short Description" style="resize: vertical;"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Upload your display logo & valid ID Proof</h2>
    <div>
      <label for="logo" style="float: left; margin-bottom: 5px;">Upload Display Logo</label>
      <input type="file" accept="image/*" name="logo" class="upload"/>
      <label for="doc" style="float: left; margin-bottom: 5px;">Upload Valid ID Proof</label>
      <input type="file" name="doc" accept="*.pdf" class="upload"/>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <button type="submit" name="finalsubmit" id="submit" style="width: 100px; background: white; font-weight: bold; color: #ff6d2a; border: 0 none; border-radius: 20px; cursor: pointer; padding: 12px 5px; margin: 10px 5px;">Submit</button>
  </fieldset>
</form>

<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="assets/js/initial-form.js"></script>
</body>
</html>