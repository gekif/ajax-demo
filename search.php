<?php
$connection = mysqli_connect('localhost', 'root','password', 'ajax');

/*if ($connection) {
    echo 'Yes it is';
} else {
    echo 'not it is';
}*/

$search = $_POST['search'];
//echo $search;

if (!empty($search)) {
    $query = "SELECT * FROM cars WHERE cars LIKE '$search%'";
    $search_query = mysqli_query($connection, $query);

    if (!$search_query) {
        die('QUERY FAILED ' . mysqli_error($connection));
    }
}