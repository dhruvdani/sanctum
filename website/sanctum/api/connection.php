<?php
	$server='localhost';
	$password='';
	$database='sanctum_db';
	
	$conn=mysqli_connect($server,'root',$password,$database);
	
	if(!$conn)
	{
		echo "<center><h1>Connection not established</h1></center>";
	}
?>