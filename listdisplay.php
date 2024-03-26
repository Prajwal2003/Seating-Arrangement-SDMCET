<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Allotment Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 ,h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Seat Allotment Chart</h1>
    <?php
    include "conn.php";

    session_start();

    $courseId = $_SESSION["cid"];
    $departmentId = $_SESSION["deptid"];
    
    $sql = "SELECT course_title from course where course_id = '$courseId'";
    
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    echo "<h2>Course Code : ".$courseId."</h2>";
    echo "<h2>Course Title : ".$row['course_title']."</h2><br>";
    
    echo "<table>
        <tr>
            <th>USN</th>
            <th>Name</th>
            <th>Type</th>
            <th>Seat Number</th>
            <th>Classroom</th>
        </tr>";
        
        
        $sql = "SELECT s.usn, s.name, s.type FROM stu_enroll e INNER JOIN student s ON e.usn = s.usn WHERE e.course_id = '$courseId' ORDER BY `s`.`type`";
        $sql1 = "SELECT se.seat_number, se.class_num
        FROM department d
        INNER JOIN classroom c ON d.dept_id = c.dept_id
        INNER JOIN seat se ON se.class_num = c.class_num
        WHERE c.dept_id = 1
        ORDER BY se.class_num,se.seat_number";

        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row1 = $result1->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row['usn'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row1['seat_number'] . "</td>";
                echo "<td>" . $row1['class_num'] . "</td>";
                echo "</tr>";

                $sql12 = "INSERT INTO `allot_stu_class`(`USN`, `Name`, `type`, `seat_number`, `class_num`) VALUES ('".$row['usn']."','".$row['name']."','" . $row['type'] . "','" . $row1['seat_number'] . "','" . $row1['class_num'] . "')";
                $insert = $conn->query($sql12);
            }
        } else {
            echo "<tr><td colspan='5'>No students enrolled for this course.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <button onclick="window.location.href = 'generatepdf.php'">Generate Pdf</button>
    <button onclick="window.location.href = 'generatecsv.php'">Generate CSV</button>
    <button onclick="window.location.href = 'generateexcel.php'">Generate Excel</button>
    <button onclick="window.location.href = 'newallotment.php'">New Allotment</button>
</body>
</html>