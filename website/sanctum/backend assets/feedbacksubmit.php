<?php
    
    $name=$_POST['feedback_name'];
    $email=$_POST['feedback_email'];
    $contact=$_POST['feedback_contact'];
    $message=$_POST['feedback_message'];

    if(isset($name) && isset($email)  && isset($message))
    {
        save_feedback_data($name,$email,$message,$contact);
    }
    else
    {
        header('location:../index.php');
    }

    function save_feedback_data($name,$email,$message,$contact="")
    {
        require('connection.php');
        
        $query="insert into feedback (feedback_name,feedback_email,feedback_contact,feedback_message) values('".$name."','".$email."','".$contact."','".$message."')";
        //echo $query;        
        if(mysqli_query($conn,$query))
        {
            header('location:../index.php');
        }
    }
?>