<?php include 'view/header.php'; ?>

<body>
    <div class="wrapper">
        <div class="heading"> 
            <h1>Conference Scheduler</h1>
        </div>

        <?php include 'view/nav.php'; ?>
        <div class="content">
            <main>
                <h1><?php echo $conference->getConferenceName(); ?></h1>
                <?php for ($i = 0; $i <= $num_sessions; $i++) { ?>
                    <h2><?php echo 'Session ' . ($i + 1); ?></h2>
                    <table>
                        <tr>
                            <th>Room Number</th>
                            <th>Topic</th>
                            <th>Speaker</th>
                        </tr>
                        <?php foreach ($conference as $c) : ?>
                            <tr>

                                <td><?php echo htmlspecialchars($c->getRoom_num()); ?></td>
                                <td><?php echo htmlspecialchars($c->getTitle_name()); ?></td>
                                <td><?php echo htmlspecialchars($c->getLName()); ?></td>

                            </tr>
                        <?php endforeach; ?> 
                    </table><br>
                <?php } ?>


                <?php include 'view/footer.php'; ?>

