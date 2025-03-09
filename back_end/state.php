<?php 
include("admin.php");
include("db.php");
$state_name = "";
if(isset($_POST['submit']))
{
    $state_name = $_POST['state_name'];
}

if($state_name != "")
{
    $stateQuery = "INSERT INTO states (state_name) values ('$state_name')";
    $stateResult = mysqli_query($con, $stateQuery);
}
?>



<div class="col-lg-10">
    <form action="" method="post">
    <h5>List of states</h5>
    <div>State_name:
    <input type="text" name="state_name">
    </div>
    <br>
    <input type="submit" name="submit">
    </form>
</div> 
</div>
   