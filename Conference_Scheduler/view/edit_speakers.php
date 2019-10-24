<?php
if (!isset($fname)) {
    $fname = '';
}

if (!isset($lname)) {
    $lname = '';
}

if (!isset($phone_num)) {
    $phone_num = '';
}

if (!isset($email)) {
    $email = '';
}

if (!isset($error_message)) {
    $error_message = [];
    $error_message['fname'] = '';
    $error_message['lname'] = '';
    $error_message['phone_num'] = '';
    $error_message['email'] = '';
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
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="commitSpeakerUpdate">
                    <input type="hidden" name="action" value="<?php echo $speakerID; ?>">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                        <label>Speaker ID:</label><p><?php echo $speakerID; ?></p></br>
                    </li>
                        
                    <li class="form-row">
                        <label>First Name:</label>
                        <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['fname']); ?></div>
                    </li>

                    <li class="form-row">
                        <label>Last Name:</label>
                        <input type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['lname']); ?></div>
                    </li>
                    
                    <li class="form-row">
                        <label>Phone Number:</label>
                        <input type="text" name="phone_num" value="<?php echo htmlspecialchars($phone_num); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['phone_num']); ?></div>
                    </li> 
                    
                    <li class="form-row">
                        <label>Email:</label>
                        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['email']); ?></div>
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

