<?php
    $title="Tournament";
    require('header.php');

    $sql_view='select * from tournament;';
    $result=mysqli_query($conn,$sql_view);
    $resultcheck=mysqli_num_rows($result);
    
   
?>
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
    select > option{color:white;}
</style>
<div class="container-fluid">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4" style="background-color:transparent">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block bg-transparent card-header py-3" style="border:none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-white" >Add Tournament</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse mb-3" id="collapseCardExample">
            <div class="card-body container ">
                <div class="row">
                    <div class="col-xl-12"><label for="t_name">Name </label><input type="text" name="t_name" id="t_name" class="form-control" placeholder="Enter tournament name"/></div>
                    </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="start_date">Start Date</label><input type="text" name="start_date" id="start_date" class="form-control" placeholder="Enter tournament starting date"/></div>
                    <div class="col-xl-6 mt-2"><label for="end_date">End Date</label><input type="text" name="end_date" id="end_date" class="form-control" placeholder="Enter tournament ending date"/></div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="r_end_date">Registration end date</label><input type="text" name="r_end_date" id="r_end_date" class="form-control" placeholder="Enter tournament registration end date"/></div>
                    <div class="col-xl-6 mt-2"><label for="t_status">Status</label><input type="text" name="t_status" id="t_status" class="form-control" placeholder="Enter tournament current status"/></div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="winning_price">Winning prize</label><input type="text" name="winning_price" id="winning_price" class="form-control" placeholder="Enter tournament winning price"/></div>
                    <div class="col-xl-6 mt-2"><label for="first_price">First prize</label><input type="text" name="first_price" id="first_price" class="form-control" placeholder="Enter tournament winning price"/></div>
                </div>
                <div class="row">
                    
                    <div class="col-xl-6 mt-2"><label for="second_prize">Second Prize</label><input type="text" name="second_prize" id="second_prize" class="form-control" placeholder="Enter tournament details"/></div>
                    <div class="col-xl-6 mt-2"><label for="third_price">Third prize</label><input type="text" name="third_price" id="third_price" class="form-control" placeholder="Enter tournament winning price"/></div>
                </div>
                <div class="row">
                    
                    <div class="col-xl-6 mt-2"><label for="t_details">Details</label><input type="text" name="t_details" id="t_details" class="form-control" placeholder="Enter tournament details"/></div>
                    <div class="col-xl-6 mt-2"><label for="t_terms">Terms</label><input type="text" name="t_terms" id="t_terms" class="form-control" placeholder="Enter tournament details"/></div>
                </div>
                <!-- buttons -->
                <div class="row mt-4 float-right">
                    <div><button type="reset" class="btn btn-danger mr-2">Reset</button></div>
                    <div><button type="submit" class="btn btn-success mr-3 ml-2">Submit</button></div>
                </div>
            </div>
        </div>
        
    </div>
</div>  
<div id="wrapper" ">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-color:transparent" >

        <!-- Main Content -->
        <div id="content">

            <div class="container-fluid" >
                <style>

                </style>
                <!-- table -->
                <div class="card mb-4 " style="color:#261903;border:none;background:#6e9673">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-hover " style="color:#261903;" id="dataTable" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>Registration End Date</th>
                                        <th>Status</th>
                                        <th>Subscribers</th>
                                        <th>Prize</th>
                                        <th>Details</th>
                                        <th>First Prize</th>
                                        <th>Second Prize</th>
                                        <th>Third Prize</th>
                                        <th>Terms</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>Registration End Date</th>
                                        <th>Status</th>
                                        <th>Subscribers</th>
                                        <th>Prize</th>
                                        <th>Details</th>
                                        <th>First Prize</th>
                                        <th>Second Prize</th>
                                        <th>Third Prize</th>
                                        <th>Terms</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if($resultcheck>0){
                                        while($row=mysqli_fetch_assoc($result)){
                                            $fetch_id=$row["TOURNAMENT_ID"];
                                            $fetch_name=$row["TOURNAMENT_NAME"];
                                            $fetch_start=$row["TOURNAMENT_START"];
                                            $fetch_end=$row["TOURNAMENT_END"];
                                            $fetch_regis_end=$row["TOURNAMENT_REGISTRATION_TILL"];
                                            $fetch_status=$row["TOURNAMENT_STATUS"];
                                            $fetch_subs=$row["TOURNAMENT_SUBSCRIBERS"];
                                            $fetch_price=$row["TOURNAMENT_TOKEN_PRICE"];
                                            $fetch_details=$row["TOURNAMENT_DETAILS"];
                                            $fetch_f_prize=$row["TOURNAMENT_FIRST_PRIZE"];
                                            $fetch_s_prize=$row["TOURNAMENT_SECOND_PRIZE"];
                                            $fetch_t_prize=$row["TOURNAMENT_THIRD_PRIZE"];
                                            $fetch_terms=$row["TOURNAMENT_TREMS"];

                                            echo"<tr>
                                                <td>".$fetch_id."</td>
                                                <td>".$fetch_name."</td>
                                                <td>".$fetch_start."</td>
                                                <td>".$fetch_end."</td>
                                                <td>".$fetch_regis_end."</td>
                                                <td>".$fetch_status."</td>
                                                <td>".$fetch_subs."</td>
                                                <td>".$fetch_price."</td>
                                                <td>".$fetch_details."</td>
                                                <td>".$fetch_f_prize."</td>
                                                <td>".$fetch_s_prize."</td>
                                                <td>".$fetch_t_prize."</td>
                                                <td>".$fetch_terms."</td>
                                                <td><a class='btn' href='#'><i class='fa fa-trash text-white' aria-hidden='true'></i></a></td> 
                                                <td><a class='btn' href='#'><i class='fa fa-edit text-white' aria-hidden='true'></i></a></td> 

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
</div>

<?php
    require('footer.php');
?>