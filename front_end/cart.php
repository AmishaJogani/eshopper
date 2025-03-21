<?php
include("header_new.php");
$user = getUserData();
$cartData = getUserCart();
$subtotal = 0;
$shipping = 50;


if (isset($_GET['action']) and $_GET['action'] == 'cart' and ($_GET['product_id'])) {
    if (addToCart($_GET['product_id'])) {

        alert("Product added into cart successfully");

        redirect('cart.php');
    }
}

if (isset($_GET['action']) and $_GET['action'] == 'cartRemove' and ($_GET['product_id'])) {
    if (removeFromCart($_GET['product_id'])) {

        // alert("Product removed from successfully");

        redirect('cart.php');
    }
}


?>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        
                    </tr>
                </thead>
                <tbody class="align-middle">


                    <?php
                    foreach ($cartData as $cart) {

                        $subtotal += $cart['price1'] * $cart['quantity'];
                    ?>
                        <tr>
                            <td class="align-middle text-left" style="width:100%;border-right: none;"><img class="" src="../back_end/uploads/<?php echo $cart['image'] ?>" alt="" style="width: 100px;"><?php echo $cart['name'] ?></td>
                            <td class="align-middle"><?php echo $cart['price1'] ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a href="?action=cartRemove&product_id=<?php echo $cart['id']; ?>" class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?php echo $cart['quantity'] ?>">
                                    <div class="input-group-btn">
                                        <a href="?action=cart&product_id=<?php echo $cart['id']; ?>" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $cart['price1'] * $cart['quantity'] ?></td>
                           
                        </tr>




                    <?php
                    }
                    ?>


                    <?php
                    if (count($cartData) == 0) {
                    ?>
                        <tr>
                            <td colspan="5"><?php echo "No products to show"; ?></td>
                        </tr>
                    <?php

                    }
                    ?>



                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium"><?php echo $subtotal ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium"><?php echo $shipping ?></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?php echo $subtotal + $shipping ?></h5>
                    </div>
                    <a href="checkout.php" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


<?php
include("footer.php");
?>