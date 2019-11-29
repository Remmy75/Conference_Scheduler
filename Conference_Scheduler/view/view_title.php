
<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
            <div class="heading"> 
           <h1>Conference Scheduler</h1>
            </div>
             
            <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1>Titles</h1>
                <table>
                    <tr>
                        <th>Title ID</th>
                        <th>Name</th>
                    </tr>
                        <?php foreach ($titles as $t) : ?>
                            <tr>                
                                <td><?php echo htmlspecialchars($t->getTitleID()); ?></td>
                                <td><?php echo htmlspecialchars($t->getTitle_name()); ?></td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="edit_title">
                                        <input type="hidden" name="titleID" value="<?php echo htmlspecialchars($t->getTitleID()); ?>">
                                        <input type="submit" value="Edit Title">
                                    </form>
                                </td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="title_to_conference">
                                        <input type="hidden" name="titleID" value="<?php echo htmlspecialchars($t->getTitleID()); ?>">
                                        <input type="submit" value="Add to Conference">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?> 

                </table><br>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="view_enter_titles">
                    <input type="submit" value="Enter Title">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>


