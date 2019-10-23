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
                <h2>Add Speaker Title</h2>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_title">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                    <label>Title Name:</label>
                    <input type="text" name="title_name" value="<?php echo htmlspecialchars($title_name); ?>">
                    <div id="error"><?php echo htmlspecialchars($error_message['title_name']); ?></div>
                    </li>
                    
                    <li class="form-row">
                    <button type="submit" value="add_title">Add Speaker Title</button>
                    </li>
                    
          
                    </ul>
                </form>
            </div>
        </div>
        
<?php include 'view/footer.php'; ?>
