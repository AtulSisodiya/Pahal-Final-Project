<?php 
session_start();
include('database_connection.php');

if(!isset($_SESSION['user_id']) and !isset($_SESSION['org_id']))
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
 ?>      
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Blogs | Pahal</title>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css'> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dash-image.css">
  <link href="/css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link href="assets/css/myblogs.css" rel="stylesheet">
  <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            /*background: url("assets/img/training.png");
             background-size: contain; 
            background-repeat: no-repeat;
            background-position: 50% -800%;*/
        }
        .package{
            margin: auto;
            text-align: center;
        }
        h3{
            font-size: medium;
            font-style: italic;
            font-weight: 500;
            justify-content: center;  
        }

    </style>

</head>

<body>

  <!-- partial:index.partial.html -->
  
  <main class="page-content" id="main">
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 entries">
            

           <?php
                if(isset($_SESSION['user_id'])) {   
                  $id = $_SESSION['user_id'];  
                  $stmt = $pdo->query("SELECT * FROM blog WHERE user_id=".$id." ORDER BY uploaddate desc;");
                  $rows = $stmt->fetch();
                  $n = sizeof($rows);
                  $t = gettype($n);
                  // var_dump($rows);
                  $stmt = $pdo->query("SELECT * FROM blog WHERE user_id=".$id." ORDER BY uploaddate desc;");
                  if ($n > 1) {
                    while($row = $stmt->fetch()){
                    if (!empty($row[1])){
                      $statement = $pdo->query("SELECT * FROM user WHERE user_id = '$row[1]';");
                      $details = $statement->fetch();
                      $author = $details[1];
                    }
                    if (!empty($row[2])){
                      $statement = $pdo->query("SELECT * FROM organization WHERE org_id = '$row[2]';");
                      $details = $statement->fetch();
                      $author = $details[2];
                    }
              ?>
                    <article class="entry">
                      <?php $var = (int)$row[0]; ?>
                      <?php if(!empty($row[7])){ ?>
                      <div class="entry-img">
                        <img src="<?php echo $row[6];?>" alt="" class="img-fluid">
                      </div>
                      <?php } ?>
                      <h2 class="entry-title">
                        <a href="blog.php?blog_id='<?php echo $var; ?>'"><?php echo $row[3];?></a>
                      </h2>
                      <div class="entry-meta">
                        <ul>
                          <li style="float: left;" class="d-flex align-items-center"><i class="bi bi-person"><a href="#">&nbsp;<?php echo $author;?></a></i></li>
                          <li style="float: right;" class="d-flex align-items-center"><i class="bi bi-clock"><a href="#"><time datetime="2020-01-01">&nbsp;<?php echo $row[5];?></time></a></i></li>
                          <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"><a href="#">&nbsp;12 Comments</a></i></li> -->
                        </ul>
                      </div>
                      <div class="entry-content">
                        <p>
                         <?php
                         $string = substr($row[4],0,240); 
                         echo $string;
                         if (strlen($row[4]) > 240) {
                          echo "....";
                         ?>
                        </p>
                        <div class="read-more">
                          <a href="blog.php?blog_id='<?php echo $var; ?>'">Read More</a>
                        </div>
                        <?php } ?>
                      </div>
                    </article>
              <?php 
                   } } else {
                ?>
                <div class=package>
                      <h3 style="margin-top: 150px">Wanna share your experiences?<br>Start writing your first blog!</h3>
                      <img src="assets/img/blog.png" style="max-width: fit-content;">
                  </div>
                <?php
               }
             }

                if(isset($_SESSION['org_id'])) {   
                  $id = $_SESSION['org_id'];  
                  $stmt = $pdo->query("SELECT * FROM blog WHERE org_id=".$id." ORDER BY uploaddate desc;");
                  $rows = $stmt->fetch();
                  $n = sizeof($rows);
                  $t = gettype($n);
                  $stmt = $pdo->query("SELECT * FROM blog WHERE org_id=".$id." ORDER BY uploaddate desc;");
                  if ($n > 1) {
                    while($row = $stmt->fetch()){
                    if (!empty($row[1])){
                      $statement = $pdo->query("SELECT * FROM user WHERE user_id = '$row[1]';");
                      $details = $statement->fetch();
                      $author = $details[1];
                    }
                    if (!empty($row[2])){
                      $statement = $pdo->query("SELECT * FROM organization WHERE org_id = '$row[2]';");
                      $details = $statement->fetch();
                      $author = $details[2];
                    }
              ?>
                    <article class="entry">
                      <?php $var = (int)$row[0]; ?>
                      <?php if(!empty($row[7])){ ?>
                      <div class="entry-img">
                        <img src="<?php echo $row[6];?>" alt="" class="img-fluid">
                      </div>
                      <?php } ?>
                      <h2 class="entry-title">
                        <a href="blog.php?blog_id='<?php echo $var; ?>'"><?php echo $row[3];?></a>
                      </h2>
                      <div class="entry-meta">
                        <ul>
                          <li style="float: left;" class="d-flex align-items-center"><i class="bi bi-person"><a href="#">&nbsp;<?php echo $author;?></a></i></li>
                          <li style="float: right;" class="d-flex align-items-center"><i class="bi bi-clock"><a href="#"><time datetime="2020-01-01">&nbsp;<?php echo $row[5];?></time></a></i></li>
                          <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"><a href="#">&nbsp;12 Comments</a></i></li> -->
                        </ul>
                      </div>
                      <div class="entry-content">
                        <p>
                         <?php
                         $string = substr($row[4],0,240); 
                         echo $string;
                         if (strlen($row[4]) > 240) {
                          echo "....";
                         ?>
                        </p>
                        <div class="read-more">
                          <a href="blog.php?blog_id='<?php echo $var; ?>'">Read More</a>
                        </div>
                        <?php } ?>
                      </div>
                    </article>
              <?php 
                   } } else {
                ?>
                <div class=package>
                      <h3 style="margin-top: 150px">Wanna share your experiences?<br>Start writing your first blog!</h3>
                      <img src="assets/img/blog.png" style="max-width: fit-content;">
                  </div>
                <?php
               }
             }

          ?>
    <!-- End blog entry -->
            
          </div><!-- End blog entries list --><!-- End blog sidebar -->
        </div>
      </div>
    </section>
  </main>
  <?php 
    require_once("sidebar.php");
    sidebar($userPicture,$username,'','','',"sidebar-dropdown active-tab",'','','','','','');
  ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
  <script src="assets/js/dashboard.js"></script>
  <script  src="assets/js/dash-image.js"></script>

</body>

</html>