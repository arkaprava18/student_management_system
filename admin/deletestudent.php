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
    <title>Delete Student - Student Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 20px;
        }
        .search-form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .search-form h2 {
            margin-bottom: 20px;
        }
        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }
        .table img {
            max-width: 100px;
            height: auto;
        }
        .btn-delete {
            color: #dc3545;
            font-weight: bold;
        }
        .btn-delete:hover {
            color: #c82333;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-form">
            <h2>Search Students</h2>
            <form action="deletestudent.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="standerd">Standard</label>
                        <input type="number" class="form-control" id="standerd" name="standerd" placeholder="Enter Standard" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="stuname">Student Name</label>
                        <input type="text" class="form-control" id="stuname" name="stuname" placeholder="Enter Student Name" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        
        <div class="results-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Roll No</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit'])) {
                        include('../dbcon.php');
                        $standerd = $_POST['standerd'];
                        $name = $_POST['stuname'];
                        $sql = "SELECT * FROM `student` WHERE `standerd`='$standerd' AND `name` LIKE '%$name%'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) < 1) {
                            echo "<tr><td colspan='5' class='text-center'>No Records Found</td></tr>";
                        } else {
                            $count = 0;
                            while ($data = mysqli_fetch_assoc($result)) {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><img src="../dataimg/<?php echo $data['image']; ?>" alt="Student Image"></td>
                                    <td><?php echo htmlspecialchars($data['name']); ?></td>
                                    <td><?php echo htmlspecialchars($data['rollno']); ?></td>
                                    <td><a href="deleteform.php?sid=<?php echo $data['id']; ?>" class="btn btn-link btn-delete" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
