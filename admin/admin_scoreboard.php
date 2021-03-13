<?php
    $title="Scoreboard";
    require('header.php');

    $sql_view='select * from scoreboard;';
    $result=mysqli_query($conn,$sql_view);
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
                                        Select Tournament
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">All</a><hr>
                                        <a class="dropdown-item" href="#">January 21</a>
                                        <a class="dropdown-item" href="#">February 21</a>
                                    </div>
                                </div>
                                <table class="table table-hover" id="dataTable" style="color:#261903;" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client_Id</th>
                                            <th>Game_Id</th>
                                            <th>Tournament_id</th>
                                            <th>Score_total</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Tournament_id</th>
                                            <th>Score_total</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if($resultcheck>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $fetch_id=$row["SCOREBOARD_ID"];
                                                $fetch_c_id=$row["CLIENT_ID"];
                                                $fetch_g_id=$row["GAME_ID"];
                                                $fetch_t_id=$row["TOURNAMENT_ID"];
                                                $fetch_score=$row["SCORE_TOTAL"];

                                                
                                                echo"<tr>
                                                    <td>".$fetch_id."</td>
                                                    <td>".$fetch_c_id."</td>
                                                    <td>".$fetch_g_id."</td>
                                                    <td>".$fetch_t_id."</td>
                                                    <td>".$fetch_score."</td>
                                                    </tr>";
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