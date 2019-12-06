
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
                <table>
                    <tr>
                        <th>Speaker ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                        <?php foreach ($speakers as $s) : ?>
                            <tr>                
                                <td><?php echo htmlspecialchars($s->getSpeakerID()); ?></td>
                                <td><?php echo htmlspecialchars($s->getFname()); ?></td>
                                <td><?php echo htmlspecialchars($s->getLname()); ?></td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="edit_speakers">
                                        <input type="hidden" name="speakerID" value="<?php echo htmlspecialchars($s->getSpeakerID()); ?>">
                                        <input type="submit" value="Edit Speaker">
                                    </form></td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="speakers_to_title">
                                        <input type="hidden" name="speakerID" value="<?php echo htmlspecialchars($s->getSpeakerID()); ?>">
                                        <input type="submit" value="Add Speaker to Title">
                                    </form></td>
                            </tr>
                        <?php endforeach; ?> 

                </table><br>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="view_enter_speakers">
                    <input type="submit" value="Enter Speaker">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>


