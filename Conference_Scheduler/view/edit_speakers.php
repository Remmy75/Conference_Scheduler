<?php
if (!isset($fName)) {
    $fName = '';
}

if (!isset($lName)) {
    $lName = '';
}

if (!isset($error_message)) {
    $error_message = [];
    $error_message['fName'] = '';
    $error_message['lName'] = '';
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
                <h1>Edit Speakers</h1>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="commitSpeakerUpdate">
                    <input type="hidden" name="action" value="<?php echo $speakerID; ?>">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                        <label>Speaker ID:</label><p><?php echo $speakerID; ?></p></br>
                    </li>
                        
                    <li class="form-row">
                        <label>First Name:</label>
                        <input type="text" name="fname" value="<?php echo htmlspecialchars($fName); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['fName']); ?></div>
                    </li>

                    <li class="form-row">
                        <label>Last Name:</label>
                        <input type="text" name="lname" value="<?php echo htmlspecialchars($lName); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['lName']); ?></div>
                    </li>

                    <li class="form-row">
                    <button type="submit" value="commitSpeakerUpdate">Edit Speaker</button>
                    </li>
                    
          
                    </ul>
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

