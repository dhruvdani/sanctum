<?php
    $title="Scoreboard";
    require_once('client_header.php');
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
	$current_tournament_id=get_tournament_id();
   
?>

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Page Wrapper -->
    <div id="wrapper" ">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:transparent" >

            <!-- Main Content -->
            <div id="content">
            <br>
                <div class="container-fluid" >
                <style>
                    .table-hover tbody tr:hover td,
                    .table-hover tbody tr:hover th {
                        font-weight :700 ; 
                        background-color: rgba(0, 0, 0, 0.32);
                        color:white;
                    }   
                    .pagination > li > a
                    {
                        background-color: white;
                        color:#261903;
                    }
                    .pagination > li > a:focus,
                    .pagination > li > a:hover,
                    .pagination > li > span:focus,
                    .pagination > li > span:hover
                    {
                        color: #FFBB02;
                        background-color: #eee;
                        border-color:NONE;
                    }

                    .pagination > .active > a
                    {
                        color: white;
                        background-color: #FFBB02 !Important;
                        border: solid 1px #FFBB02 !Important;
                    }

                    .pagination > .active > a:hover
                    {
                        background-color: #FFBB02 !Important;
                        border: solid 1px #FFBB02;
                    }
                    .dataTables_filter {
                        display: none;
                    }
                </style>

                <div class="card  mb-4" style="color:#261903;border:none;background-color:#6e9673">
                        <div class="card-body ">
                        
                            <div class="table-responsive">
                            <div class="dropdown">
                                    <button class="btn btn-warning dropdown-toggle" style="float:right;background-color:#ffbb02;border:none;text-align:left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo (isset($_GET['a']))? $_GET['a'] :"Select Tournament"; ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href=client_tournament.php?a=current>CURRENT</a>
                                    <a class="dropdown-item" href=client_tournament.php?a=previous>PREVIOUS</a>
                                    </div>
                                </div>
                                <table class="table table-hover" id="dataTable" style="color:#261903;" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>                                           
                                            <th>RANK</th>
                                            <th>TOURNAMENT ID</th>
                                            <th>TOURNAMENT NAME</th>
                                            <th>PROFILE</th>
                                            <th>NAME</th>
                                            <th>SCORE</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Tournament_id</th>
                                            <th>Score_total</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php
                                        if(isset($_GET['a']))
                                        {
											$query_tournament="select * from tournament;";
											$data=mysqli_query($conn,$query_tournament);
											while($row1=mysqli_fetch_array($data))
											{
												$tournament_id=$row1[0];
												$tournament_name=$row1[1];
												$query1="select sum(SCORE_TOTAL) from scoreboard where CLIENT_ID={$_SESSION['client_id']} and TOURNAMENT_ID=$tournament_id";
												$result1=mysqli_query($conn,$query1);
												$row1=mysqli_fetch_array($result1);
												
												
												$query2="select CLIENT_ID,sum(SCORE_TOTAL) from scoreboard where TOURNAMENT_ID=$tournament_id group by CLIENT_ID";
												//echo $query2;
												$result2=mysqli_query($conn,$query2);
												$rank=1;
												while($row=mysqli_fetch_array($result2))
												{
													//echo $row[0];
													if($row[1]>$row1[0])
														++$rank;
												}
												$query2="select * from scoreboard where TOURNAMENT_ID=$tournament_id group by CLIENT_ID  ";
												//echo $query2;
												$result2=mysqli_query($conn,$query2);
												while($row=mysqli_fetch_array($result2))
												{
													if(($_GET['a']=="current" && $tournament_id==$current_tournament_id) || ($_GET['a']=="previous" && $tournament_id!=$current_tournament_id))
													if($row["CLIENT_ID"]==$_SESSION['client_id'] )
													{
													echo'<tr>
                                                    <td>'.$rank.'</td>
                                                    <td>'.$tournament_id.'</td>
                                                    <td>'.$tournament_name.'</td>
                                                    <td><img style='."height:2.5rem;width:2.5rem;border-radius:50%;".' src='.$_SESSION["client_profile_photo"].' ></td>
                                                    <td>'.$_SESSION["client_name"].'</td>
                                                    <td>'.$row1[0].'</td>
                                                    </tr>';
													}
												}
											}
                                        }
                                        ?>
                                    </tbody>
                                    <!-- <td><a class='btn' href='#'><i class='fa fa-edit text-white' aria-hidden='true'></i></a></td> -->

                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
        </div>
        <!-- End of Content Wrapper -->

    </div>
  



<?php
    require_once('client_footer.php');
?>