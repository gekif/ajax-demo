<?php
include('db.php');

$search = $_POST['search'];
//echo $search;

if (!empty($search)) {
    $query = "SELECT * FROM cars WHERE title LIKE '$search%'";
    $search_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($search_query);

    if (!$search_query) {
        die('QUERY FAILED ' . mysqli_error($connection));
    }

    if ($count <= 0) {
        ?>
        <h2 class="bg-danger" id="result">
        <?php
            echo "Sorry we don't have that car available";
        ?>
        </h2>
        <?php
    } else {
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


}
?>