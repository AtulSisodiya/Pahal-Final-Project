<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  session_start();
  if(!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $content = $_POST["message"];
  }
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->Mailer = "smtp";
  $mail->SMTPDebug  = 1;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "pahal.the.platform@gmail.com";
  $mail->Password   = "Pahal1908";
  $mail->IsHTML(true);
  $mail->AddAddress("pahal.the.platform@gmail.com", "Pahal");
  $mail->SetFrom($email, $name);
  $mail->AddReplyTo("pahal.the.platform@gmail.com", "PAHAL");
  $mail->AddCC("pahal.the.platform@gmail.com", "PaHaL");
  $mail->Subject = $subject;
  $content = $content;
  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    $_SESSION['message'] = "Error while sending Email.";
    var_dump($mail);
  } else {
     $_SESSION['message'] = "Email sent successfully";
  }
  if(!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $content = $_POST["message"];

    $conn = mysqli_connect("localhost", "fred", "zap", "pahal") or die("Connection Error: " . mysqli_error($conn));
    mysqli_query($conn, "INSERT INTO tblcontact (user_name, user_email,subject,content) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $content. "')");
    $insert_id = mysqli_insert_id($conn);

    $toEmail = "pahal.the.platform@gmail.com";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";
    if(mail($toEmail, $subject, $content, $mailHeaders)) {
        $message = "Your contact information is received successfully.";
        $_SESSION['message']=$message;
        $type = "success";
    } else {
        $message = "Try again after some time";
        $_SESSION['message']=$message;
    }
  }
?>
