<?php

    require('connection.php');
	
	
    function dateCheck($tournament_end_date)
    {
        $date=substr($tournament_end_date,8,2);
	    $month=substr($tournament_end_date,5,2);
	    $year=substr($tournament_end_date,0,4);

        //echo date("Y-m-d")." --- ".$date."-".$month."-".$year;

        $today=getdate();
        $today_date=$today['mday'];
		$today_month=date('m',strtotime($today['month']));
		$today_year=$today['year'];
		
		if($year>$today_year)
		{
			//$error_date="It is a Future Date.";
            return 1;
		}
		else if($year<$today_year)
		{
			//$error_date="It is a Past Date.";
            return -1;
		}
		else
		{
			if($month>$today_month)
			{
				//$error_date="It is a Future Date.";
                return 1;
			}
			else if($month<$today_month)
			{
				//$error_date="It is a Past Date.";
                return -1;
			}
			else
			{
				if($date>$today_date)
				{
					//$error_date="It is a Future Date.";
                    return 1;
				}
				else if($date<$today_date)
				{
					//$error_date="It is a Past Date.";
                    return -1;
				}
				else
				{
					//$error_date="It is Present date.";
                    return 0;
				}
			}
		}
        //echo "<br><h1>".$error_date."</h1>";

    }

    function get_tournament_id()
    {
		
		require('connection.php');
        $query="select * from tournament order by TOURNAMENT_ID DESC;";

        $result=mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            $start_val=dateCheck($row['TOURNAMENT_START']);
            $end_val=dateCheck($row['TOURNAMENT_END']);

            if(($start_val==0) || ($end_val==1 && $start_val==-1) || $end_val==0)
            {
                return (int)$row['TOURNAMENT_ID'];
            }
        }
        return 0;
    }
	$current_tournament_id=get_tournament_id();
	echo $current_tournament_id;
	$id=$_POST['client_id'];
	
	
	$tetris_game_id=$_POST['tetris_game_id'];
	$tetris_game_score=$_POST['tetris_game_score'];
	$tetris_game_bolt=$_POST['tetris_game_bolt'];
	
	$snake_game_id=$_POST['snake_game_id'];
	$snake_game_score=$_POST['snake_game_score'];
	$snake_game_bolt=$_POST['snake_game_bolt'];
	
	$memory_game_id=$_POST['memory_game_id'];
	$memory_game_score=$_POST['memory_game_score'];
	$memory_game_bolt=$_POST['memory_game_bolt'];
	
	$insert1="insert into scoreboard (CLIENT_ID,GAME_ID, TOURNAMENT_ID,SCORE_TOTAL) 
	VALUES ('$id', '$tetris_game_id', '$current_tournament_id', '$tetris_game_score'); ";
		
	$insert2="insert into scoreboard (CLIENT_ID,GAME_ID, TOURNAMENT_ID,SCORE_TOTAL) 
	VALUES ('$id', '$snake_game_id', '$current_tournament_id', '$snake_game_score'); ";
		
	$insert3="insert into scoreboard (CLIENT_ID,GAME_ID, TOURNAMENT_ID,SCORE_TOTAL) 
	VALUES ('$id', '$memory_game_id', '$current_tournament_id', '$memory_game_score'); ";
	
	if($tetris_game_score!=0)
		mysqli_query($conn,$insert1);
	if($snake_game_score!=0)
		mysqli_query($conn,$insert2);
	if($memory_game_score!=0)
		mysqli_query($conn,$insert3);
	
	$query="select * from client where CLIENT_ID ='".$id."';";
    $result=mysqli_query($conn,$query);
   	
	$row=mysqli_fetch_array($result);
    
    $update_score=$row['CLIENT_TOTAL_SCORE'] + $tetris_game_score + $snake_game_score + $memory_game_score;
    $update_token=$row['CLIENT_SANCTUM_TOKEN']+ $tetris_game_bolt + $snake_game_bolt + $memory_game_bolt;
	
	$query="UPDATE client set CLIENT_TOTAL_SCORE= '$update_score' WHERE CLIENT_ID = $id;";
    mysqli_query($conn,$query);
	
	$query="UPDATE client set CLIENT_SANCTUM_TOKEN= '$update_token' WHERE CLIENT_ID = $id;";
    mysqli_query($conn,$query);
		
	echo json_encode("Client score inserted and updated");
		
		/*$query1="SELECT * FROM client where LOWER(CLIENT_EMAIL) = '".$email."';";
		$result1=mysqli_query($conn,$query1);
		$row=mysqli_fetch_array($result1);
		$data=array('1',$row['CLIENT_ID'],$row['CLIENT_NAME']);*/
		//header('Content-Type: application/json');
		/*if($result=mysqli_query($conn,$new_user))
		{
			echo "You are now a member of Sanctum Gamers Club ".$name;
		}
		else
		{
			echo "Due to some technical issue we can't process your admission to Sanctum Gamers Club.\nTry again later.";
		}*/
	

?>