
<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
            <div class="heading"> 
           <h1>Conference Scheduler</h1>
            </div>
             
            <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1>Equipment</h1>
                <table>
                    <tr>
                        <th>Equipment ID</th>
                        <th>Name</th>
                    </tr>
                        <?php foreach ($equipments as $e) : ?>
                            <tr>                
                                <td><?php echo htmlspecialchars($e->getEquipID()); ?></td>
                                <td><?php echo htmlspecialchars($e->getName()); ?></td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="edit_equipment">
                                        <input type="hidden" name="equipID" value="<?php echo htmlspecialchars($e->getEquipID()); ?>">
                                        <input type="submit" value="Edit Equipment">
                                    </form>
                                </td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="equipment_to_title">
                                        <input type="hidden" name="equipID" value="<?php echo htmlspecialchars($e->getEquipID()); ?>">
                                        <input type="submit" value="Add Equipment to Title">
                                    </form>
                                </td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="equipment_to_location">
                                        <input type="hidden" name="equipID" value="<?php echo htmlspecialchars($e->getEquipID()); ?>">
                                        <input type="submit" value="Add Equipment to Location">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?> 

                </table><br>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="view_enter_equipment">
                    <input type="submit" value="Enter Equipment">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>


