<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
        <style>
            *, *:before, *:after {
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            }

            body {
            font-family: 'Lato', sans-serif;
            background: linear-gradient(to top, #f71543, #eb833e) fixed;
            }

            /***** For Smartphones *******/
            .container-center {
            position: absolute;
            left: 50%;
            width: 85%;
            height: auto;
            background-color: transparent;
            -webkit-transition: all 0.1s;
            transition: all 0.1s;
            bottom: 50%;
            -webkit-transform: translateX(-50%) translateY(50%);
                    transform: translateX(-50%) translateY(50%);
            }

            h2, img {
            text-align: center;
            color: white;
            font-weight: 10;
            text-shadow: 0px 1px rgba(0, 0, 0, 0.3);
            }
            .h3{
            text-align: center;
            color:black;
            font-size: 1.1em;
            font-family: times;
            font-style:normal;
            line-height: 130%;
            opacity: .6;
            }

            form {
            width: 100%;
            overflow: hidden;
            background-color: #FEFEFE;
            padding: 21px 13px;
            border-radius: 21px;
            -webkit-box-shadow: 0px 5px 34px rgba(0, 0, 0, 0.1);
                    box-shadow: 0px 5px 34px rgba(0, 0, 0, 0.1);
            }

            .form-group {
            position: relative;
            width: 100%;
            display: block;
            margin: 1em 0;
            font-size: 1em;
            }
            .form-group input {
            width: 100%;
            border: none;
            border-bottom: 1px solid #888888;
            padding: 8px 0;
            font-size: inherit !important;
            margin-bottom: 13px;
            outline: none;
            opacity: 0.7;
            font-weight: 600;
            }
            .form-group input:focus {
            opacity: 1;
            border-bottom: 2px solid #F71442;
            color: #F71442;
            }
            .form-group label {
            position: absolute;
            font-size: 0.8em;
            top: -1em;
            left: 0;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            opacity: 0.7;
            color: #888888;
            text-transform: uppercase;
            }
            
            #next-btn {
            border: none;
            color: #FEFEFE;
            padding: 0.8em 0;
            font-size: 1em;
            font-weight: 300;
            width: 100%;
            border-radius: 55px;
            -webkit-box-shadow: 0px 3px 21px rgba(255, 100, 0, 0.7);
                    box-shadow: 0px 3px 21px rgba(255, 100, 0, 0.7);
            background: -webkit-gradient(linear, left top, right top, from(#F98340), to(#F71442));
            background: linear-gradient(to right, #F98340, #F71442);
            background-size: 100%;
            text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
            padding: 0.8em 0;
            font-size: 1.2em;   
            }
            p {
            color: white;
            text-align: center;
            }
            p a {
            color: inherit;
            text-decoration: none;
            font-weight: bold;
            }
                     
            /***** For Desktop Monitors *******/
            @media screen and (min-width: 768px) {
            .container-center {
                width: 500px;
            }
        }

        </style>
    </head>

    <body>
        <div class="container-center">
            <center>
                <img src = "../images/logo.png" style="width:20rem" >
            </center>
            <h2>Don't Worry!</h2>
            <form action="/backend assets/forgotpassword.inc.php">
                <div class="form-group">
                
                <?php
                    $selector =$_GET["selector"];
                    $validator =$_GET["validator"];

                    if (empty($selector) || empty($validator)) {
                        # code...
                        echo "Could not validate your request!";
                    }else{
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ) {
                            ?>

                            <form action="/backend assets/forgotpassword.inc.php" method="post">
                                <input type="hidden" name="selector" value="<?php echo $selector?>">
                                <input type="hidden" name="validator" value="<?php echo $validator?>">
                                <input type="password" name="pwd" placeholder="Enter a new password.." id="">
                                <input type="password" name="pwd-repeat" placeholder="Repeat new password.." id="">
                                <button type="submit" name= "reset-password-submit">Reset password</button>
                            </form>

                            <?php
                        }
                    }
                ?>

                </div>
            </form>

            <p>Did you remember? <a href="/index.php">Sign In</a></p>
        </div>
    </body>
</html> 
<?php

    if (isset($_POST["reset-password-submit"])) {
        
        $selector=$_POST["selector"];
        $validator=$_POST["validator"];
        $password=$_POST["pwd"];
        $passwordrepeat=$_POST["pwd-repeat"];

        if (empty($password) || empty($passwordrepeat)) {
            header("location:../backend assets/create_new_pass.php?newpwd=empty");
            exit();
        } elseif($password != $passwordrepeat){
            header("location:../backend assets/create_new_pass.php?newpwd=pwdnotsame");
            exit();
        }

        $currentDate =date("U");

        require('/backend assets/connection.php');

        $sql = "SELECT * FROM PWDRESET WHERE PWDRESETSELECTOR=? AND PWDRESETEXPIRES >= ?";
        $stmt=mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo"There was an error!";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $selector,$currentDate);
            mysqli_stmt_execute($stmt);

            $result= mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_assoc($result)) {
                echo "You need to re-submit your reset request!";
                exit();
            }else {
                $tokenbin = hex2bin($validator);
                $tokencheck = password_verify($tokenbin, $row["PWDRESETTOKEN"]);
                
                if ($tokencheck === false) {
                    echo "You need to re-submit your reset request.";
                    exit();
                } elseif ($tokencheck === true) {
                    
                    $tokenEmail= $row["PWDRESETEMAIL"];
                    
                    $sql = "SELECT * FROM CLIENT WHERE CLIENT_EMAIL=?;";
                    $stmt=mysqli_stmt_init($conn);
        
                    if (!mysqli_stmt_prepare($stmt,$sql)) {
                        echo"There was an error!";
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result= mysqli_stmt_get_result($stmt);
                        if (!$row = mysqli_fetch_assoc($result)) {
                            echo "There was an error!";
                            exit();
                        }else {

                            $sql = "DELETE FROM PWDRESET WHERE PWDRESETEMAIL=?";
                            $stmt=mysqli_stmt_init($conn);
        
                            if (!mysqli_stmt_prepare($stmt,$sql)) {
                                echo"There was an error!";
                                exit();
                            }else{
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location:../index.php?newpass=passwordupdated");
                            }
                        // don't forget to update password success messsage!

                    }                            

                        }
                    }
                }
            }
            }else{
                header("location:../index.php");
            }


?>