<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="insertexam.php">

        <label>Enter Exam ID:</label>
        <input type="text" name="eid">
        <br><br>

        <label>Exam Date</label>
        <input type="date" name="edate">
        <br><br>

        <label>Exam Type</label>
        <select name="etype" id="etype">
            <option value="">Exam type</option>
            <option value="IA1">IA 1</option>
            <option value="IA2">IA 2</option>
            <option value="IA3">IA 3</option>
            <option value="SEE">SEE</option>
            <option value="MakeUp">MakeUp</option>
        </select>
        <br><br>

        <label for="slot">Slot </label>
                <select name="slot" id="slot">
                <option value="">Select Exam Start Time</option>
                <?php
                include "conn.php";
                $sql = "SELECT * FROM slot";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['slot_no'] . "'>" . $row['start_time'] . "</option>";
                }
                ?>
                </select>
                <br><br>

        <label>Course Title:</label>
            <select name="cid">
            <option value="">Course Title</option>
                <?php
                include "conn.php";
                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['course_id'].">".$row['course_title']."</option>";
                        }
                    } else {
                        echo "No courses found";
                    }
                $conn->close();
                ?>
            </select>
            <br><br>

        <input type="submit">            

    </form>
</body>
</html>