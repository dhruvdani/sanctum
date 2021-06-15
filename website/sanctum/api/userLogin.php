<?php
    
    if(true) //$_POST['AUTH_KEY']=='youcantcrackme' 
    {
        $client_email=strtolower("dhruvbdani@gmail.com");
        
        require('connection.php');
        $query='select * from client where CLIENT_EMAIL="'.$client_email.'";';
        //echo $query;
        
        $result=mysqli_query($conn,$query);
        $data=array();
        if($result->num_rows>0)
        {
            $status=["STATUS"=>"TRUE"];
            array_push($data,$status);
            $row=mysqli_fetch_assoc($result);
            array_push($data,$row);
        }
        else
        {
            $status=["STATUS"=>"FALSE"];
            array_push($data,$status);
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        
    }
    else
    {
        header('location:https://mysanctum.games/error/403-Forbidden.html');
    }
?>