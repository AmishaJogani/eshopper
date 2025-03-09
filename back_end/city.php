<?php
include("admin.php");
include("db.php");

$stateQuery = "SELECT * FROM states";
$stateResult = mysqli_query($con, $stateQuery);

$state_id = $city_name = "";

if(isset($_POST['submit']))
{
$state_id = $_POST['state'];
$city_name = $_POST['city'];

if($state_id != "" && $city_name != "")
{
    $cityQuery = "INSERT INTO city (state_id,city_name) values ('$state_id','$city_name')";
    $cityResult = mysqli_query($con, $cityQuery);
}
}
?>
<div class="col-lg-10">
    <h5>Enter City names acccording to state</h5>

    <form action="" method="post">
        <?php
        $stateQuery = "SELECT * from states";
        $stateResult = mysqli_query($con, $stateQuery);
        ?>
        <div>
            Select State:
            <select name="state" id="">
                <?php
                if (mysqli_num_rows($stateResult) > 0) {
                    while ($state = mysqli_fetch_assoc($stateResult)) {
                ?>
                        <option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <br>
        <div>
            City:
            <input type="text" name="city">
        </div>
        <br>
        <input type="submit" name="submit">

    </form>

</div>
</div>