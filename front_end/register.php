<?php
include("db.php");

$name = $gender = $dob = $email = $password = $confpassword = $address = $state = $city = $pincode = "";
$nameErr = $genderErr = $dobErr = $passwordErr = $confpasswordErr = $address = $stateErr = $cityErr = $pincodeErr = $emailErr = $addressErr = "";
$passpattern = $namepattern = "";


if (isset($_POST['submit'])) {
    // $name = $_POST['name'];
    if (!empty($_POST["name"])) {
        $name = test_input($_POST["name"]);
        $namepattern = "/^[a-zA-Z ]*$/"; // Example pattern

        if (!preg_match($namepattern, $name)) {
            $nameErr = "Only letters and spaces are allowed.";
        }
    } else {
        $nameErr = "Name is required.";
    }

    // $gender = $_POST['gender'];
    if (empty($_POST["gender"])) {
        $genderErr = "gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    // var_dump($gender);
    // die();

    // $dob = $_POST['dob'];
    if (empty($_POST["dob"])) {
        $dobErr = "DOB Required";
    } else {
        $dob = test_input($_POST["dob"]);
    }

    // $email = $_POST['email'];
    if (empty($_POST["email"])) {
        $emailErr = "email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    // $password = $_POST['password'];
    if (empty($_POST["password"])) {
    } else {
        $passwordErr = "Password Required";
        $password = test_input($_POST["password"]);
        $passpattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        if (!preg_match($passpattern, $password)) {
            $passwordErr = "Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, one digit, and one special character.";
        }
    }
    // $confpassword = $_POST['confpassword'];
    if (empty($_POST["confpassword"])) {
        $confpasswordErr = "Re-enter password";
    } else {
        $confpassword = test_input($_POST["confpassword"]);
        if ($confpassword != $password) {
            $confpasswordErr = "password not matched";
        }
    }
    // $address = $_POST['address'];
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }
    // $state = $_POST['state'];
    if (empty($_POST["state"])) {
        $stateErr = "select your state";
    } else {
        $state = test_input($_POST["state"]);
    }

    // $city = $_POST['city'];
    if (empty($_POST["city"])) {
        $cityErr = "Enter your city";
    } else {
        $city = test_input($_POST["city"]);
    }

    // $pincode = $_POST['pincode'];
    if (empty($_POST["pincode"])) {
        $pincodeErr = "pincode is required";
    } else {
        $pincode = test_input($_POST["pincode"]);
    }

    if ($name != "" && $gender != "" && $dob != "" && $email != "" && $password != "" && $confpassword != "" && $address != "" && $state != "" && $city != "" && $pincode != "") {
        $insertQuery = "INSERT INTO users (name,gender,dob,email,password,confpassword,address,state,city,pincode) values ('$name','$gender','$dob','$email','$password','$confpassword','$address','$state','$city','$pincode')";
        $insertResult = mysqli_query($con, $insertQuery);
        header("location:register.php");
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
    <title>regsistration form</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="register.css">
    <style>
        /* form
        {
            width: 60%;
            padding: 10px;
            margin: auto;
            background-color: aliceblue;
        } 
         .sub
         {
            font-size: 18px;
            font-weight: 600;
            background-color: antiquewhite;
         }  */
    </style>
</head>

<body>
    <div class="container-lg">
        <form action="" method="post">
            <div class="mb-2">
                <div>Full Name</div>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="text-danger"><?php echo $nameErr; ?></span> <!-- Error message -->
            </div>

            <div class="mb-2">
                <div>Gender</div>
                <div class="form-control">
                    <input type="radio" name="gender" value="Male" id="male" class="me-1" <?php echo ($gender == "Male") ? 'checked' : ''; ?>><label for="male" class="me-3">Male</label>
                    <input type="radio" name="gender" value="Female" id="female" class="me-1" <?php echo ($gender == "Female") ? 'checked' : ''; ?>><label for="female" class="me-3">Female</label>
                    <input type="radio" name="gender" value="Others" id="others" class="me-1" <?php echo ($gender == "Others") ? 'checked' : ''; ?>><label for="others">Others</label>
                </div>
                <span class="text-danger"><?php echo $genderErr; ?></span>
            </div>

            <div class="mb-2">
                <div>Date of Birth</div>
                <input type="date" name="dob" class="form-control" value="<?php echo $dob ?>">
                <span class="text-danger"><?php echo $dobErr; ?></span>
            </div>

            <div class="mb-2">
                <div>Email</div>
                <input type="email" name="email" class="form-control" value="<?php echo $email ?>">
                <span class="text-danger"><?php echo $emailErr; ?></span>
            </div>

            <div class="mb-2">
                <div>Password</div>
                <input type="password" name="password" class="form-control" value="<?php echo $password ?>">
                <span class="text-danger"><?php echo $passwordErr; ?></span>
            </div>

            <div class="mb-2">
                <div>Confirm Password</div>
                <input type="password" name="confpassword" class="form-control" value="<?php echo $confpassword ?>">
                <span class="text-danger"><?php echo $confpasswordErr; ?></span>
            </div>
            <div class="mb-2">
                <div>Address</div>
                <textarea name="address" id="" class="form-control" value="<?php echo $address ?>"></textarea>
                <span class="text-danger"><?php echo $addressErr; ?></span>
            </div>

            <div class="mb-2">
                <div>Select your state</div>
                <select name="state" id="" class="form-control">
                    <option value="" hidden></option>
                    <option value="Gujarat" <?php echo ($state == 'Gujarat') ? 'selected' : '' ?>>Gujarat</option>
                    <option value="Rajasthan" <?php echo ($state == 'Rajasthan') ? 'selected' : '' ?>>Rajasthan</option>
                    <option value="Uttar Pradesh" <?php echo ($state == 'Uttar Pradesh') ? 'selected' : '' ?>>Uttar Pradesh</option>
                    <option value="Madhya Pradesh" <?php echo ($state == 'Madhya Pradesh') ? 'selected' : '' ?>>Madhya Pradesh</option>
                </select>
                <span class="text-danger"><?php echo $stateErr; ?></span>
            </div>

            <div class="mb-2">
                <div>city</div>
                <input type="text" name="city" class="form-control" value="<?php echo $city ?>">
                <span class="text-danger"><?php echo $cityErr; ?></span>
            </div>

            <div class="mb-2">
                <div>Pincode</div>
                <input type="text" name="pincode" class="form-control" value="<?php echo $pincode ?>">
                <span class="text-danger"><?php echo $pincodeErr; ?></span>
            </div>

            <div class="mb-2">
                <input type="submit" name="submit" value="SUBMIT" class="form-control sub">
            </div>




        </form>
    </div>
</body>

</html>