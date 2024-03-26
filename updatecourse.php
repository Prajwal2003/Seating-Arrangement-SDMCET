<?php
    include 'conn.php';

    $cid=$_GET["cid"];
    $ctitle=$_GET["ctitle"];
    $type=$_GET["type"];
    $dept=$_GET["dept"];
    $scheme=$_GET["scheme"];
    $sem=$_GET["sem"];

    $sql="UPDATE `course` SET `course_title`='".$ctitle."',`type`='".$type."',`dept_id`='".$dept."',`scheme`='".$scheme."',`sem`='".$sem."' WHERE `course_id`='".$cid."'";

    if($conn->query($sql))
        echo"Updated";
    else
        echo"Failed to Update";
    $conn->close();
    ?>