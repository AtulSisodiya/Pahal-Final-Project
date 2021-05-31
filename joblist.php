<?php
session_start();
include('database_connection.php');
if(!isset($_SESSION['user_id']))
{
  header('location:login.php');
}
$user_id = $_SESSION['user_id'];
$stmt = $pdo->query("select * from user where user_id='$user_id;'");

$row = $stmt->fetch();

$userPicture = !empty($row[17])?$row[17]:'assets/img/user.jpg';
$userPictureURL = $userPicture;
$username = $row[1];
// var_dump($row);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Explore Jobs | Pahal</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css'> -->

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

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
  <!-- <link rel="stylesheet" href="assets/css/linearicons.css"> -->
	<!-- <link rel="stylesheet" href="assets/css/bootstrap.css"> -->
	<link rel="stylesheet" href="assets/css/job-listing.css">
  <link rel="stylesheet" href="assets/css/dash-image.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">

</head>

<body>

  <!-- Start post Area -->
	<section class="post-area section-gap">
		<div class="container">
			<div class="row justify-content-center d-flex">
				<div class="col-lg-8 post-list">
					<ul class="cat-list">
						<li><a>Recent</a></li>
						<li><a>Full Time</a></li>
						<li><a>Intern</a></li>
						<li><a>Part Time</a></li>
					</ul>

					<?php  
					  $stmt = $pdo->query('SELECT j.job_role, j.vaccancies, o.org_name, j.job_state, j.job_city, o.org_logo, j.job_desc, j.job_skills, j.job_nature, j.min_salary, j.max_salary FROM job j INNER JOIN organization o ON j.org_id=o.org_id ORDER BY apply_by desc;');
					  $rows = $stmt->fetch();
					  // var_dump($rows);
					  $n = sizeof($rows);
					  $t = gettype($n);
					  $stmt = $pdo->query('SELECT j.job_role, j.vaccancies, o.org_name, j.job_state, j.job_city, o.org_logo, j.job_desc, j.job_skills, j.job_nature, j.min_salary, j.max_salary FROM job j INNER JOIN organization o ON j.org_id=o.org_id ORDER BY apply_by desc;');
					  if ($n > 1) {
					    while($row = $stmt->fetch()){
					    	$abc = explode(",",$row[7]);
					?>

					<div class="single-post d-flex flex-row">
						<div class="thumb">
							<img src="<?php echo $row[5]; ?>" alt="">
							
						</div>
						<div class="details">
							<div class="title d-flex flex-row justify-content-between">
								<div class="titles">
									<a>
										<h4><?php echo $row[0]; ?></h4>
									</a>
									<h6><?php echo $row[2]; ?>, <?php echo $row[4]; ?>, <?php echo $row[3]; ?></h6>
								</div>
								<ul class="btns">
									<li class="apply"><a href="#">Apply</a></li>
								</ul>
							</div>
							<p><?php echo $row[6]; ?></p>
							<div class="row">
								<div class="col-md-4">
								<h5 class="job-type"><?php echo $row[8]; ?></h5>
                </div>
                <div class="col-md-4">
								<h5 class="vacancy"><?php echo $row[1]; ?> Vacancies</h5>
                </div>
                <div class="col-md-4">
								<h5 class="salary"><i class="fas fa-rupee-sign"></i> <?php echo $row[9]; ?>-<?php echo $row[10]; ?></h5>
								</div>
              </div>
								<ul class="tags">
									<?php 
									$i = 0;
									foreach ($abc as $xyz) {
										echo "<li style='margin-right: 10px;'><a>".$abc[$i]."</a></li>";
										$i++;
									}
									?>
								</ul>
						</div>
					</div>
					<?php 
					}} else { echo "string"; }
					?>


					<a class="loadmore-btn mx-auto d-block">Explore more</a>

				</div>
				<div class="col-lg-4 sidebar">
					<div class="single-slidebar">
						<h4>Jobs by Location</h4>
						<ul class="cat-list">
							<li><a class="justify-content-between d-flex">
									<p>Mumbai</p><span>37</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Delhi</p><span>57</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Bangalore</p><span>33</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Jaipur</p><span>36</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Hyderabad</p><span>47</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Ayodhya</p><span>27</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Lucknow</p><span>17</span>
								</a></li>
						</ul>
					</div>
					<div class="single-slidebar">
						<h4>Jobs by Category</h4>
						<ul class="cat-list">
							<li><a class="justify-content-between d-flex">
									<p>Technology</p><span>37</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Media & News</p><span>57</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Goverment</p><span>33</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Medical</p><span>36</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Restaurants</p><span>47</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Developer</p><span>27</span>
								</a></li>
							<li><a class="justify-content-between d-flex">
									<p>Accounting</p><span>17</span>
								</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End post Area -->
  <?php 
    require_once("sidebar.php");
    sidebar($userPicture,$username,'','','','','','',"sidebar-dropdown active-tab",'','','');
  ?>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>