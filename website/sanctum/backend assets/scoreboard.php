    <?php 
    
    //get_scoreboard_data();

    //return 1 for future date
    //return 0 for current date
    //return -1 for past date
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

    //get_scoreboard_data();

    function get_tournament_id()
    {
        
        require_once('../backend assets/connection.php');

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


    //FIRST LOGOGIC
    function get_scoreboard_data()
    {
        
        require_once('../backend assets/connection.php');

        $tournament_id=get_tournament_id();

        if($tournament_id>0)
        {
            //opening the table i.e. data grid
            $tournament_details=mysqli_fetch_array(mysqli_query($conn,"select * from tournament where TOURNAMENT_ID = ".$tournament_id.";"));
            $day=substr($tournament_details["TOURNAMENT_END"],8,2);
            $month=substr($tournament_details["TOURNAMENT_END"],5,2);
            $year=substr($tournament_details["TOURNAMENT_END"],0,4);
            
            echo '<main>
            <div class="container-fluid">
                
                <div class="card mb-4">
                        
                    <div class="card-body">
                    <center><h2><b>'.$tournament_details["TOURNAMENT_NAME"].'</b></h2>
                        Ends on: '.$day.'-'.$month.'-'.$year.'
                    </center><hr>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>PROFILE</th>
                                            <th>NAME</th>
                                            <th>RANK</th>
                                            <th>SCORE</th>
                                            <th>TOTAL SCORE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>PROFILE</th>
                                            <th>NAME</th>
                                            <th>RANK</th>
                                            <th>SCORE</th>
                                            <th>TOTAL SCORE</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>';

            $query="select c.CLIENT_PROFILE_PHOTO,s.CLIENT_ID,c.CLIENT_NAME,s.TOURNAMENT_ID,sum(s.SCORE_TOTAL)as 'SCORE_TOTAL',c.CLIENT_TOTAL_SCORE from scoreboard as s,
                        client as c,tournament as t
                        where 
                        s.CLIENT_ID = c.CLIENT_ID 
                        AND s.TOURNAMENT_ID = t.TOURNAMENT_ID 
                        AND s.TOURNAMENT_ID = ".(int)$tournament_id." group by s.CLIENT_ID order by SCORE_TOTAL DESC;";


            $result=mysqli_query($conn,$query);
            $rank=1;
            while($row=mysqli_fetch_array($result))
            {
                echo '
                    <tr>
                    <td><center><img style='."height:20%;width:20%;".' src="'.$row["CLIENT_PROFILE_PHOTO"].'" ></center></td>
                    <td>'.$row["CLIENT_NAME"].'</td>
                    <td>'.$rank.'</td>
                    <td>'.$row["SCORE_TOTAL"].'</td>
                    <td>'.$row["CLIENT_TOTAL_SCORE"].'</td>
                    </tr>
                ';
                $rank++;
                //print_r($row);
            }

            //closing the table i.e. data grid
            echo   '</tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </main>';
        }
        else
        {
            echo '<main>
            <div class="container-fluid">
                
                <div class="card mb-4">
                        
                    <div class="card-body">
                      <h1><center>No tournament currently active.</center></h1>
                    </div>
                </div>
            </div>';
        }
    }

?>