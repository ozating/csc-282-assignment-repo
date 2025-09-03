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

// Handle Delete request
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM student_db WHERE id=$id");
    header("Location: view.php");
    exit;
}

// Fetch records
$result = $conn->query("SELECT * FROM student_db");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
    </style>
</head>
<body>
    <h2>Students list</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Matric Number</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['Fullname']) ?></td>
            <td><?= htmlspecialchars($row['Email']) ?></td>
            <td><?= htmlspecialchars($row['Department']) ?></td>
            <td><?= htmlspecialchars($row['Matric_Number']) ?></td>
            <td>
                <a href="view.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="index.php">Add Next Student</a>
</body>
</html>
<?php $conn->close(); ?>