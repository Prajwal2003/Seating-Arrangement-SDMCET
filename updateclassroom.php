<?php
    $classroom_number = $_GET['classroom_number'];
    $new_capacity = $_GET['new_capacity'];
    $deptid = $_GET['deptid'];

    include "conn.php";

    $sql = "UPDATE classroom SET capacity = '$new_capacity' , dept_id = '$deptid' WHERE class_num = '$classroom_number'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>