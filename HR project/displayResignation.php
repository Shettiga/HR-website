<!DOCTYPE html>
<html>
<head>
    <title>Resignation Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Resignation Table</h2>

<table>
    <tr>
        <th>Employee ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Joining Date</th>
        <th>Leaving Date</th>
        <th>Department</th>
    </tr>

    <?php
    include "connection.php";

    $sql = "SELECT employee_id, username, password, phone, joining_date, Leaving_date, department FROM Resignation";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["employee_id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["joining_date"] . "</td>";
            echo "<td>" . $row["Leaving_date"] . "</td>";
            echo "<td>" . $row["department"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>0 results</td></tr>";
    }

    // Close connection
    mysqli_close($conn);
    ?>

</table>

</body>
</html>
