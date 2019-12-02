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
                <h1>Add Locations to Conferences</h1>
                <p>Please choose which conference you would like to add <?php echo htmlspecialchars($locationID);?>  <?php echo htmlspecialchars($room_num); ?> to:</p>
                        <form action="index.php" method="post">
                            <?php foreach ($conferences as $c) : ?>
                                <input type="checkbox" name="conference[]" value="<?php echo htmlspecialchars($c->getConference_num()); ?>"><?php echo htmlspecialchars($c->getConference_name()); ?><br>
                            <?php endforeach; ?>
                            <div id="error"><?php echo htmlspecialchars($error_message['checkbox']); ?></div>
                    <input type="hidden" name="action" value="add_location_conference">
                    <input type="hidden" name="locationID" value=<?php echo $locationID;?>>
                    <input type="submit" value="Add to Conference">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

