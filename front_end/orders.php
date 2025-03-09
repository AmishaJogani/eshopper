<?php
include("header_new.php");
$user = getUserData();
$orderData = getOrderData();
?>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">My Orders</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">my orders</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>order_id</th>
                        <th>Date</th>
                        <th>products</th>

                    </tr>
                </thead>
                <tbody class="">


                    <?php
                    foreach ($orderData as $order) {
                    
                        $products = json_decode($order['products'], true);
                    ?>
                        <tr>
                            <td class="align-middle"><?php echo $order['order_id'] ?></td>
                            <td class="align-middle"><?php echo $order['date'] ?></td>
                            <td class="text-left">
                                <?php
                                if (is_array($products)) {
                                    foreach ($products as $product) {
                                        echo  " Product_name : ". $product['product_name'] .", Quantity : " . $product['quantity'] .", Price : " .$product['price'] ." <br> ";
                                    }
                                } else {
                                    echo "Failed to decode products data.";
                                }
                                ?>
                            </td>
                            </tr>
                        <?php
                    }
                        ?>
                        
                        
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- Cart End -->


<?php
include("footer.php");
?>