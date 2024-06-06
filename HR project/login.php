<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "hr_management";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['admin'])){
    $table = "admin_login";
    $user=$_POST["email"];
    $pass=$_POST["password"];
    
    $sql = "SELECT * FROM $table WHERE username='$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // now check the password
        $row = $result->fetch_assoc();
        $storedPassword = $row['password']; 
        if ($pass === $storedPassword) {
            // Passwords match, user is authenticated
            $_SESSION['user_id']=$user;
            $_SESSION['user_type']="adm";
            header("location:dashboard.php");
            exit();
        } else {
            echo "Password incorrect";
        }
    }
}
elseif(isset($_POST['Emp'])){
    $table = "employee";
    $mail=$_POST["email"];
    $pass=$_POST["em_password"];

    $sql = "SELECT * FROM $table WHERE em_email='$mail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // now check the password
        $row = $result->fetch_assoc();
        $em_id = $row['em_id'];
        $storedPassword = $row['password']; 
        if ($pass === $storedPassword) {
            $_SESSION['user_id']=$mail;
            $_SESSION['user_type']="emp";
            $_SESSION['u_id']=$em_id;
            // Passwords match, user is authenticated
            echo "Login successful!";
            header("Location:Employee.php");
        } else {
            echo "Password incorrect";
        }
    }
}
else {
    echo "No user found with that email";
}

$conn->close();
?>
