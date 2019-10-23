<?php
if (!isset($conference_name)) {
    $conference_name = '';
}

if (!isset($conference_location)) {
    $conference_location = '';
}

if (!isset($start_time)) {
    $start_time = '';
}

if (!isset($end_time)) {
    $end_time = '';
}

if (!isset($lunch)) {
    $lunch = '';
}

if (!isset($session_length)) {
    $session_length = '';
}

if (!isset($break_length)) {
    $break_length = '';
}

if (!isset($error_message)) {
    $error_message = [];
    $error_message['conference_name'] = '';
    $error_message['conference_location'] = '';
    $error_message['start_time'] = '';
    $error_message['end_time'] = '';
    $error_message['lunch'] = '';
    $error_message['session_length'] = '';
    $error_message['break_length'] = '';
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
                    <input type="hidden" name="action" value="add_conference">
                    
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
                    <label>Start time:</label>
                    <input type="text" name="start_time" value="<?php echo htmlspecialchars($start_time); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['start_time']); ?></div>
                    </li>
                    
                    
                    <li class="form-row">
                    <label>End time:</label>
                    <input type="text" name="end_time" value="<?php echo htmlspecialchars($end_time); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['end_time']); ?></div>
                    </li>
                    
                    <li class="form-row">
                    <label>Lunch:</label>
                    <input type="text" name="lunch" value="<?php echo htmlspecialchars($lunch); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['lunch']); ?></div>
                    </li>

                    <li class="form-row">
                    <label>Session Length:</label>
                    <input type="text" name="session_length" value="<?php echo htmlspecialchars($session_length); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['session_length']); ?></div>
                    </li>
                    
                    <li class="form-row">
                    <label>Break Length:</label>
                    <input type="text" name="break_length" value="<?php echo htmlspecialchars($break_length); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['break_length']); ?></div>
                    </li>

                    <li class="form-row">
                    <button type="submit" value="add_conference">Add Conference</button>
                    </li>
                    
                    </ul>
                </form>
                
            </div>
        </div>
        
<?php include 'view/footer.php'; ?>
