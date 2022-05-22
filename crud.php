<html>
    <head>
    <?php 
    $connect = mysqli_connect('localhost','root','','crud');
    ?>
    <style>
        table.student, th.student, td.student {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    </head>
    <body>

    <!-- add student form -->
        <h3>Add Student</h3>
        <form action="crud.php" method="post">
            <table>
                <tr>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Section</th>
                    <th>Course</th>
                    <th></th>
                </tr>
                <tr>
                    <td><input type="text" name="surname" placeholder="enter surname"></td>
                    <td><input type="text" name="firstname" placeholder="enter first name"></td>
                    <td><input type="text" name="section" placeholder="enter section"></td>
                    <td><input type="text" name="course" placeholder="enter course"></td>
                    <td><input type="submit" value="Add"></td>
                </tr>
            </table>
        </form>

    <!-- add to database logic -->
        <?php
        if (isset($_POST['surname'])){
            $surname = $_POST['surname'];
            $firstname = $_POST['firstname'];
            $section = $_POST['section'];
            $course = $_POST['course'];
            $addStudent = "INSERT INTO students (surname, firstname, section, course) VALUES ('$surname', '$firstname', '$section', '$course')";
            $addquery = mysqli_query($connect, $addStudent);
            unset($_POST['surname'], $_POST['firstname'], $_POST['section'], $_POST['course']);
        }
        $getAll = "SELECT * from students";
        $query = mysqli_query($connect, $getAll);
        ?>
        <form action="crud.php" method="post">
        <table class="student">
            <tr>
                <th class="student">Surname</th>
                <th class="student">First Name</th>
                <th class="student">Section</th>
                <th class="student">Course</th>
                <th class="student"></th>
            </tr>
            <!-- Studet List -->
            <h1>Student List</h1>
            <?php
            $tdClass = "student";
            $submit = "submit";
            $href = "edit.php?surname=";

            // iterate through all rows
            while ($student = mysqli_fetch_assoc($query)){
                $student_surname = $student['surname'];
                $student_firstname = $student['firstname'];
                $student_section = $student['section'];
                $student_course = $student['course'];

                // display informations to table
                echo "<tr>";
                echo "<td class=$tdClass>$student_surname</td>";
                echo "<td class=$tdClass>$student_firstname</td>";
                echo "<td class=$tdClass>$student_section</td>";
                echo "<td class=$tdClass>$student_course</td>";
                echo "<td class=$tdClass><a href=$href$student_surname>edit</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </form>
    </body>
</html>