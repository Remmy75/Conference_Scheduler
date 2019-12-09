<?php
if (!isset($error_message)) {
    $error_message = [];
    $error_message['checkbox'] = '';
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
                <h1>Add Speakers to Titles</h1>
                <p>Please choose which titles you would like to add <?php echo htmlspecialchars($fName . " " . $lName); ?> to:</p>
                        <form action="index.php" method="post">
                            <div class="checkbox">
                        <?php foreach ($titles as $t) : ?>
                            <div class="checkbox-container">
                                <input type="radio" name="title[]" id="<?php echo htmlspecialchars($t->getTitle_name()); ?>" value="<?php echo htmlspecialchars($t->getTitleID()); ?>" /><label for="<?php echo htmlspecialchars($t->getTitle_name()); ?>"><?php echo htmlspecialchars($t->getTitle_name()); ?></label>
                            </div><hr>
                        <?php endforeach; ?>
                    </div>
                            <div id="error"><?php echo htmlspecialchars($error_message['checkbox']); ?></div>
                    <input type="hidden" name="action" value="add_speakers_title">
                    <input type="hidden" name="speakerID" value=<?php echo $speakerID; ?>>
                    <input type="submit" value="Add to Title">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

