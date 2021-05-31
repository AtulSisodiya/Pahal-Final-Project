<?php
session_start();
include('database_connection.php');

$string = trim($_GET['blog_id'],"'");

$stmt = $pdo->prepare("SELECT * FROM blog WHERE blog_id = :xyz");
$stmt->execute(array(":xyz" => $string));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!empty($row['user_id'])) {
  $stmt1 = $pdo->prepare("SELECT * FROM user WHERE user_id = :abc");
  $stmt1->execute(array(":abc" => $row['user_id']));
  $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
  $name = $rows[0]['fullname'];
  $email = $rows[0]['username'];
  $image = $rows[0]['image'];
}
if (!empty($row['org_id'])) {
  $stmt1 = $pdo->prepare("SELECT * FROM organization WHERE org_id = :abc");
  $stmt1->execute(array(":abc" => $row['org_id']));
  $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
  $name = $rows[0]['org_name'];
  $email = $rows[0]['org_username'];
  $image = $rows[0]['org_logo'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog | Pahal</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/readmore.css" rel="stylesheet">
</head>

<body>
<header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.php">pahal.in</a></h1>

      </div>
    </header><!-- End Header -->
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <?php
                if (!empty($row['image'])) {
                  echo '<img src='.$row["image"].' alt=" " class="img-fluid">';
                }
                ?>
              </div>

              <h2 class="entry-title">
                <a><?php echo $row['title']; ?></a>
              </h2>

              <!-- <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?php echo $name; ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?php echo $row['uploaddate']; ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div> -->

              <div class="entry-content">
                <?php echo $row['content']; ?>
              </div>
            </article>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">          
              <h3 class="sidebar-title">Author</h3>
              <div class="author-section">
              <?php 
              if (!empty($image)) {
                echo "<img src='".$image."' alt='' class='author-profile'>";
              }
              ?>
              <div class="author-details">
                <h5><?php echo $name; ?></h5>
                <h6><i class="fa fa-envelope"></i> <?php echo $email; ?></h6>
                <h6><i class="bi bi-clock"></i> <time datetime="2020-01-01"><?php echo $row['uploaddate']; ?></time></h6>
              </div>
              </div>
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>pahal.in</h3>
              <p>
                JECRC Foundation, Jaipur<br><br>
                <strong>Phone:</strong> +919876543210<br>
                <strong>Email:</strong> info@pahal.in<br>
              </p>
              <div class="social-links mt-3">
                <a class="twitter"><i class="bx bxl-twitter"></i></a>
                <a class="facebook"><i class="bx bxl-facebook"></i></a>
                <a class="instagram"><i class="bx bxl-instagram"></i></a>
                <a class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="terms_cond.php">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="terms_cond.php">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Fill your email address to subscribe our Newsletter</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>pahal.in</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a>Code Smashers</a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>