<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1 i {
            margin-right: 10px;
        }

        .form-container {
            background-color: #000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-header h2 {
            color: #fff;
            margin: 0;
        }

        .close-btn {
            color: #fff;
            cursor: pointer;
            font-size: 1.5em;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            color: #fff;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            outline: none;
            font-size: 1em;
        }

        .submit-btn {
            background-color: #d2a0ff;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #c68fff;
        }
    </style>
</head>
<body>
    <div class="container" style="margin: auto;width: fit-content;">
        <h1><i class="fas fa-building"></i> Department</h1>
        <form action="departmentupdate.php" method="post" class="form-container">
            <div class="form-header">
                <h2>Add department</h2>
            </div>
            <div class="form-group">
                <label for="employeeId">Employee ID:</label>
                <input type="text" id="employeeId" placeholder="Enter the employee ID" name="empID"/>
            </div>
            <div class="form-group">
                <label for="departmentList">Department:</label>
                <select id="departmentList" name="dep">
                    <option value="">--Select Department--</option>
                    <option value="1">Administration</option>
                    <option value="2">Finance, HR, & Administration</option>
                    <option value="3">Research</option>
                    <option value="4">Information Technology</option>
                    <option value="5">Support</option>
                    <option value="6">Network Engineering</option>
                    <option value="7">Sales and Marketing</option>
                    <option value="8">Helpdesk</option>
                    <option value="9">Project Management</option>
                </select>
            </div>
            <button class="submit-btn" name="update" value="add">ADD</button>
        </form>
    </div>
    <div >
        <?php
        $sql = "SELECT id, dep_name FROM department";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['dep_name'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No departments found.";
}
?>
    </div>
    
    
</body>
</html>
