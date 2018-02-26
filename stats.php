<?php
include_once "inc/header.php";

include_once "dbh.inc.php";

$sql = "SELECT * FROM customer_orders";
$result = mysqli_query($conn, $sql);

$rowCount = mysqli_num_rows($result);

$sql = "SELECT * FROM customer_orders LIMIT 1";
$time = mysqli_query($conn, $sql);

$sum = 0;
while ($row = mysqli_fetch_assoc($result))
{
    $sum += $row["price"];
}
$avg = $sum / $rowCount;

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
                        <h5>Average peak time in restaurant:</h5>
                        <span><h4><?php echo new DateTime($time) ?></h4></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "inc/footer.php" ?>

