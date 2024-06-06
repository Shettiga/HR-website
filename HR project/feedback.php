<!DOCTYPE html>
<html lang="en">
<head>
    <title>feedback form</title>
</head>
<body>
    <form action='' method='post'>
        <label for="">Username</label>
    <input type="text" name="uname" placeholder="Username" required><br>
    <label for="">Email</label>
    <input type="text" name="email" id="email" placeholder="Enter email" required>
    <br><label for="">Subject</label>
    <input type="text" name="subject" id="subject" placeholder="Enter Subject" required>
    <br><label for="">Message</label>
    <input type="text" name="message" id="message" placeholder="Enter Message" required><br>
    <input type="submit" value="Submit">
</form>

    <?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname='hr_management';
    $con=mysqli_connect($servername,$username,$password,$dbname);
    if(!$con)
    die("Error");

    if(isset($_POST['uname'],$_POST['email'],$_POST['subject'],$_POST['message']))
    {
        $query="INSERT INTO `feedback`(`username`, `email`, `subject`, `message`)
         VALUES ('{$_POST['uname']}','{$_POST['email']}','{$_POST['subject']}','{$_POST['message']}')";
if($con->query($query))echo "<script>window.alert('Feedback submitted successfully');</script>";    
}


    ?>
</body>
</html>