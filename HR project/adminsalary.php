<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salary Calculator</title>
    <style>
        form {
            border: solid 2px lightskyblue;
            width: 50%;
            padding: 2%;
            background-color: aliceblue;
            margin: auto;
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Salary Calculator</h2>
<form action="adminsalary.php" method="post">
    <div class="form-group">
        <label for="emp_id">Employee ID:</label>
        <input type="text" id="emp_id" name="emp_id" required>
    </div>
    <div class="form-group">
        <label for="department">Department:</label>
        <select id="department" name="department" required>
        <option value="">--Select Department--</option>
                    <option value="Administratio">Administration</option>
                    <option value=">Finance, HR, & Administratio">Finance, HR, & Administration</option>
                    <option value="Research">Research</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="upport">Support</option>
                    <option value="Network Engineering">Network Engineering</option>
                    <option value="Sales and Marketing">Sales and Marketing</option>
                    <option value="Helpdesk">Helpdesk</option>
                    <option value="Project Management">Project Management</option>
            <!-- Add more departments as needed -->
        </select>
    </div>
    <div class="form-group">
        <label for="basic_salary">Basic Salary (per hour):</label>
        <input type="number" id="basic_salary" name="basic_salary" required>
    </div>
    <div class="form-group">
        <label for="hours_worked">Hours Worked:</label>
        <input type="number" id="hours_worked" name="hours_worked" required>
    </div>
    <button type="submit" name="calculate">Calculate Salary</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['calculate'])) {
    $emp_id = $_POST['emp_id'];
    $department = $_POST['department'];
    $basic_salary = $_POST['basic_salary'];
    $hours_worked = $_POST['hours_worked'];
    echo "Here";
    // Calculate total salary
    $total_salary = $basic_salary * $hours_worked;
    
    // Display the result
    include "connection.php";
    $sql="INSERT INTO `emp_salary`( `emp_id`, `department`, `salary`) VALUES ('$emp_id','$department','$total_salary')";
    $res=$conn->query($sql);
    if($res)
    echo "<script>alert('Inserted');window.location.href='dashboard.php';</script>";
}
?>

</body>
</html>
