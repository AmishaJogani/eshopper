<?php
include("db.php");
include("functions.php");
$emailErr = "";
$passwordErr = "";
$error = "";



if (isset($_SESSION['message'])) {

    

    echo "<script> alert('".getMessage()."')</script>";
    unset($_SESSION['message']);

}  



if (isset($_POST['submit'])) {

    // $email = $_POST['email'];
    if (empty($_POST["email"])) {
        $emailErr = "email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $passpattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        if (!preg_match($passpattern, $password)) {
            $passwordErr = "Password is Invalid";
        }
    }

    $getUserRecordQuery = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";

    // $result = $con->query($getUserRecordQuery);
    $result = mysqli_query($con, $getUserRecordQuery);

    // 
    if (mysqli_num_rows($result) > 0) {

        $_SESSION["userdata"] = mysqli_fetch_assoc($result);
        $_SESSION["message"] = "Login Succesfully";
        header('location:shop.php');
    } else {
        $error = "Email or Password is wrong";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
</head>

<body>
    <div class="container-lg">

        <div class="col-md-12">
            <div class="row justify-content-center align-items-center my-4">
                <div class="col-6">
                    <divs class="min-vh-100">
                        <div class="card ">
                            <div class="card-header h2 text-primary">
                                Login
                            </div>
                            <div class="card-body">
                                <form action="" method="post">

                                    <?php echo $error; ?>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                        <?php echo $emailErr; ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <?php echo $passwordErr; ?>
                                    </div> 


                                    <div class="mb-3">
                                        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </divs>


                </div>
            </div>
        </div>

    </div>
</body>

</html>