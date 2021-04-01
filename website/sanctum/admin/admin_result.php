<?php
    $title="Result";
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
               
                <div class="row mb-2">
                    <button class="btn btn-warning dropdown-toggle" style="background-color:#ffbb02;border:none;text-align:left;width:100%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo (isset($_GET['tournament_name']))? $_GET['tournament_name'] :"Select Tournament"; ?>
                    </button>
                </div>
                <div class="card row mb-4" style="color:#261903;border:none;background-color:#6E9673">
                    
                    <div>
                        <br>
                        <h2 style="color:white;text-align:center" >April Season</h2>
                        <hr>
                        <div class="row text-white">
                            <div class="col-sm-6" style="padding-left:10rem;">
                                <label style="font-weight:bold">Tournament Id:</label>
                                <label>3220</label><br>
                                <label style="font-weight:bold">Start Date:</label>
                                <label>12.05.2021</label>
                            </div>
                            <div class="col-sm-6 " style="padding-right:10rem;text-align:right">
                                <label style="font-weight:bold">Tournament Name:</label>
                                <label>April Season</label><br>
                                <label style="font-weight:bold">End Date:</label>
                                <label>11.06.2021</label>
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
                                                <div class="mb-3"><img src='".$fetch_photo."' height='50' width='50' style='border-radius:50%;' /></div>
                                                <div class="h3 mb-1 text-white mt-1">Player Name</div>
                                                <div class="mb-1 mt-1" style="color:grey">Player id</div>
                                                <div class="text-s font-weight-bold mt-3 mb-1 text-white">320010</div>
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
                                                <div class="mb-3"><img src='".$fetch_photo."' height='50' width='50' style='border-radius:50%;' /></div>
                                                <div class="h3 mb-1 text-white mt-1">Player Name</div>
                                                <div class="mb-1 mt-1" style="color:grey">Player id</div>
                                                <div class="text-s font-weight-bold mt-3 mb-1 text-white">320010</div>
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
                                                <div class="mb-3"><img src='".$fetch_photo."' height='50' width='50' style='border-radius:50%;' /></div>
                                                <div class="h3 mb-1 text-white mt-1">Player Name</div>
                                                <div class="mb-1 mt-1" style="color:grey">Player id</div>
                                                <div class="text-s font-weight-bold mt-3 mb-1 text-white">320010</div>
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
        </div>
        <!-- End of Content Wrapper -->

    </div>
 

<?php
    require('footer.php');
?>