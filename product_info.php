<?php

include 'common/connection.php';

$pid = $_GET['id'];

$sql = 'select * from products where product_id =' . $pid;


$row = $con->query($sql);




?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'common/head.php'; ?>
</head>

<body>
    <?php include 'common/header.php'; ?>

    <div class="container">
        <div class="row">
            <?php foreach ($row as $col) { ?>
                <div class="col-6 text-center">
                    <div class="position-relative">
                        <img src="assets/images/<?= $col['product_img'] ?>" width="80%" />

                        <div class="badge1 rounded-pill bg-warning">
                            <span class="badge rounded-pill bg-warning"> -20% </span>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <ol class="breadcrumb">
                        <a href="#" class="breadcrumb-item active">Home</a>
                        <a href="#" class="breadcrumb-item active">T-Shirts</a>
                        <a href="#" class="breadcrumb-item active">Men's T-Shirts</a>
                        <a href="#" class="breadcrumb-item active">Men's Printed T-Shirts</a>
                        <span class="breadcrumb-last" style="color: #333;">Coffee Men’s Printed T-Shirt </span>
                    </ol>

                    <h1 class="mb-3"><?= $col['product_name'] ?></h1>
                    <span class="text-decoration-line-through"
                        style="color: lightgray; font-size: 25px;">₹<?= $col['product_old_price'] ?>.00</span>
                    <span class="text-warning" style="font-size: 25px;">₹<?= $col['product_price'] ?>.00</span>



                    <p><?= $col['description'] ?></p>

                    <div class="mt-3">
                        <form action="cart.php" method="post">
                            <button type="button" id="sub">-</button>
                            <input type="text" id="qty" readonly="" value="1" name="qty" />
                            <input type="hidden" value="<?= $col['product_id'] ?>" name="product_id" />
                            <button type="button" id="add">+</button>
                            <button type="submit" class="btn btn-warning">Add TO CART</button>

                            <script>
                                $(document).ready(function () {
                                    $('#add').on('click', function () {
                                        $('#qty').val(parseInt($('#qty').val()) + 1);
                                    });
                                    $('#sub').on('click', function () {
                                        if ($('#qty').val() <= 0) {
                                            $('#qty').val(0);
                                        } else {
                                            $('#qty').val(parseInt($('#qty').val()) - 1);
                                        }
                                    });
                                });
                            </script>
                        </form>
                    </div>

                    <i class="fa-regular fa-heart">
                        <span>Add to wishlist</span>
                    </i>
                    <span class="d-block fs-5">
                        <span>SKU:</span>
                        <span class="text-secondary">N/A </span>
                    </span>

                    <span class="d-block fs-6">
                        <span>Categories:</span>
                        <span class="text-secondary">T-Shirts,Men's Printed T-Shirts,Men's T-Shirts</span>
                    </span>

                    <span class="d-block fs-6">
                        <span> Tag:</span>
                        <span class="text-secondary"> Printed T-Shirts</span>
                    </span>

                    <span class="d-block fs-6">
                        <span class="clr">Share:</span>
                        <i class="fa-brands fa-facebook-f" style="color: #636569;"></i>
                        <i class="fa-brands fa-x-twitter" style="color: #6b6b6b;"></i>
                        <i class="fa-solid fa-envelope" style="color: #6d6f74;"></i>
                        <i class="fa-brands fa-whatsapp" style="color: #4f5154;"></i>
                        <i class="fa-brands fa-telegram" style="color: #48494c;"></i>
                    </span>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php include 'common/footer.php'; ?>
</body>

</html>