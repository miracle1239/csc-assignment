<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cscdatabase";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Process Registration</title>
    <style>
        body { font-family: Arial, sans-serif; background: #111; color: #fff; }
        .box { width: 400px; margin: 100px auto; padding: 20px; background: #222;
               border-radius: 10px; text-align: center; box-shadow: 0 0 10px rgba(255,255,255,0.1); }
        h2 { color: #fff; }
        a { display: inline-block; margin-top: 15px; color: #000; background: #fff;
            padding: 10px 15px; border-radius: 5px; text-decoration: none; }
        a:hover { background: #ccc; color: #000; }
    </style>
</head>
<body>
<div class="box">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $matric_number = trim($_POST['matric_number']);

    if (!empty($full_name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($department) && !empty($matric_number)) {
        $stmt = $conn->prepare("INSERT INTO student_records (full_name, email, department, matric_number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $department, $matric_number);

        if ($stmt->execute()) {
            echo "<h2>Student Registered Successfully!</h2>";
        } else {
            echo "<h2>Error: " . $stmt->error . "</h2>";
        }
    } else {
        echo "<h2>Invalid input. Please check your entries.</h2>";
    }
}
$conn->close();
?>
<br>
<a href="index.php">Back</a>
</div>
</body>
</html>
