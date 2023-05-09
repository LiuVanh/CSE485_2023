<?php
require_once 'student.php';
$handler = new StudentDAO("student.csv");
if (isset($_POST['add'])) {
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['age'])) {
        echo "Please fill in all fields";
    }
    else {
    $id = $_POST['id'];
    if ($handler->checkId($id)) {
        echo "ID already exists";
        exit();
    }
    else {
        $id = $_POST['id'];
    }
    $name = $_POST['name'];
    $age = $_POST['age'];
    $student = new Student($id, $name, $age);
    $handler->add($student);
    header("Location: index.php");
    }
}
if (isset($_POST['update'])) {
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['age'])) {
        echo "Please fill in all fields";
    }
    else {
    $id = $_POST['id'];
    if (!$handler->checkId($id)) {
        echo "ID does not exist";
        exit();
    }
    else {
        $id = $_POST['id'];
    }
    $name = $_POST['name'];
    $age = $_POST['age'];
    $student = new Student($id, $name, $age);
    $handler->update($id, $student);
    header("Location: index.php");
    }
}
if (isset($_POST['delete'])) {
    if (empty($_POST['id'])) {
        echo "Please fill in ID fields";
    }
    else {
    $id = $_POST['id'];
    $handler->delete($id);
    header("Location: index.php");
    }
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