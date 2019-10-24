<?php
if (!isset($name)) {
    $name = '';
}


if (!isset($error_message)) {
    $error_message = [];
    $error_message['name'] = '';
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
                <h1>Edit Equipment</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="commitEquipmentUpdate">
                    <input type="hidden" name="action" value="<?php echo $equipID; ?>">
                    
                    <ul class="form-wrapper">
                    <li class="form-row">
                        <label>Speaker ID:</label><p><?php echo $equipID; ?></p></br>
                    </li>
                        
                    <li class="form-row">
                        <label>Email:</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
                        <div id="error"><?php echo htmlspecialchars($error_message['name']); ?></div>
                    </li>

                    <li class="form-row">
                    <button type="submit" value="commitEquipmentUpdate">Edit Equipment</button>
                    </li>
                    
          
                    </ul>
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>

