<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Classroom Data</title>
</head>
<body>
    <h2>Insert Classroom Data</h2>
    <form action="insertclassroom.php" method="GET">
        <label for="classroom_number">Classroom Number:</label>
        <input type="text" id="classroom_number" name="classroom_number" required><br><br>

        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" required><br><br>

        <label for="department">Department:</label>
        <select id="department" name="department" required>
            <option value="">Select Department</option>
            <?php
            include "conn.php";

            $sql = "SELECT * FROM department";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['dept_id']."'>".$row['dept_name']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
