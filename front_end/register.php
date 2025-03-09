<?php
include("functions.php");
include("db.php");


$name = $gender = $dob = $email = $password = $confpassword = $address = $state = $city = $pincode = "";
$nameErr = $genderErr = $dobErr = $passwordErr = $confpasswordErr = $address = $stateErr = $cityErr = $pincodeErr = $emailErr = $addressErr = "";
$passpattern = $namepattern = "";

$selectedState = "";
$state_id = "";

if (isset($_POST["state"])) {
    $selectedState = $_POST["state"];
   
}

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


    //password validation
    if (empty($_POST['password'])) {
        $passwordErr = "Password is Required";
    } else {
        $password = test_input($_POST['password']);
        $passpattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*^[a-zA-Z0-9]).{8,16}$/m';
        if (!preg_match($passpattern, $password)) {
            $passwordErr = "Invalid password format";
        }
    }

    if (empty($_POST['confpassword'])) {
        $confpasswordErr = "Please Confirm the Password";
    } else {
        $confpassword = test_input($_POST['confpassword']);
        if ($confpassword != $password) {
            $confpasswordErr = "Password not matched";
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
        // die("$name , $gender , $dob , $email , $password , $confpassword , $address , $state ,$city , $pincode");

        $insertQuery = "INSERT INTO users (name,gender,dob,email,password,confpassword,address,state,city,pincode) values ('$name','$gender','$dob','$email','$password','$confpassword','$address','$state','$city','$pincode')";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            // echo "frre";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // header("location:login.php?message=Form submitted successfully");

        $_SESSION["message"] = "registered successfully";
        header("location:login.php");
    
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">


</head>

<body>
    <div class="container-lg">

        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header h4 text-primary">
                        Register
                    </div>
                    <div class="card-body">
                        <form action="" method="post">

                            <div class="mb-2">
                                <div>Full Name</div>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                <span class="text-danger"><?php echo $nameErr; ?></span> <!-- Error message -->
                            </div>

                            <div class="mb-2">
                                <div>Gender</div>
                                <div class>
                                    <div class="form-check form-check-inline"><input type="radio" name="gender" value="Male" id="male" class="form-check-input" <?php echo ($gender == "Male") ? 'checked' : ''; ?>><label for="male" class="me-3">Male</label></div>

                                    <div class="form-check form-check-inline"><input type="radio" name="gender" value="Female" id="female" class="form-check-input" <?php echo ($gender == "Female") ? 'checked' : ''; ?>><label for="female" class="me-3">Female</label></div>

                                    <div class="form-check form-check-inline"><input type="radio" name="gender" value="Others" id="others" class="form-check-input" <?php echo ($gender == "Others") ? 'checked' : ''; ?>><label for="others">Others</label></div>
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
                                <textarea name="address" id="" class="form-control"><?php echo $address ?></textarea>
                                <span class="text-danger"><?php echo $addressErr; ?></span>
                            </div>

                            <div class="mb-2">
                                <div>Select your state</div>
                                <select name="state" id="" class="form-control">

                                    <?php
                                    $stateQuery = "SELECT * from states";
                                    $stateResult = mysqli_query($con, $stateQuery);

                                    if (mysqli_num_rows($stateResult) > 0) {
                                        while ($state = mysqli_fetch_assoc($stateResult)) {
                                    ?>
                                            <option value="<?php echo $state['state_id'] ?>" <?php echo ($state['state_name'] == $selectedState) ? 'selected' : '' ?>><?php echo $state['state_name'] ?></option>

                                    <?php
                                        }
                                    }
                                    ?>


                                </select>
                                <span class="text-danger"><?php echo $stateErr; ?></span>
                            </div>

                            <div class="mb-2">
                                <div>select your city</div>
                                <select name="city" id="" class="form-control">
                                    <?php
                                    $cityQuery = "SELECT * FROM city";
                                    $cityResult = mysqli_query($con, $cityQuery);
                                    if (mysqli_num_rows($cityResult) > 0) {
                                        while ($city = mysqli_fetch_assoc($cityResult)) {
                                            ?>
                                            <option value="<?php echo $city['city_name'] ?>"><?php echo $city['city_name'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo $cityErr; ?></span>
                            </div>

                            <div class="mb-2">
                                <div>Pincode</div>
                                <input type="text" name="pincode" class="form-control" value="<?php echo $pincode ?>">
                                <span class="text-danger"><?php echo $pincodeErr; ?></span>
                            </div>

                            <div class="mb-2">
                                <input type="submit" name="submit" value="submit" class="form-control btn-primary btn">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

</body>

</html>