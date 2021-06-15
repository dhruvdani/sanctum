
<?php

    require('connection.php'); 
	
	$id=$_POST['client_id'];
    $bolt=$_POST['challange_bolt'];
	
	
	$query="select * from client where CLIENT_ID = ".$id.";";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
	
    $new_score=$row['CLIENT_SANCTUM_TOKEN']+$bolt;
	
    $query="UPDATE client set CLIENT_SANCTUM_TOKEN= '$new_score' WHERE CLIENT_ID = $id;";
	mysqli_query($conn,$query);
	
    echo json_encode("challenge bolt updated");
     
?>

  
