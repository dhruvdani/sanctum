<?php
    $title="Scoreboard";
    require('header.php');

    $tournament_id=0;
    if(isset($_GET['tournament_id']))
    {
        $tournament_id=$_GET['tournament_id'];
    }
    $query="select c.CLIENT_PROFILE_PHOTO,s.CLIENT_ID,c.CLIENT_NAME,s.TOURNAMENT_ID,sum(s.SCORE_TOTAL)as 'SCORE_TOTAL',c.CLIENT_TOTAL_SCORE from scoreboard as s,
                        client as c,tournament as t
                        where 
                        s.CLIENT_ID = c.CLIENT_ID 
                        AND s.TOURNAMENT_ID = t.TOURNAMENT_ID 
                        AND s.TOURNAMENT_ID = ".(int)$tournament_id." group by s.CLIENT_ID order by SCORE_TOTAL DESC;";

    $result=mysqli_query($conn,$query);
    $resultcheck=mysqli_num_rows($result);
    
   
?>

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Page Wrapper -->
    <div id="wrapper" ">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:transparent" >

            <!-- Main Content -->
            <div id="content">

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
                                        <?php echo (isset($_GET['tournament_name']))? $_GET['tournament_name'] :"Select Tournament"; ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php
                                        $query_tournament="select * from tournament;";
                                        $data=mysqli_query($conn,$query_tournament);
                                        while($row=mysqli_fetch_array($data))
                                            echo '<a class="dropdown-item" href=admin_scoreboard.php?tournament_id='.$row["TOURNAMENT_ID"].'&tournament_name='.urlencode($row["TOURNAMENT_NAME"]).'>'.$row["TOURNAMENT_NAME"].'</a>';
                                    ?>
                                    </div>
                                </div>
                                <table class="table table-hover" id="dataTable" style="color:#261903;" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>                                           
                                             <th>RANK</th>
                                            <th>CLIENT ID</th>
                                            <th>PROFILE</th>
                                            <th>NAME</th>
                                            <th>SCORE</th>
                                            <th>TOTAL SCORE</th>
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
                                        if($resultcheck>0)
                                        {
                                            $rank=0;
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                                ++$rank;
                                                echo'<tr>
                                                    <td>'.$rank.'</td>
                                                    <td>'.$row["CLIENT_ID"].'</td>
                                                    <td><img style='."height:2.5rem;width:2.5rem;border-radius:50%;".' src="'.$row["CLIENT_PROFILE_PHOTO"].'" ></td>
                                                    <td>'.$row["CLIENT_NAME"].'</td>
                                                    <td>'.$row["SCORE_TOTAL"].'</td>
                                                    <td>'.$row["CLIENT_TOTAL_SCORE"].'</td>
                                                    </tr>';
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
    require('footer.php');
?>