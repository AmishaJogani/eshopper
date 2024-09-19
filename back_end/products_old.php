<?php
include('db.php');
include('admin.php');

$img = $name = $price1 = $price2 = $detail = "";

if (isset($_POST['submit'])) {
   

    $name = $_POST['name'];

    $price1 = $_POST['price1'];

    $price2 = $_POST['price2'];

    $detail = $_POST['detail'];
    $category_id = $_POST['category_id'];

    $img = $_FILES['img']['name'];
    $targetdir = 'uploads/';
    $targetfile = $targetdir . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $targetfile);


    if ($img != "" && $name != "" && $price1 != "" && $price2 != "" && $detail != "") {

        $productQuery = "insert into products (img , name , price1 , price2 , detail, cat_id) values ('$img' , '$name' , '$price1' , '$price2' , '$detail' ,'$category_id' )";
        mysqli_query($con, $productQuery);
        header('location:products.php');
    }


   

}


$categoryQuery = "SELECT cat_id,cat_name from categories order by cat_id";
$categoryData = mysqli_query($con, $categoryQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="col-lg-10">
        <h5>Enter fields</h5>
        <form action="products.php" method="post" enctype="multipart/form-data">
            <div>
                Image:
                <input type="file" name="img">
            </div>
            <br>
            <div>
                name:
                <input type="text" name="name">
            </div>
            <br>
            <div>
                Price1:
                <input type="text" name="price1">
            </div>
            <br>
            <div>
                Price2:
                <input type="text" name="price2">
            </div>
            <br>
            <div>
                Details:
                <input type="text" name="detail">
            </div>
            <br>
            <div>
                Category:
                <select name="category_id">
                    <?php if ($cat = mysqli_num_rows($categoryData) > 0) {
                        while ($cat = mysqli_fetch_assoc($categoryData)) {
                    ?>
                            <option value="<?php echo $cat['cat_id'] ?>"><?php echo $cat['cat_name'] ?></option>
                        <?php
                        }
                    } else {
                        ?>
                        <td colspan=3>No data found</td>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <br>
            <div>
                <input type="submit" name="submit">
            </div>
        </form>
        <br>

        <!-- Dresses list -->

        <?php
        $select = "SELECT * from products";
        $select_result = mysqli_query($con, $select);

        ?>


        <table>
            <thead>
                <h5>Products</h5>
            </thead>
            <tbody>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>name</th>
                    <th>Price1</th>
                    <th>Price2</th>
                    <th>Details</th>
                    <th colspan=2>Action</th>
                </tr>
                <?php
                if (mysqli_num_rows($select_result) > 0) {
                    while ($women = mysqli_fetch_assoc($select_result)) {
                ?>
                        <tr>
                            <td><?php echo $women['id'] ?></td>
                            <td><img src="uploads/<?php echo $women['img'] ?>" alt="" height="100" width="100"></td>
                            <td><?php echo $women['name'] ?></td>
                            <td><?php echo $women['price1'] ?></td>
                            <td><?php echo $women['price2'] ?></td>
                            <td><?php echo $women['detail'] ?></td>
                            <td><a href="product_delete.php?id=<?php echo $women['id']; ?>">Delete</a></td>
                            <!-- <td><a href="women_delete.php?id=<?php echo urlencode($women['id']); ?>">Delete</a></td> -->
                            <td><a href="product_edit.php?id=<?php echo $women['id']; ?>">Edit</a></td>
                        </tr>
                <?php
                    }
                }
                ?>


            </tbody>
        </table>
    </div>
    <div>

    </div>
    </div>

</body>

</html>