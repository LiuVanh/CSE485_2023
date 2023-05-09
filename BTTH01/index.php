<?php
require_once 'student.php';
$handler = new StudentDAO("student.csv");
if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $student = new Student($id, $name, $age);
    $handler->add($student);
    header("Location: index.php");
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $student = new Student($id, $name, $age);
    $handler->update($id, $student);
    header("Location: index.php");
}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $handler->delete($id);
    header("Location: index.php");
}
if (isset($_POST['getAll'])) {
    header("Location: index.php");
}
?>

<form action="index.php" method="POST">
    <input type="text" name="id" placeholder="Id">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="age" placeholder="Age">
    <input type="submit" name="add" value="Add">
    <input type="submit" name="update" value="Update">
    <input type="submit" name="delete" value="Delete">
</form>

<?php
    require_once 'student.php';
    $handler = new StudentDAO("student.csv");
    $data = $handler->getAll();
    echo "<table>";
    echo "<tr><th>Id</th><th>Name</th><th>Age</th></tr>";
    foreach ($data as $student) {
        echo "<tr>";
        echo "<td>" . $student->getId() . "</td>";
        echo "<td>" . $student->getName() . "</td>";
        echo "<td>" . $student->getAge() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>

    <?php
        // Lấy giá trị ID từ form
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];

            // Tạo một mảng chứa các ID
            $ids = array("id1", "id2", "id3");

            // Kiểm tra xem ID đã tồn tại trong mảng hay chưa
            if (in_array($id, $ids)) {
                echo "ID chưa tồn tại";
            } else {
                echo "ID đã tồn tại";
            }
        }
    ?>
</body>
</html>