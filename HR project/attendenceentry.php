<?php
session_start();
include "connection.php";
if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && isset($_SESSION['u_id'])) {
    $user_id = $_SESSION['user_id'];
    $userType = $_SESSION['user_type'];
	$u_id=$_SESSION['u_id'];

}
    
    if(isset($_POST['submit']))
    {
    $eid=$u_id;
    $dpt=$_POST['department'];
    $date=date("Y-m-d");
    $login_time=$_POST['login_time'];
    $logout_time=$_POST['logout_time'];
    $place=$_POST['place'];
    $login_datetime_str = $date . ' ' . $login_time;
    $logout_datetime_str = $date . ' ' . $logout_time;
    $login_timestamp = strtotime($login_datetime_str);
    $logout_timestamp = strtotime($logout_datetime_str);

    // Calculate the difference in seconds
    $time_worked_in_seconds =  $logout_timestamp - $login_timestamp;

    // Check if the logout time is after the login time
    if ($time_worked_in_seconds < 0) {
        echo "<script>alert('Logout time must be after login time.'); window.location.href = 'Employee.php';</script>";
        exit;
    }

    // Convert the time worked into hours, minutes, and seconds
    $hours = floor($time_worked_in_seconds / 3600);
    $minutes = floor(($time_worked_in_seconds % 3600) / 60);
    $seconds = $time_worked_in_seconds % 60;

    // Format the output
    $time_worked = sprintf("%02d h %02d m %02d s" , $hours, $minutes, $seconds);

    $sql="INSERT INTO `attendance`( `emp_id`, `atten_date`, `signin_time`, `signout_time`, `working_hour`, `place`)
     VALUES ('$eid','$date','$login_time','$logout_time','$time_worked','$place')";
     if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ATTENDENCE ENTERD'); window.location.href = 'Employee.php';</script>";
    } else {
        echo"<script>alert(". $conn->error.");window.location.href = 'Employee.php';</script>" ;
        
    }
    
    $conn->close();
}
    ?>