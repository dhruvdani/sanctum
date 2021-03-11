<?php
    $title="Transaction Details";
    require('header.php');

    $sql_view='select * from scoreboard;';
    $result=mysqli_query($conn,$sql_view);
    $resultcheck=mysqli_num_rows($result);
    $result_client=mysqli_query($conn,'select c_id from scoreboard;');
    $result_client_check=mysqli_num_rows($result_client);
   
?>

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Page Wrapper -->
    <div id="wrapper" ">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color:transparent">

            <!-- Main Content -->
            <div id="content">

                <div class="container-fluid" >
                <style>
                    .table-hover tbody tr:hover td,
                    .table-hover tbody tr:hover th {
                        font-weight :700 ; 
                        background-color: rgba(0, 0, 0, 0.432);
                        color:bisque;
                    }   
                    .pagination > li > a
                    {
                        background-color: white;
                        color: black;
                    }
                    .pagination > li > a:focus,
                    .pagination > li > a:hover,
                    .pagination > li > span:focus,
                    .pagination > li > span:hover
                    {
                        color: #5a5a5a;
                        background-color: #eee;
                        border-color:#ddd;
                    }

                    .pagination > .active > a
                    {
                        color: white;
                        background-color: #431f7e !Important;
                        border: solid 1px #431f7e !Important;
                    }

                    .pagination > .active > a:hover
                    {
                        background-color: #431f7e !Important;
                        border: solid 1px #431f7e;
                    }
                    .dataTables_filter {
                        display: none;
                    }
                </style>
                    
                <div class="card  mb-4" style="color:white;border:none;background:linear-gradient(0deg, rgba(255,0,67,0.2) 0%, rgba(0,0,0,0.4) 100%);">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body ">
                            <div class="table-responsive">
                                
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" style="float:right;background-color:#431f7e;border:none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Month
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">All</a><hr>
                                        <a class="dropdown-item" href="#">January 21</a>
                                        <a class="dropdown-item" href="#">February 21</a>
                                    </div>
                                <button class="mr-3 btn btn-primary dropdown-toggle" style="float:right;background-color:#431f7e;border:none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Client_id
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<!--                                 
                                  <?php
                                    // echo "<a class='dropdown-item' href='admin_trans_details.php?cid=".all."'>All</a><hr>";
                                    // if($result_client_check>0){
                                    //     while($row_c=mysqli_affected_rows($result_client)){
                                    //         echo"
                                    //         123
                                    //         <a class='dropdown-item' href='admin_trans_details.php?cid=$row_c'>".$row_c."</a>
                                    //         ";
                                    //     }
                                    // }
                                  ?> -->
                                    <a class="dropdown-item" href="#">All</a><hr>
                                    <a class="dropdown-item" href="#">January 21</a>
                                    <a class="dropdown-item" href="#">February 21</a>
                                </div>
                                <div style="position:relative;float:right">
                                    <div class="mr-3">
                                        <button type="submit" class="btn btn-primary shadow-sm" style="float:right;background-color:#431f7e;border:none;">
                                        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                                    </div>
                                </div>
                                </div>
                            <table class="table table-hover text-white" id="dataTable"  width="100%" cellspacing="0">

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
                                            $fetch_id=$row["s_id"];
                                            $fetch_c_id=$row["c_id"];
                                            $fetch_g_id=$row["g_id"];
                                            $fetch_t_id=$row["t_id"];
                                            $fetch_score=$row["score_total"];

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