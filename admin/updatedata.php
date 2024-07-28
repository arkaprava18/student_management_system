<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location:../login.php');
    exit();
}

if (isset($_POST['submit'])) {
    include('../dbcon.php');

    $id = $_POST['sid'];
    $rollno = $_POST['rollno'];
    $name = ucwords(strtolower(trim($_POST['name']))); // Capitalize the first letter of each word
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std = $_POST['std'];
    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];

    if ($imagename) {
        move_uploaded_file($tempname, "../dataimg/$imagename");
        $sql = "UPDATE `student` SET `rollno`='$rollno', `name`='$name', `city`='$city', `pcont`='$pcon', `standerd`='$std', `image`='$imagename' WHERE `id`='$id'";
    } else {
        $sql = "UPDATE `student` SET `rollno`='$rollno', `name`='$name', `city`='$city', `pcont`='$pcon', `standerd`='$std' WHERE `id`='$id'";
    }

    $run = mysqli_query($con, $sql);
    if ($run) {
        ?>
        <script>
            alert('Data Updated Successfully.');
            window.open('updateform.php?sid=<?php echo $id; ?>', '_self');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Data Update Failed.');
        </script>
        <?php
    }
}
?>
