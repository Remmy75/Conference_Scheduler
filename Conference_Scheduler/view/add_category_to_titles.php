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
                <h1>Add Categories to Titles</h1>
                <p>Please choose which category you would like to add to <?php echo htmlspecialchars($categoryID); ?>  <?php echo htmlspecialchars($category_name); ?> :</p>
                <form action="index.php" method="post">
                    <div class="checkbox">
                        <?php foreach ($titles as $t) : ?>
                            <div class="checkbox-container">
                                <input type="radio" name="title[]" id="<?php echo htmlspecialchars($t->getTitle_name()); ?>" value="<?php echo htmlspecialchars($t->getTitleID()); ?>"><label for="<?php echo htmlspecialchars($t->getTitle_name()); ?>"><?php echo htmlspecialchars($t->getTitle_name()); ?></label>
                            </div><hr>
                        <?php endforeach; ?>
                    </div>
                    <div id="error"><?php echo htmlspecialchars($error_message['checkbox']); ?></div>
                    <input type="hidden" name="action" value="add_category_title">
                    <input type="hidden" name="categoryID" value=<?php echo $categoryID; ?>>
                    <input type="submit" value="Add to Title">
                </form>
            </main>
        </div>
    </div>

    <?php include 'view/footer.php'; ?>

