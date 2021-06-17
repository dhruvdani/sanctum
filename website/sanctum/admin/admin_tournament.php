<?php
    $title="Tournament";
    require_once('header.php');
    if(isset($_POST['edit_submit']))
    {   
        $query='update tournament set 
            TOURNAMENT_NAME="'.$_POST['tournament_name'].'",
            TOURNAMENT_START="'.$_POST['tournament_start_date'].'",
            TOURNAMENT_END="'.$_POST['tournament_end_date'].'",
            TOURNAMENT_REGISTRATION_TILL="'.$_POST['registration_end_date'].'",
            TOURNAMENT_TOKEN_PRICE='.$_POST['tournament_fee'].',
            TOURNAMENT_FIRST_PRIZE='.$_POST['tournament_first_prize'].',
            TOURNAMENT_SECOND_PRIZE='.$_POST['tournament_second_prize'].',
            TOURNAMENT_THIRD_PRIZE='.$_POST['tournament_third_prize'].',
            TOURNAMENT_TREMS="'.$_POST['tournament_terms'].'",
            TOURNAMENT_DETAILS="'.$_POST['tournament_details'].'"
            where TOURNAMENT_ID="'.(int)$_GET['edit_id'].'";';
            //echo $query;
            
            mysqli_query($conn,$query);
            echo '<script> location.replace("admin_tournament.php"); </script>';
    }

    if(isset($_POST['add_submit']))
    {
        $query="INSERT INTO tournament (TOURNAMENT_NAME, TOURNAMENT_START, TOURNAMENT_END, TOURNAMENT_STATUS, TOURNAMENT_SUBSCRIBERS, TOURNAMENT_TOKEN_PRICE, TOURNAMENT_DETAILS, TOURNAMENT_FIRST_PRIZE, TOURNAMENT_SECOND_PRIZE, TOURNAMENT_THIRD_PRIZE, TOURNAMENT_TREMS, TOURNAMENT_REGISTRATION_TILL) 
                VALUES ('".$_POST['tournament_name']."',
                        '".$_POST['tournament_start_date']."',
                        '".$_POST['tournament_end_date']."',
                        0,
                        0, 
                        ".$_POST['tournament_fee'].",
                        '".$_POST['tournament_details']."',
                        ".$_POST['tournament_first_prize'].",
                        ".$_POST['tournament_second_prize'].", 
                        ".$_POST['tournament_third_prize'].",
                        '".$_POST['tournament_terms']."',
                        '".$_POST['registration_end_date']."'
                        );";
        
        mysqli_query($conn,$query);
    }

    $sql_view='select * from tournament;';
    $result_t=mysqli_query($conn,$sql_view);
    $resultcheck=mysqli_num_rows($result_t);
    
   
?>
<style>
    .table-hover tbody tr:hover td,
    .table-hover tbody tr:hover th {
        font-weight :700 ; 
        background-color: rgba(153,164,196,0.7);
        color:white;
    }   
    
    select > option{color:white;}
</style>

<script>
$("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
    $(e.target)
      .prev()
      .find("i:last-child")
      .toggleClass("fa-minus fa-plus");
  });
</script>

