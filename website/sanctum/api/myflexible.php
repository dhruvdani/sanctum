<?php
				
	require('connection.php');
	function dateCheck($tournament_end_date)
    {
        $date=substr($tournament_end_date,8,2);
	    $month=substr($tournament_end_date,5,2);
	    $year=substr($tournament_end_date,0,4);

        //echo date("Y-m-d")." --- ".$date."-".$month."-".$year;

        $today=getdate();
        $today_date=$today['mday'];
		$today_month=date('m',strtotime($today['month']));
		$today_year=$today['year'];
		
		if($year>$today_year)
		{
			//$error_date="It is a Future Date.";
            return 1;
		}
		else if($year<$today_year)
		{
			//$error_date="It is a Past Date.";
            return -1;
		}
		else
		{
			if($month>$today_month)
			{
				//$error_date="It is a Future Date.";
                return 1;
			}
			else if($month<$today_month)
			{
				//$error_date="It is a Past Date.";
                return -1;
			}
			else
			{
				if($date>$today_date)
				{
					//$error_date="It is a Future Date.";
                    return 1;
				}
				else if($date<$today_date)
				{
					//$error_date="It is a Past Date.";
                    return -1;
				}
				else
				{
					//$error_date="It is Present date.";
                    return 0;
				}
			}
		}
        //echo "<br><h1>".$error_date."</h1>";

    }

    function get_tournament_id()
    {
		
		require('connection.php');
        $query="select * from tournament order by TOURNAMENT_ID DESC;";

        $result=mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            $start_val=dateCheck($row['TOURNAMENT_START']);
            $end_val=dateCheck($row['TOURNAMENT_END']);

            if(($start_val==0) || ($end_val==1 && $start_val==-1) || $end_val==0)
            {
                return (int)$row['TOURNAMENT_ID'];
            }
        }
        return 0;
    }
			$current_tournament_id=get_tournament_id();
			$id=$_POST['client_id'];
			//$id=1;
			$rank="--";
			$current_tournament_name="No Active Tournament";
			
			$query="select s.CLIENT_ID,c.CLIENT_NAME,s.TOURNAMENT_ID,sum(s.SCORE_TOTAL)as 'SCORE_TOTAL',c.CLIENT_TOTAL_SCORE from scoreboard as s,
            client as c,tournament as t
            where 
            s.CLIENT_ID = c.CLIENT_ID 
            AND s.TOURNAMENT_ID = t.TOURNAMENT_ID 
            AND s.TOURNAMENT_ID = ".$current_tournament_id." group by s.CLIENT_ID order by SCORE_TOTAL DESC;";
			$result=mysqli_query($conn,$query);
			
			$c=1;
            while($row=mysqli_fetch_array($result))
            {
				if($id==$row['CLIENT_ID'])
					$rank=$c;
				//echo json_encode($data);
				$c++;
            }		
			
			$query="select * from tournament where TOURNAMENT_ID =  ".$current_tournament_id.";";
			$result=mysqli_query($conn,$query);
			if($result->num_rows > 0)
			{
				$row=mysqli_fetch_array($result);
				$current_tournament_name=$row[1];
			}
			
			$query="SELECT *,sum(SCORE_TOTAL)as total from scoreboard where TOURNAMENT_ID='$current_tournament_id' && CLIENT_ID='$id' group by TOURNAMENT_ID";
			
			$result=mysqli_query($conn,$query);
			if($result->num_rows > 0)
			{
				$row=mysqli_fetch_array($result);
				
			}
			
			$data=array($current_tournament_name,strval($rank),$row['total']);
			//$data=array(array($row['CLIENT_NAME']),array($row['SCORE_TOTAL']),$c);
			//header('content-type:application/json');
			echo json_encode($data);
?>