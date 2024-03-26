<!DOCTYPE html>
<html>
    <body>
        <form method="GET" action="updatecourse.php">
            
                Enter Course ID:
                <select name="cid" id="cid">
                <option value="">Select Course Id</option>
                <?php
                include "conn.php";
                $sql = "SELECT DISTINCT course_id FROM course";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['course_id'] . "'>" . $row['course_id'] . "</option>";
                }
                ?>
                </select>
                <br><br>
                
                Enter Course Title:
                <input type="text" name="ctitle">
                <br><br>
                
                <label for="scheme">Scheme:</label>
                <select name="scheme" id="scheme">
                <option value="">Select Scheme</option>
                <?php
                include "conn.php";
                $sql = "SELECT DISTINCT scheme FROM scheme_details";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['scheme'] . "'>" . $row['scheme'] . "</option>";
                }
                ?>
                </select>
                <br><br>
                
                <label for="dept">Department:</label>
                <select name="dept" id="dept">
                <option value="">Select Department</option>
                <?php
                $sql = "SELECT * FROM department";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['dept_id'] . "'>" . $row['dept_name'] . "</option>";
                }
                ?>
                </select>
                <br><br>

                Enter the Semester:
                <select name="sem" id="sem">
                <option value="">Select Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                </select>
                <br><br>
                
                Enter Course type:
                <select name="type" id="type">
                <option value="">Select Course Type</option>
                <option value="core">Core</option>
                <option value="audit">Audit</option>
                <option value="elective">Elective</option>
                </select>
                <br><br>

                <input type="submit" name="submit">
                <br><br>
            
        </form>
    </body>
</html>