<?php
 session_start();
 if(isset($_SESSION['uid'])) {
    echo "";
 } else {
    header('location:../login.php');
 }
?>
<?php
    include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Student Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .admintitle {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: relative;
        }

        .admintitle a {
            color: #fff;
            font-size: 20px;
            text-decoration: none;
        }

        .admintitle .nav-links {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: flex-end;
            top: 50%;
            transform: translateY(-50%);
            padding: 0 30px;
        }

        .admintitle h1 {
            margin: 0;
            padding: 0;
            font-size: 2.5em;
        }

        .dashboard {
            margin-top: 50px;
            padding: 20px;
        }

        .dashboard table {
            width: 70%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px; /* Rounded corners */
        }

        .dashboard table, .dashboard th, .dashboard td {
            border: 1px solid #007bff;
            padding: 12px;
            text-align: left;
            border: 1px solid #d1e0e0; /* Light border for table cells */
        }

        .dashboard th, .dashboard td {
            padding: 12px;
            text-align: left;
            border: 1px solid #d1e0e0; /* Light border for table cells */
        }

        .dashboard tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .dashboard tr:nth-child(even) {
            background-color: #f9f9f9; /* Light grey background for even rows */
        }

        .dashboard a:hover {
            color: #0056b3; /* Darker blue on hover */
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="admintitle">
        <div class="nav-links">
            <a href="logout.php" style="margin-right:30px;">Logout</a>
        </div>
        <h1>Welcome to Admin Dashboard</h1>
    </div>
    <div class="dashboard">
        <table class="table table-bordered">
           
            <tbody>
                <tr>
                    <td>1.</td>
                    <td><a href="addstudent.php">Insert student Details</a></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td><a href="updatestudent.php">Update student Details</a></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td><a href="deletestudent.php">Delete student Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
