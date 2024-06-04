<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $navBtn = $_POST['navBtn'];
    if ($navBtn === '1') {
        include "viewattedance.php";
    } elseif ($navBtn === '2') {
        include "department.html";
    } elseif ($navBtn === '3') {
        include "Leave.php";
    }elseif ($navBtn === '4') {
        include "viewresignation.php";
    }elseif ($navBtn === '5') {
        include "salary.php";
    } elseif ($navBtn === '6') {
            include "salary.php";
    }else {
        echo "Invalid navigation.";
    }
}
?>