<?php
session_start();
include('database_connection.php');


$conn = mysqli_connect('localhost', 'fred', 'zap' , 'pahal') or die($conn); 
// $conn = mysqli_connect('172.31.1.238:3306', 'root', 'Ashish@5959' , 'pahal') or die($conn);

if(!empty($_GET)){
 $name = $_GET['name'];
 $email = $_GET['email'];
 $subject = $_GET['subject'];
 $message = $_GET['message']; 
 mysqli_query($conn, "insert into tblcontact (user_name, user_email, subject, content) values ('$name', '$email', '$subject', '$message')"); 
 $toEmail = "m27sanjay@gmail.com";
 $mailHeaders = "From: " . $name . "<". $email .">\r\n";
 echo "<link href='assets/css/style.css' rel='stylesheet'>";
 echo "<div class='my-3'><div class='sent-message' style='color: green'>Information Sent Successfully!</div></div>";
}
?>