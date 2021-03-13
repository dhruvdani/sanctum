<?php
    $title="Dashboard";
    require('header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Content Row cards -->
    <div class="row">
    <style>.h1{font-size:2.3em}</style>

        <!-- registration -->
        <div class="col-xl-2 col-md-6 mb-4" >
            <div class="card shadow h-100 py-2 bg-primary">
                <div class="card-body " style="border:none">
                    <div class="no-gutters justify-content-center text-center">
                        <div class="col-auto  ">
                            <i class="fas fa-users fa-2x text-white "></i>
                        </div><br>
                        <div class="col-auto">
                        <div class="h1 mb-1 text-white mt-1">40</div>
                            <div class="text-s font-weight-bold text-white text-uppercase mt-3 mb-1">March<br> registration</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Invoice -->
        <div class="col-xl-2 col-md-6 mb-4" >
            <div class="card shadow h-100 py-2 bg-warning">
                <div class="card-body" style="border:none">
                    <div class="no-gutters justify-content-center text-center">
                        <div class="col-auto  ">
                            <i class="fas fa-snowflake fa-2x text-white " aria-hidden="true"></i>
                        </div><br>
                        <div class="col-auto">
                        <div class="h1 mb-1  text-white mt-1">₹21,500</div>
                            <div class="text-s font-weight-bold text-uppercase mt-3  mb-1">invoiced<Br> amount</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Games -->
        <div class="col-xl-2 col-md-6 mb-4" >
            <div class="card shadow h-100 py-2 bg-success">
                <div class="card-body" style="border:none">
                    <div class="no-gutters justify-content-center text-center">
                        <div class="col-auto" >
                            <i class="fas fa-gamepad fa-2x text-white "></i>
                        </div><br>
                        <div class="col-auto">
                            <div class="h1 mb-1 text-white mt-1">50,000</div>
                            <div class="text-s font-weight-bold  text-uppercase mt-3 mb-1">Games</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- clients -->
        <div class="col-xl-2 col-md-6 mb-4" >
            <div class="card shadow h-100 py-2 bg-dark">
                <div class="card-body" style="border:none">
                    <div class="no-gutters justify-content-center text-center">
                        <div class="col-auto  ">
                            <i class="fas fa-user-secret fa-2x text-white "></i>
                        </div><br>
                        <div class="col-auto">
                        <div class="h1 mb-1 text-white mt-1">100</div>
                            <div class="text-s font-weight-bold text-uppercase mt-3 mb-1">CLIENTS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- feedback -->
        <div class="col-xl-2 col-md-6 mb-4" >
            <div class="card shadow h-100 py-2 bg-danger">
                <div class="card-body" style="border:none">
                    <div class="no-gutters justify-content-center text-center">
                        <div class="col-auto  ">
                            <i class="fas fa-comments fa-2x text-white "></i>
                        </div><br>
                        <div class="col-auto">
                        <div class="h1 mb-1  text-white mt-1">50</div>
                            <div class="text-s font-weight-bold text-uppercase mt-3 mb-1">feedback</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Visitors -->
        <div class="col-xl-2 col-md-6 mb-4" >
            <div class="card shadow h-100 py-2 bg-info">
                <div class="card-body" style="border:none">
                    <div class="no-gutters justify-content-center text-center">
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-white "></i>
                        </div><br>
                        <div class="col-auto">
                        <div class="h1 mb-1  text-white mt-1">10,000</div>
                            <div class="text-s font-weight-bold text-uppercase mt-3 mb-1">Visitors</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <!-- Content Row charts-->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Revenue</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-5 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registrations</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>




<?php
    require('footer.php');
?>
