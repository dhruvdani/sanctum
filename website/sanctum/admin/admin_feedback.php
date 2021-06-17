<?php
    $title="Ideas";
    require_once('header.php');

    $sql_view='select * from feedback;';
    $result=mysqli_query($conn,$sql_view);
    $resultcheck=mysqli_num_rows($result);
    
   
?>


    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">	
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column"  style="background-color:transparent">

            <!-- Main Content -->
            <div id="content">

                <div class="container-fluid" >
                <style>
                    .table-hover tbody tr:hover td,
                    .table-hover tbody tr:hover th {
                        font-weight :700 ; 
                        background-color: rgba(153, 164, 196,0.7);
                        color:white;
                    }   
                </style>
                    
                <div class="card  mb-4" style="color:#261903;border:none;background:#ced8e8"  >
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body" id="test1">
                            <div class="table-responsive" id="test">
                                <table class="table table-hover" id="dataTable" width="100%" style="color:#261903;" cellspacing="0";>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mail</th>
                                            <th>Contact</th>
                                            <th>Time</th>
                                            <th>Message</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mail</th>
                                            <th>Contact</th>
                                            <th>Time</th>
                                            <th>Message</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if($resultcheck>0)
                                        {
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                $fetch_id=$row["FEEDBACK_ID"];
                                                $fetch_name=$row["FEEDBACK_NAME"];
                                                $fetch_mail=$row["FEEDBACK_EMAIL"];
                                                $fetch_contact=$row["FEEDBACK_CONTACT"];
                                                $fetch_time=$row["FEEDBACK_TIME"];
                                                $fetch_message=$row["FEEDBACK_MESSAGE"];

                                                
                                                echo"
                                                <tr>
                                                    <td>".$fetch_id."</td>
                                                    <td>".$fetch_name."</td>
                                                    <td>".$fetch_mail."</td>
                                                    <td>".$fetch_contact."</td>
                                                    <td>".$fetch_time."</td>
                                                    <td>".$fetch_message."</td>
                                                    <td></td>

                                               </tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <!-- <td><a class='btn' href='#'><i class='fa fa-edit text-white' aria-hidden='true'></i></a></td> -->

                                </table>
                            </div>	
							<!--<button onClick="printContent()">Print</button>-->
                        </div>
                    </div>

                </div>

            </div>
            
        </div>
        <!-- End of Content Wrapper -->

    </div>
	

<?php
    require_once('footer.php');
?>