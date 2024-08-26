<nav class="navbar navbar-expand-sm bg-light sticky-top">
    <div class="container-fluid">
        <div class="col-4">
            <a href="index.php">
                <img src="assets/images/logo.png" width="40%" />
            </a>
        </div>

        <div class="col-4">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><span>SHOP ALL</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#"><span>MEN’S T-SHIRTS</span></a>
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="#"><span>Men's Solid T-Shirts</span></a>
                            <a href="#"><span>Men's Printed T-Shirts</span></a>
                            <a href="#"><span>Men's Oversized Printed T-Shirts</span></a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#"><span>WOMEN’S T-SHIRTS</span></a>
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="#"><span>Women's Solid T-Shirts</span></a>
                            <a href="#"><span>Women's Printed T-Shirts</span></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="col-4 hovers">
            <ul class="navbar-nav justify-content-end">


                <?php
                if (isset($_SESSION['username'])) { ?>

                    <div class="dropdown">
                        <li class="nav-item p-2">
                            <a class="nav-link" href="javascript:void(0)" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                aria-expanded="false" style="text-transform: uppercase;"><i class="fa-regular fa-user"></i>
                                <?= $_SESSION['username'] ?></a>
                        </li>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Orders</a></li>
                            <li><a class="dropdown-item" href="#">Addresses</a></li>
                            <li><a class="dropdown-item" href="#">Account Details</a></li>
                            <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php } else { ?>

                    <li class="nav-item p-2">
                        <a class="nav-link" href="login.php"> <i class="fa-regular fa-user"></i> LOGIN / REGISTER </a>
                    </li>

                <?php } ?>


                <li class="nav-item p-2">
                    <a class="nav-link" href="#">
                        <i class="fa-regular fa-heart">
                            <span class="badge rounded-pill bg-warning"> 0 </span>
                        </i>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" style="position: relative;" href="cart.php">
                        <i class="fa-solid fa-cart-shopping">
                            <span class="badge rounded-pill bg-warning"> 0 </span>
                        </i>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="#"> <i class="fa-solid fa-indian-rupee-sign"></i> 0.00 </a>
                </li>
            </ul>
        </div>
    </div>
</nav>