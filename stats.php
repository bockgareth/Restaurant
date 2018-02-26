<?php
include_once "inc/header.php";

include_once "dbh.inc.php";

$sql = "SELECT * FROM customer_orders";
$result = mysqli_query($conn, $sql);

$rowCount = mysqli_num_rows($result);

$sum = 0;
while ($row = mysqli_fetch_assoc($result))
{
    $sum += $row["price"];
}

$sql = "SELECT CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(time))) AS CHAR) FROM customer_orders";
$result = mysqli_query($conn, $sql);

$time = mysqli_fetch_assoc($result);

?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content center-align">
                    <div class="row">
                        <span class="card-title">Restaurant Statistics</span>
                        <p>Below are the statistics for the restaurant.</p>
                    </div>
                    <div class="row">
                        <h5>Total number of orders:</h5>
                        <span><h4><?php echo $rowCount ?></h4></span>
                    </div>
                    <div class="row">
                        <h5>Revenue before deductibles:</h5>
                        <span><h4>R<?php echo $sum ?></h4></span>
                    </div>
                    <div class="row">
                        <h5>Average peak time in restaurant:<h4><?php echo $time['CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(time))) AS CHAR)'] ?></h4></h5>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "inc/footer.php" ?>

