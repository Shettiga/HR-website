<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $e_id = $_POST['empID'];
    $dep = $_POST['dep'];
    $sql1 = "INSERT INTO `department`(`dep_name`, `em_id`) VALUES (' $dep','$e_id')";
        
            if ($conn->query($sql1) === TRUE) {
                echo "<script>alert('Department added'); window.location.href = 'dashboard.php';</script>";
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
                echo "<script>alert('Error: ' . $sql1 . '<br>' . $conn->error.'); window.location.href = 'Employee.php';</script>";
            }

}


$conn->close();
?>
