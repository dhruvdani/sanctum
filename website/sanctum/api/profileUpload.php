<?php
    
    require_once('connection.php');
	
	$image=$_POST['image'];
	$name=$_POST['name'];
	$id=$_POST['client_id'];
	$ext=$_POST['ext'];
    $img=base64_decode($image);
	$name=strval($id)."profile.".$ext;
	file_put_contents('..\sanctum\client\client_images\\'.$name,$img);
	$path="/client/client_images/$name";
	$query="update client set CLIENT_PROFILE_PHOTO='$path' where CLIENT_ID='$id';";
	mysqli_query($conn,$query);
	echo "Profile Photo Uploaded.";
?>