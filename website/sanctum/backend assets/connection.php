<?php
	$server='localhost';
	$password='';
	$database='sanctum_db';
	$user='root';
	$conn=mysqli_connect($server,$user,$password,$database,3308);
	
	if(!$conn)
	{
		echo "<center><h1>Connection not established</h1></center>";
	}
?>