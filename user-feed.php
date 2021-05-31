<?php 

include('database_connection.php');
session_start();
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
  $username='';
}
 ?>           
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>News Feed | Pahal</title>
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
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

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
  <link href="assets/css/user-feed.css" rel="stylesheet">

</head>

<body>

  <!-- partial:index.partial.html -->
  
  <main class="page-content" id="main">
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            

            
              <?php
                try {   
                  $connection = mysqli_connect("localhost", "fred", "zap", "pahal");
                  $query = 'SELECT * FROM blog ORDER BY uploaddate desc;';
                  $result = mysqli_query($connection,$query);
                  $rows = mysqli_num_rows($result);
                  $n = $rows;
                $stmt = $pdo->query('SELECT * FROM blog ORDER BY uploaddate desc;');
                if ($n > 0) {
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
                      <div class="entry-img">
                        <img src="<?php echo $row[6];?>" alt="" class="img-fluid">
                      </div>
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
                  } 
                  ?> 
          </div><!-- End blog entries list -->
          <div class="col-lg-4">
            <div class="sidebar">
              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div> <!-- End sidebar search formn-->
              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a>General <span>(25)</span></a></li>
                  <li><a>Leadership<span>(12)</span></a></li>
                  <li><a>Women Safety<span>(5)</span></a></li>
                  <li><a>Working women<span>(22)</span></a></li>
                  <li><a>Economic Justice<span>(8)</span></a></li>
                  <li><a>Domestic Violence<span>(14)</span></a></li>
                </ul>
              </div> <!-- End sidebar categories-->
            </div><!-- End sidebar -->
            <br><br>
            <div class="write-blog">
              <a href="writeBlog.php" style="color: white;">Write a blog</a>
            </div>
          </div>
          <?php 
               } else { ?>
                <div class=package><center>
                      <h3 style="margin-top: 150px">Wanna share your experiences?<br>Start writing your first blog!</h3>
                      <img src="assets/img/blog.png" style="max-width: fit-content;"></center>
                  </div>
               <?php }
             }

               catch(PDOException $e) {
                  echo $e->getMessage();
                }
          ?>
        </div>
      </div>
    </section>
  </main>
  <?php 
    require_once("sidebar.php");
    sidebar($userPicture,$username,'',"sidebar-dropdown active-tab",'','','','','','','','');
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
  <script  src="assets/js/dash-image.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script> 
  <!-- <script src="assets/js/dashboard.js"></script> -->

</body>

</html>