<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $usn = $_GET['usn'];
    $name = $_GET['name'];
    $phone_number = $_GET['phone_number'];
    $dept_id = $_GET['dept_id'];
    $year = $_GET['year'];
    $semester_no = $_GET['sem'];
    $type = $_GET['type'];
    $course_id = $_GET['course_id'];

    include "conn.php";

    $sql = "INSERT INTO student (usn, name, phone_number, dept_id, year, sem, type, course_id) VALUES ('$usn', '$name', '$phone_number', '$dept_id', '$year', '$semester_no', '$type')";
    $sql1 = "INSERT INTO stu_enroll (usn, course_id) VALUES ('$usn', '$course_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record inserted in student table";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($conn->query($sql1) === TRUE) {
        echo "New record inserted in enroll table";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
}
?>