<?php
if (!isset($conference_name)) {
    $conference_name = '';
}

if (!isset($conference_location)) {
    $conference_location = '';
}

if (!isset($error_message)) {
    $error_message = [];
    $error_message['conference_name'] = '';
    $error_message['conference_location'] = '';
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
                 <h2>Add Conference</h2>
                 
                 <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="enter_conference">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                    <label>Conference Name:</label>
                    <input type="text" name="conference_name" value="<?php echo htmlspecialchars($conference_name); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['conference_name']); ?></div>
                    </li>

                    <li class="form-row">
                    <label>Location:</label>
                    <input type="text" name="conference_location" value="<?php echo htmlspecialchars($conference_location); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['conference_location']); ?></div>
                    </li>
                    
                    
                    <li class="form-row">
                    <button type="submit" value="enter_conference">Add Conference</button>
                    </li>
                    
                    </ul>
                </form>
                
            </div>
        </div>
        
<?php include 'view/footer.php'; ?>
