<?php
include('db.php');
$id = $_GET['cat_id'];

$query = "DELETE from categories WHERE cat_id = $id";
mysqli_query($con , $query);
header('location:categories.php');
?>