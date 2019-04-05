<?php
//echo "YES it is working";

if (isset($_POST)) {
    echo "your name is " . $_POST['username'];
    echo '<br>';

    echo "your password is " . $_POST['password'];
}