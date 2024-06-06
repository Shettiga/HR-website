
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Notice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .form-container {
            background-color: #000;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: fit-content;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .form-container h3 {
            margin-top: 0;
            text-align: center;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #333;
            color: white;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #8E24AA;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-container button:hover {
            background-color: #6A1B9A;
        }
        .form-container .close-button {
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }
        table,tr,td{
            border: 3px solid cornsilk;
            padding: 4px;
        }
        th{
            border: 3px solid rgb(186, 255, 186);
        }
    </style>
</head>
<body>
    <br><br>
    <div>
    </div>
    <div class="form-container">
        <h3>ADD NOTICE</h3>
        <form method="post" action="noticeRegister.php">
            <label for="employee_id">Employee Id:</label>
            <input type="email" id="empmail" name="empmail" placeholder="Enter the employee Email" required>
            <label for="notice_content">Notice Content:</label>
            <textarea id="notice_content" name="notice_content" placeholder="Enter the notice content" required></textarea>
            <button type="submit" name="notSubmit" value="add">ADD NOTICE</button>
        </form>
        <?php if (!empty($message)) { echo "<p style='color: green;'>$message</p>"; } ?>
    </div>
</body>
</html>
