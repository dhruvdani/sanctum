<?php
    //2058 + 1575 + 2205 = 5838 -> 8463 - 10400(fare difference) 11687(fare difference) via delhi
    
	require_once('connection.php');
    if(isset($_POST['signin_keep']))
    {
        //to make a cookiee to remember user
    }
    $user=$_POST['signin_user'];
    $password=$_POST['signin_password'];

    if(strtolower(substr($user,strlen($user)-6,6)) == ".admin")
    {
        $query="select * from administrator where ADMIN_USERNAME ='".$user."' AND ADMIN_PASSWORD = '".$password."';";
        $result=mysqli_query($conn,$query);
        if($result->num_rows > 0)
        {
            //start session and redirect to dashboard

            $row=mysqli_fetch_array($result);
            
            session_start();
            $_SESSION['admin_name']=$row['ADMIN_NAME'];
            $_SESSION['admin_email']=$row['ADMIN_EMAIL'];
            $_SESSION['admin_profile_photo']=$row['ADMIN_PROFILE_PHOTO'];
            $_SESSION['admin_id']=$row['ADMIN_ID'];
            
            header('location:/admin/index.php');
        }
        else
        {
            header('location:../index.php?error_call_back=invalid_input');
        }
    }
    else
    {
        $query="select * from client where CLIENT_EMAIL ='".$user."' AND CLIENT_PASSWORD = '".$password."';";
        $result=mysqli_query($conn,$query);
        if($result->num_rows > 0)
        {
			$row=mysqli_fetch_array($result);
            //start session and redirect to dashboard
	    session_start();
            $_SESSION['client_name']=$row['CLIENT_NAME'];
            $_SESSION['client_email']=$row['CLIENT_EMAIL'];
            $_SESSION['client_profile_photo']="'".$row['CLIENT_PROFILE_PHOTO']."'";
            $_SESSION['client_id']=$row['CLIENT_ID'];
			$_SESSION['client_contact']=$row['CLIENT_CONTACT'];
            echo "client success";
	    header('location:../client/client_index.php');
        }
        else
        {
            header('location:/index.php?error_call_back=invalid_input');
        }
    }
?>