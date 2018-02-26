<?php


include_once "dbh.inc.php";

$sql = "SELECT * FROM customer_orders";
$result = mysqli_query($conn, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}

echo json_encode($data);