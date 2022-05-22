<?php

// bad coding. this checks the name of the button to proceed with the update
if (isset($_POST['update'])){
    $connect = mysqli_connect('localhost','root','','crud');
    $old_surname= $_POST['old_surname'];
    $new_surname = $_POST['surname'];
    $new_firstname = $_POST['firstname'];
    $new_section = $_POST['section'];
    $new_course = $_POST['course'];

    // sql command to update student
    $update = "UPDATE students SET surname = '$new_surname', firstname = '$new_firstname', section = '$new_section', course = '$new_course' WHERE surname='$old_surname'";
    $setUpdate = mysqli_query($connect, $update);
}
?>

<h1>Success!</h1>
<a href="crud.php">go back</a>