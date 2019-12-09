
<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
            <div class="heading"> 
           <h1>Conference Scheduler</h1>
            </div>
             
            <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1>Category</h1>
                <table>
                    <tr>
                        <th>Cat ID</th>
                        <th>Name</th>
                    </tr>
                        <?php foreach ($categories as $c) : ?>
                            <tr>                
                                <td><?php echo htmlspecialchars($c->getCategoryID()); ?></td>
                                <td><?php echo htmlspecialchars($c->getCategory_name()); ?></td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="edit_category">
                                        <input type="hidden" name="categoryID" value="<?php echo htmlspecialchars($c->getCategoryID()); ?>">
                                        <input type="submit" value="Edit Category">
                                    </form>
                                </td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="category_to_title">
                                        <input type="hidden" name="categoryID" value="<?php echo htmlspecialchars($c->getCategoryID()); ?>">
                                        <input type="submit" value="Add Category to Title">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?> 

                </table><br>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="view_enter_category">
                    <input type="submit" value="Enter Category">
                </form>
            </main>
        </div>
    </div>
    
<?php include 'view/footer.php'; ?>


