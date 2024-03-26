<!DOCTYPE html>
<html>

   <body>
      <center>
        <h1> Add instructor details:</h1>
         <form action="insertinstructor.php" method="get">
            <p>
                <label for="empid">Employee id:</label>
                <input type="text" name="empid" id="empid">
             </p>
  
             
<p>
               <label for="first_name"> Name:</label>
               <input type="text" name="first_name" id="first_name">
            </p>
             
<p>
               <label for="phone_number">Phone Number:</label>
               <input type="text" name="phone_number" id="phone_number">
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
                    echo "<option value='" . $row['course_id'] . "'>" . $row['course_title'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="submit" name="submit">
        </p>
    </form>

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