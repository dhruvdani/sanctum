
<?php
    
    function get_feedback(){
        require('../backend assets/connection.php');
        $query="select count(*) as count from feedback;";
        
        $result=mysqli_query($conn,$query);

        $row=mysqli_fetch_array($result);
        
        return $row[0];
    }

    function get_client(){
        require('../backend assets/connection.php');
        $query="select count(*) as count from client;";
        
        $result=mysqli_query($conn,$query);

        $row=mysqli_fetch_array($result);
        
        return $row[0];
    }

    function get_game(){
        require('../backend assets/connection.php');
        $query="select count(*) as count from game;";
        
        $result=mysqli_query($conn,$query);

        $row=mysqli_fetch_array($result);
        
        return $row[0];
    }

    function get_tournament(){
        require('../backend assets/connection.php');
        $query="select count(*) as count from tournament;";
        
        $result=mysqli_query($conn,$query);

        $row=mysqli_fetch_array($result);
        
        return $row[0];
    }

    function get_registrations(){
        require('../backend assets/connection.php');
        $query="select count(*) as count from registration;";
        
        $result=mysqli_query($conn,$query);

        $row=mysqli_fetch_array($result);
        
        return $row[0];
    }

    function get_visitor(){
        
        $counter_name = "../counter.txt";
        $f = fopen($counter_name,"r");
        $counterVal = fread($f, filesize($counter_name));
        fclose($f);

        return $counterVal;
    }
?>











