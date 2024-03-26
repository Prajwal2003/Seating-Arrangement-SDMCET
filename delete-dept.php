<!DOCTYPE html>
<html>
    <body>
        <form method="GET" action="deletedept.php">
            
                <label for="dept">Department:</label>
                <select name="dept" id="dept">
                <option value="">Select Department</option>
                <?php
                include "conn.php";
                $sql = "SELECT * FROM department";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['dept_id'] . "'>" . $row['dept_name'] . "</option>";
                }
                ?>
                </select>
                <br><br>
                
                <input type="submit">
                <br><br>
            
        </form>
    </body>
</html>