<?php
    require_once 'student.php';

    $handler = new StudentDAO("student.csv");

    $data = $handler->read();
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


<!-- dùng để update -->
<!-- $handler = new StudentDAO("student.csv");
    $StudentToUpdate = null;
    foreach ($handler->read() as $student) {
        if ($student->getId() == "6") {
            $StudentToUpdate = $student;
            break;
        }
    }
    
    if ($StudentToUpdate) {
        // Update the student object with new data
        $StudentToUpdate->setName("Viet Anh");
        $StudentToUpdate->setAge(20);
    }
    // Update the CSV file with the modified data
    $handler->update("6", $StudentToUpdate); -->

<!-- dùng để add  -->
<!-- $handler = new StudentDAO("student.csv");
    
    $newStudent = new Student(6 ,'Bui Dung', 20);

    // Add the new student object to the CSV file
    $handler->add($newStudent); -->

<!-- dùng để delete  -->
<!-- $handler->delete("5"); -->