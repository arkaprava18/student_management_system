<?php

session_start();
if (!isset($_SESSION['uid'])) {
    header('location:../login.php');
    exit();
}
?>
<?php
include('header.php');
include('titlehead.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Student Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 20px;
            padding: 0 15px;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 100%;
            margin: 0 auto;
            overflow: hidden; /* Ensure no content overflows */
        }
        .form-header {
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.5em;
            color: #333;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
            position: relative;
        }
        .form-header::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #0056b3);
            border-radius: 2px;
        }
        .form-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        .form-table th {
            text-align: center;
            padding: 12px;
            background: linear-gradient(135deg, #42a5f5, #478ed1); /* Updated to modern blue shades */
            color: #ffffff;
            font-weight: bold;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-transform: uppercase; /* Optional: For a more formal look */
            letter-spacing: 1px; /* Optional: For a more spaced-out look */
        }
        .form-table td {
            padding: 12px;
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }
        .form-table input[type="text"],
        .form-table input[type="number"],
        .form-table input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ced4da;
            border-radius: 6px;
            box-sizing: border-box;
        }
        .form-table input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 12px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 6px;
            width: 100%;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .form-table input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h1>Add Student</h1>
            </div>
            <form method="post" action="addstudent.php" enctype="multipart/form-data">
                <table class="form-table">
                    <tr>
                        <th>Roll No</th>
                        <td><input type="text" name="rollno" placeholder="Enter Roll No..." required></td>
                    </tr>
                    <tr>
                        <th>Full Name</th>
                        <td><input type="text" name="name" placeholder="Enter Full Name..." required></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><input type="text" name="city" placeholder="Enter City..." required></td>
                    </tr>
                    <tr>
                        <th>Parents Contact No</th>
                        <td><input type="text" name="pcon" placeholder="Enter Parents' Contact No..." required></td>
                    </tr>
                    <tr>
                        <th>Standerd</th>
                        <td><input type="number" name="std" placeholder="Enter Standerd..." required></td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><input type="file" name="simg" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        include('../dbcon.php');
        $rollno = $_POST['rollno'];
        $name = ucwords(strtolower(trim($_POST['name']))); // Capitalize the first letter of each word
        $city = $_POST['city'];
        $pcon = $_POST['pcon'];
        $std = $_POST['std'];
        $imagename = $_FILES['simg']['name'];
        $tempname = $_FILES['simg']['tmp_name'];

        // Check for duplicate roll number in the same standard
        $checkqry = "SELECT * FROM student WHERE rollno='$rollno' AND standerd='$std'";
        $checkresult = mysqli_query($con, $checkqry);

        if (mysqli_num_rows($checkresult) > 0) {
            echo "<script>alert('Roll Number already exists in this standard.');</script>";
        } else {
            move_uploaded_file($tempname, "../dataimg/$imagename");

            $qry = "INSERT INTO student(rollno, name, city, pcont, standerd, image) VALUES ('$rollno','$name','$city','$pcon','$std','$imagename')";
            $result = mysqli_query($con, $qry);
            if ($result) {
                echo "<script>alert('Data Inserted Successfully.');</script>";
            } else {
                echo "<script>alert('Data Insertion Failed.');</script>";
            }
        }
    }
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
