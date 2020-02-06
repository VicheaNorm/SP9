<?php
    $mysqli = new mysqli('localhost', 'root', '', 'ds_sp9') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM tbl_students") or die($mysqli->error);
?>