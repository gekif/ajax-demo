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
//    echo "<td><a class='title-link' href='#'>{$row['title']} </a></td>";
//    echo "<td><a rel='".$row['id']."' class='title-link' href='#'>{$row['title']} </a></td>";
    echo "<td><a rel='".$row['id']."' class='title-link' href='javascript:void(0)'>{$row['title']}</a></td>";
    echo "</tr>";

}
?>
<script>

    $(document).ready(function () {
        // Action Container
    //    $('#action-container').hide();

        $('.title-link').on('click', function () {
            $('#action-container').show();

            var id = $(this).attr('rel');

    //        alert(id);

            $.post('process.php', { id: id}, function(data) {
    //            alert(data);

                $('#action-container').html(data);


            });

        });
    });

</script>