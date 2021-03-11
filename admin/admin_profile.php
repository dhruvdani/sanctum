<?php
    $title="Admin Profile";
    require('header.php');
   
?>

   <!-- <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'> -->
  
    <style>
            /* .snippet-body {
                background:#4e1d3c;
                color:white;
            } */
    
            .form-control:focus {
                box-shadow: none;
                border-color: #BA68C8
            }
    
            .profile-button {
                background:rgb(99, 39, 120);
                box-shadow: none;
                border: none;
                width:100%;
            }
    
            .profile-button:hover {
                background: #682752;
            }
    
            .profile-button:focus {
                background: #682752;
                box-shadow: none
            }
    
            .profile-button:active{
                background: #682752;
                box-shadow: none
            }
    
            /* .back:hover {
                color: #682773;
                cursor: pointer
            } */
    
            .labels {
                font-size: 11px;
            }

            .round{
                /* glass effect */
                background: linear-gradient(0deg, rgba(255,0,67,0.25) 0%, rgba(0,0,0,0.5692493567306004) 100%);

                /* background-color:rgba(43, 0, 44, 0.35); */
                /* background-color:#00000088; */
                color:white;
                
            }
            .imgs{
                display: block;
                height: auto;
                max-width: 100%;
                border-radius:50%;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
            }
            .ratio {
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;

                height: 0;
                padding-bottom: 100%;
                position: relative;
                width: 100%;
            }
            .l{
                right:0;
                bottom: 0;;
                position: absolute;
                border-radius:50%;
                -moz-border-radius: 50px;
                -webkit-border-radius: 50px;}
            .imgs .l{
                width: 50px;
                cursor: pointer;
                border: 2px solid bisque;
                background-color:#431f7e;
            }
            </style>
       
    <div class='snippet-body container-fluid' >
    
        <div class="container round rounded mt-5 mb-5 " >
            <div class="row">
                <div class="col-md-4 ">
                    <div class="d-flex flex-column align-items-center mt-5 text-center ">
                        <div class="imgs ratio" style="background-image: url(https://i.pinimg.com/564x/db/f4/57/dbf457b891e871f0f02597b4decf7931.jpg);">
                            <label for="file-input">
                                <img class="l" src="img/edit.png"/>
                            </label>
                            <input style="display: none;" id="file-input" type="file"/>
                        </div> 
                        <br> <p class="font-weight-bold">Amelly</p>
                        <p class="text-50">amelly12@bbb.com</p>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7 ">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <!-- <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div> 
                        </div> -->
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Enter name" value=""></div>
                            <div class="col-md-12"><label class="labels" style="display:block;">Username</label><input type="text" class="form-control" placeholder="Enter name" style="width:90%;display:inline-block" value=""><span> .admin</span></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="Enter email id" value=""></div>
                            <div class="col-md-12"><label class="labels">Contact Number</label><input type="text" class="form-control" placeholder="Enter phone number" value=""></div>
                            <div class="col-md-12"><label class="labels">Alternate Number</label><input type="text" class="form-control" placeholder="Enter alternate number" value=""></div>
                            <div class="col-md-12"><label class="labels">Bio</label><input type="textarea" class="form-control" placeholder="Bio" value=""></div>
                            <div class="col-md-12"><label class="labels">Recovery Pin</label><input type="text" class="form-control" placeholder="Security Pin" value=""></div>
                        </div>
                        
                        <div class="mt-5 w-100 text-center"><button class="btn w-100" style="background-color:#431f7e;color:white" type="button">Save Profile</button>
                        </div> 
                    </div>
                </div>
                <!-- <div class="col-md-4">
                
                </div> -->
            </div>
        </div>  
    </div>

<?php
    require('footer.php');
?>
