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
    <title>Update Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            margin-top: 20px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 10px;
        }
        .card {
            margin: 10px;
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }
        .card-img-top {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <form action="updatestudent.php" method="post" class="form-inline justify-content-center">
            <div class="form-group mx-sm-3 mb-2">
                <label for="standerd" class="sr-only">Standard</label>
                <input type="number" name="standerd" class="form-control" id="standerd" placeholder="Enter Standard" required>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="stuname" class="sr-only">Student Name</label>
                <input type="text" name="stuname" class="form-control" id="stuname" placeholder="Enter Student Name" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        include('../dbcon.php');
        $standerd = $_POST['standerd'];
        $name = $_POST['stuname'];
        $sql = "SELECT * FROM `student` WHERE `standerd`='$standerd' AND `name` LIKE '%$name%'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) < 1) {
            echo "<div class='alert alert-warning text-center' role='alert'>No Records Found</div>";
        } else {
            echo '<div class="card-container">';
            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card">
                    <img src="../dataimg/<?php echo $data['image']; ?>" class="card-img-top" alt="Student Image">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $data['name']; ?></h5>
                        <p class="card-text text-center">Roll No: <?php echo $data['rollno']; ?></p>
                        <a href="updateform.php?sid=<?php echo $data['id']; ?>" class="btn btn-primary btn-block mt-auto">Edit</a>
                    </div>
                </div>
                <?php
            }
            echo '</div>';
        }
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
