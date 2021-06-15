<?php
	
	require('connection.php');
	
	$a=strval(-1);
	$b=[0,1,2];
	$c;
	$tid;
	$id=1;
	
	$id=$_POST['client_id'];
	$query="SELECT * FROM result as r,client as c WHERE r.CLIENT_ID=c.CLIENT_ID ORDER BY RESULT_ID DESC,r.POSITION ASC LIMIT 3";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result))
	{
		$tid=$row['TOURNAMENT_ID'];
		if($id==$row['CLIENT_ID'])
		{
			$a=strval($row['POSITION']);
		}
		if($row['POSITION']==1)
		{	
			$b[0]=$row['CLIENT_NAME'];
			$cid[0]=strval($row['CLIENT_ID']);
		}
		if($row['POSITION']==2)
		{
			$b[1]=$row['CLIENT_NAME'];
			$cid[1]=strval($row['CLIENT_ID']);
		}
		if($row['POSITION']==3)
		{
			$b[2]=$row['CLIENT_NAME'];
			$cid[2]=strval($row['CLIENT_ID']);
		}
		
	}
	$d;
	for($i=0;$i<=2;$i++)
	{
		$query1="select *,SUM(SCORE_TOTAL) as s from scoreboard where CLIENT_ID='".$cid[$i]."' && TOURNAMENT_ID='".$tid."' group by TOURNAMENT_ID,CLIENT_ID";//main query
		
		$res1=mysqli_query($conn,$query1);
		if($res1->num_rows > 0)
		{
			while($row1=mysqli_fetch_array($res1))
			{
				$c[]=$row1['s'];
			}
		}
	}
	for($j=0;$j<=2;$j++)
	{
		//echo($a[$j]."    ");
		//echo($b[$j]."    ");
		//echo($c[$j]."    ");
	}	
	//$b=array_reverse($b);
	//$c=array_reverse($c);
	
	$data=array($a,$b,$c);
	header('content-type:application/json');
	echo json_encode($data);
	?>