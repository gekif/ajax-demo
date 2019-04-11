<?php

include('db.php');

//echo 'This is shit';


/**
 * Displaying Action Box Data
*/

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $query = "SELECT * FROM cars WHERE id =  {$id}" ;
    $query_car_info = mysqli_query($connection, $query);

    if (!$query_car_info) {
        die("Query Failed " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($query_car_info)) {
        echo "<input rel='".$row['id']."' type='text' class='form-control title-input' value='".$row['title']."'>";
        echo "<input type='button' class='btn btn-success update' value='Update' >";
        echo "<input type='button' class='btn btn-danger delete' value='Delete'>";
    }
}


/**
 * Updating Data
*/

if (isset($_POST['updatethis'])) {
//    echo 'it works';

    //    $id = $_POST['id'];
//    $title = $_POST['title'];

    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $title = mysqli_real_escape_string($connection, $_POST['title']);

    $query = "UPDATE cars SET title = '{$title}' WHERE id = {$id}";
    $result_set = mysqli_query($connection, $query);

    if (!$result_set) {
        die('QUERY FAILED ' . mysqli_error($connection));
    }


}

?>


<script>
    $(document).ready(function() {

        // Global Variable
        var id;
        var title;
        var updatethis = 'update';
        var deletethis = 'delete';

        /**
         * Extract id and title
         */
        $('.title-input').on('input', function() {
//        $('.title-input').on('click', function() {
            id = $(this).attr('rel');
            title = $(this).val();

//            alert(title);

        });

        /**
         * Update Button Function
         */
        $('.update').on('click', function () {
//            alert('tai');

            $.post('process.php', {
                id: id,
                title: title,
                updatethis: updatethis,
                deletethis: deletethis
            }, function (data) {
                alert(data);
            });
        });


    });

</script>
