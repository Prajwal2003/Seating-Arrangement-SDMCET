<html>
    <body>
        <center>

            <h1>Updateinstructor details:</h1>

            <form action="updateinstructor.php" method="get">
                <p>
                    Empid:<input type="text" name="empid">
                </p>
                <p>
                    Name: <input type="text" name="first_name">
                </p>
                <p>
                    Phone Number:<input type="text" name="phone_number">
                </p>
                <label for="department">Department:</label>
            <select name="department" id="department">
                <option value="">Select Department</option>
                <?php
                include 'conn.php';
                $sql = "SELECT * FROM department";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['dept_id'] . "'>" . $row['dept_name'] . "</option>";
                }
                echo"
            </select>
         


<br><br>
            <label for='courseTitle'>Course Title:</label>
            <select name='courseTitle' id='courseTitle'>
                <option value=''>Select Course Title</option>";
             
                $sql = "SELECT * FROM course";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" .$row['course_id']. "'>" . $row['course_title'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="submit" name="submit">
        </p>
    </form>
</center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchCourseTitles() {
                var department = $('#department').val();

                $.ajax({
                    url: 'get_courses1.php',
                    type: 'GET',
                    data: {
                        department: department,
                    },
                    success: function(response) {
                        $('#courseTitle').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#department').change(function() {
                fetchCourseTitles();
            });
        });
    </script>
</body>
</html>