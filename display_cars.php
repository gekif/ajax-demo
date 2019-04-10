<?php

include('db.php');


$query = "SELECT * FROM cars";
$query_car_info = mysqli_query($connection, $query);

if (!$query_car_info) {
    die("Query Failed " . mysqli_error($connection));
}

