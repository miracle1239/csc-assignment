<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM student_records WHERE id=$id");
    header("Location: view.php");
}
$result = $conn->query("SELECT * FROM student_records");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
    <style>
        body { font-family: Arial, sans-serif; background: #111; color: #fff; }
        .container { width: 80%; margin: 50px auto; background: #222; padding: 20px;
                     border-radius: 10px; box-shadow: 0 0 10px rgba(255,255,255,0.1); }
        h2 { text-align: center; color: #fff; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #555; padding: 10px; text-align: center; }
        th { background: #000; color: #fff; }
        tr:nth-child(even) { background: #333; }
        a.btn { padding: 6px 12px; color: #000; background: #fff; border-radius: 5px;
                text-decoration: none; }
        a.btn:hover { background: #ccc; color: #000; }
        .back { display: block; text-align: center; margin-top: 20px; color: #000; background: #fff;
                padding: 10px; border-radius: 5px; text-decoration: none; }
        .back:hover { background: #ccc; }
    </style>
</head>
<body>
<div class="container">
    <h2>Registered Students</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Matric Number</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['matric_number']; ?></td>
                <td><a class="btn" href="view.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this record?')">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
    <a class="back" href="index.php">Back to Registration</a>
</div>
</body>
</html>
