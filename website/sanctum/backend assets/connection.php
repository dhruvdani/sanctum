<?php
    $host='localhost';
    $database='sanctum_db';
    $password='';
    $username='root';
    $port='3308';

    $conn=mysqli_connect($host,$username,$password,$database,$port);

    if(!$conn)
    {
        echo '<h1>Connection Failed!!!</h1>';
    }

?>