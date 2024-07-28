<?php
include('../dbcon.php');
$rollno = $_POST['rollno'];
$name = $_POST['name'];
$city = $_POST['city'];
$pcon = $_POST['pcon'];
$std = $_POST['std'];
$id = $_POST['sid'];
$imagename = $_FILES['simg']['name'];
$tempname = $_FILES['simg']['tmp_name'];

move_uploaded_file($tempname, "../dataimg/$imagename");

$qry = "UPDATE `student` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `pcont` = '$pcon', `standerd` = '$std', `image` = '$imagename' WHERE `id` = $id;";

$result = mysqli_query($con, $qry);
if ($result) {
    echo "<script>alert('Data Updated Successfully.');
    window.location.href = 'updateform.php?sid=$id';
    </script>";
} else {
    echo "<script>alert('Data Update Failed.');
    window.location.href = 'updateform.php?sid=$id';
    </script>";
}
?>
