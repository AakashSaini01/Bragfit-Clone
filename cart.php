<?php
include 'common/connection.php';


if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit(); // Always exit after a redirect
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['d_p_id'])) {
        $d_id = $_POST['d_p_id'];

        $sql = 'DELETE from cart where product_id = ' . $d_id . ' ';
        $flag = $con->query($sql);

        if ($flag) {
            echo '<script>alert("Product Deleted successfully")</script>';
        } else {
            echo '<script>alert("Product can\'t be Deleted")</script>';
        }
    }

    if (isset($_POST['qty']) && isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
        // Sanitize input values
        $qty = intval($_POST['qty']);
        $product_id = intval($_POST['product_id']);
        $user_id = intval($_SESSION['user_id']);

        // Check if the product is already in the cart
        $checkSql = "SELECT * FROM cart WHERE product_id = '$product_id' AND user_id = '$user_id'";
        $checkResult = $con->query($checkSql);

        if ($checkResult->num_rows > 0) {
            // Product exists, update it
            $updateSql = "UPDATE cart SET qty ='$qty' WHERE product_id = '$product_id' AND user_id = '$user_id'";
            $updateResult = $con->query($updateSql);
        } else {
            // Product does not exist, insert it
            $insertSql = "INSERT INTO cart (user_id, product_id, qty) VALUES ('$user_id', '$product_id', '$qty')";
            $insertResult = $con->query($insertSql);

            if ($insertResult) {
                echo '<script>alert("Product added...")</script>';
            } else {
                echo '<script>alert("Product can\'t be added...")</script>';
            }
        }
    }
}

$user_id = $_SESSION['user_id'];

if ($user_id === false) {
    echo '<script>alert("Invalid user data...")</script>';
    exit();
}


// Fetch cart items
$selectSql = "
    SELECT c.product_id, c.qty, p.product_name, p.product_img, p.product_price
    FROM cart c
    INNER JOIN products p ON c.product_id = p.product_id
    WHERE c.user_id = '$user_id'
";
$result = $con->query($selectSql);


?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'common/head.php'; ?>
</head>

<body>
    <?php include 'common/header.php'; ?>

    <div class="container-fluid text-bg-warning shop">
        <div class="step">SHOPPING CART</div>
    </div>

    <div class="container tb">
        <table class="cart-table table table-striped">
            <thead>
                <tr>
                    <th width="40%">Product</th>
                    <th width="10%">Price</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Amount</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                    <tr align="center" id="row-<?= $row['product_id']; ?>">
                        <td>
                            <img src="assets/images/<?= $row['product_img']; ?>" alt="Product" class="product-image" />
                            <?= $row['product_name']; ?>
                        </td>
                        <td class="text-secondary">₹<?= $row['product_price']; ?></td>
                        <td>
                            <span class="qty-display"><?= $row['qty']; ?></span>
                            <div class="qty-input-group d-none">
                                <button id="sub" type="button" class="btn btn-sm btn-outline-secondary">-</button>
                                <input type="number" id="qty" class="qty-input center" value="<?= $row['qty']; ?>"
                                    min="1" />
                                <button id="add" type="button" class="btn btn-sm btn-outline-secondary">+</button>
                            </div>
                        </td>
                        <td class="text-warning">₹<span
                                class="amount-display"><?= $row['qty'] * $row['product_price']; ?></span></td>
                        <td>
                            <form class="d-inline-block" action="cart.php" method="post">
                                <input type="hidden" name="d_p_id" value="<?= $row['product_id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            <button class="btn btn-primary btn-sm edit-btn"
                                onclick="editProduct(<?= $row['product_id']; ?>)">EDIT</button>
                            <button class="btn btn-success btn-sm save-btn d-none"
                                onclick="saveProduct(<?= $row['product_id']; ?>)">SAVE</button>
                            <button class="btn btn-secondary btn-sm cancel-btn d-none"
                                onclick="cancelEdit(<?= $row['product_id']; ?>)">CANCEL</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6 text-center">
                <button class="btn btn-success m-3 text-white"><a href="index.php">Continue Shopping</a></button>
            </div>
            <div class="col-md-6 text-center">
                <button class="btn btn-warning m-3 text-white">Proceed to Checkout</button>
            </div>
        </div>
    </div>

    <?php include 'common/footer.php'; ?>

    <script>
        $(document).ready(function () {
            function editProduct(productId) {
                // Toggle the visibility of edit buttons and inputs
                $(`#row-${productId} .qty-display`).addClass('d-none');
                $(`#row-${productId} .qty-input-group`).removeClass('d-none');
                $(`#row-${productId} .edit-btn`).addClass('d-none');
                $(`#row-${productId} .save-btn`).removeClass('d-none');
                $(`#row-${productId} .cancel-btn`).removeClass('d-none');

                // Increment and Decrement functionality
                $(`#row-${productId} #add`).on('click', function () {
                    const qtyInput = $(`#row-${productId} #qty`);
                    qtyInput.val(parseInt(qtyInput.val()) + 1);
                });

                $(`#row-${productId} #sub`).on('click', function () {
                    const qtyInput = $(`#row-${productId} #qty`);
                    if (qtyInput.val() > 1) {
                        qtyInput.val(parseInt(qtyInput.val()) - 1);
                    }
                });
            }

            function cancelEdit(productId) {
                // Restore original state
                $(`#row-${productId} .qty-display`).removeClass('d-none');
                $(`#row-${productId} .qty-input-group`).addClass('d-none');
                $(`#row-${productId} .edit-btn`).removeClass('d-none');
                $(`#row-${productId} .save-btn`).addClass('d-none');
                $(`#row-${productId} .cancel-btn`).addClass('d-none');
            }

            function saveProduct(productId) {
                const qtyInput = $(`#row-${productId} #qty`).val();
                const formData = new FormData();
                formData.append('qty', qtyInput);
                formData.append('product_id', productId);

                fetch('cart.php', {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => response.text())
                    .then(data => {
                        alert('Product updated successfully!');
                        location.reload(); // Refresh the page to show the updated cart
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to update product');
                    });
            }

            // Make functions globally accessible
            window.editProduct = editProduct;
            window.cancelEdit = cancelEdit;
            window.saveProduct = saveProduct;
        });
    </script>

</body>

</html>