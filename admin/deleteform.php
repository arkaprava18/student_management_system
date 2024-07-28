<?php
include('../dbcon.php');
$id = $_GET['sid'];

$qry = "DELETE FROM `student` WHERE `id` = $id";

$result = mysqli_query($con, $qry);
if ($result) {
    echo "<script>alert('Data Deleted Successfully.');
    window.location.href = 'deletestudent.php';
    </script>";
} else {
    echo "<script>alert('Data Deletion Failed.');
    window.location.href = 'deletestudent.php';
    </script>";
}
?>
