<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Classroom Data</title>
</head>
<body>
    <h2>Delete Classroom Data</h2>
    <form action="deleteclassroom.php" method="GET">
    <label for="classroom_number">Classroom Number to Delete:</label>
        <select type="text" id="classroom_number" name="classroom_number" required>
                <option value="">Select Classroom Number</option>
                <?php
                include "conn.php";
                $sql = "SELECT * FROM classroom";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['class_num'] . "'>" . $row['class_num'] . "</option>";
                }
                ?>
                </select>
                <br><br>

        <input type="submit" value="Delete">
    </form>
</body>
</html>