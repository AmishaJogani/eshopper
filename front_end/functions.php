<?php
session_start();
include('db.php');
function test_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

function getUserData()
{

    if (isset($_SESSION['userdata'])) {
        return $_SESSION['userdata'];
    } else {
        return false;
    }
}

function getMessage()
{
    if (isset($_SESSION['message'])) {
        return $_SESSION['message'];
    } else {
        return false;
    }
}

function dd($data)
{
    echo "<pre>";
    print_r($data);
    die;
}

function addToCart($product_idc)
{
    global $con;
    $user = getUserData();

    $productQuery = "SELECT * FROM carts WHERE product_id = $product_idc and user_id = {$user['user_id']} and quantity > 0 ";
    $productResult = mysqli_query($con, $productQuery);

    if (mysqli_num_rows($productResult) > 0) {
        $cartUpdate = "UPDATE carts SET quantity=quantity+1 where user_id = {$user['user_id']}  and product_id = $product_idc";
        $cartUpdateResult = mysqli_query($con, $cartUpdate);

        return $cartUpdateResult;
    } else {

        $insertQuery = "INSERT INTO carts (user_id , product_id , quantity) values ({$user['user_id']} , $product_idc , 1)";

        $insertResult = mysqli_query($con, $insertQuery);

        return $insertResult;
    }
}

// addToCart(7);

function removeFromCart($product_idc)
{
    global $con;
    $user = getUserData();
    $message = "";

    $productQuery = "SELECT * FROM carts WHERE product_id = $product_idc and user_id = {$user['user_id']} and quantity > 1";
    $productResult = mysqli_query($con, $productQuery);

    if (mysqli_num_rows($productResult) > 0) {

        $cartUpdate = "UPDATE carts SET quantity=quantity-1 where user_id = {$user['user_id']}  and product_id = $product_idc";

        $cartUpdateResult = mysqli_query($con, $cartUpdate);

        $message = "Product removed from cart";
    } else  {
            $removeQuery = "DELETE from carts WHERE product_id = $product_idc and user_id = {$user['user_id']}";

            $removeResult = mysqli_query($con, $removeQuery);


            $message = "Product removed from cart";
        }
       
    
    return $message;
}




function alert($a)
{
    echo "<script> alert('$a')   </script>";
}

function redirect($url)
{
    echo "<script> window.location.href = '$url' </script>";
    exit();  // Ensure script stops after redirection
}

function getUserCart()

{
    global $con;
    $data = [];
    $user = getUserData();
    $cartQuery = "SELECT carts.* , products.image , products.name , products.price1 ,products.id FROM carts INNER JOIN `products` on carts.product_id=products.id WHERE user_id = {$user['user_id']}";
    // $cartResult = mysqli_query($con, $cartQuery);

    // if (mysqli_num_rows($cartResult) > 0) {
    //     while ($cart = mysqli_fetch_assoc($cartResult)) {
    //         $data[] = $cart;
    //     }
    // }
    return getData($cartQuery);

    // dd($data);


}
// $cartData = getUserCart();

function getData($query)
{
    global $con;
    $data = [];

    $result =  mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    // dd($data);

    return $data;
}

function cartCount()
{
    global $con;
    $user = getUserData();
    if (!empty($user)) {

        $cartCountQuery = "SELECT COUNT(cart_id) as count FROM `carts` WHERE user_id={$user['user_id']}";
        $cartCountResult = mysqli_query($con, $cartCountQuery);
        return $cartCountResult->fetch_assoc()['count'];
    } else {
        return 0;
    }
}

function addToWish($product_id)
{
    global $con;
    $user = getUserData();
    $message = "";
    $checkWishQuery = "SELECT * FROM wishlist WHERE product_id=$product_id and user_id={$user['user_id']} ";
    $checkWishResult = mysqli_query($con, $checkWishQuery);

    // return $checkWishResult;

    if (mysqli_num_rows($checkWishResult) > 0) {
        $wishRemoveQuery = "DELETE FROM wishlist WHERE user_id={$user['user_id']} and product_id=$product_id";
        $wishRemoveResult = mysqli_query($con, $wishRemoveQuery);
        $message = "Item removed from wishlist";
    } else {


        $wishQuery = "INSERT INTO wishlist (user_id , product_id) values ({$user['user_id']} , $product_id)";
        $wishResult = mysqli_query($con, $wishQuery);
        $message = "Item added to wishlist";
    }


    return $message;
}

function wishCount()
{
    global $con;
    $user = getUserData();
    if (!empty($user)) {
        $wishCountQuery = "SELECT COUNT(wish_id) AS wish_count FROM `wishlist` WHERE user_id={$user['user_id']}";
        $wishCountResult = mysqli_query($con, $wishCountQuery);

        return $wishCountResult->fetch_assoc()['wish_count'];
    } else {
        return 0;
    }
}

function getWishlist()
{
    global $con;
    $user = getUserData();
    $wishData = [];
    $wishQuery = "SELECT products.* , wishlist.product_id FROM `products` INNER JOIN `wishlist` on products.id=wishlist.product_id WHERE user_id={$user['user_id']}";
    $wishResult = mysqli_query($con, $wishQuery);

    if (mysqli_num_rows($wishResult) > 0) {
        while ($wish = mysqli_fetch_assoc($wishResult)) {
            $wishData[] = $wish;
        }
    }
    return $wishData;
}

function isWishlisted($product_id)
{
    global $con;
    $user = getUserData();
    $checkWishQuery = "SELECT * FROM wishlist WHERE product_id=$product_id and user_id={$user['user_id']} ";
    $checkWishResult = mysqli_query($con, $checkWishQuery);

    $isWishlisted = (mysqli_num_rows($checkWishResult) > 0);
    return $isWishlisted;

}

function getOrderData()
{   
    global $user , $con;
    $orderDataQuery = "SELECT * from orders WHERE user_id = {$user['user_id']}";
    $orderDataResult = mysqli_query($con,$orderDataQuery);
    return $orderDataResult;
}