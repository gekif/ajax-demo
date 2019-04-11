<?php
include('db.php');

$search = $_POST['search'];
//echo $search;

if (!empty($search)) {
    $query = "SELECT * FROM cars WHERE title LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);

    if (!$search_query) {
        die('QUERY FAILED ' . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($search_query)) {
        $brand = $row['title'];
        ?>
        <ul class="list-unstyled">
            <?php
                echo "<li>{$brand} in stock</li>"
            ?>
        </ul>
<?php
    }
}
?>