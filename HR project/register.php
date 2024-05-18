<?php
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


// Define table name
$table = "hr_login";

// SQL statement to create table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS $table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,s
    dob DATE,
    phone VARCHAR(20),
    gender char(1),
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
)";

// Execute SQL statement to create table
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully or already exists";
} else {
    echo "Error creating table: " . $conn->error;
}

// Fetching values from the form
$U_fname = $_POST["fname"];
$U_mname = $_POST["mname"];
$U_lname = $_POST["lname"];
$U_dob = $_POST["dob"];
$U_email = $_POST["email"];
$U_password = $_POST["password"];
$U_phone = $_POST["phone"];
$U_gender = $_POST["gender"];

// Inserting values into the database
$sql_insert = "INSERT INTO $table (name, dob, phone, gender, password, email) VALUES ('$U_fname $U_mname $U_lname', '$U_dob', '$U_phone', '$U_gender', '$U_password', '$U_email')";

// Execute SQL statement to insert data
if ($conn->query($sql_insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error inserting record: " . $conn->error;
}

// Close connection
$conn->close();
?>
