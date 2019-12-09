<?php
if (!isset($fname)) {
    $fname = '';
}

if (!isset($lname)) {
    $lname = '';
}

if (!isset($error_message)) {
    $error_message = [];
    $error_message['fname'] = '';
    $error_message['lname'] = '';
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
                <h1>Add Speakers</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="enter_speakers">
                    
                    <ul class="form-wrapper">
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
                    <button type="submit" value="enter_speakers">Add Speaker</button>
                    </li>
                    
          
                    </ul>
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

