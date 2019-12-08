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
                            <?php foreach ($locations as $l) : ?>
                            <label><input type="checkbox" name="location[]" value="<?php echo htmlspecialchars($l->getLocationID()); ?>"><?php echo htmlspecialchars($l->getRoom_num()); ?></label><br>
                            <?php endforeach; ?>
                            <div id="error"><?php echo htmlspecialchars($error_message['checkbox']); ?></div>
                    <input type="hidden" name="action" value="add_equipment_location">
                    <input type="hidden" name="equipID" value=<?php echo htmlspecialchars($equipID);?>>
                    <input type="submit" value="Add to Location">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