<div class="container-fluid myaccordion" id="accordion" style="color:#00183D;">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4" style="background-color:#ced8e8;border:solid skyblue 2px">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardE" class="d-block bg-transparent card-header py-3" style="border:none;color:#00183d" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardE">
            <h6 class="m-0 font-weight-bold " >Add Tournament</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse mb-3" id="collapseCardE" data-parent="#accordion">

            <form method="post">

            <div class="card-body container " >
                <div class="row">
                    <div class="col-xl-12"><label for="t_name">Name </label><input required="true" type="text" name="tournament_name" id="t_name" class="form-control" placeholder="Enter tournament name"/></div>
                    </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="start_date">Start Date</label><input required="true" type="date" name="tournament_start_date" id="start_date" class="form-control" placeholder="Enter tournament starting date"/></div>
                    <div class="col-xl-6 mt-2"><label for="end_date">End Date</label><input required="true" type="date" name="tournament_end_date" id="end_date" class="form-control" placeholder="Enter tournament ending date"/></div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="r_end_date">Registration end date</label><input required="true" type="date" name="registration_end_date" id="r_end_date" class="form-control" placeholder="Enter tournament registration end date"/></div>
                    <div class="col-xl-6 mt-2"><label for="t_status">Registration Fee</label><input type="number" required="true" min=1 name="tournament_fee" id="t_fee" class="form-control" placeholder=""/></div> 
                </div>
                <hr style="border-color:white;">
                <div class="row">
                    <!-- <div class="col-xl-6 mt-2"><label for="winning_price">Winning prize</label><input type="text" name="tournament_winning_price" id="winning_price" class="form-control" placeholder="Enter tournament winning price"/></div> -->
                    <div class="col-xl-6 mt-2"><label for="first_price">First prize</label><input type="number" required="true" min=1  name="tournament_first_prize" id="first_price" class="form-control" placeholder="Enter tournament 1st prize"/></div>
                    <div class="col-xl-6 mt-2"><label for="second_prize">Second Prize</label><input type="number" required="true" min=1 name="tournament_second_prize" id="second_prize" class="form-control" placeholder="Enter tournament 2nd prize"/></div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="third_price">Third prize</label><input type="number" required="true" min=1 name="tournament_third_prize" id="third_price" class="form-control" placeholder="Enter tournament 3rd prize"/></div>
                </div>
                <hr style="border-color:white;">
                <div class="row">
                    
                    <div class="col-xl-6 mt-2"><label for="t_details">Details</label><input type="text" required="true" name="tournament_details" id="t_details" class="form-control" placeholder="Enter tournament details"/></div>
                    <div class="col-xl-6 mt-2"><label for="t_terms">Terms</label><input type="text" required="true" name="tournament_terms" id="t_terms" class="form-control" placeholder="Terms and Conditions"/></div>
                </div>
                <!-- buttons -->
                <div class="row mt-4 float-right">
                    <div><button type="reset" class="btn btn-danger mr-2">Reset</button></div>
                    <div><button name="add_submit" type="submit" class="btn btn-success mr-3 ml-2">Submit</button></div>
                </div>
            </div>
        
        </form>

        </div>
        
    </div>
    
    <div class="card shadow mb-4" style="background-color:#ced8e8;border:solid skyblue 2px">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block bg-transparent card-header py-3" style="border:none;color:#00183d;border:none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold " >Edit Tournament</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse mb-3" id="collapseCardExample" data-parent="#accordion">

        <?php

            $id="N/A";
            $start=$end=$registration_till=$details=$terms=$name=$price=$prize1=$prize2=$prize3="";
            if(isset($_GET['edit_id']) && ctype_digit($_GET['edit_id']))
            {
                $query="select * from tournament where TOURNAMENT_ID=".(int)$_GET['edit_id'].";";
                $result=mysqli_query($conn,$query);
                $row=mysqli_fetch_array($result);
                $id=$row['TOURNAMENT_ID'];
                $start=$row['TOURNAMENT_START'];
                $end=$row['TOURNAMENT_END'];
                $registration_till=$row['TOURNAMENT_REGISTRATION_TILL'];
                $details=$row['TOURNAMENT_DETAILS'];
                $terms=$row['TOURNAMENT_TREMS'];
                $name=$row['TOURNAMENT_NAME'];
                $price=$row['TOURNAMENT_TOKEN_PRICE'];
                $prize1=$row['TOURNAMENT_FIRST_PRIZE'];
                $prize2=$row['TOURNAMENT_SECOND_PRIZE'];
                $prize3=$row['TOURNAMENT_THIRD_PRIZE'];;
            }            

        ?>    
        <form method="post">

            <div class="card-body container " >
                <div class="row">
                    <div class="col-xl-1 "><label for="t_name">Id </label><input required="true" type="text" name="tournament_id" id="t_id" class="form-control" placeholder="" value="<?php echo $id;?>" disabled/></div>
                    <div class="col-xl-11 "><label for="t_name">Name </label><input required="true" type="text" name="tournament_name" id="t_name" class="form-control" placeholder="Enter tournament name" value="<?php echo $name;?>"/></div>
                    </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="start_date">Start Date</label><input required="true" type="date" name="tournament_start_date" id="start_date" class="form-control" placeholder="Enter tournament starting date" value="<?php echo $start;?>"/></div>
                    <div class="col-xl-6 mt-2"><label for="end_date">End Date</label><input required="true" type="date" name="tournament_end_date" id="end_date" class="form-control" placeholder="Enter tournament ending date" value="<?php echo $end;?>"/></div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="r_end_date">Registration end date</label><input required="true" type="date" name="registration_end_date" id="r_end_date" class="form-control" placeholder="Enter tournament registration end date" value="<?php echo $registration_till;?>"/></div>
                    <div class="col-xl-6 mt-2"><label for="t_status">Registration Fee</label><input type="number" required="true" min=1 name="tournament_fee" id="t_fee" class="form-control" placeholder="" value="<?php echo $price;?>"/></div> 
                </div>
                <hr style="border-color:white;">
                <div class="row">
                    <!-- <div class="col-xl-6 mt-2"><label for="winning_price">Winning prize</label><input type="text" name="tournament_winning_price" id="winning_price" class="form-control" placeholder="Enter tournament winning price"/></div> -->
                    <div class="col-xl-6 mt-2"><label for="first_price">First prize</label><input type="number" required="true" min=1  name="tournament_first_prize" id="first_prize" class="form-control" placeholder="Enter tournament 1st prize" value="<?php echo $prize1;?>"/></div>
                    <div class="col-xl-6 mt-2"><label for="second_prize">Second Prize</label><input type="number" required="true" min=1 name="tournament_second_prize" id="second_prize" class="form-control" placeholder="Enter tournament 2nd prize" value="<?php echo $prize2;?>"/></div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="third_price">Third prize</label><input type="number" required="true" min=1 name="tournament_third_prize" id="third_prize" class="form-control" placeholder="Enter tournament 3rd prize" value="<?php echo $prize3;?>"/></div>
                </div>
                <hr style="border-color:white;">
                <div class="row">
                    
                    <div class="col-xl-6 mt-2"><label for="t_details">Details</label><input type="text" required="true" name="tournament_details" id="t_details" class="form-control" placeholder="Enter tournament details" value="<?php echo $details;?>"/></div>
                    <div class="col-xl-6 mt-2"><label for="t_terms">Terms</label><input type="text" required="true" name="tournament_terms" id="t_terms" class="form-control" placeholder="Terms and Conditions" value="<?php echo $terms; ?>"/></div>
                </div>
                <!-- buttons -->
                <div class="row mt-4 float-right">
                    <div><button type="reset" class="btn btn-danger mr-2">Reset</button></div>
                    <div><button name="edit_submit" type="submit" class="btn btn-success mr-3 ml-2">Save</button></div>
                </div>
            </div>

        </form>

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
                <div class="card mb-4 " style="color:#261903;border:none;background-color:#ced8e8">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-hover " style="color:#261903;" id="dataTable" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th>Edit</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>Registration End Date</th>
                                        <th>Subscribers</th>
                                        <th>Price</th>
                                        <th>Details</th>
                                        <th>First Prize</th>
                                        <th>Second Prize</th>
                                        <th>Third Prize</th>
                                        <th>Terms</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
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
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                    <?php
                                    if($resultcheck>0){
                                        while($row_t=mysqli_fetch_assoc($result_t)){
                                            $fetch_id=$row_t["TOURNAMENT_ID"];
                                            $fetch_name=$row_t["TOURNAMENT_NAME"];
                                            $fetch_start=$row_t["TOURNAMENT_START"];
                                            $fetch_end=$row_t["TOURNAMENT_END"];
                                            $fetch_regis_end=$row_t["TOURNAMENT_REGISTRATION_TILL"];
                                            $fetch_status=$row_t["TOURNAMENT_STATUS"];
                                            $fetch_subs=$row_t["TOURNAMENT_SUBSCRIBERS"];
                                            $fetch_price=$row_t["TOURNAMENT_TOKEN_PRICE"];
                                            $fetch_details=$row_t["TOURNAMENT_DETAILS"];
                                            $fetch_f_prize=$row_t["TOURNAMENT_FIRST_PRIZE"];
                                            $fetch_s_prize=$row_t["TOURNAMENT_SECOND_PRIZE"];
                                            $fetch_t_prize=$row_t["TOURNAMENT_THIRD_PRIZE"];
                                            $fetch_terms=$row_t["TOURNAMENT_TREMS"];

                                            echo"<tr>
                                                <td><a class='btn btn-danger btn-sm' href='admin_tournament.php?edit_id=".$fetch_id."'><i class='fa fa-edit text-white' aria-hidden='true'></i></a></td> 
                                                <td>".$fetch_id."</td>
                                                <td>".$fetch_name."</td>
                                                <td>".$fetch_start."</td>
                                                <td>".$fetch_end."</td>
                                                <td>".$fetch_regis_end."</td>
                                                <td>".$fetch_subs."</td>
                                                <td>".$fetch_price."</td>
                                                <td>".$fetch_details."</td>
                                                <td>".$fetch_f_prize."</td>
                                                <td>".$fetch_s_prize."</td>
                                                <td>".$fetch_t_prize."</td>
                                                <td>".$fetch_terms."</td>
                                            </tr>";
                                            //<td><a class='btn' href='#'><i class='fa fa-trash text-white' aria-hidden='true'></i></a></td> 
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
<script>

    window.onload = function() {
        datacheck();
    }  
    function datacheck()
    {
        const params = new URLSearchParams(window.location.search)
        
        for (const param of params) 
        {
            if(param[0].toString()==="edit_id")
            {
                if(parseInt(param[1]))
                {
                    $('#collapseCardExample').addClass('show');
                }   
                break;
            }
        }
    }

</script>
<?php
    require_once('footer.php');
?>