<?php require APPROOT . '/views/includes/header.php'; ?>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/cartStyle.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>

<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                    </div>

                                    <!-- Begin of table to display cart item -->
                                    <hr class="my-4">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>

                                        <?php
                                        foreach ($data["products"] as $product) {
                                            echo ("<tbody>");
                                            echo '<td><img src="' . 'http://localhost/WebsiteMVC/public/img/' . $product->pictureName . '"width="62" height="62"></td>';
                                            echo "<td><br>$product->productName</td>";
                                            echo "<td><br>$$product->actualPrice</td>";
                                            echo "<td><br><div class='col'>
                                                    <a href='/WebsiteMVC/Cart/removeSingleProduct/$product->product_id' style='color: black; text-decoration: none;'>-</a>
                                                    <a class='border' style='color: black; text-decoration: none;'> $product->quantity  </a>
                                                    <a href='/WebsiteMVC/Cart/addSingleProduct/$product->product_id' style='color: black; text-decoration: none;'>+</a>
                                                    </div>
                                                </td>";

                                            // Delete product
                                            echo "<td><br><div class='col-md-1 col-lg-1 col-xl-1 text-end'><a href='/WebsiteMVC/Cart/deleteProduct/$product->product_id' class='text-muted'><i class='fas fa-times'></i></a></div>
                                            </td>";
                                            echo '</tbody>';
                                        } ?>
                                    </table>
                                    <hr class="my-4">
                                    <!-- End of table to display cart item -->

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="/WebsiteMVC/Home/" class="text-body">
                                                <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">Number of items: </h5>
                                        <h5>
                                            <?php echo ($data["numberItems"]); ?>
                                        </h5>
                                    </div>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>$ <?php echo ($data["totalPrice"]); ?></h5>
                                    </div>

                                    <?php
                                    if ($_SESSION['is_new_user'] == 1) {
                                        $newUserPrice = $data["totalPrice"] - ((int) $data["totalPrice"] * 15 / 100);
                                        echo ("<hr class='my-4'>");
                                        echo ("<div class='d-flex justify-content-between mb-5'>");
                                        echo ("<h5 class='text-uppercase'>New member price <br> (15% discount) </h5>");
                                        echo ("<h5> $ " . $newUserPrice . "</h5>");
                                    }
                                    ?>
                                </div>

                                <hr class="my-4"><br>
                                <div class="d-flex justify-content-center mb-5">
                                    <h5 class="text-uppercase">
                                        <a href='/WebsiteMVC/Cart/checkout/'
                                            style='color: black; font-size: 120%; text-decoration: none; width: 100%; border-width: 15px;'>
                                            <b>CHECKOUT</b>
                                        </a>
                                    </h5>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>