<?php
session_start();
include('database_connection.php');
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pahal - A Platform To Empower The Women</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->

  <script type="text/javascript" src="assets\js\popup.js"></script>

  <!-- Contact us ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.php">pahal.in</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="index.php/#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about-boxes">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li><a class="nav-link scrollto" href="user-feed.php">News Feed</a></li>
            <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
            <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li> -->
            <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
            <?php
            if(!isset($_SESSION['user_id']) && !isset($_SESSION['org_id']))
            { 
              echo '<li><a class="getstarted scrollto" href="login.php">Login</a></li>';
              echo '<li class="dropdown"><a class="getstarted scrollto" href="signup.php" style="background-color: orangered; border-color: orangered;">Signup</a></li>';
            }
            if(isset($_SESSION['user_id'])){
              echo '<li class="dropdown"><a class="getstarted scrollto"  style="background-color: #ff6d2a77; color:white;';
              echo 'border-color: orangered;" href="user_profile.php">';
              echo  $username;
              echo '<i class="bi bi-chevron-down"></i></a>';
              echo '<ul><li><a href="user_profile.php">Profile</a></li><li><a href="user-feed.php">News Feed</a></li><li><a href="myblogs.php">My Blogs</a></li><li><a href="applications.php">My Applications</a></li>';
              echo '<li><a href="logout.php">Logout</a></li></ul></li>';
              echo '';
            }
            if(isset($_SESSION['org_id'])){
              echo '<li class="dropdown"><a class="getstarted scrollto"  style="background-color: orangered; color:white;';
              echo 'border-color: orangered;">';
              echo  $username;
              echo '<i class="bi bi-chevron-down"></i></a>';
              echo '<ul><li><a href="org-profile.php">Profile</a></li><li><a href="user-feed.php">News Feed</a></li><li><a href="myblogs.php">My Blogs</a></li><li><a href="job-post.php">Create a Job</a></li><li><a href="org-myjobs.php">Track Jobs</a></li>';
              echo '<li><a href="logout.php">Logout</a></li></ul></li>';
              echo '';
            }
            ?>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up" data-aos-delay="150">
      
        <img src="assets\img\Pahal Logo.png" alt="Pahal", width="300px" style="padding: 10px;">
     
      <!-- <h1>Plan. Launch. Grow.</h1> -->
      <h2>A Platform to Empower The Women</h2>
      <div class="d-flex">
        <a href="#about-boxes" class="btn-get-started scrollto"><b>Get Started</b></a>
        <a href="https://youtu.be/kpaWAo9LGSw" class="glightbox btn-watch-video" style="color: #ff6d2a"><i class="bi bi-play-circle" style="color: #ff6d2a"></i><span><b>Watch Tutorial</b></span></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Boxes Section ======= -->
    <section id="about-boxes" class="about-boxes">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="assets/img/about-boxes-1.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-brush-4-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a>Our Mission</a></h5>
                <p class="card-text">To help every woman break the cycle of suppression and poverty that prevents them from reaching their full potential.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <img src="assets/img/about-boxes-2.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-calendar-check-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a>Our Plan</a></h5>
                <p class="card-text">To provide job opportunities to women as per their capabilities and empower them through a platform where their voices can be heard and will inspire others.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="assets/img/about-boxes-3.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-movie-2-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a>Our Vision</a></h5>
                <p class="card-text">We envision a world where every woman has the strength to speak up for themselves & to earn a living on their own.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Boxes Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Services</h2>
              <p>Check our Services</p>
            </div>
            <?php 
            if(!isset($_SESSION['user_id']) && !isset($_SESSION['org_id'])){
            ?>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <script>
                function openNav1() {
                  document.getElementById("myNav1").style.width = "100%";
                  document.getElementById("job").innerHTML = "\
                  <div style='color: white; justify-content: center; margin:0% 5%;'>\
                  <h2 style='text-align:left;'>Jobs for Women</h2>\
                  <p style='text-align:left;'>We provide job opportunities to underprivileged women who lack resources, support & guidance. Our aim is to provide jobs in accordance with the skills sets possessed by the women so that they can earn a living on their own and get empowered.<br>With this we want to bring a change in our society where every women can stand equal to the men with respect to all aspects and prove themselves to be capable of achieving their dreams.<br>\
                  Steps to get a job :- <ol>\
                  <li style='text-align:left;'>Firstly signup to be a part of Pahal family and to get ample opportunity to fulfill your dreams.</li>\
                  <li style='text-align:left;'>After that complete your profile details and build a resume.</li>\
                  <li style='text-align:left;'>Now on the Jobs section there will be various posts for the requirements of a company so if you are interested then visit that post and check if openings are available , then simply do apply by filling the basics details along with your resume and it's done.</li>\
                  <li style='text-align:left;'>Keep checking the status of your application .If you are selected then the status will be updated accordingly and the organisation will contact you within 1-2 days</li></ol>\
                  </p>\
                  </div>"; 
                }

                function closeNav1() {
                  document.getElementById("myNav1").style.width = "0%";
                }
                function openNav2() {
                  document.getElementById("myNav1").style.width = "100%";
                  document.getElementById("job").innerHTML = "\
                  <div style='color: white; justify-content: center; margin:0% 5%;'>\
                  <h2 style='text-align:left;'>Recruitment for Organizations</h2>\
                  <p style='text-align:left;'>Organizations with varied requirements can join us and recruit their preferred candidates. We provide a one to one communication of the organization and applicants which will enable them to hire the candidates in minimum possible time.<br><br>\
                  Steps for recruitment :- <ol>\
                  <li style='text-align:left;'>Firstly signup to be a part of Pahal family.</li>\
                  <li style='text-align:left;'>After that you can post about the vacancies and skillset required in the post section.</li>\
                  <li style='text-align:left;'>Interested candidates will apply for it and then you can easily recruit the candidates as per your need.</li>\
                  <li style='text-align:left;'>Secondly, we will also provide you with the list of skilled candidates as soon as possible so that you can select the candidates and carry on with your work immediately.</li></ol>\
                  </p>\
                  </div>"; 
                }

                function closeNav2() {
                  document.getElementById("myNav1").style.width = "0%";
                }
                function openNav3() {
                  document.getElementById("myNav1").style.width = "100%";
                  document.getElementById("job").innerHTML = "\
                  <div style='color: white; justify-content: center; margin:0% 5%;'>\
                  <h2 style='text-align:left;'>Blogging</h2>\
                  <p style='text-align:left;'>With this feature, women can write their stories, problems or achievements through blogs and inspire other women to speak their heart out. It will motivate them to take a stand for themselves and to achieve milestones in their life . It also provides a newsfeed where the latest blogs will be showcased.<br>\
                  Steps to write a blog :-<ol>\
                  <li style='text-align:left;'>Firstly signup to be a part of Pahal family and to get ample opportunity to fulfill your dreams.</li>\
                  <li style='text-align:left;'>After that complete your profile details and build a resume.</li>\
                  <li style='text-align:left;'>Now you are all set to write a blog by just clicking on write a blog option.</li>\
                  <li style='text-align:left;'>Give a suitable title to your blog and write any story, event or achievement which can inspire and motivate others also to move ahead in their life with positive attitude to achieve their goals. </li>\
                  <li style='text-align:left;'>You can also share your problem so that others can come up with some solutions to sort it out.</li></ol>\
                  </p>\
                  </div>";
                }

                function closeNav3() {
                  document.getElementById("myNav1").style.width = "0%";
                }
                function openNav4() {
                  document.getElementById("myNav1").style.width = "100%";
                  document.getElementById("job").innerHTML = "\
                  <div style='color: white; justify-content: center; margin:0% 5%;'>\
                  <h2 style='text-align:left;'>Trainings</h2>\
                  <p style='text-align:left;'>We provide trainings to women to make them industry ready. Various trainings will be organized according to the requirements of organizations. Trainings will provide them a chance to gain those skills in which they are lacking and also boost up their self confidence to face challenges.<br>\
                  Steps to be a part of trainings:-<ol>\
                  <li style='text-align:left;'>Firstly signup to be a part of Pahal family and to get ample opportunity to fulfill your dreams.</li>\
                  <li style='text-align:left;'>After that complete your profile details and build a resume.</li>\
                  <li style='text-align:left;'>To be a part of any training program just visit the training section , if any training opportunity is available then do register for it to enhance your skills.</li>\
                  </ol>\
                  </p>\
                  </div>";
                }

                function closeNav4() {
                  document.getElementById("myNav1").style.width = "0%";
                }
                function openNav5() {
                  document.getElementById("myNav1").style.width = "100%";
                  document.getElementById("job").innerHTML = "\
                  <div style='color: white; justify-content: center; margin:0% 5%;'>\
                  <h2 style='text-align:left;'>Direct User-Organisation Commuication</h2>\
                  <p style='text-align:left;'>Instant messaging will keep the users in touch with organization for any doubt assistance. This will bridge the gap between them and will help the organization know better about their candidates. Candidates will also get a chance to interact with the industry experts to pave their path towards the success.<br>\
                  </p>\
                  </div>";
                }

                function closeNav5() {
                  document.getElementById("myNav1").style.width = "0%";
                }
              </script>
              <div class="col-md-6">
                <div id="myNav1" class="overlay">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
                  <div class="overlay-content">
                    <span id="job"></span>
                  </div>
                </div>
                <div class="icon-box " style="cursor:pointer" onclick="openNav1()">
                  <i class="bi bi-briefcase"></i>
                  <h4><a><span >Jobs for Women</span></a></h4>
                  <p>We provide job opportunities to unemployed women to empower them.</p>
                </div>  
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="openNav2()">
                  <i class="bi bi-bar-chart"></i>
                  <h4><a><span>Recruitment for Organizations</span></a></h4>
                  <p>Organizations can recruit the candidates as per their needs.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="openNav3()">
                  <i class="bi bi-blockquote-right"></i>
                  <h4><a><span>Blogging</span></a></h4>
                  <p>Blogging feature to inspire or motivate them for their bright future.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="openNav4()">
                  <i class="bi bi-laptop"></i>
                  <h4><a><span>Trainings</span></a></h4>
                  <p>Provide training to make them industry ready.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="openNav5()">
                  <i class="bi bi-command"></i>
                  <h4><a><span>Direct User-Organisation Commuication</span></a></h4>
                  <p>Instant messaging will keep the users in touch with organization for any doubt assistance.</p>
                </div>
              </div>
            </div>
            <?php 
            }
            ?>
            <?php 
            if(isset($_SESSION['user_id'])){
            ?>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="icon-box" style="cursor:pointer" onclick="location.href='joblist.php'">
                  <i class="bi bi-briefcase"></i>
                  <h4><a>Jobs for women</a></h4>
                  <p>We provide job opportunities to unemployed women to empower them.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="location.href='user-feed.php'">
                  <i class="bi bi-blockquote-right"></i>
                  <h4><a>Blogging</a></h4>
                  <p>Blogging feature to inspire or motivate them for their bright future.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="location.href='training.php'">
                  <i class="bi bi-laptop"></i>
                  <h4><a>Trainings</a></h4>
                  <p>Provide training to make them industry ready.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="location.href='chat.php'">
                  <i class="bi bi-command"></i>
                  <h4><a>Direct User-Organisation Commuication</a></h4>
                  <p>Instant messaging will keep the users in touch with organization for any doubt assistance.</p>
                </div>
              </div>
            </div>
            <?php 
            }
            ?>
            <?php 
            if(isset($_SESSION['org_id'])){
            ?>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="location.href='job-post.php'">
                  <i class="bi bi-bar-chart"></i>
                  <h4><a>Recruitment for organizations</a></h4>
                  <p>Organizations can recruit the candidates as per their needs.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="location.href='user-feed.php'">
                  <i class="bi bi-blockquote-right"></i>
                  <h4><a>Blogging</a></h4>
                  <p>Blogging feature to inspire or motivate them for their bright future.</p>
                </div>
              </div>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box" style="cursor:pointer" onclick="location.href='chat.php'">
                  <i class="bi bi-command"></i>
                  <h4><a>Direct User-Organisation Commuication</a></h4>
                  <p>Instant messaging will keep the users in touch with organization for any doubt assistance.</p>
                </div>
              </div>
            </div>
            <?php 
            }
            ?>


          </div>
        </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://pbs.twimg.com/profile_images/1373353285566959619/0BNYgDUj_400x400.jpg" class="testimonial-img" alt="" width="100px" height="100px">
                <h3>Kiran Bedi</h3>
                <h4>Social Activist</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Empowered women who reach tough or unconventional positions make CHOICES not sacrifices.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://economictimes.indiatimes.com/thumb/height-450,width-600,imgsize-118036,msid-70419588/mary-kom.jpg?from=mdr" class="testimonial-img" alt="" width="100px" height="100px">
                <h3>Mary Kom</h3>
                <h4>Member of Parliament,Rajya Sabha</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Don't let anyone tell you are weak beacuse you are a WOMEN.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://back.3blmedia.com/sites/default/files/styles/ratio_3_2/public/triplepundit/wide/indra-nooyi.jpg" class="testimonial-img" alt="" width="100px" height="100px">
                <h3>Indra Nooyi</h3>
                <h4>PepsiCo CEO</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  An important attribute of success is to be YOUSELF.Never hide what makes you,YOU.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Arundhati_Roy_W.jpg/1200px-Arundhati_Roy_W.jpg" class="testimonial-img" alt="" width="100px" height="100px">
                <h3>Arundhati Roy</h3>
                <h4>Novelist</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  The only dream worth having, I told her, is to dream that you will live while you're alive and die only when you're dead.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

    <div class=" section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box" onclick="location.href='https://goo.gl/maps/XcACv1Xd8uKmabuC9'">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>JECRC Foundation, Jaipur</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>pahal.the.platform@gmail.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+919876543210</p>
              </div>
            </div>
          </div>

        </div>


        <!-- <form action="mailto:pahal.the.platform@gmail.com" method="post" enctype="text/plain" class="site-form">
            <h3 class="mb-5">Get In Touch</h3>
            <div class="form-group">
              <input type="text" name="name" class="form-control px-3 py-4" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="email" name="mail" class="form-control px-3 py-4" placeholder="Your Email">
            </div>
            <div class="form-group mb-5">
              <input class="form-control px-3 py-4"cols="30" rows="10" name="comment" placeholder="Write a Message">
            </div>
            <div class="form-group">
              <input type="submit" value="Send" class="btn btn-primary  px-4 py-3" >
              <input type="reset" value="Reset" class="btn btn-primary  px-4 py-3" >
            </div>
        </form>
 -->

        <div class="col-lg-6 mt-4 mt-lg-0">
          <form name="contactform" id="contactform" method="get" >
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3" style="margin-top: 0rem!important;">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" id="message" rows="7" placeholder="Message" required style="height: auto;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:#ff6d2a; border: none; float: right; width:100px; height:40px;" >SUBMIT</button>
            <div id="statusMessage"> 
            </div>
          </form>
          <div class="result">
          </div>
          <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
          <script>
            $(document).ready(function () {
              $('.btn-primary').click(function (e) {
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                $.ajax
                  ({
                    type: "GET",
                    url: "contactus.php",
                    data: { "name": name, "email": email, "subject": subject, "message": message },
                    success: function (data) {
                      $('.result').html(data);
                      $('#contactform')[0].reset();
                    }
                  });
              });
            });
          </script>
        </div>

      </div>

      </div>
    </section><!-- End Contact Section -->

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
            <form name="subscribe" id="subscribe" method="get">
              <input type="email" id="emails" name="emails" required /><input type="submit" class="btn-subscribe" name="email_subscriber" value="Subscribe">
            </form>
            <div class="result-s">
          	</div>
          	<script>
          	  $(document).ready(function () {
          	    $('.btn-subscribe').click(function (e) {
          	      e.preventDefault();
          	      var email = $('#emails').val();
          	      $.ajax
          	        ({
          	          type: "GET",
          	          url: "subscribe.php",
          	          data: {"email": email},
          	          success: function (data) {
          	            $('.result-s').html(data);
          	            $('#subscribe')[0].reset();
          	          }
          	        });
          	    });
          	  });
          	</script>
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

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php 
  if(isset($_SESSION['status']) and !isset($_SESSION['onetime'])){
    $var = $_SESSION['status'];
    $_SESSION['onetime'] = 'Done';
    echo '<div id="snackbar">';
    echo "$var";
    echo '</div>';
  }
  ?>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
</body>

</html>