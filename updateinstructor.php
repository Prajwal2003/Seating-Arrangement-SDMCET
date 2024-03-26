<?php
        include 'conn.php';
        
       

        $empid = $_GET['empid'];
        $first_name = $_GET['first_name'];
        $phone_number =  $_GET['phone_number'];
        $dept_id = $_GET['department'];
        $course_id = $_GET['courseTitle'];

        $sql="UPDATE `instructor` SET `first_name`='$first_name',`phone_number`=' $phone_number',`course_id`='$course_id',`dept_id`='$dept_id' WHERE empid='$empid'";

        if ($conn->query($sql) === TRUE) 
     {
	     echo "Records updated: ";
     }
     else 
     {
	     echo "Error: ".$sql."<br>".$conn->error;
     }

     $conn->close();

?>