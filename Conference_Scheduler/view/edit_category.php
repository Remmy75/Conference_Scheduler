<?php
if (!isset($name)) {
    $name = '';
}


if (!isset($error_message)) {
    $error_message = [];
    $error_message['category_name'] = '';
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
                <h1>Edit Category</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="commitCategoryUpdate">
                    <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                        <label>Equipment ID:</label><p><?php echo $categoryID; ?></p></br>
                    </li>
                        
                    <li class="form-row">
                        <label>Name:</label>
                        <input type="text" name="category_name" value="<?php echo htmlspecialchars($category_name); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['category_name']); ?></div>
                    </li>

                    <li class="form-row">
                    <button type="submit" name="Edit Category">Edit Category</button>
                    </li>
                    
          
                    </ul>
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

