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
                <h1>Add Title to Conferences</h1>
                <p>Please choose which conference you would like to add <?php echo htmlspecialchars($title_name); ?> to:</p>
                        <form action="index.php" method="post">
                            <div class="checkbox">
                        <?php foreach ($conferences as $c) : ?>
                            <div class="checkbox-container">
                                <input type="radio" name="conference[]" id="<?php echo htmlspecialchars($c->getConference_name()); ?>" value="<?php echo htmlspecialchars($c->getConference_num()); ?>"><label for="<?php echo htmlspecialchars($c->getConference_name()); ?>"><?php echo htmlspecialchars($c->getConference_name()); ?></label>
                            </div>
                        <?php endforeach; ?> 
                    </div>
                            <div id="error"><?php echo htmlspecialchars($error_message['checkbox']); ?></div>
                    <input type="hidden" name="action" value="add_title_conference">
                    <input type="hidden" name="titleID" value=<?php echo htmlspecialchars($titleID);?>>
                    <input type="submit" value="Add to Conference">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

