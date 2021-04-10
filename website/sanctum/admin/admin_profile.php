<?php
    $title="Admin Profile";
    require_once('../admin/header.php');

    if(isset($_POST['save']))
    {
        $username=$_POST['admin_username'];
        if(substr($username,strlen($username)-6,6) != '.admin')
        {
            $username =$username . '.admin';
        }
        $query="UPDATE administrator set ADMIN_NAME = '".$_POST['admin_name']."', ADMIN_USERNAME = '".$username."', 
                ADMIN_EMAIL = '".$_POST['admin_email']."', ADMIN_CONTACT_1 = '".$_POST['admin_contact_1']."', 
                ADMIN_CONTACT_2 = '".$_POST['admin_contact_2']."', ADMIN_MESSAGE = '".$_POST['admin_message']."', 
                ADMIN_RECOVERY_PIN = '".$_POST['admin_recovery_pin']."' WHERE ADMIN_ID = ".$_SESSION['admin_id'].";";
        mysqli_query($conn,$query);
    }

    $error_msg="";
    $upload=0;

    if(isset($_POST['submit']))
    {
        $target_dir = "admin_profile/";
        $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //echo $target_file." :: ".$imageFileType;
        
        // echo "<pre>";
        // print_r($_FILES['profile_photo']);
        $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
        if($check!==false)
        {
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
            {
                $error_msg = "Sorry, only JPG, JPEG & PNG files are allowed.";
                $upload = 0;
            } 
            else
            {
                if(move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file))
                {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["profile_photo"]["name"])). " has been uploaded.<br>";
                    
                    if (file_exists($_SERVER['DOCUMENT_ROOT'].$_SESSION['admin_profile_photo'])) 
                    {
                        unlink($_SERVER['DOCUMENT_ROOT'].$_SESSION['admin_profile_photo']);
                    }
                    $_SESSION['admin_profile_photo']=substr($_SERVER['PHP_SELF'],0,strripos($_SERVER['PHP_SELF'],"/")+1).$target_file;

                    $query="UPDATE administrator set ADMIN_PROFILE_PHOTO = '".substr($_SERVER['PHP_SELF'],0,strripos($_SERVER['PHP_SELF'],"/")+1).$target_file."' where ADMIN_ID = ".$_SESSION['admin_id'].";";
                    mysqli_query($conn,$query);
                } 
                else 
                {
                    $error_msg = "Sorry, there was an error uploading your file.";
                    $upload = 0;
                }
            }
        }
        else
        {
            $error_msg="Please select an image file only.";
        }
        //echo "</pre>";
    }

    $query="SELECT * FROM administrator where ADMIN_ID = ".$_SESSION['admin_id'].";";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);

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
    
            .labels {
                font-size: 11px;
            }

            .round{
                /* glass effect */
                /* background: linear-gradient(0deg, rgba(255,0,67,0.25) 0%, rgba(0,0,0,0.5692493567306004) 100%); */

                /* background-color:rgba(43, 0, 44, 0.35); */
                background-color:#6E9673;
                color:#261903;
                
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
                background-color:#ffbb02;
            }
        </style>
       
    <div class='snippet-body container-fluid' >
    
        <div class="container round rounded mt-5 mb-5 " >
            <div class="row">
                <div class="col-md-4 ">
                    <div class="d-flex flex-column align-items-center mt-5 text-center ">
                        <div class="imgs ratio" style="background-image: url(<?php echo $row['ADMIN_PROFILE_PHOTO']?>);">
                            <label for="file-input">
                                <img class="l" src="img/edit.png"/>
                            </label>

                            <form method="post" enctype="multipart/form-data">
                                <input style="display: none;" name="profile_photo" id="file-input" type="file"/>
                                <input type="submit" value="Upload Image" name="submit" hidden="true" id="submit">
                            </FORM>
                            <script>
                                document.getElementById('file-input').onchange = function() {
                                    document.getElementById('submit').click();
                                };
                            </script>
                        </div> 
                        <span><?php echo (!$upload) ? $error_msg : "" ;?><span>
                        <br> <p class="font-weight-bold"><?php echo $row['ADMIN_NAME']?></p>
                        <p class="text-50"><?php echo $row['ADMIN_EMAIL']?></p>
                    </div>  
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7 ">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right font-weight-bold">Profile Settings</h4>
                        </div>
                        <!-- <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div> 
                        </div> -->
                        <form method="POST">
                            <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Name</label><input name="admin_name" type="text" class="form-control" placeholder="Enter name" value="<?php echo $row['ADMIN_NAME']?>"></div>
                                    <div class="col-md-12"><label class="labels" style="display:block;margin-top:2%;">Username</label><input name="admin_username" type="text" class="form-control" placeholder="Enter name" style="width:90%;display:inline-block" value="<?php echo $row['ADMIN_USERNAME']?>"><span> .admin</span></div>
                                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="admin_email" placeholder="Enter email id" value="<?php echo $row['ADMIN_EMAIL']?>"></div>
                                    <div class="col-md-12"><label class="labels">Contact Number</label><input type="text" class="form-control" name="admin_contact_1" placeholder="Enter phone number" value="<?php echo $row['ADMIN_CONTACT_1']?>"></div>
                                    <div class="col-md-12"><label class="labels">Alternate Number</label><input type="text" class="form-control" name="admin_contact_2" placeholder="Enter alternate number" value="<?php echo $row['ADMIN_CONTACT_2']?>"></div>
                                    <div class="col-md-12"><label class="labels">Bio</label><input type="textarea" class="form-control" placeholder="Bio" name="admin_message" value="<?php echo $row['ADMIN_MESSAGE']?>"></div>
                                    <div class="col-md-12"><label class="labels">Recovery Pin</label><input maxlength="6" type="text" class="form-control" placeholder="Security Pin" name="admin_recovery_pin" value="<?php echo $row['ADMIN_RECOVERY_PIN']?>"></div>
                            </div>
                            
                            <div class="mt-5 w-100 text-center"><button class="btn w-100" style="background-color:#FFBB02;color:white" name="save" type="submit">Save Profile</button>
                        </form>
                        </div> 
                    </div>
                </div>
                <!-- <div class="col-md-4">
                
                </div> -->
            </div>
        </div>  
    </div>

<?php
    require_once('../admin/footer.php');
?>
