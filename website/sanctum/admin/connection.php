<?php
    $host='localhost';
    $database='sanctum_db';
    $password='';
    $username='root';
    $port='3306';

    $conn=mysqli_connect($host,$username,$password,$database);

    if(!$conn)
    {
        echo '<h1>Connection Failed!!!</h1>';
    }

?>