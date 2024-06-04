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


$sql = "SELECT * FROM Attendence";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Requests</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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
        .approve-button, .reject-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }
        .reject-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h2>Leave Requests</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Em-Id</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
            <th>Reason</th>
            <th>Status</th>
            <th>duration</th>
            <th>Approve/Reject</th>
        
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["emp_id"] . "</td>";
                echo "<td>" . $row["login_time"] . "</td>";
                echo "<td>" . $row["logout_time"] . "</td>";
                echo "<td>" . $row["working_hour"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No leave requests found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>