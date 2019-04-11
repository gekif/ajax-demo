<?php

include('db.php');

//echo 'This is shit';

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
}

$query = "SELECT * FROM cars WHERE id =  {$id}" ;
$query_car_info = mysqli_query($connection, $query);


if (!$query_car_info) {
    die("Query Failed " . mysqli_error($connection));
}


while ($row = mysqli_fetch_array($query_car_info)) {

    echo "<input rel='".$row['id']."' type='text' class='form-control title-input' value='".$row['title']."'>";
    echo "<input type='button' class='btn btn-success car_id' value='Update' >";
    echo "<input type='button' class='btn btn-danger car_id' value='Delete'>";

}

?>

<script>

    $(document).ready(function() {

        // Global Variable for id and title
        var id;
        var title;

        /**
         * Extract id and title
         */
        $('.title-input').on('input', function() {
//        $('.title-input').on('click', function() {
            id = $(this).attr('rel');
            title = $(this).val();

//            alert(title);

            /**
             * Update Button Function
             */


        });



    });

</script>
