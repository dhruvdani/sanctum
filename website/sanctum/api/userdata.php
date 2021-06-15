<?php

    require('connection.php'); 
	
	$id=$_POST['client_id'];
	//$id=1;

	header('Content-Type: application/json');
	$query="select * from client where CLIENT_ID =".$id.";";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
		//http://localhost/sanctum/client/client_images/sanctum-default.png
		$profile="default";
		if($row['CLIENT_PROFILE_PHOTO']!="/client/client_images/sanctum-default.png")
		{
				$profile=$row['CLIENT_PROFILE_PHOTO'];
		}
	    $data=array(
	    strval($row['CLIENT_ID']),
	    $row['CLIENT_NAME'],
	    $row['CLIENT_EMAIL'],
	    strval($row['CLIENT_CONTACT']),
   	    $row['CLIENT_PASSWORD'],
   	    strval($row['CLIENT_STATUS']),
	    strval($row['CLIENT_PROFILE_PHOTO']),
	    $row['CLIENT_EMAIL'],
	    strval($row['CLIENT_SANCTUM_TOKEN']),
	    strval($row['CLIENT_TOTAL_SCORE']),
		$profile);

	echo json_encode($data);
     
?>

  
