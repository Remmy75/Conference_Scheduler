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
                <h1>Add Equipment to Locations</h1>
                <p>Please choose which locations you would like to add <?php echo htmlspecialchars($equipID);?>  <?php echo htmlspecialchars($name); ?> to:</p>
                        <form action="index.php" method="post">
                            <div class="checkboxes">
                            <?php foreach ($locations as $l) : ?>
                                <div class="checkbox-container">
                                <input type="radio" name="location[]" id="<?php echo htmlspecialchars($l->getRoom_num()); ?>" value="<?php echo htmlspecialchars($l->getLocationID()); ?>"><label for="<?php echo htmlspecialchars($l->getRoom_num()); ?>"><?php echo htmlspecialchars($l->getRoom_num()); ?></label>
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <div id="error"><?php echo htmlspecialchars($error_message['checkbox']); ?></div>
                    <input type="hidden" name="action" value="add_equipment_location">
                    <input type="hidden" name="equipID" value=<?php echo htmlspecialchars($equipID);?>>
                    <input type="submit" value="Add to Location">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

