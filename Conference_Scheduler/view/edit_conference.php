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
            <main>
                <h1>Edit Location</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="commitConferenceUpdate">
                    <input type="hidden" name="conference_num" value="<?php echo $conference_num; ?>">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                        <label>Conference ID:</label><p><?php echo $conference_num; ?></p></br>
                    </li>
                        
                    <li class="form-row">
                        <label>Conference Name:</label>
                        <input type="text" name="conference_name" value="<?php echo htmlspecialchars($conference_name); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['conference_name']); ?></div>
                    </li>

                    <li class="form-row">
                        <label>Conference Location:</label>
                        <input type="text" name="conference_location" value="<?php echo htmlspecialchars($conference_location); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['conference_location']); ?></div>
                    </li>
                    
                    <li class="form-row">
                    <button type="submit" value="commitConferenceUpdate">Edit Conference</button>
                    </li>
                    
          
                    </ul>
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

