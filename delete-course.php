<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="deletecourse.php" method="get">
        <h1>Enter Course Title of the course to be deleted :</h1>
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