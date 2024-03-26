<?php
    include 'conn.php';
    
    $cid=$_GET["cid"];
    $eid=$_GET["eid"];
    $slot=$_GET["slot"];
    $etype=$_GET["etype"];
    $edate=$_GET["edate"];

    $sql="UPDATE `exam` SET `exam_date`='$edate',`exam_Type`='$etype',`slot_no`='$slot',`course_id`='$cid' WHERE `exam_no`='$eid'";

    if($conn->query($sql))
        echo"updated";
    else
        echo"failed to update";
    
    $conn->close();
    ?>