<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student Data</title>
</head>
<body>
    <h2>Insert Student Data</h2>
    <form action="insertstudent.php" method="GET">
        <label for="usn">USN:</label>
        <input type="text" id="usn" name="usn" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br><br>

        <label for="dept_id">Department:</label>
        <select id="dept_id" name="dept_id" required>
            <option value="">Select Department</option>
            <?php
            include "conn.php";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT dept_id, dept_name FROM department";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['dept_id']."'>".$row['dept_name']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="year">Year:</label>
        <select id="year" name="year" required>
            <option value="">Select Academic Year</option>
            <?php
            include "conn.php";

            $sql = "SELECT `year` FROM scheme_details";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['year']."'>".$row['year']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="semester_no">Semester No:</label>
        <select id="sem" name="sem" required><br><br>
        
            <option value="">Select Semester</option>
            <?php
           include "conn.php";

            $sql = "SELECT sem FROM semester";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['sem']."'>".$row['sem']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="">Select type</option>
            <?php
            include "conn.php";

            $sql = "SELECT distinct `type` FROM student";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['type']."'>".$row['type']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="course_id">Course:</label>
        <select id="course_id" name="course_id" required>
            <option value="">Select Course</option>
        </select><br><br>

        <input type="submit" value="Insert">
    </form>

    
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchCourseTitles() {
                var department = $('#dept_id').val();
                var semester = $('#sem').val();

                $.ajax({
                    url: 'get_courses.php',
                    type: 'GET',
                    data: {
                        department: department,
                        semester: semester,
                    },
                    success: function(response) {
                        $('#course_title').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#department, #semester').change(function() {
                fetchCourseTitles();
            });
        });
    </script>
    </script>
</body>
</html>
