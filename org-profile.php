<?php 

include('database_connection.php');
session_start();
if(isset($_SESSION['user_id']))
{
  header('location:index.php');
}
if(!isset($_SESSION['org_id'])){
  header('location:login.php');
}
if (isset($_SESSION['org_id'])) {
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

if(isset($_POST['submit1'])){
  $org_id = $_SESSION['org_id'];
  $fullname = $_POST['fullname'];
  $founder = $_POST['founder'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $website = $_POST['website'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $address = $_POST['address'];

  $sql = "UPDATE organization SET org_name=:name, org_email=:email, org_mobilenumber=:mobile, org_website=:website, org_founder=:founder, org_state=:state, org_city=:city, org_address=:address WHERE org_id = :org_id; ";
  $handle = $pdo -> prepare($sql);
  $params = [
    ':name'=>$fullname,
    ':email'=>$email,
    ':mobile'=>$mobile,
    ':website'=>$website,
    ':founder'=>$founder,
    ':state'=>$state,
    ':city'=>$city,
    ':address'=>$address,
    ':org_id'=>$org_id
  ];
  $pdoExec = $handle->execute($params);
  if($pdoExec){
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Updated';
    header("refresh: 0");     
  } else {
    echo 'ERROR Data Not Updated';
  }
}

if(isset($_POST['submit2'])){
  $org_id = $_SESSION['org_id'];
  $descp = $_POST['descp'];

  $sql = "UPDATE organization SET org_desc=:descp WHERE org_id = :org_id; ";
  $handle = $pdo -> prepare($sql);
  $params = [
    ':descp'=>$descp,
    ':org_id'=>$org_id
  ];
  $pdoExec = $handle->execute($params);
  if($pdoExec){
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Updated';
    header("refresh: 0");     
  } else {
    echo 'ERROR Data Not Updated';
  }
}

 ?>           
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Profile | Pahal</title>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css'> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">


  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
  <script  src="assets/js/profile-cities.js"></script>
  <link rel="stylesheet" href="assets/css/profile-skill.css">
  <link rel="stylesheet" href="assets/css/profile-style.css">
  <link rel="stylesheet" href="assets/css/profile-form.css">
  <link rel="stylesheet" href="assets/css/dash-image.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="assets/css/org-profile-style.css">
  

</head>

<body>
<div class="container">
  <div class="flex-container1"> 

  <div class="card1">
    <h2><?php echo $row['org_name'] ?>  <i class="far fa-check-circle" style="color: #ff6d2a"></i></h2>
    <h6 style="font-weight: 400;">Founded by <strong><?php echo $row['org_founder'] ?></strong></h6>
    <hr>
    <div style="float: left;">
      <h4>Contact Details</h4>
      <h6><i class="fa fa-envelope"></i>  <?php echo $row['org_username'] ?></h6>
      <h6><i class="fa fa-phone"></i>  <?php echo $row['org_mobilenumber'] ?></h6>
      <h6><i class="fa fa-globe"></i>  <?php echo $row['org_website'] ?></h6>
    </div>
    <div style="float: right;">
      <h4>Address</h4>
      <h6><?php echo $row['org_address'] ?></h6>
      <h6><?php echo $row['org_city'] ?>, <?php echo $row['org_state'] ?></h6>
    </div>
  
    <div class="go-corner" href="#">
      <div class="go-arrow">
        <i onclick="openForm1()" class="fa fa-pencil" style="color:white; cursor: pointer;"></i>
      </div>
    </div>
  </div>
      
    <div class="card4" href="#">
      <h3>What we do?</h3>
      <hr>
      <p><?php echo $row['org_desc'] ?></p>
      <div class="go-corner" href="#">
        <div class="go-arrow">
          <i onclick="openForm2()" class="fa fa-pencil" style="color:white; cursor: pointer;"></i>
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

        <label for="name" class="ash-label"><b>Organization Name</b></label>
        <input type="text" class="ash-input" placeholder="Organization Name" name="fullname" value="<?php echo $row['org_name']; ?>" required><br>
        <label for="founder" class="ash-label"><b>Founded By</b></label>
        <input type="text" class="ash-input" placeholder="Founded By" name="founder" value="<?php echo $row['org_founder']; ?>" required><br>
        <label for="email" class="ash-label"><b>Additional Email ID</b></label>
        <input type="email" class="ash-input" placeholder="Enter Additional Email Address" name="email" value="<?php echo $row['org_email']; ?>" required><br>
        <label for="mobile" class="ash-label"><b>Mobile Number</b></label>
        <input type="tel" class="ash-input" placeholder="Enter your Mobile Number" name="mobile" value="<?php echo $row['org_mobilenumber']; ?>" required><br>
        <label for="website" class="ash-label"><b>Website URL</b></label>
        <input type="text" class="ash-input" placeholder="Enter Website URL" name="website" value="<?php echo $row['org_website']; ?>" required><br>
        <label for="state" class="ash-label"><b>State</b></label>
        <input list="state" name="state" id="browser" class="ash-input" value="<?php echo $row['org_state']; ?>" placeholder="Select your State" required/>
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
        <input type="text" name="city" id="browser" class="ash-input" value="<?php echo $row['org_city']; ?>" placeholder="Select your City" required /><br>
        <label for="address" class="ash-label"><b>Address</b></label>
        <input type="text" class="ash-input" placeholder="Enter your address" name="address" value="<?php echo $row['org_address']; ?>" required><br><br>
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
        <h2>Descrpition & Services Provided</h2>
        <label for="descr" class="ash-label"><b>What do you do?</b></label><br>
        <textarea name="descp" rows="7" placeholder="Short Description" style="resize: vertical;"><?php echo $row['org_desc']; ?></textarea><br><br>
        <center><button type="submit" class="btn" name="submit2" style="font-size: 15px; font-weight: 600;">SAVE</button></center>
      </form>
      <div class="go-corner-form" href="#">
        <div class="go-arrow">
          <i onclick="closeForm()" class="fa fa-close" style="color:white; cursor: pointer;"></i>
        </div>
      </div>
    </div>
  </div>
</span>
<?php 
    require_once("sidebar.php");
    sidebar($userPicture,$username,"sidebar-dropdown active-tab",'','','','','','','','','');
  ?>
  <!-- page-wrapper" -->
  <!-- partial -->
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- <script src="assets/js/dashboard.js"></script> -->
  <script src="assets/js/profile-script.js"></script>
  <script src="assets/js/profile-skill.js"></script>
  <script  src="assets/js/profile-cities.js"></script>
  <script  src="assets/js/dash-image.js"></script>
  <script>
    function openForm1() {
      document.getElementById("myForm1").style.display = "block";
    }
    function openForm2() {
      document.getElementById("myForm2").style.display = "block";
    }
    function closeForm() {
      document.getElementById("myForm1").style.display = "none";
      document.getElementById("myForm2").style.display = "none";
    }
  </script>

</body>

</html>