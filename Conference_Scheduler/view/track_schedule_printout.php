<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
        <div class="heading"> 
            <h1>Conference Scheduler</h1>
        </div>

        <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1><?php echo $conf_name[0]; ?></h1>
                
                    <h2>Schedule</h2>
                    
                        <?php for($i = 0; $i <= (sizeof($location_title)-1); ) {?>
                            <ul>
                                <?php $session_implode = $location_title[($i+2)];?>
                                <li> Session: <?php echo $session_implode; ?></li>
                                <?php $room_num_implode = implode("",location_title_db::get_room_num($location_title[$i])); 
                                $room_half = (int) ((strlen($room_num_implode)/2)); 
                                $room_print = substr($room_num_implode, 0, $room_half);?>
                                <li>Room #: <?php echo $room_print; ?></li>
                                <?php $title_name_implode = implode("",location_title_db::get_title_name($location_title[($i+1)])); 
                                $title_half = (int) ((strlen($title_name_implode)/2)); 
                                $title_print = substr($title_name_implode, 0, $title_half);?>
                                <li>Title Name: <?php echo $title_print; ?></li>
                                <?php $speaker_name_implode = implode("",location_title_db::get_speaker_name($location_title[($i+1)])); 
                                $speaker_half = (int) ((strlen($speaker_name_implode)/2)); 
                                $speaker_print = substr($speaker_name_implode, 0, $speaker_half);?>
                                <li>Speaker L-Name: <?php echo $speaker_print; ?></li>
                                <?php $cat_name_implode = implode("",location_title_db::get_category_name($location_title[($i+1)])); 
                                $cat_half = (int) ((strlen($cat_name_implode)/2)); 
                                $cat_print = substr($cat_name_implode, 0, $cat_half);?>
                                <li>Category: <?php echo $cat_print; ?></li>

                            </ul><hr>
                        
                    
                        <?php $i+=3; } ?>
                    

                <?php include 'view/footer.php'; ?>

