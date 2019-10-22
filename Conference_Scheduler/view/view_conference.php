
<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
           <div class="heading"> 
           <h1>Conference Scheduler</h1>
           </div>
             
            <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1><?php echo $_SESSION['conference_num'] -> getConferenceName ?></h1>
                
                
                <table>
                    <tr>
                        <th>Title ID</th>
                        <th>Name</th>
                    </tr>
                        <?php foreach ($title as $t) : ?>
                            <tr>                
                                <td><?php echo htmlspecialchars($t->getTitleID()); ?></td>
                                <td><?php echo htmlspecialchars($t->getTitle_name()); ?></td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="edit_title">
                                        <input type="hidden" name="titleID" value="<?php echo htmlspecialchars($t->getTitleID()); ?>">
                                        <input type="submit" value="Edit Title">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table><br>
                <table>
                    <tr>
                        <th>Location ID</th>
                        <th>Building Name</th>
                        <th>Room Number</th>
                    </tr>
                        <?php foreach ($location as $l) : ?>
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
                            </tr>
                        <?php endforeach; ?>
                </table><br>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>


