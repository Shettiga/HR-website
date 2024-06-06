<?php
session_start();

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

// Assuming employee ID is stored in session
$emp_id = $_SESSION['emp_id']; 

// Fetch employee salary details
$sql = "SELECT emp_id, department, salary, date FROM emp_salary WHERE emp_id='$emp_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard - Salary Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Salary Details</h2>
    <table>
        <tr>
            <th>Employee ID</th>
            <th>Department</th>
            <th>Salary</th>
        
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["emp_id"] . "</td>";
                echo "<td>" . $row["department"] . "</td>";
                echo "<td>" . $row["salary"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No salary details found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
