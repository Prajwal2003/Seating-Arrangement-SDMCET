<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="get" action="deleteexam.php">

    <label>Enter Exam ID:</label>
    <select name="eid" id="eid">
        <option value="">Select Exam ID</option>
        <?php
        include "conn.php";
        $sql = "SELECT * FROM exam";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['exam_no'] . "'>" . $row['exam_no'] . "</option>";
        }
        ?>
        </select>
        <br><br>

    <input type="submit">

    </form>

</body>
</html>