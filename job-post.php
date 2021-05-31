<?php

include('database_connection.php');
session_start();

if (isset($_SESSION['user_id'])) {
  header('loaction:index.php');
}

if(!isset($_SESSION['org_id']))
{
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

$org_id = $_SESSION['org_id'];
$stmt = $pdo->query("select * from organization where org_id='$org_id;'");

$row = $stmt->fetch();
$userPicture = !empty($row[13]) ? $row[13] : 'assets/img/user.jpg';
$userPictureURL = $userPicture;

if (isset($_POST['submit'])) {
  if (!isset($_POST['job_role']) or empty($_POST['job_role']) or $_POST['job_role'] == '') {
    $_POST['job_role'] = " ";
  }
  if (!isset($_POST['desc']) or empty($_POST['desc']) or $_POST['desc'] == '') {
    $_POST['desc'] = " ";
  }
  if (!isset($_POST['education']) or empty($_POST['education']) or $_POST['education'] == '') {
    $_POST['education'] = " ";
  }
  if (!isset($_POST['apply_by']) or empty($_POST['apply_by']) or $_POST['apply_by'] == '') {
    $_POST['apply_by'] = " ";
  }
  if (!isset($_POST['opening']) or empty($_POST['opening']) or $_POST['opening'] == '') {
    $_POST['opening'] = " ";
  }
  if (!isset($_POST['state']) or empty($_POST['state']) or $_POST['state'] == '') {
    $_POST['state'] = " ";
  }
  if (!isset($_POST['city']) or empty($_POST['city']) or $_POST['city'] == '') {
    $_POST['fullname'] = " ";
  }
  if (!isset($_POST['perks']) or empty($_POST['perks']) or $_POST['perks'] == '') {
    $_POST['perks'] = " ";
  }
  if (!isset($_POST['atul']) or empty($_POST['atul']) or $_POST['atul'] == '') {
    $_POST['atul'] = " ";
  }
  if (!isset($_POST['nature']) or empty($_POST['nature']) or $_POST['nature'] == '') {
    $_POST['nature'] = " ";
  }
  if (!isset($_POST['min-salary']) or empty($_POST['min-salary']) or $_POST['min-salary'] == '') {
    $_POST['min-salary'] = " ";
  }
  if (!isset($_POST['max-salary']) or empty($_POST['max-salary']) or $_POST['max-salary'] == '') {
    $_POST['max-salary'] = " ";
  }
  $role = $_POST['job_role'];
  $descp = $_POST['desc'];
  $edu = $_POST['education'];
  $apply_by = $_POST['apply_by'];
  $opening = $_POST['opening'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $perks = $_POST['perks'];
  $skill = implode(',', $_POST['atul']);
  $nature = $_POST['nature'][0];
  $min = $_POST['min-salary'];
  $max = $_POST['max-salary'];
  $org_id = $_SESSION['org_id'];
  $uploaddate = date('Y-m-d H:i:s');

  $sql = "INSERT into job (org_id, job_role, job_desc, job_skills, job_qualification, applied_on, apply_by, vaccancies, job_state, job_city, perks, job_nature, min_salary, max_salary) values (:org_id, :role, :descp, :skill, :edu, :uploaddate, :apply_by, :opening, :state, :city, :perks, :nature, :min, :max);";
  $handle = $pdo->prepare($sql);
  $params = [
    ':org_id' => $org_id,
    ':role' => $role,
    ':descp' => $descp,
    ':skill' => $skill,
    ':edu' => $edu,
    ':uploaddate' => $uploaddate,
    ':apply_by' => $apply_by,
    ':opening' => $opening,
    ':state' => $state,
    ':city' => $city,
    ':perks' => $perks,
    ':nature'=> $nature,
    ':min' => $min,
    ':max' => $max
  ];
  $handle->execute($params);
  header('location:org-myjobs.php');
  // echo "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu did it yessssssssssssss";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Create a Job | Pahal</title>
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
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="assets/js/profile-cities.js"></script>
  <!-- <link rel="stylesheet" href="assets/css/initial-form.css"> -->
  <script src="assets/js/initial-form.js"></script>
  <script src="assets/js/profile-script.js"></script>
  <link rel="stylesheet" href="assets/css/profile-skill.css">
  <link rel="stylesheet" href="assets/css/profile-style.css">
  <link rel="stylesheet" href="assets/css/profile-form.css">
  <link rel="stylesheet" href="assets/css/dash-image.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="assets/css/org-profile-style.css">
  <link rel="stylesheet" href="assets/css/job-post.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
  <div class="base">
    <form method="post" role="form">

      <span class="tagline" style="margin-bottom: 40px; ">
        <center style="font-family: Pacifico,Cursive;"><?php echo "$username";?></center>
      </span>
      <label for="job">Job Role</label>
      <select id="job" name="job_role">
        <option value="" disabled selected>Select a role</option>
        <option value="Assistant Manager">Assistant Manager</option>
        <option value="Marketing Manager">Marketing Manager</option>
        <option value="Environment Manager">Environment Manager</option>
        <option value="Sales Executive">Sales Executive</option>
        <option value="Dress Designers">Dress Designers</option>
      </select>

      <label for="desc">Description</label>
      <textarea id="desc" name="desc" placeholder="Start writing from here...."></textarea>


      <label>Skills required</label>
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



      <label for="education">Education/Qualification required</label>
      <select id="education" name="education">
        <option value="" selected="selected" disabled="disabled">-- select one --</option>
        <option value="No formal education">No formal education</option>
        <option value="Primary education">Primary education</option>
        <option value="Secondary education">Secondary education or high school</option>
        <option value="Vocational qualification">Vocational qualification</option>
        <option value="Bachelor's degree">Bachelor's degree</option>
        <option value="Master's degree">Master's degree</option>
        <option value="Doctorate or higher">Doctorate or higher</option>
      </select>


      <div class="row" style="margin-top: 15px;">
        <div class="col-md-6">
          <label for="apply_by">Apply by</label>
          <input type="date" id="apply_by" name="apply_by">
        </div>
        <div class="col-md-6">
          <label for="opening">Number of openings</label>
          <input type="number" id="opening" name="opening">

        </div>
      </div>


      <div class="row" style="margin-top: 15px;">
        <div class="col-md-6">
          <label for="state">State</label>
          <select name="state" onchange="print_city('state', this.selectedIndex);" id="sts" name="stt"></select>
        </div>
        <div class="col-md-6">
          <label for="city">City</label>
          <select id="state" name="city">
            <option value="" disabled selected hidden>Select City</option>
          </select>
        </div>
      </div>
      <script language="javascript">
        print_state("sts");
      </script>


      <label for="perks">Perks</label>
      <textarea id="perks" name="perks" rows="2" cols="50"></textarea>
      <div class="row" style="margin-top: 15px;">
        <div class="col-md-4">
          <label style="float: left; font-size: 14px;">Job Nature</label><br><br>
          <input type="checkbox" class="styled-checkbox" name="nature[]" id="styled-checkbox-1" value="Full Time">
          <label for="styled-checkbox-1">Full Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

          <input type="checkbox" class="styled-checkbox" name="nature[]" id="styled-checkbox-2" value="Part Time">
          <label for="styled-checkbox-2">Part Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>
        <div class="col-md-4">
          <label for="min-salary">Minimum Salary(Rs.)</label>
          <input type="number" id="apply_by" name="min-salary">
        </div>
        <div class="col-md-4">
          <label for="opening">Maximum Salary(Rs.)</label>
          <input type="number" id="opening" name="max-salary">

        </div>
      </div>

      <div class="post-btn" style="text-align: center;">
        <input type="submit" name="submit" value="Post" class="btn btn-primary form-control publish-btn" />
      </div>
    </form>
  </div>
  <?php 
    require_once("sidebar.php");
    sidebar($userPicture,$username,'','','','','','','','',"sidebar-dropdown active-tab",'');
  ?>
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
  <script src="assets/js/profile-cities.js"></script>
  <script src="assets/js/dash-image.js"></script>
  <script src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
  <script src='https://cdn.rawgit.com/bootstrap-wysiwyg/bootstrap3-wysiwyg/master/dist/bootstrap3-wysihtml5.all.min.js'></script>
  <script src="assets/js/job-post.js"></script>

</body>

</html>