<?php
    $title="Dashboard";
    require('header.php');
    require('data_cards.php');
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
                            <div class="text-s font-weight-bold text-white text-uppercase mt-3 mb-1"> registration</div>
                        <div class="h1 mb-1 text-white mt-1"><?php echo get_registrations();?></div>
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
                            <div class="text-s font-weight-bold text-uppercase mt-3  mb-1">TOURNAMENT</div>
                        <div class="h1 mb-1  text-white mt-1"><?php echo get_tournament();?></div>
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
                            <div class="text-s font-weight-bold  text-uppercase mt-3 mb-1">Games</div>
                            <div class="h1 mb-1 text-white mt-1"><?php echo get_game();?></div>
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
                            <div class="text-s font-weight-bold text-uppercase mt-3 mb-1">USERS</div>
                        <div class="h1 mb-1 text-white mt-1"><?php echo get_client();?></div>
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
                            <div class="text-s font-weight-bold text-uppercase mt-3 mb-1">FEEDBACK</div>
                        <div class="h1 mb-1  text-white mt-1"><?php echo get_feedback();?></div>
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
                        <div class="text-s font-weight-bold text-uppercase mt-3 mb-1">Visitors</div>
                        <div class="h1 mb-1  text-white mt-1"><?php echo get_visitor();?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <!-- Content Row charts-->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 ">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                    <h6 class="m-0 font-weight-bold text-primary">Registrations</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <canvas id="mychart"></canvas>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6  ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">other</h6>
            </div>
            <div class="card-body">
                <canvas id="myBarChart"></canvas>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" crossorigin="anonymous"></script>
<script>
    
    drawChart();

    function drawChart()
    {
        var ctx = document.getElementById('mychart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

</script>



<?php
    require('footer.php');
?>
