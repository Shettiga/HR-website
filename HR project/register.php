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
$table = "employee";

// Fetching values from the form
$U_fname = $_POST["fname"];
$U_mname = $_POST["mname"];
$U_lname = $_POST["lname"];
$U_dob = $_POST["dob"];
$U_email = $_POST["email"];
$U_id = $_POST["uid"];
$U_password = $_POST["password"];
$U_phone = $_POST["phone"];
$U_gender = $_POST["gender"];

// Inserting values into the database
$sql_insert = "INSERT INTO $table ( `name`, `em_email`,`em_id`, `em_password`, `em_gender`,`em_phone`,`em_birthday`) 
VALUES ('$U_fname $U_mname $U_lname','$U_email' ,'$U_id','$U_password','$U_gender','$U_phone','$U_dob')";
if(isset($_POST['gender'])){echo "<script>alert('value {$_POST['gender']}');</script>";}
else {
echo "<script>alert('value not passed'));</script>";}
// Execute SQL statement to insert data
if ($conn->query($sql_insert) === TRUE) {
    echo "New record created successfully";
    header("location:login.html");
} else {
    echo "Error inserting record: " . $conn->error;
}

// Close connection
$conn->close();
?>
