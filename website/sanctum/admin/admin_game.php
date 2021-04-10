<?php
    $title="Game Management";
    require_once('../admin/header.php');

    $sql_view='select * from game;';
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

<script>
$("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
    $(e.target)
      .prev()
      .find("i:last-child")
      .toggleClass("fa-minus fa-plus");
 });
</script>

<div class="container-fluid myaccordion" id="accordion">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4" style="background-color:transparent">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block bg-transparent card-header py-3" style="border:none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-white" >New Game</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="card-body container collapse mb-3" id="collapseCardExample" data-parent="#accordion">

            <form method="post" enctype="multipart/form-data" action="game_manager.php?section=add">
            
                <div class="row">
                    <div class="col-xl-12"><label for="g_name">Name </label><input type="text" name="game_name" id="game_name" class="form-control" placeholder="Enter game name"/></div>
                    </div>
                <div class="row">
                    <!-- <div class="col-xl-6 mt-2"><label for="g_status">Status</label><input type="text" name="game_status" id="game_status" class="form-control" placeholder="Enter game status"/></div> -->
                    <div class="col-xl-12 mt-2"><label for="g_description">Description</label><input type="text" name="game_description" id="game_description" class="form-control" placeholder="Enter game description"/></div>
                </div>
                <div class="row">
                    <div class="col-xl-6 mt-2"><label for="g_image">Profile Image</label><input type="file" name="game_image" id="game_image" class="form-control"/></div>
                    <div class="col-xl-6 mt-2"><label for="g_category">Category</label><br><input type="text" name="game_category" id="game_category" class="form-control" placeholder="Enter category of game"/></div>
                </div>
                    <!-- buttons -->
                    <div class="row mt-4 float-right">
                    <div><button type="reset" id="btn-reset" name="btn-reset" onClick="reset_value('add');" class="btn btn-danger mr-2">Reset</button></div>
                    <div><button type="submit" id="btn-save" name="btn-save" class="btn btn-success mr-3 ml-2">Save</button></div>
                </div>

            </form>
            <script>
                function reset_value(section)
                {
                    if(section=="add")
                    {
                        document.getElementById('game_name').value="";
                        document.getElementById('game_category').value="";
                        document.getElementById('game_description').value="";
                        document.getElementById('game_image').value="";
                    }
                }
            </script>
        </div>

    </div>
    
    <!-- Collapsable Card Example -->
    <!-- <div class="card shadow mb-4" style="background-color:transparent"> -->
        <!-- Card Header - Accordion -->
        <!-- <a href="#collapseCardE" class="d-block bg-transparent card-header py-3" style="border:none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardE">
            <h6 class="m-0 font-weight-bold text-white" >Edit Game</h6>
        </a> -->
        <!-- Card Content - Collapse -->
        <!-- <div class="card-body container collapse mb-3" id="collapseCardE" data-parent="#accordion">
            <div class="row">
                <div class="col-xl-12"><label for="g_name">Name </label><input type="text" name="g_name" id="g_name" class="form-control" placeholder="Enter game name"/></div>
                </div>
            <div class="row">
                <div class="col-xl-6 mt-2"><label for="g_status">Status</label><input type="text" name="g_status" id="g_status" class="form-control" placeholder="Enter game status"/></div>
                <div class="col-xl-6 mt-2"><label for="g_description">Description</label><input type="text" name="g_description" id="g_description" class="form-control" placeholder="Enter game description"/></div>
            </div>
            <div class="row">
                <div class="col-xl-6 mt-2"><label for="g_image">Profile Image</label><input type="file" name="g_image" id="g_image" class="form-control"/></div>
                <div class="col-xl-6 mt-2"><label for="g_category">Category</label><br><select id="g_category" class="btn " name="g_category"><option value="Cards">Cards</option><option value="quiz">Quiz</option></select></div>
            </div>
             
            <div class="row mt-4 float-right">
                <div><button type="reset" name="edit-reset"  onClick="reset_value('edit');" class="btn btn-danger mr-2">Reset</button></div>
                <div><button type="submit" class="btn btn-success mr-3 ml-2">Submit</button></div>
            </div>
        </div>
    </div> -->
</div>  
<div id="wrapper" ">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-color:transparent ">

        <!-- Main Content -->
        <div id="content">

            <div class="container-fluid" >
                <!-- table -->
                <div class="card mb-4 " style="color:#261903;border:none;background-color:#6E9673;">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" style="color:#261903;" width="100%" cellspacing="0" >
                                <thead>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                    <?php
                                    if($resultcheck>0){
                                        while($row=mysqli_fetch_assoc($result)){
                                            $fetch_id=$row["GAME_ID"];
                                            $fetch_name=$row["GAME_NAME"];
                                            $fetch_status=$row["GAME_STATUS"];
                                            $fetch_description=$row["GAME_DESCRIPTION"];
                                            $fetch_profile_image=$row["GAME_PROFILE_IMAGE"];
                                            $fetch_category=$row["GAME_CATEGORY"];

                                            echo"<tr>
                                                <td>".$fetch_id."</td>
                                                <td> <img src='".$fetch_profile_image."' height='50' width='50' style='border-radius:50% ;' /></td>                                
                                                <td>".$fetch_name."</td>
                                                <td>".$fetch_description."</td>
                                                <td>".$fetch_category."</td>
                                            </tr>";
                                        }
                                        // <td>".$fetch_status."</td>
                                        // <td><a class='btn' href='delete_id=".$fetch_id."'><i class='fa fa-trash text-white' aria-hidden='true'></i></a></td> 
                                        // <td><a class='btn' href='edit_id=".$fetch_id."'><i class='fa fa-edit text-white' aria-hidden='true'></i></a></td> 
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

</div>

<script>

    const params = new URLSearchParams(window.location.search)
    
    for (const param of params) 
    {
        if(param[0].toString()==="section")
        {
            alert("Invalid file format provided!!!");
            break;
        }
    }

</script>
<?php
    require_once('../admin/footer.php');
?>