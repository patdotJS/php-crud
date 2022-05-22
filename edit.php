<?php
// using surname as primary key
if (isset($_GET['surname'])){
    $connect = mysqli_connect('localhost','root','','crud');
    $surname = $_GET['surname'];
    $url = "deletesuccess.php?surname=";
    $data = "SELECT * from students WHERE surname='$surname'";
    $query = mysqli_query($connect, $data);

    $row = mysqli_fetch_row($query);

    for ($i = 0; $i < count($row); $i++){
        $student_surname = $row[0];
        $student_firstname = $row[1];
        $student_section = $row[2];
        $student_course = $row[3];
    }
}
?>

<!-- fill up input box with current data -->
<h1>Student Information</h1>
<form action="success.php" method="post">
    <input type="text" name="surname" placeholder="enter surname" value=<?php echo $student_surname; ?>><br>
    <input type="text" name="firstname" placeholder="enter first name" value="<?php echo $student_firstname?>"><br>
    <input type="text" name="section" placeholder="enter section" value=<?php echo $student_section?>><br>
    <input type="text" name="course" placeholder="enter course" value=<?php echo $student_course?>><br>
    <input type="text" name="old_surname" placeholder="enter course" value=<?php echo $student_surname?> style="display: none"><br>
    <input type="submit" name="update" value="Update Information"><br>
    <?php echo "<a href=$url$surname>Delete Student</a>"?>
</form>

