<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

//create a connection

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])) {
    $full_name = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $matric_number = trim($_POST['matric_number']);

    // Validation
    if (empty($full_name) || empty($email) || empty($department) || empty($matric_number)) {
        die("All fields are required! <br><a href='index.php'>Back to form</a>");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format! <br><a href='index.php'>Back to form</a>");
    }


    $stmt = $conn->prepare("SELECT id FROM student_db WHERE email =? OR matric_number=?");
    $stmt->bind_param("ss", $email, $matric_number);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        die("sudent with this email or matric number already exists! <br><a href='index.php'>Back to form</a>");
    }

    $stmt->close();


    // Insert into database
    $stmt = $conn->prepare("INSERT INTO student_db (fullname, email, department, matric_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $department, $matric_number);

    if ($stmt->execute()) {
        echo "Student registered successfully! <a href='view.php'>View Records</a> <br><a href='index.php'>Back to form</a>";
    } else {
        echo "Error: " . $stmt->error . "<br><a href='index.php'>Back to form</a>";
    }

    $stmt->close();
}

$conn->close();

?>