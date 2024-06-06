<?php
include "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitBT"])) {
    $employeeId = $_POST['employeeId'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $joiningDate = $_POST['joiningDate'];
    $leavingDate = $_POST['leavingDate'];
    $department = $_POST['department'];
    
    $sql = "INSERT INTO Resignation (employee_id, username, password, phone, joining_date,Leaving_date, department) VALUES ( '$employeeId', '$username', 'password', '$phone', '$joiningDate', '$leavingDate', '$department')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Resignation submitted successfully!'); window.location.href = 'Employee.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
?>
