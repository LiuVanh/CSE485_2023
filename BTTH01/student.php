<?php
class Student {
    public $id;
    public $name;
    public $age;

public function __construct($id, $name, $age) {
    $this->id = $id;
    $this->name = $name;
    $this->age = $age;
}

public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

public function getName() {
    return $this->name;
}

public function setName($name) {
    $this->name = $name;
}

public function getAge() {
    return $this->age;
}

public function setAge($age) {
    $this->age = $age;
}
}



class StudentDAO {
    private $filename;
    
    public function __construct($filename) {
        $this->filename = $filename;
    }
    
    public function read() {
        $data = [];
        if (($handle = fopen($this->filename, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $data[] = new Student($row[0], $row[1], $row[2]);
            }
            fclose($handle);
        }
        return $data;
    }
    
    public function write($data) {
        $handle = fopen($this->filename, "w");
        foreach ($data as $student) {
            fputcsv($handle, [$student->id, $student->name, $student->age]);
        }
        fclose($handle);
    }

    public function add($student) {
        // Read the existing data from the CSV file
        $data = $this->read();
    
        // Add the new student object to the data array
        $data[] = $student;
    
        // Write the updated data array to the CSV file
        $this->write($data);
    }

    
    public function update($id, $newData) {
        $data = $this->read();
        foreach ($data as $index => $record) {
            if ($record->getId() == $id) {
                $data[$index] = $newData;
                break;
            }
        }
        $this->write($data);
    }
    
    public function delete($index) {
        $data = $this->read();
        array_splice($data, $index, 1);
        $this->write($data);
    }

    
}
?>



