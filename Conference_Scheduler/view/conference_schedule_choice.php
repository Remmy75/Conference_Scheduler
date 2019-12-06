<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
        <div class="heading"> 
            <h1>Conference Scheduler</h1>
        </div>

        <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1>Conference Choice</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="track_schedule">

                    <button type="submit" value="<?php echo $conference_num; ?>" name="conference_num">Track Scheduler</button>
                </form><br>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="regular_schedule">

                    <button type="submit" value="<?php echo $conference_num; ?>" name="conference_num">Conventional Scheduler</button>
                </form>


                <?php include 'view/footer.php'; ?>

