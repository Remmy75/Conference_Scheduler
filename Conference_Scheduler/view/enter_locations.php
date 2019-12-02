<?php
if (!isset($bldg_name)) {
    $bldg_name = '';
}

if (!isset($room_num)) {
    $room_num = '';
}

if (!isset($error_message)) {
    $error_message = [];
    $error_message['bldg_name'] = '';
    $error_message['room_num'] = '';
}
?>

<?php include 'view/header.php'; ?>

    <body>
        <div class="wrapper">
            <div class="heading"> 
           <h1>Conference Scheduler</h1>
            </div>
             
            <?php include 'view/nav.php'; ?>
           
            <div class="content"> 
                 <h2>Add Locations</h2>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="enter_location">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                    <label>Building Name:</label>
                    <input type="text" name="bldg_name" value="<?php echo htmlspecialchars($bldg_name); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['bldg_name']); ?></div>
                    </li>

                    <li class="form-row">
                    <label>Room Number:</label>
                    <input type="text" name="room_num" value="<?php echo htmlspecialchars($room_num); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['room_num']); ?></div>
                    </li>
                    
                    <li class="form-row">
                    <button type="submit" value="enter_location">Add Location</button>
                    </li>
                    
          
                    </ul>
                </form>
            </div>
        </div>
        
<?php include 'view/footer.php'; ?>
