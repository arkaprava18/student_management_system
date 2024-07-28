<?php
function showdetails($standerd, $rollno) {
    include('dbcon.php');
    $sql = "SELECT * FROM `student` WHERE `rollno`='$rollno' AND `standerd`='$standerd'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        ?>
        <div class="card mt-4 shadow" style="background-color: rgba(255, 255, 255, 0.9); border-radius: 10px;">
            <div class="row no-gutters">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="dataimg/<?php echo $data['image']; ?>" class="card-img" alt="Student Image" style="max-width: 100%; height: auto; border-radius: 10px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-primary font-weight-bold">Student Details</h5>
                        <p class="card-text text-secondary"><strong>Roll No:</strong> <span class="text-primary"><?php echo $data['rollno']; ?></span></p>
                        <p class="card-text text-secondary"><strong>Name:</strong> <span class="text-primary"><?php echo $data['name']; ?></span></p>
                        <p class="card-text text-secondary"><strong>Standard:</strong> <span class="text-primary"><?php echo $data['standerd']; ?></span></p>
                        <p class="card-text text-secondary"><strong>Parents Contact No:</strong> <span class="text-primary"><?php echo $data['pcont']; ?></span></p>
                        <p class="card-text text-secondary"><strong>City:</strong> <span class="text-primary"><?php echo $data['city']; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<script>alert('No Student Found.');</script>";
    }
}
?>
