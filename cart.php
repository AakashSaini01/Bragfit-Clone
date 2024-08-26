<?php
include 'common/connection.php';

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit(); // Always exit after a redirect
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['d_p_id'])) {
        $d_id = intval($_POST['d_p_id']);
        $user_id = intval($_POST['user_id']);

        $sql = 'DELETE from cart where product_id = ' . $d_id . ' and user_id = ' . $user_id . ' ';
        $flag = $con->query($sql);

        $modalMessage = $flag ? "Product Deleted successfully" : "Product can't be Deleted";
        $modalType = $flag ? "success" : "danger";
    }

    if (isset($_POST['u_p_id'])) {
        $u_id = intval($_POST['u_p_id']);
        $new_qty = intval($_POST['new_qty']);
        $user_id = intval($_POST['user_id']);

        $sql = 'UPDATE cart set qty = ' . $new_qty . ' where product_id = ' . $u_id . ' and user_id = ' . $user_id . ' ';
        $flag = $con->query($sql);

        $modalMessage = $flag ? "Product qty updated successfully" : "Product qty can't be updated";
        $modalType = $flag ? "success" : "danger";
    }

    if (isset($_POST['qty']) && isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
        $qty = intval($_POST['qty']);
        $product_id = intval($_POST['product_id']);
        $user_id = intval($_SESSION['user_id']);

        $checkSql = "SELECT * FROM cart WHERE product_id = '$product_id' AND user_id = '$user_id'";
        $checkResult = $con->query($checkSql);

        if ($checkResult->num_rows > 0) {
            $updateSql = "UPDATE cart SET qty = qty + '$qty' WHERE product_id = '$product_id' AND user_id = '$user_id'";
            $updateResult = $con->query($updateSql);

            $modalMessage = $updateResult ? "Product updated" : "Product can't be updated";
            $modalType = $updateResult ? "success" : "danger";
        } else {
            $insertSql = "INSERT INTO cart (user_id, product_id, qty) VALUES ('$user_id', '$product_id', '$qty')";
            $insertResult = $con->query($insertSql);

            $modalMessage = $insertResult ? "Product added" : "Product can't be added";
            $modalType = $insertResult ? "success" : "danger";
        }
    }
}

$user_id = $_SESSION['user_id'];

if ($user_id === false) {
    $modalMessage = "Invalid user data";
    $modalType = "danger";
}

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
                    <tr align="center">
                        <td>
                            <img src="assets/images/<?= $row['product_img']; ?>" alt="Product"
                                class="product-image" /><?= $row['product_name']; ?>
                        </td>
                        <td class="text-secondary">₹<?= $row['product_price']; ?>.00</td>
                        <td>
                            <p class="old_qty"><?= $row['qty']; ?></p>
                            <form class="d-inline-block" action="cart.php" method="post">
                                <input type="number" class="form-control new_qty" name="new_qty" style="display:none;"
                                    value="<?= $row['qty']; ?>">
                        </td>
                        <td class="text-warning">₹<?= $row['qty'] * $row['product_price']; ?>.00</td>
                        <td>
                            <input type="hidden" name="u_p_id" value="<?= $row['product_id'] ?>">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                            <button type="button" class="btn btn-primary edit-btn">EDIT</button>
                            <button type="submit" name="save_qty" style="display: none;" class="btn btn-primary save">
                                Save</button>
                            </form>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $(".edit-btn").click(function () {
                                        var row = $(this).closest("tr");
                                        row.find(".edit-btn").hide();
                                        row.find(".old_qty").hide();
                                        row.find(".delete").hide();
                                        row.find(".save").show();
                                        row.find(".new_qty").show();
                                    });
                                });
                            </script>
                            <form action="cart.php" method="post" class="d-inline-block">
                                <input type="hidden" name="d_p_id" value="<?= $row['product_id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                                <button type="submit" class="btn btn-danger delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6 text-center">
                <button class="btn btn-success m-3 text-white"><a href="index.php" class="text-white">Continue
                        Shopping</a></button>
            </div>
            <div class="col-md-6 text-center">
                <button class="btn btn-warning m-3 text-white">Proceed to Checkout</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modals -->
    <?php if (isset($modalMessage)) { ?>
        <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notificationModalLabel">
                            <?= $modalType === "success" ? "Success" : "Error" ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= $modalMessage ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#notificationModal').modal('show');
            });
        </script>
    <?php } ?>

    <?php include 'common/footer.php'; ?>
</body>

</html>