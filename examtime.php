<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Time Table</title>
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
    </style>
</head>
<body>
    <h2>Exam Details</h2>
    <table>
        <tr>
            <th>Exam Date</th>
            <th>Course COde</th>
            <th>Course Title</th>
            <th>Exam type</th>
            <th>Start time</th>
            <th>End time</th>
        </tr>
        <?php
        include "conn.php"; 

        $sql = "SELECT e.exam_date, e.course_id,c.course_title,e.exam_Type, s.start_time,s.end_time
        FROM exam e 
        INNER JOIN slot s ON e.slot_no = s.slot_no
        INNER JOIN course c ON e.course_id = c.course_id"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['exam_date'] . "</td>";
                echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>" . $row['course_title'] . "</td>";
                echo "<td>" . $row['exam_Type'] . "</td>";
                echo "<td>" . $row['start_time'] . "</td>";
                echo "<td>" . $row['end_time'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No exams found.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
