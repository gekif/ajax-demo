<?php

include('db.php');


$query = "SELECT * FROM cars";
$query_car_info = mysqli_query($connection, $query);


if (!$query_car_info) {
    die("Query Failed " . mysqli_error($connection));
}

$i = 1; // Init index of number
while ($row = mysqli_fetch_array($query_car_info)) {

    echo "<tr>";

    echo "<td>" . $i++ . "</td>";
    echo "<td> {$row['title']} </td>";

    echo "</tr>";

}