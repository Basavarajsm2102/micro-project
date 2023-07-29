<!DOCTYPE html>
<html>

<head>
    <title>Student Enrollment Form</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>

<body>
    <?php
    $host = 'localhost';
    $username = 'your_db_username';
    $password = 'your_db_password';
    $dbname = 'SCHOOL_DB';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $rollNo = '';
    $fullName = '';
    $class = '';
    $birthDate = '';
    $address = '';
    $enrollmentDate = '';

    if (isset($_POST['save'])) {
        $rollNo = $_POST['rollNo'];
        $fullName = $_POST['fullName'];
        $class = $_POST['class'];
        $birthDate = $_POST['birthDate'];
        $address = $_POST['address'];
        $enrollmentDate = $_POST['enrollmentDate'];

        // Perform validation here if needed

        $sql = "INSERT INTO STUDENT_TABLE (Roll_No, Full_Name, Class, Birth_Date, Address, Enrollment_Date)
                VALUES ('$rollNo', '$fullName', '$class', '$birthDate', '$address', '$enrollmentDate')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['search'])) {
        $rollNo = $_POST['rollNo'];

        $sql = "SELECT * FROM STUDENT_TABLE WHERE Roll_No='$rollNo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $fullName = $row['Full_Name'];
            $class = $row['Class'];
            $birthDate = $row['Birth_Date'];
            $address = $row['Address'];
            $enrollmentDate = $row['Enrollment_Date'];
        } else {
            echo "Record not found";
        }
    } elseif (isset($_POST['update'])) {
        // Add code to update the record in the database
        // Similar to the "save" section, use an UPDATE SQL query
    }

    $conn->close();
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Roll No: <input type="number" name="rollNo" value="<?php echo $rollNo; ?>" required><br>
        Full Name: <input type="text" name="fullName" value="<?php echo $fullName; ?>" required><br>
        Class: <input type="text" name="class" value="<?php echo $class; ?>" required><br>
        Birth Date: <input type="date" name="birthDate" value="<?php echo $birthDate; ?>" required><br>
        Address: <input type="text" name="address" value="<?php echo $address; ?>" required><br>
        Enrollment Date: <input type="date" name="enrollmentDate" value="<?php echo $enrollmentDate; ?>" required><br>
        <input type="submit" name="save" value="Save">
        <input type="submit" name="search" value="Search">
        <input type="submit" name="update" value="Update">
        <input type="reset" name="reset" value="Reset">
    </form>

</body>

</html>
