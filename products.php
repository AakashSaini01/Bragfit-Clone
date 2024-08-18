<?php

include 'common/connection.php';

$cid = $_GET['id'];

$sql = 'SELECT * from products WHERE category_id = '.$cid;

$result = $con->query($sql);



?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'common/head.php'; ?>
</head>

<body>
    <?php include 'common/header.php'; ?>

        

    <div class="container align">
        <div class="row">
            <?php foreach ($result as $col) { ?>         
                <div class="col-lg-4 col-md-6 center">
                    <a href="product_info.php?id=<?= $col['product_id'] ?>">
                        <div class="position-relative">
                            <img src="assets/images/<?= $col['product_img'] ?>" />
                            <div class="badge1 rounded-pill bg-warning">
                                <span class="badge rounded-pill bg-warning"> -20% </span>
                            </div>
                            <h6><?= $col['product_name'] ?></h6>
                            <span
                                class="text-decoration-line-through text-secondary">₹<?= $col['product_old_price'] ?>.00</span>
                            <span class="text-warning">₹<?= $col['product_price'] ?>.00</span>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    </div>
    </div>