<?php 


    function get_game_section()
    {
        require('connection.php');

        $query='select * from game where GAME_STATUS=1;';
        $result=mysqli_query($conn,$query);
        //echo '<pre>';
        while($row=mysqli_fetch_array($result))
        {
            //header("Content-type: image/jpeg"); // but get the right type 
            //echo $image; 
            //echo '<img height=150px width=150px src="'.$image.'"/>';
            //echo '<img src="data:image/jpeg;base64,'.base64_encode($image->load()) .'" />';
            echo '
                <li> 
                    <div class="testimonial-img-grid">
                        <div class="testimonial-img t-img1">
                            <img src="image.jpg" alt="" />
                        </div>
                        <!-- //Main icon image -->
                        <div class="testimonial-img">
                            <img src="backend assets\\'.$row["GAME_PROFILE_IMAGE"].'" alt="" />
                        </div>
                        <div class="testimonial-img t-img2">
                            <img src="image.jpg" alt="" />
                        </div> 
                        <div class="clearfix"> </div>
                    </div>
                    <div class="testimonial-img-info">
                        <h5>'.$row['GAME_NAME'].'</h5>
                        
                        <p>'.$row['GAME_DESCRIPTION'].'</p>
                    </div>
                </li>
            ';
        }
        //echo '</pre>';
    }

?>