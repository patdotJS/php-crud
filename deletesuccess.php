<?php
if (isset($_GET['surname'])){
$connect = mysqli_connect('localhost','root','','crud');
$removeuser = $_GET['surname'];
$delete = "DELETE FROM students WHERE surname='$removeuser'";
$deletequery = mysqli_query($connect, $delete);
};
?>               
<h1>Success!</h1>
<a href="crud.php">go back</a>
