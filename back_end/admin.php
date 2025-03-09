<?php 
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <style>
        *
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.r1right 
{
    text-align: right;
    margin-top: 3px;
}
.r1 
{
    background-color: rgb(185, 184, 184);
    padding-top: 5px;
    padding-bottom: 5px;
}
.r2 
{
    background-color: rgb(211, 208, 208);

}
a 
{
    text-decoration: none;
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row r1">
            <div class="col-lg-9 col-6">
                <h4>ESHOPPER</h4>
            </div>

            <div class="col-lg-3 col-6">
                <div class="r1right">
            <i class="fa-regular fa-user "></i>
                <span>Admin</span>
                <span>| Logout</span>
            </div>
            </div>
        </div>

        <div class="row">
        <div class="col-lg-2 r2">
            <div><a href="categories.php">Categories</a></div>
            <div><a href="products.php">Products</a></div>
            <div><a href="users.php">Users</a></div>
            <div><a href="state.php">states</a></div>
            <div><a href="city.php">city</a></div>
        </div>
        <!-- <div class="col-lg-10">

        </div> 
</div>  -->
        

</body>
</html>