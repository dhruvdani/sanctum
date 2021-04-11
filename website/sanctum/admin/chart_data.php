<?php
    
    function myregistration()
    {
        require('../backend assets/connection.php');

        $data=array();

        $query="select t.TOURNAMENT_NAME as tname,count(*) as total from registration as r,tournament as t where t.TOURNAMENT_ID=r.TOURNAMENT_ID group by t.TOURNAMENT_ID;";
        $result=mysqli_query($conn,$query);
        
        while($row=mysqli_fetch_assoc($result))
        {
            $data[]=$row;
        }
        echo json_encode($data);
    }

    myclient();
    
    function myclient()
    {
        require('../backend assets/connection.php');

        $data=array();
        for($i=0; $i< 2 ; $i++)
        {
            $query="select count(CLIENT_STATUS) as status from client where CLIENT_STATUS=".$i." group by CLIENT_STATUS;";
            $result=mysqli_query($conn,$query);
            
            if($result->num_rows > 0)
            {
                $row=mysqli_fetch_assoc($result);
                $data[]=$row['status'];
            }
            else
            {
                $data[]="0";
            }
        }
        echo json_encode($data);
    }

?>