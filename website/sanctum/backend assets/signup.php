<?php

    require_once('connection.php');

    if(isset($_POST['signup_email']))
    {
        $cleint_email=$_POST['signup_email'];
        $cleint_email=strtolower($cleint_email);

        $query="SELECT * FROM client where LOWER(CLIENT_EMAIL) = '".$cleint_email."';";
        $result=mysqli_query($conn,$query);
        echo "<pre>";
        if($result->num_rows > 0)
        {
            header("location:../index.php?error_call_back=email_exist");
        }
        else
        {
            $create_client_account="insert into client 
            (CLIENT_ID, CLIENT_NAME,CLIENT_EMAIL,CLIENT_CONTACT, CLIENT_PASSWORD, CLIENT_STATUS, CLIENT_PROFILE_PHOTO, CLIENT_SANCTUM_TOKEN, CLIENT_TOTAL_SCORE) 
            VALUES (NULL, '".$_POST['signup_user']."', '".$cleint_email."', '', '".$_POST['signup_password1']."', '1', '/client/client_images/sanctum-default.png',0, 0); ";
            mysqli_query($conn,$create_client_account);
			$query="SELECT * FROM client where LOWER(CLIENT_EMAIL) = '".$cleint_email."';";
            $result=mysqli_query($conn,$query);
	        $row=mysqli_fetch_array($result);
            //start session and redirect to dashboard
	        session_start();
            $_SESSION['client_name']=$row['CLIENT_NAME'];
            $_SESSION['client_email']=$row['CLIENT_EMAIL'];
            $_SESSION['client_profile_photo']="'".$row['CLIENT_PROFILE_PHOTO']."'";
            $_SESSION['client_id']=$row['CLIENT_ID'];
			$_SESSION['client_contact']=$row['CLIENT_CONTACT'];
            //create session and cookie when applicable and redirect to dashboard
            header("location:../client/client_index.php?account_created=true");
        }

    }
    else
    {
        header("location:../index.php");
    }

?>