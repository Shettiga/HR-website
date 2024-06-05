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
<form action="" method="post">
    <div class="form-group">
        <label for="emp_id">Employee ID:</label>
        <input type="text" id="emp_id" name="emp_id" required>
    </div>
    <div class="form-group">
        <label for="department">Department:</label>
        <select id="department" name="department" required>
        <option value="">--Select Department--</option>
                    <option value="administration">Administration</option>
                    <option value="finance_hr_admin">Finance, HR, & Administration</option>
                    <option value="research">Research</option>
                    <option value="it">Information Technology</option>
                    <option value="support">Support</option>
                    <option value="network_engineering">Network Engineering</option>
                    <option value="sales_marketing">Sales and Marketing</option>
                    <option value="helpdesk">Helpdesk</option>
                    <option value="project_management">Project Management</option>
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
    
    // Calculate total salary
    $total_salary = $basic_salary * $hours_worked;
    
    // Display the result
    include "connection.php";
    $sql="INSERT INTO `emp_salary`( `emp_id`, `department`, `salary`) VALUES ('$emp_id','$department','$total_salary')";
    $res=$conn->query($sql);
}
?>

</body>
</html>
