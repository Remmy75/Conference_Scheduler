<?php
if (!isset($title_name)) {
    $title_name = '';
}

if (!isset($error_message)) {
    $error_message = [];
    $error_message['title_name'] = '';
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
                <h1>Edit Titles</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="commitTitleUpdate">
                    <input type="hidden" name="title ID" value="<?php echo $titleID; ?>">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                        <label>Title ID:</label><p><?php echo $titleID; ?></p></br>
                    </li>
                        
                    <li class="form-row">
                        <label>Name:</label>
                        <input type="text" name="title_name" value="<?php echo htmlspecialchars($title_name); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['title_name']); ?></div>
                    </li>

                    <li class="form-row">
                    <button type="submit" value="commitTitleUpdate">Edit Title</button>
                    </li>
                    
          
                    </ul>
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

