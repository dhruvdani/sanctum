<?php

    require('connection.php');
    $id=$_POST['client_id'];
	//$id=15;
	$tid;
    $query="select * from tournament order by TOURNAMENT_END desc limit 1";
    $result=mysqli_query($conn,$query);
    
	if($result->num_rows > 0)
	{
		while($row=mysqli_fetch_array($result))
		{
			$tid=$row['TOURNAMENT_ID'];
			$t_fees=$row['TOURNAMENT_TOKEN_PRICE'];
			$a=array($row['TOURNAMENT_FIRST_PRIZE'],$row['TOURNAMENT_SECOND_PRIZE'],$row['TOURNAMENT_THIRD_PRIZE']);
			$data=array($row['TOURNAMENT_NAME'],$row['TOURNAMENT_TOKEN_PRICE'],$a,strval($row['TOURNAMENT_START']),strval($row['TOURNAMENT_END']));
		}
	}

	$query1="select * from registration where CLIENT_ID='".$id."' AND TOURNAMENT_ID='".$tid."';";
    $result1=mysqli_query($conn,$query1);
	if($result1->num_rows > 0)
	{
		$status=true;
	}
	else
		$status=false;
		
	$data[]=$status;
	$data[]=$tid;
	$data[]=$t_fees;
    
    header('content-type:application/json');
    echo json_encode($data);
?>

  
