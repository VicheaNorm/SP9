<?php
    $cn = mysqli_connect("localhost", "root", "", "db_testing");
    if (mysqli_connect_errno() > 0) {
        die(mysqli_connect_errno() . ": "  . mysqli_connect_error());
    }

    if (isset($_POST["button_save"])) {        
        $name = trim($_POST["text_box_student_name"]);
        $gender = trim($_POST["text_box_gender"]);
        $dob = trim($_POST["text_box_dob"]);
        $email = trim($_POST["text_box_email"]);
        $course = trim($_POST["text_box_course"]);
        $tel = trim($_POST["text_box_telephone"]);
    
        $photo_name = $_FILES['photo']['name'];


        if ($photo_name != "") {
            $source = $_FILES['photo']['tmp_name'];
            $photo_name = $last_id . "_" . $photo_name;

            $destination = "media/" . $photo_name;
            if (move_uploaded_file($source, $destination)) {
                $sql = "INSERT INTO tbl_testing(name,gender,email,dob,course,tel,img)
                    VALUES('$name', '$gender','$email','$dob', '$course','$tel','$photo_name')";
                mysqli_query($cn, $sql);
                if (mysqli_connect_errno() > 0) {
                    die(mysqli_connect_errno() . ":" . mysqli_connect_error());
                }
            }
        }

        

        
       

        


        header("location: index.php");
        exit;
    }

?>
