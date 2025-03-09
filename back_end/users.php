<?php
include("admin.php");
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users_list</title>
    <style>
        table,th,td
        {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
<div class="col-lg-10">
    <table>
        <thead><h5>Users List</h5></thead>
        <tbody>
            <tr>
                <th>User_id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>State</th>
                <th>City</th>
                <th>Pincode</th>
            </tr>
            <?php
            $userQuery = "SELECT * from users";
            $userResult = mysqli_query($con, $userQuery);

            if (mysqli_num_rows($userResult) > 0) {
                while ($user = mysqli_fetch_assoc($userResult)) {
            ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['gender']; ?></td>
                        <td><?php echo $user['dob']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['address']; ?></td>
                        <td><?php echo $user['state']; ?></td>
                        <td><?php echo $user['city']; ?></td>
                        <td><?php echo $user['pincode']; ?></td>

                    </tr>

            <?php
                }
            }
            ?>

        </tbody>
    </table>

</div>
</div>

    
</body>
</html>
