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

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $id = $_POST['id'];
//     $action = $_POST['action'];
//     if ($action == 'approve') {
//         $sql = "UPDATE emp_leave SET leave_status='APPROVED' WHERE id=$id";
//     } else if ($action == 'reject') {
//         $sql = "UPDATE emp_leave SET leave_status='REJECTED' WHERE id=$id";
//     }
//     $conn->query($sql);
// }





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Requests</title>
    <style>
        form{
            border: solid 2px lightskyblue;
            width: 50%;
            padding: 2%;
            background-color: aliceblue;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
        }
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
    <button onclick="backHome();" >Go Back</button>
<h2>Apply for Leave</h2>
    <form action="applyLeave.php" method="post">
        <div class="form-group">
            <label for="em_id">Employee ID:</label>
            <input type="text" id="em_id" name="em_id" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        <div class="form-group">
            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" required></textarea>
        </div>
        <div class="form-group">
            <label for="leave_duration">Leave Duration (in days):</label>
            <input type="number" id="leave_duration" name="leave_duration" required>
        </div>
        <button type="submit" name="apply">Submit</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apply'])) {
            $em_id = $_POST['em_id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $reason = $_POST['reason'];
            $leave_duration = $_POST['leave_duration'];
            $apply_date = date('Y-m-d');
            $leave_status = 'Not Approve';
        
            $sql1 = "INSERT INTO emp_leave (em_id, start_date, end_date, reason, leave_duration, leave_status,apply_date) 
                    VALUES ('$em_id', '$start_date', '$end_date', '$reason', '$leave_duration', '$leave_status','$apply_date')";
        
            if ($conn->query($sql1) === TRUE) {
                echo "Leave application submitted successfully.";
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
        }
    ?>

    <h2>Leave Requests till date</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Em-Id</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
            <th>Reason</th>
            <th>duration</th>
            <th>Approved/Rejectd</th>
        
        </tr>
        <?php
        $sql = "SELECT * FROM emp_leave where leave_status ='Not Approve'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["em_id"] . "</td>";
                echo "<td>" . $row["start_date"] . "</td>";
                echo "<td>" . $row["end_date"] . "</td>";
                echo "<td>" . $row["reason"] . "</td>";
                echo "<td>" . $row["leave_duration"] . "</td>";
                echo "<td>" . $row["leave_status"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No leave requests found</td></tr>";
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['approve'])||isset($_POST['reject'])))
        {
            $action = $_POST['action'];
            $id = $_POST['id'];
            if ($action == 'approve') {
                $sq = "UPDATE emp_leave SET leave_status='APPROVED' WHERE id=$id";
            } else if ($action == 'reject') {
                $sq = "UPDATE emp_leave SET leave_status='REJECTED' WHERE id=$id";
            }
            $conn->query($sq);
        }

        $conn->close();
        ?>
    </table>
</body>
<script>
    function backHome() {   
        window.location.href = "Employee.php";
    }
</script>
</html>
