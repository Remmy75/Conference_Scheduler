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
                
                    <h2>Sessions</h2>
                    
                        <?php for($i = 0; $i <= sizeof($location_title); ) {?>
                            <ul>
                                <li><?php echo implode(location_title_db::get_session_by_titleID($location_title[($i+1)])); ?></li>
                                <li><?php echo implode(location_title_db::get_room_num($location_title[$i])); ?></li>
                                <li><?php echo implode(location_title_db::get_title_name($location_title[($i+1)])); ?></li>
                                <li><?php echo implode(location_title_db::get_speaker_name($location_title[($i+1)])); ?></li>
                                <li><?php echo implode(location_title_db::get_category_name($location_title[($i+1)])); ?></li>

                            </ul>
                        
                    
                        <?php $i+=3; } ?>
                    

                <?php include 'view/footer.php'; ?>

