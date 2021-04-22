<?php
    $host='sql307.epizy.com';
    $database='epiz_28442673_sanctum_db';
    $password='9wxklTtHlGulm';
    $username='epiz_28442673';


    $conn=mysqli_connect($host,$username,$password,$database,3306);

    if(!$conn)
    {
        echo '<h1>Connection Failed!!!</h1>';
    }
?>