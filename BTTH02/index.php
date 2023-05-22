<?php
include 'includes/db_connection.php';


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance view</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <nav class="nav" style="height: 80px;align-items:center;font-size:large">
        <a class="nav-link active" aria-current="page" href="#" style="color:black;font-weight:600">ATTENDANCE check</a>
        <a class="nav-link" href="#" style="color:black">Home</a>
        <a class="nav-link" href="#" style="color:black">DashBoard</a>
        <a class="nav-link" href="#" style="color:black">Courses</a>
    </nav>
    <div class="body" style="background-color:#E9E8E8">
        <div class="container">
            <div class="title" style="display:flex; align-items:center;padding:20px 0px 20px 0px">
                <i class="fa-solid fa-people-roof fa-2xl" style="color: #1E35B7"></i>
                <h1 style="margin-left:40px">Attendance Check</h1>
            </div>
            <label for="">Select Student</label>
            <?php
            $sql = "SELECT * FROM students ORDER BY FullName ASC";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                echo "<select required name='student_id' class='form-control' style='width: 50%; margin-bottom: 20px;'>";
                echo '<option value="">--Select Student--</option>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['student_id'] . '">' . $row['FullName'] . '</option>';
                }
                echo "</select>";
            }
            ?>
            <button type="submit" name="view" style="margin-bottom: 20px;">View Attendance</button>
            <div class="table">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">This course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">All courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">All sessions</a>
                    </li>
                </ul>
                <table class="table table-striped" style="background-color: white;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Course class</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            if (isset($_POST['view'])) {
                                $student_id = $_POST['student_id'];
                                $sql = "SELECT attendance.class_course_id, attendance.class_date, attendance.attendanceStuatus, attendaince.student_id
                                FROM attendance
                                INNER JOIN students ON attendance.student_id = students.student_id
                                INNER JOIN class_course ON attendance.class_course_id = class_course.class_course_id
                                WHERE students.student_id = '$student_id'";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                $sn = 0;
                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sn++;
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $sn . "</th>";
                                        echo "<td>" . $row['class_date'] . "</td>";
                                        echo "<td></td>";
                                        echo "<td>" . $row['class_course_id'] . "</td>";
                                        echo "<td>" . $row['attendanceStuatus'] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>