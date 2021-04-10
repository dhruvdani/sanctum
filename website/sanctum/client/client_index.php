<?php
    $title="Welcome";
    require_once('../client/client_header.php'); 
    
    $row['ADMIN_PROFILE_PHOTO']="../images/t3.jpg";
?>

    <style>
        .f{
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover; 
            background-image: url('../images/client_background.jpg');
            padding-top:15rem ;
        }
        .g{
            border-radius:50%;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
        }
        .out{

            position:relative;
            margin:0 auto;
            width:20rem;
            height:10rem;
        }
        .out .imgg{
            position:relative;
            bottom:0;
        }
        h2{display:block;}
    </style>
     
    <div class='snippet-body' >
    <!-- <h3 class="m-4 "><?php echo $title?></h3> -->

        <div class="row f" ">
            <div class="out g" style="text-align:center">
                <img src="../images/ts1.jpg"  class="imgg">
            </div>
           
        </div>
        <div class="row" style="padding-top:10rem;padding-bottom:0rem;color:black;background-color:transparent;">
            <div class="out" style="text-align:center;height:auto">
                <h2 >Zaneta Bhagwagar</h2>
                <h5>+91 93890 34220</h5>
                <h5>zaneta@gmail.com</h5>
                <a href="client_editprofile.php" style="background-color:#F6D3B6;color:#30120D" class="btn">Edit</a>
            </div>
           
        <hr class="container" style="border-top: 1px solid lightgrey;">
        
        <div class="row container-fluid mt-3" style="margin-left:0.1rem">
            <div class="col-xl-4 col-md-6 mb-5 ">
                <div class="card shadow h-100 py-3 " style="background-color:rgba(221,89,2,0.2);color:#30120D;">
                    <div class="card-body" style="border:none">
                        <div class="no-gutters justify-content-center text-center">
                            <div class="col-auto" >
                                <h2 class="h2">Bolts</h2>
                            </div><br>
                            <div class="col-auto">
                            <div class="mb-3"><i class="fa fa-bolt text-white" style="font-size:60px;color:orange`" aria-hidden="true"></i></div>
                            <br><div class="h1 mb-e mt-1">352</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-5 ">
                <div class="card shadow h-100 py-3 " style="background-color:rgba(221,89,2,0.2);color:#30120D;">
                    <div class="card-body" style="border:none">
                        <div class="no-gutters justify-content-center text-center">
                            <div class="col-auto" >
                                <h2 class="h2">Current Tournament</h2>
                            </div><br>
                            <div class="col-auto">
                            <div class="mb-3"><i class="fa fa-trophy text-white" style="font-size:60px;color:orange`" aria-hidden="true"></i></div>
                            <br><div class="h1 mb-1 mt-1">14590</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-5 ">
                <div class="card shadow h-100 py-3 " style="background-color:rgba(221,89,2,0.2);color:#30120D;">
                    <div class="card-body" style="border:none">
                        <div class="no-gutters justify-content-center text-center">
                            <div class="col-auto" >
                                <h2 class="h2">Total Score</h2>
                            </div><br>
                            <div class="col-auto">
                            <div class="mb-3"><i class="fa fa-star-half text-white" style="font-size:60px;color:orange`" aria-hidden="true"></i></div>
                            <br><div class="h1 mb-1 mt-1">90000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

<?php
    require_once('../client/client_footer.php');
?>
