<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body { font-family: Arial, sans-serif; background: #111; color: #fff; }
        .container { width: 400px; margin: 50px auto; background: #222; padding: 20px;
                     border-radius: 10px; box-shadow: 0 0 10px rgba(255,255,255,0.1); }
        h2 { text-align: center; color: #fff; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #555;
                border-radius: 5px; background: #333; color: #fff; }
        input::placeholder { color: #aaa; }
        button { width: 100%; padding: 10px; background: #000; color: #fff;
                 border: 1px solid #fff; border-radius: 5px; cursor: pointer; }
        button:hover { background: #444; }
        a { display: block; text-align: center; margin-top: 10px; color: #fff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register Student</h2>
        <form action="process.php" method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="department" placeholder="Department" required>
            <input type="text" name="matric_number" placeholder="Matric Number" required>
            <button type="submit">Register</button>
        </form>
        <a href="view.php">View Registered Students</a>
    </div>
</body>
</html>