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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
   

    // Check if the salary record already exists
    $check_sql = "SELECT * FROM emp_salary WHERE emp_id='$emp_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Update existing record
        $sql = "UPDATE emp_salary SET department='$department', salary='$salary', date='$date' WHERE emp_id='$emp_id'";
    } else {
        // Insert new record
        $sql = "INSERT INTO emp_salary (emp_id, department, salary) VALUES ('$emp_id', '$department', '$salary')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Salary details updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Add/Update Salary</title>
</head>
<body>
    <h2>Add/Update Salary</h2>
    <form method="POST" action="">
        <label for="emp_id">Employee ID:</label>
        <input type="text" id="emp_id" name="emp_id" required><br><br>
        <select id="departmentList">
                    <option value="">--Select Department--</option>
                    <option value="1">Administration</option>
                    <option value="2">Finance, HR, & Administration</option>
                    <option value="3">Research</option>
                    <option value="4">Information Technology</option>
                    <option value="5">Support</option>
                    <option value="6">Network Engineering</option>
                    <option value="7">Sales and Marketing</option>
                    <option value="8">Helpdesk</option>
                    <option value="9">Project Management</option>
        </select>
        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" required><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
