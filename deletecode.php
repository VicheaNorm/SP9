<?php

    $cn = mysqli_connect("localhost", "root", "","db_testing");
    if (mysqli_connect_errno() > 0) {
        die(mysqli_connect_errno() . ": "  . mysqli_connect_error());
    }
    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $cn->query("DELETE FROM tbl_testing WHERE id=$id");
        header("location: index.php");
        exit;
    }
        
?>
