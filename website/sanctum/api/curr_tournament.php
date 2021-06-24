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
			//$a=$b=[];
			if($current_tournament_id==0)
			{
				//echo $current_tournament_id;
				$data=array("","","","false");
				header('content-type:application/json');
				echo json_encode($data);
			}
			else
			{
				$id=$_POST['client_id'];
				//$id=23;
				$a=[];$b=[];
				$rank=-1;
				$flag=0;
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
					
					if($c<=10){
						$a[]=$row['CLIENT_NAME'];
						$b[]=$row['SCORE_TOTAL'];
					}
					if($id==$row['CLIENT_ID'])
					{
						$flag=1;
						$rank=$c;
					}
					if($flag==1 && $c>10)
						break;
					//echo $row["CLIENT_ID"]."  ";
					//echo $row["CLIENT_NAME"]."  ";
					//echo $row["SCORE_TOTAL"]."  ";
					//echo json_encode($data);
					$c++;
				}				
				
				$data=array($rank,$a,$b,"true");
				header('content-type:application/json');
				echo json_encode($data);
							//$data=array(array($row['CLIENT_NAME']),array($row['SCORE_TOTAL']),$c);
			}
			
?>