<?php

    function dateCheck($tournament_end_date)
    {
        $date=substr($tournament_end_date,8,2);
        $month=substr($tournament_end_date,5,2);
        $year=substr($tournament_end_date,0,4);

        //echo date("Y-m-d")."<br> --- ".$date."-".$month."-".$year."<br><br>";

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

    $image_1="";
    $name_1="";
    $id_1="";
    $score_1="";

    $image_2="";
    $name_2="";
    $id_2="";
    $score_2="";

    $image_3="";
    $name_3="";
    $id_3="";
    $score_3="";

    
    $title="Result";
    require('header.php');

    $error_message="Bad Request !";
    $fetch_photo="";
    $tournament_name=$torunament_end_date=$torunament_start_date=$torunament_id="";
    $sql_view='select * from tournament;';
    $result=mysqli_query($conn,$sql_view);

    $check=false;

    if(isset($_GET['tournament_id']) && isset($_GET['tournament_name']))
    {
        $query='SELECT * FROM tournament where TOURNAMENT_ID='.$_GET["tournament_id"].' and TOURNAMENT_NAME="'.$_GET["tournament_name"].'";';
        $details=mysqli_query($conn,$query);

        if(mysqli_num_rows($details) == 1)
        {   
            $check=true;
            $data=mysqli_fetch_array($details);
            $torunament_name=$data['TOURNAMENT_NAME'];
            $torunament_end_date=$data['TOURNAMENT_END'];
            $torunament_start_date=$data['TOURNAMENT_START'];
            $torunament_id=$data['TOURNAMENT_ID'];

            $querry_internal="select * from result r, client c where r.CLIENT_ID = c.CLIENT_ID and r.TOURNAMENT_ID = ".$data['TOURNAMENT_ID']." order by r.POSITION;";
            $internal=mysqli_query($conn,$querry_internal);

            if($internal->num_rows!=0)
            {
                //change this condition to false to debug and display entire array of result 1
                if(true)
                {
                    $data_result=mysqli_fetch_array($internal);
                    $image_1=$data_result['CLIENT_PROFILE_PHOTO'];
                    $name_1=$data_result['CLIENT_NAME'];
                    $id_1=$data_result['CLIENT_ID'];
                    $score_1=0000;

                    $data_result=mysqli_fetch_array($internal);
                    $image_2=$data_result['CLIENT_PROFILE_PHOTO'];
                    $name_2=$data_result['CLIENT_NAME'];
                    $id_2=$data_result['CLIENT_ID'];
                    $score_2=0001;

                    $data_result=mysqli_fetch_array($internal);
                    $image_3=$data_result['CLIENT_PROFILE_PHOTO'];
                    $name_3=$data_result['CLIENT_NAME'];
                    $id_3=$data_result['CLIENT_ID'];
                    $score_3=0002;
                }
                else
                {
                    $data_result=mysqli_fetch_array($internal);
                    echo "<pre style='background:white'>";
                    print_r($data_result);
                    echo "</pre>";
                }
            }
            else
            {
                $start_val=dateCheck($data['TOURNAMENT_START']);
                $end_val=dateCheck($data['TOURNAMENT_END']);
                

                $error_message="Result not Published Yet.";
                if(($start_val==0) || ($end_val==1 && $start_val==-1) || $end_val==0){
                    $check=false;
                    $error_message="Tournament is not over yet.";
                } // will check for current tournament
                else if($start_val==-1 && $end_val==-1)//will check for finished tournament
                {
                    $check=true;
                    $query_score="select c.CLIENT_PROFILE_PHOTO,s.CLIENT_ID,c.CLIENT_NAME,s.TOURNAMENT_ID,sum(s.SCORE_TOTAL)as 'SCORE_TOTAL',c.CLIENT_TOTAL_SCORE from scoreboard as s,
                        client as c,tournament as t
                        where 
                        s.CLIENT_ID = c.CLIENT_ID 
                        AND s.TOURNAMENT_ID = t.TOURNAMENT_ID 
                        AND s.TOURNAMENT_ID = ".$data['TOURNAMENT_ID']." group by s.CLIENT_ID order by SCORE_TOTAL DESC;";

                    $score_data=mysqli_query($conn,$query_score);
                    
                    // echo "<pre style='background:white'>";
                    // print_r($score_data);
                    // echo "</pre><hr>";

                    $rank=1;
                    while($data_result=mysqli_fetch_array($score_data))
                    {
                        // echo "<pre style='background:white'>";
                        // print_r($data_result);
                        // echo "</pre>";

                        $generate_result="INSERT INTO result(TOURNAMENT_ID,CLIENT_ID,REWARD_STATUS,POSITION) values(".$data_result['TOURNAMENT_ID'].",".$data_result['CLIENT_ID'].",0,".$rank.");";
                        mysqli_query($conn,$generate_result);
                        //echo $generate_result;
                        $rank++;

                    }
                        $querry_internal="select * from result r, client c where r.CLIENT_ID = c.CLIENT_ID and r.TOURNAMENT_ID = ".$data['TOURNAMENT_ID']." order by r.POSITION;";
                        $internal=mysqli_query($conn,$querry_internal);

                        $data_result=mysqli_fetch_array($internal);
                        $image_1=$data_result['CLIENT_PROFILE_PHOTO'];
                        $name_1=$data_result['CLIENT_NAME'];
                        $id_1=$data_result['CLIENT_ID'];
                        $score_1=0000;

                        $data_result=mysqli_fetch_array($internal);
                        $image_2=$data_result['CLIENT_PROFILE_PHOTO'];
                        $name_2=$data_result['CLIENT_NAME'];
                        $id_2=$data_result['CLIENT_ID'];
                        $score_2=0001;

                        $data_result=mysqli_fetch_array($internal);
                        $image_3=$data_result['CLIENT_PROFILE_PHOTO'];
                        $name_3=$data_result['CLIENT_NAME'];
                        $id_3=$data_result['CLIENT_ID'];
                        $score_3=0002;

                    $error_message="Result is ready to publish.";
                }
            }
    }
    else
    {
        $error_message="To view result, select tournament first.";
    }
}
   
?>
   <div id="wrapper" ">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:transparent" >

            <!-- Main Content -->
            <div id="content">

                <div class="container-fluid" >
                
                <div class="row mb-2">
                    <button class="btn btn-warning dropdown-toggle" style="float:right;background-color:#ffbb02;border:none;text-align:left;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo (isset($_GET['tournament_name']))? $_GET['tournament_name'] : "Select Tournament"; ?>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">                                 
                        <?php
                            while($row=mysqli_fetch_array($result))
                            {
                                echo '<a class="dropdown-item" href=admin_result.php?tournament_id='.$row['TOURNAMENT_ID'].'&tournament_name='.urlencode($row["TOURNAMENT_NAME"]).'>'.$row['TOURNAMENT_NAME'].'</a>';
                            }
                        ?>
                    </div>
                    
                </div>
                
                <div class="card row mb-4" style="color:#261903;border:none;background-color:#6E9673">
                <?php 
                
                if($check)
                {
                    echo '                            
                        <div>
                            <br>
                            <h2 style="color:white;text-align:center" ><?php echo $torunament_name;?></h2>
                            <hr>
                            <div class="row text-white">
                                <div class="col-sm-6" style="padding-left:10rem;">
                                    <label style="font-weight:bold">Tournament Id:</label>
                                    <label>'.$torunament_id.'</label><br>
                                    <label style="font-weight:bold">Start Date:</label>
                                    <label>'.$torunament_start_date.'</label>
                                </div>
                                <div class="col-sm-6 " style="padding-right:10rem;text-align:right">
                                    <label style="font-weight:bold">Tournament Name:</label>
                                    <label>'.$torunament_name.'</label><br>
                                    <label style="font-weight:bold">End Date:</label>
                                    <label>'.$torunament_end_date.'</label>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-xl-1 mb-4" ></div>
                                <!-- 1st -->
                                <div class="col-xl-3 col-md-6 mb-4" >
                                    <div class="card shadow h-100 py-2 bg-info">
                                        <div class="card-body" style="border:none">
                                            <div class="no-gutters justify-content-center text-center">
                                                <div class="col-auto text-white" >
                                                    <h2 class="font-weight-bold">1st</h2>
                                                </div><br>
                                                <div class="col-auto">
                                                    <div class="mb-3"><img src="'.$image_1.'" height="50" width="50" style="border-radius:50%;" /></div>
                                                    <div class="h3 mb-1 text-white mt-1">'.$name_1.'</div>
                                                    <div class="mb-1 mt-1" style="color:grey">'.$id_1.'</div>
                                                    <!--<div class="text-s font-weight-bold mt-3 mb-1 text-white">'.$score_1.'</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2nd -->
                                <div class="col-xl-3 col-md-6 mb-4 ml-5">
                                    <div class="card shadow h-100 py-2 bg-info">
                                        <div class="card-body" style="border:none">
                                            <div class="no-gutters justify-content-center text-center">
                                                <div class="col-auto text-white" >
                                                    <h2 class="font-weight-bold">2nd</h2>
                                                </div><br>
                                                <div class="col-auto">
                                                <div class="mb-3"><img src="'.$image_2.'" height="50" width="50" style="border-radius:50%;" /></div>
                                                <div class="h3 mb-1 text-white mt-1">'.$name_2.'</div>
                                                <div class="mb-1 mt-1" style="color:grey">'.$id_2.'</div>
                                                <!--<div class="text-s font-weight-bold mt-3 mb-1 text-white">'.$score_2.'</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 3rd -->
                                <div class="col-xl-3 col-md-6 mb-4 ml-5" >
                                    <div class="card shadow h-100 py-2 bg-info">
                                        <div class="card-body" style="border:none">
                                            <div class="no-gutters justify-content-center text-center">
                                                <div class="col-auto text-white" >
                                                    <h2 class="font-weight-bold">3rd</h2>
                                                </div><br>
                                                <div class="col-auto">
                                                <div class="mb-3"><img src="'.$image_3.'" height="50" width="50" style="border-radius:50%;" /></div>
                                                <div class="h3 mb-1 text-white mt-1">'.$name_3.'</div>
                                                <div class="mb-1 mt-1" style="color:grey">'.$id_3.'</div>
                                                <!--<div class="text-s font-weight-bold mt-3 mb-1 text-white">'.$score_3.'</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>';
                }
                else
                {
                    echo '<div>
                            <br>
                            <h2 style="color:white;text-align:center" >'.$error_message.'</h2>
                            <hr>
                        </div>';
                }
        ?>
        <!-- End of Content Wrapper -->

    </div>


<?php
    require_once('footer.php');
?> 