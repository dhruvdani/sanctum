<?php

    /*function dateCheck($tournament_end_date)
    {
        $date=substr($tournament_end_date,8,2);
	    $month=substr($tournament_end_date,5,2);
	    $year=substr($tournament_end_date,0,4);

        //echo "<br>".date("Y-m-d")." --- ".$date."-".$month."-".$year;

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

    }*/


    function get_results()
    {
       
        require('connection.php');

        $cnt=1;
        $query="select * from tournament order by TOURNAMENT_ID DESC;";

        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
            $start_val=dateCheck($row['TOURNAMENT_START']);
            $end_val=dateCheck($row['TOURNAMENT_END']);
            //echo "<br>".$start_val.":".$end_val."<br>";
            

            if(($start_val==0) || ($end_val==1 && $start_val==-1) || $end_val==0){} // will check for current tournament
            else if($start_val==-1 && $end_val==-1)//will check for finished tournament
            {

                $querry_internal="select * from result r, client c where r.CLIENT_ID = c.CLIENT_ID and r.TOURNAMENT_ID = ".$row['TOURNAMENT_ID']." order by r.POSITION;";
                $internal=mysqli_query($conn,$querry_internal);
                
                echo '
                    <div class="col-md-6 w3-agileits-blog-grid">
                        <div class="col-sm-4 col-xs-3 blog-left">
                            <h4>'.substr($row['TOURNAMENT_END'],5,2).'/'.substr($row['TOURNAMENT_END'],2,2).'</h4>
                        </div>
                        <div class="col-sm-8 col-xs-9 blog-right">
                            <a>'.$row['TOURNAMENT_NAME'].'</a>
                            <p>
                    ';

                while($row_internal=mysqli_fetch_array($internal))
                {
                    echo $row_internal['POSITION'].'.'.$row_internal['CLIENT_NAME'].'<br>';
                }
                echo '</p>
                    </div>
                        <div class="clearfix"> </div>
                    </div>';

                $cnt ++;
            }

            if($cnt > 2)
            {
                break;
            }
        }
        if($cnt==1)
        {
            echo "<center><h1>Sorry! No records found.</h1></center>";
        }
    }


?>