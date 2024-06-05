<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $navBtn = $_POST['navBtn'];
    if ($navBtn === 'Y') {
        echo "<img src='about3.jpg'>";
    }
    elseif($navBtn === '1') {
        include "viewattendence.php";
    } elseif ($navBtn === '2') {
        include "department.html";
    } elseif ($navBtn === '3') {
        include "Leave.php";
    }elseif ($navBtn === '4') {
        include "resignation.php";
    }elseif ($navBtn === '5') {
        include "salary.php";
    }elseif($navBtn==='6')
    {
      include"notices.php";
    
    }else {
        echo "Invalid navigation.";
    }
}
?>