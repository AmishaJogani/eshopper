<?php
include('db.php');
$id = $_GET['cat_id'];

$query = "SELECT * FROM categories WHERE cat_id = $id";
$result = mysqli_query($con , $query);
$catedit = mysqli_fetch_assoc($result);

$catname = $status = $cat_image = "";
$catnameErr = $statusErr = "";

if(isset($_POST['submit']))
{
    if(empty($_POST['cat_name']))
    {
        $catnameErr = "Category name required";
    }
    else 
    {
        $catname = test_input($_POST['cat_name']);
        if(!preg_match("/^[a-zA-Z' ]*$/", $catname))
        {
            $firstnameErr = "Only Letters allowed";
        }

    }

    if(empty($_POST['cat_status']))
    {
        $statusErr = "Status required";
    }
    else 
    {
        $status = test_input($_POST['cat_status']);
    }

    $cat_image = $_FILES['cat_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($cat_image);
    move_uploaded_file($_FILES["cat_image"]["tmp_name"], $target_file);

    if($catname != "" && $status != "" && $cat_image!="")
    {
        $editquery = "UPDATE categories SET cat_name = '$catname',cat_image = '$cat_image', cat_status = '$status' WHERE cat_id = $id";
        $editresult = mysqli_query($con,$editquery);
        header('location:categories.php');
    }
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
</head>
<body>
    <form action="category_edit.php?cat_id=<?php echo $catedit['cat_id'] ?>" method="post" enctype="multipart/form-data">
        <div>
            Category Name:
            <input type="text" name="cat_name" value= "<?php echo $catedit['cat_name']; ?>">
            <span><?php echo $catnameErr; ?></span>
        </div>
        <br>

        <div>
            <input type="file" name="cat_image">
            <span><img src="uploads/<?php echo $catedit['cat_image'] ?>" alt="" height="100" width="100"></span>
        </div>
        <br>


        <div>
            Category Status:
            <select name="cat_status" id="">
                <option value="active" <?php if($catedit['cat_status']=='active'){echo 'selected';} ?>>Active</option>
                <option value="inactive" <?php if($catedit['cat_status']=='inactive'){echo 'selected';} ?>>Inactive</option>
            </select>
            <span><?php echo $statusErr; ?></span>
        </div>
        <br>

        <div>
            <input type="submit" name="submit">
        </div>
    </form>
</body>
</html>  