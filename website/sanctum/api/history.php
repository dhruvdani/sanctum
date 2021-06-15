<?php
				
		require('connection.php');
	
		$id=$_POST['client_id'];
		//$id=4;
		$a=["false"];$b=["false"];$c=["false"]	;
		$query="SELECT * from tournament order by TOURNAMENT_END desc";
		$res=mysqli_query($conn,$query);
		while($row=mysqli_fetch_array($res)){
			$tname=$row[1];
			$tid=$row[0];
	
	
			$query1="select *,SUM(SCORE_TOTAL) as s from scoreboard where CLIENT_ID=$id && TOURNAMENT_ID=$tid group by TOURNAMENT_ID,CLIENT_ID";//main query
			$res1=mysqli_query($conn,$query1);
			if($res1->num_rows > 0)
			{
				//$a[]=$tname;
				while($row1=mysqli_fetch_array($res1))
				{
					$a[]=$tname;
					$b[]=$row1['s'];
				}
			}
			$query2="select * from result where TOURNAMENT_ID='".$tid."' && CLIENT_ID=$id";
			$res2=mysqli_query($conn,$query2);
			while(($row2=mysqli_fetch_array($res2)))
			{
				$c[]=$row2['POSITION'];
			}
		}
	$data=array($c,$a,$b);
	echo json_encode($data);
?>