<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('Slide-2-Background.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            color: white; /* To make text readable on dark backgrounds */
        }

        .button {
            text-align: right;
            margin: 20px;
            width: 100%;
        }

        .button a {
            text-decoration: none;
            color: white;
            background-color:  #0056b3;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .button a:hover {
            background-color: #007bff;
        }

        .heading {
            text-align: center;
            margin: 20px 0;
            font-size: 2.5em; /* Adjust size as needed */
            color: #fff; /* White color to stand out against the background */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Adds a subtle shadow for better readability */
            font-weight: bold; /* Makes the heading bold */
            line-height: 1.2; /* Adjusts the line height for better spacing */
        }

        form {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .centered-table {
            width: 30%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent background */
            color: #000; /* Text color to contrast with the white background */
        }

        .centered-table th, .centered-table td {
            padding: 10px;
            text-align: left;
        }

        .centered-table th {
            background-color: #007bff;
            color: white;
        }

        .table-header {
            text-align: center;
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .left-align {
            text-align: left;
        }

        .center-align {
            text-align: center;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 4px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h3 class="button"><a href="login.php">Admin Login</a></h3>
    <h1 class="heading">Welcome to Student Management System</h1>
    <form method="post" action="index.php">
        <table class="centered-table" border="1">
            <tr>
                <td colspan="2" class="table-header">Student Information</td>
            </tr>
            <tr>
                <td class="left-align">Choose Standerd</td>
                <td>
                    <select name="std" class="form-control">
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                        <option value="5">5th</option>
                        <option value="6">6th</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="left-align">Enter Roll Number</td>
                <td><input type="text" name="rollno" class="form-control" required></td>
            </tr>
            <tr>
                <td colspan="2" class="center-align"><input type="submit" name="submit" class="btn btn-primary" value="Show Info"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $standerd = $_POST['std'];
        $rollno = $_POST['rollno'];
        include('dbcon.php');
        include('function.php');
        showdetails($standerd, $rollno);
    }
    ?>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
