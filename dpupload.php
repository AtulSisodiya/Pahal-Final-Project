<?php
session_start();
include('database_connection.php');
//upload.php
if($_FILES["file"]["name"] != '')
{
	 $uploaddate = date('Y-m-d H:i:s');	
	 $user_id = $_SESSION['user_id'];
	 $image_file = $_FILES["file"]["name"];
	 $type  = $_FILES["file"]["type"]; //file name "txt_file" 
	 $size  = $_FILES["file"]["size"];
	 $temp  = $_FILES["file"]["tmp_name"];
	 $path="upload/".$user_id.'_'.$image_file;
	 move_uploaded_file($temp, "upload/" .$user_id.'_'.$image_file);

	 $sql = "UPDATE user SET uploaddate=:uploaddate, image=:image, image_name=:image_name WHERE user_id=:user_id";
	 $stmt = $pdo->prepare($sql);
	 $stmt->bindParam(':uploaddate',$uploaddate);
	 $stmt->bindParam(':image',$path);
	 $stmt->bindParam(':image_name',$image_file);
	 $stmt->bindParam(':user_id',$user_id);
	 try{
	 	$stmt->execute();
	 	echo "<script>window.alert('Upload Successful');</script>";
	 } catch(PDOException $e)
 {
  echo $e->getMessage();
 }
	 // echo '<img src="'.$path.'" height="150" width="225" class="img-thumbnail" />';
}
?>