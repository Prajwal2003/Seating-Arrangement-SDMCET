<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allotment Page</title>
</head>
<body>
    <form method="get" action="displaydetails.php">
        <p align="center">
            <label for="academicYear">Academic Year:</label>
            <select name="academicYear" id="academicYear">
                <option value="">Select Academic Year</option>
                <?php
                include "conn.php";

                $sql = "SELECT DISTINCT year FROM scheme_details";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="department">Department:</label>
            <select name="department" id="department">
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
            <label for="semester">Semester:</label>
            <select name="semester" id="semester">
                <option value="">Select Semester</option>
                <?php
                $sql = "SELECT DISTINCT sem FROM course";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['sem'] . "'>" . $row['sem'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="courseType">Course Type:</label>
            <select name="courseType" id="courseType">
                <option value="">Select Course Type</option>
                <?php
                $sql = "SELECT DISTINCT type FROM course";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="courseTitle">Course Title:</label>
            <select name="courseTitle" id="courseTitle">
                <option value="">Select Course Title</option>
            </select>
            <br><br>
            <button type="submit">Submit</button>
        </p>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchCourseTitles() {
                var department = $('#department').val();
                var semester = $('#semester').val();
                var courseType = $('#courseType').val();

                $.ajax({
                    url: 'get_courses3.php',
                    type: 'GET',
                    data: {
                        department: department,
                        semester: semester,
                        courseType: courseType
                    },
                    success: function(response) {
                        $('#courseTitle').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#department, #semester, #courseType').change(function() {
                fetchCourseTitles();
            });
        });
    </script>
</body>
</html>