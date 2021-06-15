<?php  
	$error_message="";
	$flag=false;
	require('connection.php');
	if(isset($_POST["request-submit"]))
	{
		$user=$_POST['email'];
		if(strtolower(substr($user,strlen($user)-6,6)) == ".admin")
		{
			$query="select * from administrator where ADMIN_USERNAME ='".$user."';";
			$result=mysqli_query($conn,$query);
			if($result->num_rows > 0)
			{
				$row=mysqli_fetch_array($result);
				$subject="New password for your sanctum account.";
				$randomNumber=rand(1000,100000);
				$password=substr(md5($randomNumber),1,8);
				$message="Dear ".$row['ADMIN_NAME'].",\n\nYour change password request for sanctum gaming account has been completed successfully.\n\nYour Password for ".$row['ADMIN_NAME']." is: ".$password."\n\nPlease make sure you don't disclose this password to anyone and you can update from client edit section from your dashboard.\n\n\nRegards, \nTeam Sanctum";
				mail($row['ADMIN_EMAIL'],$subject,$message);  
				$update="update administrator set ADMIN_PASSWORD='".$password."' where ADMIN_Id='".$row['ADMIN_ID']."';";
				mysqli_query($conn,$update);
				$flag=true;
			}
			else
			{
				$error_message="*You are not an adminstrator user.";
			}
		}
		else
		{
			$query="select * from client where CLIENT_EMAIL='".$_POST['email']."';";
			$result=mysqli_query($conn,$query);
			
			if($result->num_rows>0)
			{
				$row=mysqli_fetch_array($result);
				$subject="New password for your sanctum account.";
				$randomNumber=rand(1000,100000);
				$password=substr(md5($randomNumber),1,8);
				$message="Dear ".$row['CLIENT_NAME'].",\n\nYour change password request for sanctum gaming account has been completed successfully.\n\nYour Password for ".$_POST['email']." is: ".$password."\n\nPlease make sure you don't disclose this password to anyone and you can update from client edit section from your dashboard.\n\n\nRegards, \nTeam Sanctum";
				mail($_POST['email'],$subject,$message);  
				$update="update client set CLIENT_PASSWORD='".$password."'where CLIENT_Id='".$row['CLIENT_ID']."';";
				mysqli_query($conn,$update);
				$flag=true;
			}
			else
			{
				$error_message="*Your email is not registered with us.";
			}
		}
	}
	
	$default='<form method="post">
            <div class="form-group" >                
                <label class="h3" for="exampleInputEmail1">Enter your email address and  we will send you a link to reset your password.</label><br>
                <br><input type="text" name="email" class="form-control form-control-sm" placeholder="Enter your email address"><br>
				<span style="color:tomato;font-size:1rem;">'.$error_message.'</span><br><br>
                <button type="submit" id="next-btn" class="btn btn-primary btn-block" name="request-submit">Send password reset email</button>    
                </div>
            </form>';
	$success='<form method="post">
            <div class="form-group" >                
                <label class="h3" for="exampleInputEmail1" style="color:green;">New password has been sent to your registered email successfully.</label><br>
                <br>
				
                <center><a type="submit" id="next-btn" class="btn btn-primary btn-block" style="padding:10px 10px;text-decoration:none;" href="../index.php">Go to Sanctum</a>    </center>
                </div>
            </form>';
?>

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
                <img src = "/images/logo.png" style="width:20rem" >
            </center>
            <h2>Don't Worry!</h2>
			
			<?php echo ($flag)?$success:$default;?>
            
            <p>Did you remember? <a href="/index.php">Sign In</a></p>
        </div>
    </body>
</html> 
