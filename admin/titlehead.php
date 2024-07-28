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
            justify-content: space-between;
            top: 50%;
            transform: translateY(-50%);
            padding: 0 30px;
        }

        .admintitle h1 {
            margin: 0;
            padding: 0;
            font-size: 2.5em;
        }
    </style>
</head>
<body>
    <div class="admintitle">
        <div class="nav-links">
            <a href="admindash.php">Back to Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
        <h1>Welcome to Admin Dashboard</h1>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
