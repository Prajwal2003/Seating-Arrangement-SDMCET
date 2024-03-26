<?php
    include 'conn.php';

    $sid=$_GET["slot"];
    $stime=$_GET["stime"];
    $etime=$_GET["etime"];

    $sql="UPDATE `slot` SET `start_time`='$stime',`end_time`='$etime' WHERE `slot_no`='$sid'";

    if($conn->query($sql))
        echo"Updated";
    else
        echo"failed to update";
    
    $conn->close();
    ?>