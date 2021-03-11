<?php
    $title="Result Management";
    require('header.php');

    $sql_view='select * from result;';
    $result=mysqli_query($conn,$sql_view);
    $resultcheck=mysqli_num_rows($result);
    
   
?>
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

                    <div class="card-body ">
                        <div class="table-responsive">
                                <button class="btn btn-primary" style="float:right;background-color:#431f7e;border:none;" >Release</button>
                            <table class="table table-hover text-white" id="dataTable"  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tournament_Id</th>
                                        <th>Client_Id</th>
                                        <th>Status</th>
                                        <th>Position</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tournament_Id</th>
                                        <th>Client_Id</th>
                                        <th>Status</th>
                                        <th>Position</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if($resultcheck>0){
                                        while($row=mysqli_fetch_assoc($result)){
                                            $fetch_result_id=$row["RESULT_ID"];
                                            $fetch_tournament_id=$row["TOURNAMENT_ID"];
                                            $fetch_client_id=$row["CLIENT_ID"];
                                            $fetch_reward_status=$row["REWARD_STATUS"];
                                            $fetch_position=$row["POSITION"];

                                            
                                            echo"<tr>
                                                <td>".$fetch_result_id."</td>
                                                <td>".$fetch_tournament_id."</td>
                                                <td>".$fetch_client_id."</td>
                                                <td>".$fetch_reward_status."</td>
                                                <td>".$fetch_position."</td>
                                                </tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
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