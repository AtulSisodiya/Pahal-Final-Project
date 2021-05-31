<?php
session_start();
include('database_connection.php');


$conn = mysqli_connect('localhost', 'fred', 'zap' , 'pahal') or die($conn); 
// $conn = mysqli_connect('172.31.1.238:3306', 'root', 'Ashish@5959' , 'pahal') or die($conn);

if(!empty($_GET)){
 $email = $_GET['email'];
 $sql = 'select * from subscribe where email = :email';
 $stmt = $pdo->prepare($sql);
 $p = ['email'=>$email];
 $stmt->execute($p);
 
 if($stmt->rowCount() == 0)
 {
 	mysqli_query($conn, "insert into subscribe (email) values ('$email')");
 	echo "Subscription Successful!";
 } else {
 	echo "Already Subscribed";
 }
 
} else {
	echo "Already Subscribed";
}
?>