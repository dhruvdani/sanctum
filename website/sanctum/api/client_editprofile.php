<?php

    require('connection.php'); 
	$client_id=1;
	$id=$_POST['client_id'];
    $name=$_POST['client_name'];
	$email=strtolower($_POST['client_email']);
	$contact=$_POST['client_contact'];
	$password=$_POST['client_password'];
	
    echo $name; 
    $query="UPDATE client set CLIENT_NAME= '$name', 
    CLIENT_EMAIL = '$email', CLIENT_CONTACT = '$contact', CLIENT_PASSWORD = '$password' WHERE CLIENT_ID = $id;";
	mysqli_query($conn,$query);
     
?>

  
