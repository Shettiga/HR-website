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

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $sql = "UPDATE emp_leave SET leave_status='APPROVED' WHERE id=$id";
    } else if ($action == 'reject') {
        $sql = "UPDATE emp_leave SET leave_status='REJECTED' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Leave status updated successfully.";
    } else {
        echo "Error updating leave status: " . $conn->error;
    }
}

// Fetch leave requests
$sql = "SELECT * FROM emp_leave WHERE leave_status='Not Approve'";
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
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }
        .approve-button {
            background-color: #4CAF50;
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
            <th>Duration</th>
            <th>Approve/Reject</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["em_id"] . "</td>";
                echo "<td>" . $row["start_date"] . "</td>";
                echo "<td>" . $row["end_date"] . "</td>";
                echo "<td>" . $row["reason"] . "</td>";
                echo "<td>" . $row["leave_status"] . "</td>";
                echo "<td>" . $row["leave_duration"] . "</td>";
                echo '<td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="' . $row["id"] . '">
                            <input type="hidden" name="action" value="approve">
                            <button type="submit" class="approve-button" name="approve">Approve</button>
                        </form>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="' . $row["id"] . '">
                            <input type="hidden" name="action" value="reject">
                            <button type="submit" class="reject-button" name="reject">Reject</button>
                        </form>
                      </td>';
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
