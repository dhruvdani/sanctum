<?php

require_once('../backend assets/connection.php');

session_start();

if(!isset($_SESSION['admin_name']) || !isset($_GET['section']))
{
    header('location:../index.php');
}
else
{
    if(isset($_POST['btn-save']))
    {
        if($_GET['section']=="add")
        {
            $target_dir = '/backend assets/images/game/';
            $target_file = $target_dir . basename($_FILES["game_image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
            echo "<pre>";
            print_r($_FILES['game_image']);
            echo "</pre>";

            $upload=0;
            $check = getimagesize($_FILES["game_image"]["tmp_name"]);
            if($check!==false)
            {
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
                {
                    $error_msg = "Sorry, only JPG, JPEG & PNG files are allowed.";
                    $upload = 0;
                } 
                else
                {
                    if(move_uploaded_file($_FILES["game_image"]["tmp_name"],'..'. $target_file))
                    {
                        $query="insert into game(GAME_NAME,GAME_STATUS,GAME_DESCRIPTION,GAME_PROFILE_IMAGE,GAME_CATEGORY) 
                            values('".$_POST['game_name']."',1,'".$_POST['game_description']."',
                            '".$target_file."',
                            '".$_POST['game_category']."');";
                        
                        //echo $query;
                        mysqli_query($conn,$query);
                        header('location:admin_game.php');
                        $upload=1;
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
            
            if($upload==0)
            {
              header('location:admin_game.php?section=add&error_code="'.$error_msg.'"');
            }
            
        }
        elseif($_GET['section']="edit")
        {
            echo "edit";
        }
    }
}

?>