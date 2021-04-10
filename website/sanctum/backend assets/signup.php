<?php

    require_once('connection.php');

    if(isset($_POST['signup_email']))
    {
        $cleint_email=$_POST['signup_email'];
        $cleint_email=strtoupper($cleint_email);

        $query="select * from client where CLIENT_EMAIL = '".$cleint_email."';";
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
            VALUES (NULL, '".$_POST['signup_user']."', '".$cleint_email."', '', '".$_POST['signup_password1']."', '1', 'backend assets/images/favicon.ico',0, 0); ";

            mysqli_query($conn,$create_client_account);
            
            //create session and cookie when applicable and redirect to dashboard
            header("location:../index.php?account_created=true");
        }

    }
    else
    {
        header("location:../index.php");
    }

?>