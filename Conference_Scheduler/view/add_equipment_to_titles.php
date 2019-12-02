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
                <h1>Add Equipment to Titles</h1>
                <p>Please choose which title's you would like to add <?php echo htmlspecialchars($equipID);?>  <?php echo htmlspecialchars($name); ?> to:</p>
                        <form action="index.php" method="post">
                            <?php foreach ($titles as $t) : ?>
                                <input type="checkbox" name="title[]" value="<?php echo htmlspecialchars($t->getTitleID()); ?>"><?php echo htmlspecialchars($t->getTitle_name()); ?><br>
                            <?php endforeach; ?> 
                            <div id="error"><?php echo htmlspecialchars($error_message['checkbox']); ?></div>
                    <input type="hidden" name="action" value="add_equipment_title">
                    <input type="hidden" name="equipID" value=<?php echo $equipID; ?>>
                    <input type="submit" value="Add to Title">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

