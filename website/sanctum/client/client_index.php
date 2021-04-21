<?php
    $title="Welcome";
	//session_start();
    require('client_header.php'); 
    //$row['ADM_PROFILE_PHOTO']="../images/t3.jpg";
	$query="select CLIENT_SANCTUM_TOKEN from client where CLIENT_ID={$_SESSION['client_id']} ";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	
	$current_tournament=get_tournament_id();
	echo $current_tournament;
	if($current_tournament!=0)
	{
		$query1="select sum(SCORE_TOTAL) from scoreboard where CLIENT_ID={$_SESSION['client_id']} and TOURNAMENT_ID=$current_tournament";
		$result1=mysqli_query($conn,$query1);
		$row1=mysqli_fetch_array($result1);
		$value=$row1[0];
	}
	else
		$value="---";
	
	$query2="select sum(SCORE_TOTAL) from scoreboard where CLIENT_ID={$_SESSION['client_id']} ";
	$result2=mysqli_query($conn,$query2);
	$row2=mysqli_fetch_array($result2);
	
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
        require('../backend assets/connection.php');

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
?>

    <style>
        .f{
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover; 
            background-image: url('../images/client_background.jpg');
            padding-top:15rem ;
        }
        .g{
            border-radius:50%;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
        }
        .out{

            position:relative;
            margin:0 auto;
            width:20rem;
            height:10rem;
        }
        .out .imgg{
            position:relative;
            bottom:0;
        }
        h2{display:block;}
    </style>
     
    <div class='snippet-body' >
    <!-- <h3 class="m-4 "><?php echo $title?></h3> -->

        <div class="row f" ">
            <div class="out g" style="text-align:center">
                <img src="../images/ts1.jpg"  class="imgg">
            </div>
           
        </div>
        <div class="row" style="padding-top:10rem;padding-bottom:0rem;color:black;background-color:transparent;">
            <div class="out" style="text-align:center;height:auto">
                <?php
                echo "<h2>".$_SESSION["client_name"]."</h2>";
                echo "<h5>".$_SESSION["client_email"]."</h5>";
			?>
                <a href="client_editprofile.php" style="background-color:#F6D3B6;color:#30120D" class="btn">Edit</a>
            </div>
           
        <hr class="container" style="border-top: 1px solid lightgrey;">
        
        <div class="row container-fluid mt-3" style="margin-left:0.1rem">
            <div class="col-xl-4 col-md-6 mb-5 ">
                <div class="card shadow h-100 py-3 " style="background-color:rgba(221,89,2,0.2);color:#30120D;">
                    <div class="card-body" style="border:none">
                        <div class="no-gutters justify-content-center text-center">
                            <div class="col-auto" >
                                <h2 class="h2">Bolts</h2>
                            </div><br>
                            <div class="col-auto">
                            <div class="mb-3"><i class="fa fa-bolt text-white" style="font-size:60px;color:orange`" aria-hidden="true"></i></div>
                            <br><div class="h1 mb-e mt-1"><?php echo $row[0]?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-5 ">
                <div class="card shadow h-100 py-3 " style="background-color:rgba(221,89,2,0.2);color:#30120D;">
                    <div class="card-body" style="border:none">
                        <div class="no-gutters justify-content-center text-center">
                            <div class="col-auto" >
                                <h2 class="h2">Current Tournament</h2>
                            </div><br>
                            <div class="col-auto">
                            <div class="mb-3"><i class="fa fa-trophy text-white" style="font-size:60px;color:orange`" aria-hidden="true"></i></div>
                            <br><div class="h1 mb-1 mt-1"><?php echo $value?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-5 ">
                <div class="card shadow h-100 py-3 " style="background-color:rgba(221,89,2,0.2);color:#30120D;">
                    <div class="card-body" style="border:none">
                        <div class="no-gutters justify-content-center text-center">
                            <div class="col-auto" >
                                <h2 class="h2">Total Score</h2>
                            </div><br>
                            <div class="col-auto">
                            <div class="mb-3"><i class="fa fa-star-half text-white" style="font-size:60px;color:orange`" aria-hidden="true"></i></div>
                            <br><div class="h1 mb-1 mt-1"><?php echo $row2[0]?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

<?php
    require_once('../client/client_footer.php');
?>
