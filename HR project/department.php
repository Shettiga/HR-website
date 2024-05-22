<?php
$servername = "localhost";
$username = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "company";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $department = $_POST['department'];
    
    if (!empty($department)) {
        $stmt = $conn->prepare("SELECT name FROM employees WHERE department = ?");
        $stmt->bind_param("s", $department);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Name</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['name'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No employees found in this department.</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='error'>Please select a department.</p>";
    }
}

$conn->close();
?>
