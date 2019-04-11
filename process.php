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
        echo "<input type='button' class='btn btn-close' value='Close'>";
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


/**
 * Deleting Data
 */

if (isset($_POST['deletethis'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $query = "DELETE FROM cars WHERE id = {$id}";
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
                updatethis: updatethis
            }, function (data) {
//                alert('Data Updated');

                $('#feedback').html('<b>Record Updated Successfully</b>');

                // Reset the filled form
//                $('.title-input').val('');

                // Hide form
//                $('.title-input').hide();
//                $('.update').hide();
//                $('.delete').hide();

            });

        });




        /**
         * Delete Button Function
         */

        $('.delete').on('click', function () {
            id = $('.title-link').attr('rel');

            $.post('process.php', {
                id: id,
                deletethis: deletethis
            }, function (data) {
                alert('Data Deleted');

//                $('#feedback').html('<p class="bg-danger"><b>Record Deleted Successfully</b></p>');

                // Reset the filled form
//                $('.title-input').val('');

                // Hide form
//                $('.title-input').hide();
//                $('.update').hide();
//                $('.delete').hide();

                $("#action-container").hide();

            });


        });



        /**
         * Close Button Function
         */

        $('.btn-close').on('click', function () {
            $("#action-container").hide();
        });


    }); // Document ready end tags

</script>
