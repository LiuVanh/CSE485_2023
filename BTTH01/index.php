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

<!-- <form action="index.php" method="POST">
    <input type="text" name="id" placeholder="Id">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="age" placeholder="Age">
    <input type="submit" name="add" value="Add">
    <input type="submit" name="update" value="Update">
    <input type="submit" name="delete" value="Delete">
</form> -->

<!-- <?php
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
?> -->
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sinh viên mới</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			padding: 10px;
			margin: 0;
		}

		h1 {
			margin-top: 20px;
			padding: 10px;
			background-color: #333;
			color: white;
			text-align: center;
		}

		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			padding: 20px;
		}
		form {
			display: flex;
			flex-direction: column;
			width: 30%;
			margin: 0 auto;
			padding: 20px;
			background-color: #f2f2f2;
			border-radius: 10px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
		}

		label {
			margin-bottom: 10px;
			font-weight: bold;
		}

		input {
			margin-bottom: 10px;
			padding: 10px;
			border: none;
			border-radius: 5px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			font-weight: bold;
			cursor: pointer;
			transition: all 0.3s ease;
		}

		input[type="submit"]:hover {
			background-color: #3E8E41;
		}

		.error {
			margin-bottom: 10px;
			color: red;
			font-weight: bold;
		}

		.success {
			margin-bottom: 10px;
			color: green;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<form action="student.php" method="POST">
		<h3>CRUD students</h3>
        <table>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" placeholder="Id"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" placeholder="Name"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" placeholder="Age"></td>
            </tr>
        </table>
		<input type="submit" name="add" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
        <input type="submit" name="getAll" value="Get All">
	</form>
</body>
</html>