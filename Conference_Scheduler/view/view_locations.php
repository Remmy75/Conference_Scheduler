
<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
            <div class="heading"> 
           <h1>Conference Scheduler</h1>
            </div>
             
            <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1>Locations</h1>
                <table>
                    <tr>
                        <th>Location ID</th>
                        <th>Building Name</th>
                        <th>Room Number</th>
                    </tr>
                        <?php foreach ($locations as $l) : ?>
                            <tr>                
                                <td><?php echo htmlspecialchars($l->getLocationID()); ?></td>
                                <td><?php echo htmlspecialchars($l->getBldgName()); ?></td>
                                <td><?php echo htmlspecialchars($l->getRoom_num()); ?></td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="edit_location">
                                        <input type="hidden" name="locationID" value="<?php echo htmlspecialchars($l->getLocationID()); ?>">
                                        <input type="submit" value="Edit Equipment">
                                    </form>
                                </td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="location_to_conference">
                                        <input type="hidden" name="locationID" value="<?php echo htmlspecialchars($l->getLocationID()); ?>">
                                        <input type="submit" value="Add to Conference">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?> 

                </table><br>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="enter_location">
                    <input type="submit" value="Enter Location">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>


