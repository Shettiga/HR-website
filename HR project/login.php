<?php
session_start();

// Simulated database with admin and employee credentials
$adminCredentials = array(
    'username' => 'admin',
    'password' => 'adminpassword'
);

$employeeCredentials = array(
    'username' => 'employee',
    'password' => 'employeepassword'
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the submitted credentials match admin credentials
    if ($username === $adminCredentials['username'] && $password === $adminCredentials['password']) {
        $_SESSION['user_role'] = 'admin';
        header("Location: admin_dashboard.php");
        exit();
    }
    // Check if the submitted credentials match employee credentials
    elseif ($username === $employeeCredentials['username'] && $password === $employeeCredentials['password']) {
        $_SESSION['user_role'] = 'employee';
        header("Location: employee_dashboard.php");
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
