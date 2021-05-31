<?php
function sidebar($userPicture,$username,$profile,$newsfeed,$writeblog,$myblogs,$training,$chat,$joblist,$application,$jobpost,$myjobs){
?>

<div class="s-layout">
  <div class="s-layout__sidebar">
    <a class="s-sidebar__trigger" href="#0">
      <i class="fa fa-bars"></i>
    </a>

    <nav class="s-sidebar__nav" id="sidebar">
      <?php
        if(isset($_SESSION['user_id'])){
      ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
                  $(document).ready(function(){
                   $(document).on('change', '#file', function(){
                    var name = document.getElementById("file").files[0].name;
                    var form_data = new FormData();
                    var ext = name.split('.').pop().toLowerCase();
                    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                    {
                     alert("Invalid Image File");
                    }
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("file").files[0]);
                    var f = document.getElementById("file").files[0];
                    var fsize = f.size||f.fileSize;
                    if(fsize > 2000000)
                    {
                     alert("Image File Size is very big");
                    }
                    else
                    {
                     form_data.append("file", document.getElementById('file').files[0]);
                     $.ajax({
                      url:"dpupload.php",
                      method:"POST",
                      data: form_data,
                      contentType: false,
                      cache: false,
                      processData: false,
                      beforeSend:function(){
                       $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                      },   
                      success:function(data)
                      {
                       $('#uploaded_image').html(data);
                      }
                     });
                    }
                   });
                  });
        </script>
        <div>           
          <ul>
            <li class="user">
              <a class="user-dp s-sidebar__nav-link"><i class="circle" id="circlediv" style="background-image: url(<?php echo $userPicture; ?>); ">
              <div class="p-image">
                <i class="fa fa-camera fa-2x upload-button" style="color: orangered"></i>
                <input class="file-upload" name="file" id="file" type="file" accept="image/*" />
              </div>
              </i>
              <em><?php echo $username; ?></em></a>
            </li>
            <br><hr>
            <li class="<?php echo $profile; ?>">
              <a href="user_profile.php" class="menu-label s-sidebar__nav-link"><i class="fa fa-user"></i><em>Profile</em></a>
            </li>
            <li class="<?php echo $newsfeed; ?>">
              <a href="user-feed.php" class="menu-label s-sidebar__nav-link"><i class="far fa-newspaper"></i><em>News Feed</em></a>
            </li>
            <li class="<?php echo $writeblog; ?>">
              <a href="writeBlog.php" class="menu-label s-sidebar__nav-link"><i class="fa fa-file-alt"></i><em>Write a blog</em></a>
            </li>
            <li class="<?php echo $myblogs; ?>">
              <a href="myblogs.php" class="menu-label s-sidebar__nav-link"><i class="fa fa-th-large"></i><em>My Blogs</em></a>
            </li>
            <li class="<?php echo $training; ?>">
              <a href="training.php" class="menu-label s-sidebar__nav-link"><i class="fas fa-graduation-cap"></i><em>Training</em></a>
            </li>
            <li class="<?php echo $chat; ?>">
              <a href="chat.php" class="menu-label s-sidebar__nav-link"><i class="fas fa-comments"></i><em>Inbox</em></a>
            </li>
            <li class="<?php echo $joblist; ?>">
              <a href="joblist.php" class="menu-label s-sidebar__nav-link"><i class="fas fa-briefcase"></i><em>Explore Jobs</em></a>
            </li>
            <li class="<?php echo $application; ?>">
              <a href="applications.php" class="menu-label s-sidebar__nav-link"><i class="fas fa-chart-line"></i><em>Application Tracking</em></a>
            </li>
            <li>
              <a href="index.php" class="menu-label s-sidebar__nav-link"><i class="fas fa-home"></i><em>Back to Home</em></a>
            </li>
            <li>
              <a href="index.php#contact" class="menu-label s-sidebar__nav-link"><i class="fas fa-headphones"></i><em>Feedback</em></a>
            </li>
            <li><a href="logout.php" class="menu-label s-sidebar__nav-link"><i class="fa fa-power-off"></i><em>Logout</em></a></li>
          <br></ul>
        </div>
        <hr id="footer-hr">
        <div class="sidebar-footer">
          <center>
            <div class="copyright">
              <strong><span>pahal.in&copy; </span></strong>2021<br>
              Designed by <a>Code Smashers</a><br>
            </div>
          </center>
        </div>

        <?php
          } elseif(isset($_SESSION['org_id'])){
        ?>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script>
                    $(document).ready(function(){
                     $(document).on('change', '#file', function(){
                      var name = document.getElementById("file").files[0].name;
                      var form_data = new FormData();
                      var ext = name.split('.').pop().toLowerCase();
                      if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
                      {
                       alert("Invalid Image File");
                      }
                      var oFReader = new FileReader();
                      oFReader.readAsDataURL(document.getElementById("file").files[0]);
                      var f = document.getElementById("file").files[0];
                      var fsize = f.size||f.fileSize;
                      if(fsize > 2000000)
                      {
                       alert("Image File Size is very big");
                      }
                      else
                      {
                       form_data.append("file", document.getElementById('file').files[0]);
                       $.ajax({
                        url:"dpupload.php",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend:function(){
                         $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                        },   
                        success:function(data)
                        {
                         $('#uploaded_image').html(data);
                        }
                       });
                      }
                     });
                    });
          </script>
          <div>           
            <ul>
              <li class="user">
                <a class="user-dp s-sidebar__nav-link"><i class="circle" id="circlediv" style="background-image: url('<?php echo $userPicture; ?>'); ">
                <div class="p-image">
                  <i class="fa fa-camera fa-2x upload-button" style="color: orangered"></i>
                  <input class="file-upload" name="file" id="file" type="file" accept="image/*" />
                </div>
                </i>
                <em class="header_username"> <?php echo $username; ?></em></a>
              </li>
              <br><hr>
              <li class="<?php echo $profile; ?>">
                <a href="org-profile.php" class="menu-label s-sidebar__nav-link"><i class="fa fa-user"></i><em>Profile</em></a>
              </li>
              <li class="<?php echo $newsfeed; ?>">
                <a href="user-feed.php" class="menu-label s-sidebar__nav-link"><i class="far fa-newspaper"></i><em>News Feed</em></a>
              </li>
              <li class="<?php echo $writeblog; ?>">
                <a href="writeBlog.php" class="menu-label s-sidebar__nav-link"><i class="fa fa-file-alt"></i><em>Write a blog</em></a>
              </li>
              <li class="<?php echo $myblogs; ?>">
                <a href="myblogs.php" class="menu-label s-sidebar__nav-link"><i class="fa fa-th-large"></i><em>My Blogs</em></a>
              </li>
              <li class="<?php echo $chat; ?>">
                <a href="chat.php" class="menu-label s-sidebar__nav-link"><i class="fas fa-comments"></i><em>Inbox</em></a>
              </li>
              <li class="<?php echo $jobpost; ?>">
                <a href="job-post.php" class="menu-label s-sidebar__nav-link"><i class="far fa-plus-square"></i><em>Create a Job</em></a>
              </li>
              <li class="<?php echo $myjobs; ?>">
                <a href="org-myjobs.php" class="menu-label s-sidebar__nav-link"><i class="fas fa-chart-line"></i><em>Track Jobs</em></a>
              </li>
              <li>
                <a href="index.php" class="menu-label s-sidebar__nav-link"><i class="fas fa-home"></i><em>Back to Home</em></a>
              </li>
              <li>
                <a href="index.php#contact" class="menu-label s-sidebar__nav-link"><i class="fas fa-headphones"></i><em>Feedback</em></a>
              </li>
              <li><a href="logout.php" class="menu-label s-sidebar__nav-link"><i class="fa fa-power-off"></i><em>Logout</em></a></li>
            <br></ul>
          </div>
          <hr id="footer-hr">
          <div class="sidebar-footer">
            <center>
              <div class="copyright">
                <strong><span>pahal.in&copy; </span></strong>2021<br>
                Designed by <a>Code Smashers</a><br>
              </div>
            </center>
          </div>

      <?php 
        } else {
      ?>
        <div class="sidebar-no-user">
          <img src="assets/img/Pahal Logo white.png" alt="">
          <center><p>A Platform to Empower The Women</p></center>
          <div class="ask">
            <div class="ask-login">
              <a href="login.php">Log In</a>
            </div>
            <div class="ask-signup">
              <a href="signup.php">Sign Up</a>
            </div>
          </div>
            <div class="sidebar-footer">
              <center>
                <div class="copyright">
                  <strong><span>pahal.in&copy; </span></strong>2021<br>
                  Designed by <a>Code Smashers</a><br>
                </div>
              </center>
            </div>
        </div>
        <?php
      }
      ?>
    </nav>
  </div>
</div>
	
<?php
}
?>