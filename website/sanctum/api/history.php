<?php
				
		require('connection.php');
	
		$id=$_POST['client_id'];
		//$id=1;
		//$a=["false"];$b=["true"];$c=["true"];
		$query="SELECT * from tournament order by TOURNAMENT_END desc";
		$res=mysqli_query($conn,$query);
		//$f=0;
		$a=$b=$c=[];
		$row=mysqli_fetch_array($res);
		$row=mysqli_fetch_array($res);
		
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
			
			if($res2->num_rows>0)
			{
				$row2=mysqli_fetch_array($res2);
				if($row!=null)
				{
					$c[]=$row2['POSITION'];//." : ".$row2['TOURNAMENT_ID'];
				}
				else
				{
					$c[]="-1";
				}
			}
			else
			{
				$row2=mysqli_fetch_array($res2);
				//$c[]="-1 : ".$row2['TOURNAMENT_ID'];
				$c[]="-1";
			}
		}
	$diff=count($c)-count($a);
	
	for($i=0;$i<$diff;$i++)
	{
		array_shift($c);
	}
	$ac=count($a);
	$bc=count($b);
	$cc=count($c);
	if($ac==0 || $bc==0 || $cc==0)
	{
		$data=array(["false"],["false"],["false"]);
	}
	else
	{
		$data=array($c,$a,$b);
	}
	header('content-type: application/json');
	echo json_encode($data);
?>