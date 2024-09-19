<?php

include('db.php');
include('admin.php');

$catname = $status = $cat_image =  "";
$catnameErr = $statusErr = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['cat_name'])) {
        $catnameErr = "Category name required";
    } else {
        $catname = test_input($_POST['cat_name']);
        if (!preg_match("/^[a-zA-Z' ]*$/", $catname)) {
            $firstnameErr = "Only Letters allowed";
        }
    }

    if (empty($_POST['cat_status'])) {
        $statusErr = "Status required";
    } else {
        $status = test_input($_POST['cat_status']);
    }

    if ($catname != "" && $status != "") {
        $query = "insert into categories (cat_name ,cat_image , cat_status) values ('$catname' , '$cat_image' , '$status')";
        $result = mysqli_query($con, $query);
        header('location:categories.php');
    }

    $cat_iamge = $_FILES['cat_iamge']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($target_dir);
    move_uploaded_file($_FILES['cat_name']['tmp_name'], $target_file);
}


function test_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

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
        <h4>Enter Category</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                Category Name:
                <input type="text" name="cat_name" value="<?php echo $catname; ?>">
                <span><?php echo $catnameErr; ?></span>
            </div>
            <br>

            <div>
                <input type="file" name="cat_image">
            </div>
            <br>

            <div>
                Category Status:
                <select name="cat_status" id="">
                    <option value="active" <?php if ($status == 'active') {
                                                echo 'selected';
                                            } ?>>Active</option>
                    <option value="inactive" <?php if ($status == 'inactive') {
                                                    echo 'selected';
                                                } ?>>Inactive</option>
                </select>
            </div>
            <br>

            <div>
                <input type="submit" name="submit">
            </div>
        </form>
        <br>

        <!-- category list -->

        <?php

        include('db.php');
        $query = "SELECT * from categories order by cat_id ";
        $result = mysqli_query($con, $query);
        ?>



        <table>
            <thead>
                <h4>Category List</h4>
            </thead>
            <tbody>
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th colspan=2>Action</th>
                </tr>
                <?php if ($cat = mysqli_num_rows($result) > 0) {
                    while ($cat = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $cat['cat_id'] ?></td>
                            <td><?php echo $cat['cat_name'] ?></td>
                            <td><img src="uploads/<?php echo $cat['cat_image'] ?>" alt="" height="100" width="100"></td>
                            <td><?php echo $cat['cat_status'] ?></td>
                            <td><a href="category_delete.php?cat_id=<?php echo $cat['cat_id']; ?>">Delete</a></td>
                            <td><a href="category_edit.php?cat_id=<?php echo $cat['cat_id']; ?>">Edit</a></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <td colspan=3>No data found</td>
                <?php
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