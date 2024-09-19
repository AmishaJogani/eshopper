<?php
include('db.php');
$id = $_GET['id'];
$query = "DELETE from products WHERE id = $id ";
mysqli_query($con , $query);
header('location:products.php');
?>

