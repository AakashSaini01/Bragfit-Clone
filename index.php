<?php
include 'common/connection.php';

$sql = 'SELECT * FROM category';

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'common/head.php'; ?>
</head>

<body>

    <?php include 'common/header.php'; ?>

    <?php include 'common/carousel.php' ?>

    <div class="container">
        <div class="box">
            <div class="row">
                <?php foreach ($result as $col) { ?>
                    <div class="col-6">
                        <a href="products.php?id=<?= $col['category_id'] ?>" class="text-decoration-none">
                            <div class="border mt-3 mb-3">
                                <?= $col['category_img'] ?>
                                <br />
                                <h2><?= $col['category_name'] ?></h2>
                                <p><?= $col['description'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php include 'common/footer.php'; ?>
</body>

</html>