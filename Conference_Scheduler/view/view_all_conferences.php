
<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
        <div class="heading"> 
            <h1>Conference Scheduler</h1>
        </div>

        <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1>Conferences</h1>
                <table>
                    <tr>
                        <th>Conference Number</th>
                        <th>Conference Name</th>
                        <th>Location</th>
                    </tr>
                    <?php foreach ($conferences as $c) : ?>
                        <tr>                
                            <td><?php echo htmlspecialchars($c->getConference_num()); ?></td>
                            <td><?php echo htmlspecialchars($c->getConference_name()); ?></td>
                            <td><?php echo htmlspecialchars($c->getConference_location()); ?></td>
                            <td><form action="index.php" method="post">
                                    <input type="hidden" name="action" value="print_out_track_schedule">
                                    <input type="hidden" name="conference_num" value="<?php echo htmlspecialchars($c->getConference_num()); ?>">
                                    <input type="submit" value="Print Schedule">
                                </form></td>
                            <td><form action="index.php" method="post">
                                    <input type="hidden" name="action" value="schedule_conference_choice">
                                    <input type="hidden" name="conference_num" value="<?php echo htmlspecialchars($c->getConference_num()); ?>">
                                    <input type="submit" value="Schedule Conference">
                                </form></td>
                        </tr>
                    <?php endforeach; ?> 

                </table><br>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="enter_conference">
                    <input type="submit" value="Create Conference">
                </form>
            </main>
        </div>
    </div>

    <?php include 'view/footer.php'; ?>


