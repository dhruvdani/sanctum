<?php
    require('/backend assets/connection.php');

    if (isset($_POST["reset-request-submit"])) {
        
        $selector = bin2hex(random_bytes(8));
        $token=random_bytes(32);
        
        // include your hosted website url here! starting with www
        $url= "/backend assets/create_new_pass.php?selector=".$selector."&validator=".bin2hex($token);


        $expires=date("U") + 1800;

        $userEmail=$_POST["email"];

        $sql="DELETE FROM PWDRESET WHERE PWDRESETEMAIL=?;";
        $stmt=mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo"There was an error!";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s" ,$userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO PWDRESET (PWDRESETEMAIL,PWDRESETSELECTOR,PWDRESETTOKEN,PWDRESETEXPIRES) VALUES(?,?,?,?);";
        $stmt=mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo"There was an error!";
            exit();
        }else{
            $hasedToken =password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss" ,$userEmail, $selector, $hasedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        $to = $userEmail;

        $subject = 'Reset your password for Sanctum';

        $message = '<p> We recieved a password reset request.The link to reset your password is below.If you did not make this request,you can ignore  this email. </p>';
        $message .= '<p>Here is your password reset link: <br>';
        $message .= '<a href="' .$url.'">'. $url .' </a> </p>';

        // <> will have sanctum mail in this
        $headers="From: Sanctum <Sanctum@gmail.com>\r\n";
        $headers .= "Reply-To: Sanctum@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        header("Location: ../backend assets/forgotpasword.php?reset=success");

    } else {
        header("location:/index.php");
    }
    
?>