<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</head>
<style>
    .modal-body {
        width: 40%;
        margin-left: 30%;

    }
</style>

<body>

    <?php
    $cn = mysqli_connect("localhost", "root", "", "db_testing");
    if (mysqli_connect_errno() > 0) {
        die(mysqli_connect_errno() . ": "  . mysqli_connect_error());
    }
    if (isset($_GET['edit'])) {

        $sql = "SELECT * FROM tbl_testing WHERE id='{$_GET['edit']}'";

        $query_run = mysqli_query($cn, $sql);
        mysqli_query($cn, $sql);
        if (mysqli_connect_errno() > 0) {
            die(mysqli_connect_errno() . ":" . mysqli_connect_error());
        }

        if ($query_run) {
            foreach ($query_run as $row) {
                $name = $row['name'];
                $gender = $row['gender'];
                $email = $row['email'];
                $dob = $row['dob'];
                $course = $row['course'];
                $tel = $row['tel'];
            }
        }
    }
     if (isset($_POST["button_save"])) {
        $name = trim($_POST["text_box_student_name"]);
        $gender = trim($_POST["text_box_gender"]);
        $dob = trim($_POST["text_box_dob"]);
        $email = trim($_POST["text_box_email"]);
        $course = trim($_POST["text_box_course"]);
        $tel = trim($_POST["text_box_telephone"]);

        


        $sql = "UPDATE tbl_testing SET name='$name', gender='$gender', email='$email',
                 dob='$dob',course='$course', tel='$tel' WHERE id='{$_GET['edit']}'";
        $query_run = mysqli_query($cn, $sql);
        mysqli_query($cn, $sql);
        if (mysqli_connect_errno() > 0) {
            die(mysqli_connect_errno() . ":" . mysqli_connect_error());
        }

        header("location: index.php");
        exit;
    }
    ?>
    <center>
        <h1> UPDATE DATA</h1>
    </center>
    <form method="post" action="">
        <div class="modal-body">
            <div class="form-group">
                <label for="text_box_student_name">Student Name: </label>
                <input type="text" name="text_box_student_name" id="text_box_student_name" class="form-control" value="<?php echo $name; ?>">
            </div>

            <div class=" form-group">
                <label for="text_box_gender"> Gender: </label>
                <input type="text" name="text_box_gender" id="text_box_gender" class="form-control" value="<?php echo $gender; ?>">
            </div>


            <div class=" form-group">
                <label for="text_box_dob">Date of Birth: </label>
                <input type="text" name="text_box_dob" id="text_box_dob" class="form-control" value="<?php echo $dob; ?>">
            </div>

            <div class="form-group">
                <label for="text_box_email">Email: </label>
                <input type="text" name="text_box_email" id="text_box_email" class="form-control" value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label> Course </label>
                <input type="text" name="text_box_course" id="text_box_course" class="form-control" value="<?php echo $course; ?>">
            </div>

            <div class="form-group">
                <label for="text_box_telephone">Telephone: </label>
                <input type="text" name="text_box_telephone" id="text_box_telephone" class="form-control" value="<?php echo $tel; ?>">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            <input type="submit" name="button_save" id="button_save" class="btn btn-primary" value="Save">
        </div>
        
    </form>

</body>

</html>