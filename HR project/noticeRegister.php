<?php
include "connection.php";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notSubmit'])) {
    $empmail = $_POST['empmail'];
    $notice_content = $_POST['notice_content'];
    
    $sql = "INSERT INTO notices (email, content) VALUES ('$empmail', '$notice_content')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Notice added successfully.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>