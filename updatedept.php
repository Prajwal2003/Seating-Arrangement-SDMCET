<?php
    include 'conn.php';

    $did = $_GET["did"];
    $dname = $_GET["deptname"];
    $loc = $_GET["deptloc"];

    $sql = "UPDATE `department` SET `dept_name` = '$dname', `location` = '$loc' WHERE `dept_id` = '$did'";

    if( $conn->query($sql) )
    echo"Updated";
else
    echo"failed to UPDATE";

$conn->close();
?>
