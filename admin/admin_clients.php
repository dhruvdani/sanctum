<?php
    $title="Clients";
    require('header.php');

    $sql_view='select * from client;';
    $result=mysqli_query($conn,$sql_view);
    $resultcheck=mysqli_num_rows($result);
    
   
?>

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column"style="background-color:transparent">

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
                    .timg{

                    }
                </style>
                    
                <div class="card mb-4 " style="color:white;border:none;background:linear-gradient(0deg, rgba(255,0,67,0.2) 0%, rgba(0,0,0,0.56) 100%);">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-hover text-white" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Mail</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>Total Score</th>
                                            <th>Total Tokens</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Mail</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>Total Score</th>
                                            <th>Total Tokens</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if($resultcheck>0){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $fetch_id=$row["CLIENT_ID"];
                                                $fetch_name=$row["CLIENT_NAME"];
                                                $fetch_photo=$row["CLIENT_PROFILE_PHOTO"];
                                                $fetch_mail=$row["CLIENT_EMAIL"];
                                                $fetch_contact=$row["CLIENT_CONTACT"];
                                                $fetch_status=$row["CLIENT_STATUS"];
                                                $fetch_score=$row["CLIENT_TOTAL_SCORE"];
                                                $fetch_token=$row["CLIENT_SANCTUM_TOKEN"];

                                                /* you can also use this for fetching image from database!!!:
                                                 echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';*/
                                                    
                                                echo"<tr>
                                                    <td>".$fetch_id."</td>
                                                    <td> <img src=".$fetch_photo." height='50' width='50' style='border-radius:50%;' /></td>
                                                    <td>".$fetch_name."</td>
                                                    <td>".$fetch_mail."</td>
                                                    <td>".$fetch_contact."</td>
                                                    <td> <input type='checkbox' checked data-toggle='toggle' data-onstyle='danger' data-offstyle='warning'> </td>
                                                    <td>".$fetch_score."</td>
                                                    <td>".$fetch_token."</td>
                                                    <td><a class='btn ' href='#'><i class='fa fa-trash text-white' aria-hidden='true'></i></a></td>
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