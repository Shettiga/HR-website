<?php
session_start();
include "connection.php";
if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && isset($_SESSION['u_id'])) {
    $user_id = $_SESSION['user_id'];
    $userType = $_SESSION['user_type'];
	$u_id=$_SESSION['u_id'];

}

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apply'])) {
            $em_id = $u_id;
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $reason = $_POST['reason'];
            $leave_duration = $_POST['leave_duration'];
            $apply_date = date('Y-m-d');
            $leave_status = 'Not Approve';
        
            $sql1 = "INSERT INTO emp_leave (em_id, start_date, end_date, reason, leave_duration, leave_status,apply_date) 
                    VALUES ('$em_id', '$start_date', '$end_date', '$reason', '$leave_duration', '$leave_status','$apply_date')";
        
            if ($conn->query($sql1) === TRUE) {
                echo "<script>alert('Leave application submitted successfully.'); window.location.href = 'Employee.php';</script>";
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
                echo "<script>alert('Error: ' . $sql1 . '<br>' . $conn->error.'); window.location.href = 'Employee.php';</script>";
            }
        }
    ?>