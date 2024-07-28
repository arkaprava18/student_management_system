<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location:admin/admindash.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Student Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('path-to-your-background-image.jpg'); /* Add your background image here */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-control {
            padding-left: 40px; /* Add padding to accommodate icons */
        }

        .form-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff;
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
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="post" action="">
            <div class="form-group position-relative">
                <label for="username">Username</label>
                <i class="fas fa-user form-icon"></i>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group position-relative">
                <label for="password">Password</label>
                <i class="fas fa-lock form-icon"></i>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Login">
            </div>
        </form>
    </div>

    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



<?php
include('dbcon.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to avoid SQL injection
    $stmt = $con->prepare("SELECT * FROM `admin` WHERE `username` = ? AND `password` = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows < 1) {
        ?>
        <script>
            alert('Username or password does not match!');
            window.open('login.php', '_self');
        </script>
        <?php
    } else {
        $data = $result->fetch_assoc();
        $id = $data['id'];
        echo "ID: " . $id;
    }

    $stmt->close();
    session_start();
    $_SESSION['uid']=$id;
    header('location:admin/admindash.php');
}
?>
