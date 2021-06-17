<?php
    $title="Clients";
    require_once('header.php');

    if(isset($_GET['id']) && isset($_GET['current_status']))
    {
        if($_GET['current_status'])
        {
            $query="update client set CLIENT_STATUS = 0 where CLIENT_ID = ".$_GET['id'];
        }
        else
        {
            $query="update client set CLIENT_STATUS = 1 where CLIENT_ID = ".$_GET['id'];
        }
        mysqli_query($conn,$query);
    }

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
                        background-color: rgba(153, 164, 196,0.7);
                        /* rgba(0, 0, 0, 0.12); */
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
                    
                </style>
                    
                <div class="card mb-4 " style="color:#261903;border:none;background-color:#ced8e8">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-hover" style="color:#261903;" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Mail</th>
                                            <th>Contact</th>
                                            <!-- <th>Status</th> -->
                                            <th>Total Score</th>
                                            <th>Total Tokens</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
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
                                    </tfoot> -->
                                    <tbody><form method="post">
                                        <?php
                                            if($resultcheck>0)
                                            {
                                                while($row=mysqli_fetch_assoc($result))
                                                {
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
                                                    
                                                    if($fetch_status==1)
                                                    {
                                                        $status_button="<a class='btn btn-info btn-sm' href='admin_clients.php?id=".$fetch_id."&current_status=".$fetch_status."'><img src='img/remove.svg'></img></a>";
                                                    }
                                                    else
                                                    {
                                                        $status_button="<a class='btn btn-danger btn-sm' href='admin_clients.php?id=".$fetch_id."&current_status=".$fetch_status."'><img src='img/add.svg'></img></a>";
                                                    }
                                                    echo"<tr>
                                                        <td>".$fetch_id."</td>
                                                        <td> <img src='".$fetch_photo."' height='50' width='50' style='border-radius:50%;' /></td>
                                                        <td>".$fetch_name."</td>
                                                        <td>".$fetch_mail."</td>
                                                        <td>".$fetch_contact."</td>
                                                        
                                                        <td>".$fetch_score."</td>
                                                        <td>".$fetch_token."</td>
                                                        <td>".$status_button."</td>
                                                        </tr>";
                                                        
                                                        //<td> <input type='checkbox' ". (($fetch_status==1)?"checked":"") ." data-toggle='toggle' data-onstyle='danger' type='submit' data-offstyle='warning'> </td>
                                                }
                                            }
                                            ?></form>
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
    require_once('footer.php');
?>