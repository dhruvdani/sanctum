<?php

    require('connection.php');
	
	$name="Dhruv Bani";
	//$email="nilay2620@gmail.com1235";
	$contact="9727945621";
	$password="nilay";
	
	$email="nilay2620@gma";
	
	$name=$_POST['client_name'];
	$email=strtolower($_POST['client_email']);
	$contact=$_POST['client_contact'];
	$password=$_POST['client_password'];
	//echo $name;
	$query="SELECT * FROM client where LOWER(CLIENT_EMAIL) = '".$email."';";
    $result=mysqli_query($conn,$query);
	
    if($result->num_rows > 0)
    {
		$data=array(-1);
		echo json_encode($data);
    }
	else
	{
		
		$new_user="insert into client (CLIENT_NAME,CLIENT_EMAIL,CLIENT_CONTACT, CLIENT_PASSWORD, CLIENT_STATUS, CLIENT_PROFILE_PHOTO, CLIENT_SANCTUM_TOKEN, CLIENT_TOTAL_SCORE) 
		VALUES ('$name', '$email', '$contact', '$password', '1', '/client/client_images/sanctum-default.png',0, 0); ";
		mysqli_query($conn,$new_user);
		$query1="SELECT * FROM client where LOWER(CLIENT_EMAIL) = '".$email."';";
		$result1=mysqli_query($conn,$query1);
		$row=mysqli_fetch_array($result1);
		$data=array('1',$row['CLIENT_ID'],$row['CLIENT_NAME']);
		//header('Content-Type: application/json');
		echo json_encode($data);
	}
?>