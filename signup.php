<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('database_connection.php');

if(isset($_SESSION['user_id']))
{
  header('location:index.php');
}

if(isset($_SESSION['org_id']))
{
  header('location:index.php');
}
 
if(isset($_POST['user_submit']))

{   
    $count = 0;
    if($_POST['password'] != $_POST['confirmpassword']){
              $_SESSION['error'] = "Passwords doesn't Match";
        }
     
    
    elseif(isset($_POST['fullname'],$_POST['username'],$_POST['mobilenumber'],$_POST['password']) && !empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $fullname = trim($_POST['fullname']);
        $username = trim($_POST['username']);
        $mobilenumber = trim($_POST['mobilenumber']);
        $password= trim($_POST['password']);
        $cpassword = trim($_POST['confirmpassword']);


        $salt = 'XyZzy12*_';
        $hashPassword = crypt($password,$salt);
        $date = date('Y-m-d H:i:s');


        if(filter_var($username, FILTER_VALIDATE_EMAIL))
        {
            $sql = 'select * from user where username = :username';
            $stmt = $pdo->prepare($sql);
            $p = ['username'=>$username];
            $stmt->execute($p);
            
             
            if($stmt->rowCount() == 0)
            {
                $sql = "insert into user (fullname, username, mobilenumber, password ) values(:fullname,:username,:mobilenumber,:password)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':fullname'=>$fullname,
                        ':username'=>$username,
                        ':mobilenumber'=>$mobilenumber,
                        ':password'=>$hashPassword
                    ];
                    
                    $handle->execute($params);

                    $query = "SELECT * FROM user WHERE username = :username";
                    $statement = $pdo->prepare($query);
                    $statement->execute(
                      array(
                        ':username' => $username
                      )
                    );
                    $count = $statement->rowCount();
                    if($count > 0){
                      $result = $statement->fetchAll();
                      foreach($result as $row)
                      {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['status'] = 'User has been created successfully';
                      }
                    }
                    
                    $success = 'User has been created successfully';
                    header("location:initial-form.php");

                }
                catch(PDOException $e){
                    $_SESSION['error'] = $e->getMessage();
                }
            }
            else
            {
                $fullname = $fullname;
                $username = '';
                $password = $password;
 
                $_SESSION['error'] = 'Email address already registered';
            }
        }
        else
        {
            $_SESSION['error'] = "Email address is not valid";
        }
    }
 
}
?>
<?php
require_once('database_connection.php');
if(isset($_POST['org_submit']))
{
    $count = 0;
    if($_POST['org_password'] != $_POST['orgconfirmpassword']){
              $_SESSION['error2'] = "passwords doesn't match";
        }
     
    
    elseif(isset($_POST['org_name'],$_POST['org_username'],$_POST['org_mobilenumber'],$_POST['org_password']) && !empty($_POST['org_name']) && !empty($_POST['org_name']) && !empty($_POST['org_password']))
    {
        $org_name = trim($_POST['org_name']);
        $org_username = trim($_POST['org_username']);
        $org_mobilenumber = trim($_POST['org_mobilenumber']);
        $org_password= trim($_POST['org_password']);
        

        $salt = 'XyZzy12*_';
        $hashPassword = crypt($org_password,$salt);
        $date = date('Y-m-d H:i:s');
       
        if(filter_var($org_username, FILTER_VALIDATE_EMAIL))
    {
            $sql = 'select * from organization where org_username = :org_username';
            $stmt = $pdo->prepare($sql);
            $p = ['org_username'=>$org_username];
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "insert into organization (org_name, org_username, org_mobilenumber, org_password ) values(:org_name, :org_username, :org_mobilenumber, :org_password)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':org_name'=>$org_name,
                        ':org_username'=>$org_username,
                        ':org_mobilenumber'=>$org_mobilenumber,
                        ':org_password'=>$hashPassword

                    ];
                    
                    $handle->execute($params);

                    $query = "select * from organization where org_username = :org_username";
                    $stmt = $pdo->prepare($query);
                    $p = ['org_username'=>$org_username];
                    $stmt->execute($p);
                    $count = $stmt->rowCount();
                    if($count > 0){
                      $result = $stmt->fetchAll();
                      foreach($result as $row)
                      {
                        $_SESSION['org_id'] = $row['org_id'];
                        $_SESSION['org_username'] = $row['org_username'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['status'] = 'Organization has been created successfully';
                      }
                    }
                    
                    $success = 'Organization has been created successfully';
                    
                    header("location:org-initial-form.php");
                    
                    
                }
                catch(PDOException $e){
                    $_SESSION['error2'] = $e->getMessage();
                }
            }
            else
            {
                $org_name = $org_name;
                $org_username = '';
                $org_password = $org_password;
 
                $_SESSION['error2'] = 'Email address already registered';
            }
        }
        else
        {
            $_SESSION['error2'] = "Email address is not valid";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Signup | Pahal</title>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="./assets/css/login.css"/>
   <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form method="POST">
            <h1 style="color:#ff6d2a;">Wanna join our mission?<br><p style="margin: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: medium;">We would love to have you in<span style="font-family: Pacifico; font-size: 20px;"> pahal </span>family</p></h1>
            <?php 
            if(isset($_SESSION['error2']) && $count == 0){
                echo "<div style='color : red'>";
                echo $_SESSION['error2'];
                echo "</div>";
                unset($_SESSION['error2']);
                $count = 1;
            }
            ?>
            <div style="width: 100%;">
                <input type="text" placeholder="Organization name" name="org_name" id="org-name" value="" required onkeyup="org_name_check();"/>
                <i id="on-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <div style="width: 100%;">
                <input type="email" placeholder="Email" name="org_username" id="org-email" required onkeyup="org_email_check();"/>
                <i id="oe-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <div style="width: 100%;">
                <input type="tel" placeholder="Mobile number" pattern="[0-9]{10}" name="org_mobilenumber" id="org-tel" required onkeyup="org_tel_check();"/>
                <i id="ot-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <div style="width: 100%;">
                <input type="password" placeholder="Password" name="org_password" id="org-password" maxlength="20" minlength="8" required onkeyup="org_pass_check();"/>
                <i id="ox-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <div style="width: 100%;">
                <input type="password" placeholder="Confirm password" name="orgconfirmpassword" id="org-re-password" maxlength="20" minlength="8" required onkeyup="org_passwd_check();" />
                <i id="op-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <span><button type="submit" name="org_submit" style="text-decoration:none; color: white;">Register</button></span>
            <p style="
            background-color: rgba(255, 255, 255, 0.651);
            color: #000000;
            padding: 4px;
            border-radius: 30px;
            width: 200%;
            "
            >Already have registered? <a href="login.php" style="color: #ff6d2a; font-weight: 600; font-size: 14px;">Login now!</a></p>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form method="POST">
            <h1 style="color:#ff6d2a;">Wanna join us?<br><p style="margin: 5px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: medium;">We would love to have you in<span style="font-family: Pacifico; font-size: 20px;"> pahal </span>family</p></h1>
            <?php 
            if(isset($_SESSION['error']) && $count==0){
                echo "<div style='color : red'>";
                echo $_SESSION['error'];
                echo "</div>";
                unset($_SESSION['error']);
                $count =1;
            }
            ?>
            <div style="width: 100%;">
                <input type="text" name="fullname" id="fullname" placeholder="Full name" required onkeyup="user_name_check();" />
                <i id="un-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <div style="width: 100%;">
                <input type="email" name="username" id="user-email" placeholder="Email" required onkeyup="user_email_check();"/>
                <i id="ue-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <div style="width: 100%;">
                <input type="tel" placeholder="Mobile number" name="mobilenumber" id="user-tel" pattern="[0-9]{10}" required onkeyup="user_tel_check();"/>
                <i id="ut-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <div style="width: 100%;">
                <input type="password" placeholder="Password" name="password" id="password" maxlength="20" minlength="8" required onkeyup="user_pass_check();"/>
                <i id="ux-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <div style="width: 100%;">
                <input type="password" placeholder="Confirm password" name="confirmpassword" id="re-password" maxlength="20" minlength="8" required onkeyup='user_passwd_check();' />
                <i id="up-message" style="position: absolute; margin: 20px 5px;"></i>
            </div>
            <span><button type="submit" name="user_submit" style="text-decoration:none; color: white;">Register</button></span>
            <p style="
            background-color: rgba(255, 255, 255, 0.651);
            color: #000000;
            padding: 4px;
            border-radius: 30px;
            width: 200%;
            "
            >Already have registered? <a href="login.php" style="color: #ff6d2a; font-weight: 600; font-size: 14px;">Login now!</a></p>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Finding opportunities?</h1>
                <p style="color: white">Register to our platform and explore new opportunities</p>
                <button class="ghost" id="signIn">Register as User</button>
                <button type="submit" class="ghost" id="cancel" style="border: none; margin: 0;"><a class="zoom" href="index.php">Go back to home</a></button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Not a user?</h1>
                <p style="color: white">Click on below button to Register as organization</p>
                <button type="submit" class="ghost" id="signUp">Register as Organization</button>
                <button type="submit" class="ghost" id="cancel" style="border: none; margin: 0;"><a class="zoom" href="index.php">Go back to home</a></button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var user_name_check = function(){
        var name = document.getElementById('fullname').value;
        if ( name == '' || name == null) {
            document.getElementById('un-message').innerHTML = '<div class="dropdown"><img src="assets/img/exclamation-mark.svg" alt="" width="16px"><ul>You cannot leave it empty.</ul></div>';
        } else if ( !/[^a-zA-Z\s]/.test(name) ) {
            document.getElementById('un-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
            var field_icon = 'tick'
        } else {
            document.getElementById('un-message').innerHTML = '<div class="dropdown"><img src="assets/img/cancel.svg" alt="" width="16px"><ul>It should only contain alphabets.</ul></div>';   
        }

    }
    var org_name_check = function(){
        var name = document.getElementById('org-name').value;
        if ( name == '' || name == null) {
            document.getElementById('on-message').innerHTML = '<div class="dropdown"><img src="assets/img/exclamation-mark.svg" alt="" width="16px"><ul>You cannot leave it empty</ul></div>';
        } else if ( !/[^a-zA-Z\s]/.test(name) ) {
            document.getElementById('on-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
        } else {
            document.getElementById('on-message').innerHTML = '<div class="dropdown"><img src="assets/img/cancel.svg" alt="" width="16px"><ul>It should only contain alphabets.</ul></div>'; 
            // should only contain alphabets  
        }

    }
    var user_email_check = function(){
        var name = document.getElementById('user-email').value;
        if ( name == '' || name == null) {
            document.getElementById('ue-message').innerHTML = '<div class="dropdown"><img src="assets/img/exclamation-mark.svg" alt="" width="16px"><ul>You cannot leave it empty</ul></div>';
        } else if ( /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(name) ) {
            document.getElementById('ue-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
        } else {
            document.getElementById('ue-message').innerHTML = '<div class="dropdown"><img src="assets/img/cancel.svg" alt="" width="16px"><ul>Not a valid Email ID</ul></div>';   
        }

    }
    var org_email_check = function(){
        var name = document.getElementById('org-email').value;
        if ( name == '' || name == null) {
            document.getElementById('oe-message').innerHTML = '<div class="dropdown"><img src="assets/img/exclamation-mark.svg" alt="" width="16px"><ul>You cannot leave it empty</ul></div>';
        } else if ( /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(name) ) {
            document.getElementById('oe-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
        } else {
            document.getElementById('oe-message').innerHTML = '<div class="dropdown"><img src="assets/img/cancel.svg" alt="" width="16px"><ul>Not a valid Email ID</ul></div>';   
        }

    }
    var user_tel_check = function(){
        var name = document.getElementById('user-tel').value;
        if ( name == '' || name == null) {
            document.getElementById('ut-message').innerHTML = '<div class="dropdown"><img src="assets/img/exclamation-mark.svg" alt="" width="16px"><ul>You cannot leave it empty</ul></div>';
        } else if ( /^[6789]\d{9}$/.test(name) ) {
            document.getElementById('ut-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
        } else {
            document.getElementById('ut-message').innerHTML = '<div class="dropdown"><img src="assets/img/cancel.svg" alt="" width="16px"><ul>Not a valid Mobile Number</ul></div>';   
        }

    }
    var org_tel_check = function(){
        var name = document.getElementById('org-tel').value;
        if ( name == '' || name == null) {
            document.getElementById('ot-message').innerHTML = '<div class="dropdown"><img src="assets/img/exclamation-mark.svg" alt="" width="16px"><ul>You cannot leave it empty</ul></div>';
        } else if ( /^[6789]\d{9}$/.test(name) ) {
            document.getElementById('ot-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
        } else {
            document.getElementById('ot-message').innerHTML = '<div class="dropdown"><img src="assets/img/cancel.svg" alt="" width="16px"><ul>Not a valid Mobile Number</ul></div>';   
        }

    }
    var user_pass_check = function(){
        var name = document.getElementById('password').value;
        var n = name.length;
        if ( name == '' || name == null) {
            document.getElementById('ux-message').innerHTML = '<div class="dropdown"><img src="assets/img/exclamation-mark.svg" alt="" width="16px"><ul>You cannot leave it empty</ul></div>';
        } else if ( /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/.test(name) ) {
            document.getElementById('ux-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
        } else {
            var string = "<div class='dropdown'><img src='assets/img/exclamation-mark.svg' alt='' width='16px'>\
            <ul>\
            <h5>Password must include:</h5>";
            if (n<8 || n>20) {
                string = string + "<li>8-20 <strong>Characters</strong></li>";
            }
            if (!/[A-Z]/.test(name)) {
                string = string + "<li>At least <strong>one capital letter</strong></li>";
            }
            if (!/[0-9]/.test(name)) {
                string = string + "<li>At least <strong>one number</strong></li>";
            }
            if (/^\s+$/.test(name)) {
                string = string + "<li>No spaces</li>";
            }
            string = string + "</ul>";
            document.getElementById('ux-message').innerHTML = string;
            string = "";
        }

    }
    var org_pass_check = function(){
        var name = document.getElementById('org-password').value;
        var n = name.length;
        if ( name == '' || name == null) {
            document.getElementById('ox-message').innerHTML = '<div class="dropdown"><img src="assets/img/exclamation-mark.svg" alt="" width="16px"><ul>You cannot leave it empty</ul></div>';
        } else if ( /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/.test(name) ) {
            document.getElementById('ox-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
        } else {
            var string = "<div class='dropdown'><img src='assets/img/exclamation-mark.svg' alt='' width='16px'>\
            <ul>\
            <h5>Password must include:</h5>";
            if (n<8 || n>20) {
                string = string + "<li>8-20 <strong>Characters</strong></li>";
            }
            if (!/[A-Z]/.test(name)) {
                string = string + "<li>At least <strong>one capital letter</strong></li>";
            }
            if (!/[0-9]/.test(name)) {
                string = string + "<li>At least <strong>one number</strong></li>";
            }
            if (/^\s+$/.test(name)) {
                string = string + "<li>No spaces</li>";
            }
            string = string + "</ul>";
            document.getElementById('ox-message').innerHTML = string;
            //document.write(string);
            string = "";
        }

    }
    var user_passwd_check = function() {
      if (document.getElementById('password').value == document.getElementById('re-password').value && document.getElementById('re-password').value.length ) {
        document.getElementById('up-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
      } else {
        document.getElementById('up-message').innerHTML = '<div class="dropdown"><img src="assets/img/cancel.svg" alt="" width="16px"><ul>Password is not matching</ul></div>';
      }

    }
    var org_passwd_check = function() {
      //window.alert("sometext");
      if (document.getElementById('org-password').value == document.getElementById('org-re-password').value && document.getElementById('org-re-password').value.length) {
        document.getElementById('op-message').innerHTML = '<img src="assets/img/tick.svg" alt="" width="16px">';
      } else {
        document.getElementById('op-message').innerHTML = '<div class="dropdown"><img src="assets/img/cancel.svg" alt="" width="16px"><ul>Password is not matching</ul></div>';
      }

    }
    
</script>
<script src="./assets/js/login.js"></script>
</body>
</html>