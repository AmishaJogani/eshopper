<?php
include("admin.php");

$id = $_GET['id'];

$category = "SELECT cat_id ,cat_name from categories";
$categoryresult = mysqli_query($con, $category);
$category = mysqli_fetch_assoc($categoryresult);

$category_id = $name = $price1 = $price2 = $details = $image = "";

if (isset($_POST["submit"])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $price1 = $_POST['price1'];
    $price2 = $_POST['price2'];
    $details = $_POST['details'];

    $image = $_FILES['image']['name'];
    $target_dir = 'uploads';
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    if ($name != "" && $price1 != "" && $price2 != "" && $details != "" && $image != "") {
        $productEditQuery = "UPDATE products SET category_id='$category_id' , name='$name' , price1='$price1' , price2='$price2' , details='$details' , image='$image' WHERE id=$id";

        $productEditResult = mysqli_query($con, $productEditQuery);

        header("location:products.php");
    }
}

$productQuery = "SELECT * from products WHERE id=$id";
$productResult = mysqli_query($con, $productQuery);
$product = mysqli_fetch_assoc($productResult);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <div class="col-lg-10">
        <h5>Enter Product</h5>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                Select Category:
                <select name="category_id"  id="">
                    <?php
                    if (mysqli_num_rows($categoryresult) > 0) {
                        while ($category = mysqli_fetch_assoc($categoryresult)) {
                    ?>
                            <option value="<?php echo $category['cat_id'] ?>" <?php echo $category['cat_id'] == $product['category_id'] ? "selected" : "" ?>><?php echo $category['cat_name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <br>
            <div>
                Product image:
                <input type="file" name="image">
                <span><img src="uploads/<?php echo $product['image'] ?>" alt="" height="100" width="100"></span>
            </div>
            <br>
            <div>
                Product Name:
                <input type="text" name="name" value="<?php echo $product['name'] ?>">
            </div>
            <br>
            <div>
                Price1:
                <input type="text" name="price1" value="<?php echo $product['price1'] ?>">
            </div>
            <br>
            <div>
                price2:
                <input type="text" name="price2" value="<?php echo $product['price2'] ?>">
            </div>
            <div>
                <br>
                Details:
                <input type="text" name="details" value="<?php echo $product['details'] ?>">
            </div>
            <br>

            <input type="submit" name="submit">

        </form>

        <!-- <table>
      <thead>
        <h5>Products</h5>
      </thead>
      <tbody>
        <tr>
          <th>id</th>
          <th>category_id</th>
          <th>image</th>
          <th>name</th>
          <th>price1</th>
          <th>price2</th>
          <th>Details</th>
          <th colspan="2">Action</th>
        </tr>


        <?php
        $productQuery = "SELECT * from products";
        $productResult = mysqli_query($con, $productQuery);

        if (mysqli_num_rows($productResult) > 0) {
            while ($product = mysqli_fetch_assoc($productResult)) {
        ?>
            <tr>
              <td><?php echo $product['id'] ?></td>
              <td><?php echo $product['category_id'] ?></td>
              <td><img src="uploads/<?php echo $product['image'] ?>" alt="" height="100" width="100"></td>
              <td><?php echo $product['name'] ?></td>
              <td><?php echo $product['price1'] ?></td>
              <td><?php echo $product['price2'] ?></td>
              <td><?php echo $product['details'] ?></td>
              <td><a href="product_delete.php?id=<?php echo $product['id'] ?>">Delete</a></td>
              <td><a href="product_edit.php?id=<?php echo $product['id'] ?>">Edit</a></td>
            </tr>
        <?php
            }
        }
        ?>
      </tbody>
    </table> -->

    </div>
    </div>
</body>

</html>