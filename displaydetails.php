<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Page</title>
</head>
<body>
    <form method="get" action="listdisplay.php">
        <p align="center">
        <?php
                include "conn.php";
                session_start();
                $courseId = $_GET['courseTitle'];
                $_SESSION["cid"] = $courseId;
                $sql = "SELECT 
                            COUNT(*) AS total_students,
                            SUM(CASE WHEN s.type = 'NORMAL' THEN 1 ELSE 0 END) AS normal_students,
                            SUM(CASE WHEN s.type = 'RR' THEN 1 ELSE 0 END) AS rr_students,
                            SUM(CASE WHEN s.type = 'backlog' THEN 1 ELSE 0 END) AS backlog_students
                        FROM 
                            stu_enroll e
                        INNER JOIN 
                            student s ON e.usn = s.usn
                        WHERE 
                            e.course_id = '$courseId'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalStudents = $row['total_students'];
                    $normalStudents = $row['normal_students'];
                    $rrStudents = $row['rr_students'];
                    $backlogStudents = $row['backlog_students'];

                    echo "<br><br>Total number of students registered for the course: " . $totalStudents . "";
                    echo "<br><br>Regular students: " . $normalStudents . "";
                    echo "<br><br>RR students: " . $rrStudents . "";
                    echo "<br><br>Backlog students: " . $backlogStudents;
                } else {
                    echo "No students registered for the course.";
                }

                $departmentId = $_GET['department'];
                $_SESSION["deptid"] = $departmentId;

                $sql = "SELECT COUNT(*) AS total_classrooms FROM classroom WHERE dept_id = '$departmentId'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalClassrooms = $row['total_classrooms'];
                    echo "<br><br>Total number of classrooms belonging to the department: " . $totalClassrooms;
                } else {
                    echo "<br><br>No classrooms found for the department.";
                }
                $departmentId = $_GET['department'];

                $sql = "SELECT * FROM classroom WHERE dept_id = '$departmentId'";
                $result = $conn->query($sql);

                $totalCapacity = 0;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $totalCapacity += $row['capacity'];
                    }
                    echo "<br><br>Total capacity of classrooms belonging to the department: " . $totalCapacity;
                } else {
                    echo "<br><br>No classrooms found for the department.";
                }

                $conn->close();
        ?>
        <br><br>
            <button type="submit">ALLOT</button>
        </p>
    </form>
</body>
</html>