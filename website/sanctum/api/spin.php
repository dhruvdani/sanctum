<?php

    require('connection.php');
    $id=$_POST['client_id'];
    $spin_bolt=$_POST['oldbolt'];

    $query="select * from client where CLIENT_ID ='".$id."';";
    $result=mysqli_query($conn,$query);
   	
	$row=mysqli_fetch_array($result);

   
    $update_token=$row['CLIENT_SANCTUM_TOKEN']+$spin_bolt;   

    $query="UPDATE client set CLIENT_SANCTUM_TOKEN= '$update_token' WHERE CLIENT_ID = $id;";
    mysqli_query($conn,$query);
    
    echo json_encode("Spin bolt updated");
?>

  
