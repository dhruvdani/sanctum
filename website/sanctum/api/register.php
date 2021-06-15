<?php

    require('connection.php');
	
    $id=$_POST['client_id'];
	$tid=$_POST['tournament_id'];
	$fees=$_POST['registration_fees'];
	
	//$id=1;
	//$tid=1;
	//$fees=10;
	
    $query="select * from client where CLIENT_ID='$id'";
    $result=mysqli_query($conn,$query);
    
	if($result->num_rows > 0)
	{
		while($row=mysqli_fetch_array($result))
		{
			$client_money=$row['CLIENT_SANCTUM_TOKEN'];
		}
	}
	
	$client_money=$client_money-$fees;
	
	if($client_money>=0)
	{
		$query="UPDATE client set CLIENT_SANCTUM_TOKEN= '$client_money' WHERE CLIENT_ID = '$id';";
		mysqli_query($conn,$query);
		$data[]="true";
		
		$insert= "insert into registration (CLIENT_ID,TOURNAMENT_ID,REGISTRATION_DATE) 
		VALUES ('$id', '$tid', curdate()); ";
		mysqli_query($conn,$insert);
	}
	else
		$data[]="false";
		

    
    //header('content-type:application/json');
    echo json_encode($data);
?>

  
