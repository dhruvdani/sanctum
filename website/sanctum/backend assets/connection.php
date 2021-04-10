<?php
    $host='localhost';
    $database='sanctum_db';
    $password='';
    $username='root';


    $conn=mysqli_connect($host,$username,$password,$database,3308);

    if(!$conn)
    {
        echo '<h1>Connection Failed!!!</h1>';
    }
?>