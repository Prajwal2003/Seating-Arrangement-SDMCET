<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $usn = $_GET['usn'];
    $name = $_GET['name'];
    $phone_number = $_GET['phone_number'];
    $dept_id = $_GET['dept_id'];
    $year = $_GET['year'];
    $semester_no = $_GET['sem'];
    $type = $_GET['type'];

    include "conn.php";

    $sql = "UPDATE student SET name = '$name', phone_number = '$phone_number', dept_id = '$dept_id', year = '$year', sem = '$semester_no', type = '$type' WHERE usn = '$usn'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

