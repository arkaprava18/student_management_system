<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location:../login.php');
    exit();
}

include('header.php');
include('titlehead.php');
include('../dbcon.php');

$sid = $_GET['sid'];
$sql = "SELECT * FROM `student` WHERE `id`='$sid'";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Student Management System</title>
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
        .img-preview {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h1>Edit Student</h1>
            </div>
            <form method="post" action="updatedata.php" enctype="multipart/form-data">
                <table class="form-table">
                    <tr>
                        <th>Roll No</th>
                        <td><input type="text" name="rollno" value="<?php echo htmlspecialchars($data['rollno']); ?>" required></td>
                    </tr>
                    <tr>
                        <th>Full Name</th>
                        <td><input type="text" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><input type="text" name="city" value="<?php echo htmlspecialchars($data['city']); ?>" required></td>
                    </tr>
                    <tr>
                        <th>Parents Contact No</th>
                        <td><input type="text" name="pcon" value="<?php echo htmlspecialchars($data['pcont']); ?>" required></td>
                    </tr>
                    <tr>
                        <th>Standerd</th>
                        <td><input type="number" name="std" value="<?php echo htmlspecialchars($data['standerd']); ?>" required></td>
                    </tr>
                    <tr>
                        <th>Current Image</th>
                        <td>
                            <?php if ($data['image']) { ?>
                                <img src="../dataimg/<?php echo htmlspecialchars($data['image']); ?>" class="img-preview" alt="Current Image">
                            <?php } else { ?>
                                <p>No image available</p>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>New Image (optional)</th>
                        <td><input type="file" name="simg"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="sid" value="<?php echo htmlspecialchars($data['id']); ?>">
                            <input type="submit" name="submit" value="Update">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
