
<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
            <div class="heading"> 
           <h1>Conference Scheduler</h1>
            </div>
             
            <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1>Speakers</h1>
                
                
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="view_enter_speakers">
                    <input type="submit" value="Enter Speaker">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>


