<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $navBtn = $_POST['navBtn'];
    if ($navBtn === '1') {
        include "leave.php";
    } elseif ($navBtn === '2') {
        include "viewattedance.php";
    } elseif ($navBtn === '3') {
        include "department.php";
    }elseif ($navBtn === '4') {
        include "leave.php";
    }elseif ($navBtn === '5') {
        include "ResignForm.php";
    } elseif ($navBtn === '6') {
            include "salary.php";
    }elseif ($navBtn === '7') {
        include "logout.php";
    }else {
        echo "Invalid navigation.";
    }
}
?>