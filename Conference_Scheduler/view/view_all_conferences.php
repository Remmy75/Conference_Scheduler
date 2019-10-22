conference_num
conference_name
conference_location
start_time
end_time
lunch
session_length
break_length
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
                        <th>Conference Number</th>
                        <th>Conference Name</th>
                        <th>Location</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Lunch</th>
                        <th>Session Length</th>
                        <th>Break Length</th>
                    </tr>
                        <?php foreach ($conference as $c) : ?>
                            <tr>                
                                <td><?php echo htmlspecialchars($c->getConference_num()); ?></td>
                                <td><?php echo htmlspecialchars($c->getConference_name()); ?></td>
                                <td><?php echo htmlspecialchars($c->getConference_location()); ?></td>
                                <td><?php echo htmlspecialchars($c->getStart_time()); ?></td>
                                <td><?php echo htmlspecialchars($c->getEnd_time()); ?></td>
                                <td><?php echo htmlspecialchars($c->getLunch()); ?></td>
                                <td><?php echo htmlspecialchars($c->getSession_length()); ?></td>
                                <td><?php echo htmlspecialchars($c->getBreak_length()); ?></td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="view_conference">
                                        <input type="hidden" name="conference_num" value="<?php echo htmlspecialchars($c->getConference_num()); ?>">
                                        <input type="submit" value="View Conference">
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


