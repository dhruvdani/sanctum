<?php
    
        require_once('connection.php');

        $email=$_POST['client_email'];
        $password=$_POST['client_password'];
        $query="select * from client where CLIENT_EMAIL ='".$email."' AND CLIENT_PASSWORD = '".$password."';";
        $result=mysqli_query($conn,$query);
        if($result->num_rows > 0)
        {
            $row=mysqli_fetch_array($result);
			$profile="default";
			if($row['CLIENT_PROFILE_PHOTO']!="/client/client_images/sanctum-default.png")
			{
					$profile=$row['CLIENT_PROFILE_PHOTO'];
			}
			$data=array("Success",
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
	    	//echo "Login Successful"; 
        }
        else
        {
		$data=array("Invalid\nCredentials");
		echo json_encode($data);
		//echo "Invalid Credentials";
    	}
    
?>