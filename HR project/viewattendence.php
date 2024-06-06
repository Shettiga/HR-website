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


$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);
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
            <th>Attendance Date(y/m/d)</th>
            <th>Starting time</th>
            <th>Ending time</th>
            <th>Working Hour</th>
            <th>Work Place</th>
            
            
        
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["emp_id"] . "</td>";
                echo "<td>" . $row["atten_date"] . "</td>";
                echo "<td>" . $row["signin_time"] . "</td>";
                echo "<td>" . $row["signout_time"] . "</td>";
                echo "<td>" . $row["working_hour"] . "</td>";
                echo "<td>" . $row["place"] . "</td>";
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