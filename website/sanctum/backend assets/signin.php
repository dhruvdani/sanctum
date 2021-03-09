<?php
    //2058 + 1575 + 2205 = 5838 -> 8463 - 10400(fare difference) 11687(fare difference) via delhi
    require('connection.php');
    if(isset($_POST['signin_keep']))
    {
        //to make a cookiee to remember user
    }
    $user=$_POST['signin_user'];
    $password=$_POST['signin_password'];

    if(strtolower(substr($user,strlen($user)-6,6)) == ".admin")
    {
        $query="select * from administrator where ADMIN_NAME ='".$user."' AND ADMIN_PASSWORD = '".$password."';";
        $result=mysqli_query($conn,$query);
        if($result->num_rows > 0)
        {
            //start session and redirect to dashboard
            echo "admin success";
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
            //start session and redirect to dashboard
            echo "client success";
        }
        else
        {
            header('location:../index.php?error_call_back=invalid_input');
        }
    }
    
?>
