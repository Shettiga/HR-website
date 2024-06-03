<?php
$servername = "localhost";
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "hr_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_POST['employee_id'];
    $notice_content = $_POST['notice_content'];
    
    $sql = "INSERT INTO notices (employee_id, content) VALUES ('$employee_id', '$notice_content')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Notice added successfully.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Notice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .form-container {
            background-color: #000;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .form-container h3 {
            margin-top: 0;
            text-align: center;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #333;
            color: white;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #8E24AA;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-container button:hover {
            background-color: #6A1B9A;
        }
        .form-container .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <button class="close-button">&times;</button>
        <h3>ADD NOTICE</h3>
        <form method="post" action="">
            <label for="employee_id">Employee Id:</label>
            <input type="text" id="employee_id" name="employee_id" placeholder="Enter the employee ID" required>
            <label for="notice_content">Notice Content:</label>
            <textarea id="notice_content" name="notice_content" placeholder="Enter the notice content" required></textarea>
            <button type="submit">ADD NOTICE</button>
        </form>
        <?php if (!empty($message)) { echo "<p style='color: green;'>$message</p>"; } ?>
    </div>
</body>
</html>
