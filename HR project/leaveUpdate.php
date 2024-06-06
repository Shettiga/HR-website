<?php
include "connection.php";
if($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['approve'])||isset($_POST['reject'])))
        {
            $action = $_POST['action'];
            $id = $_POST['id'];
            if ($action == 'approve') {
                $sq = "UPDATE emp_leave SET leave_status='APPROVED' WHERE id=$id";
                $res=$conn->query($sq);
                if(!$res){
                    echo "error";
                }else{
                    echo "<script>alert('Approved Leave for Employee successfully.'); window.location.href = 'dashboard.php';</script>";
                }
            } else if ($action == 'reject') {
                $sq = "UPDATE emp_leave SET leave_status='REJECTED' WHERE id=$id";
                $res=$conn->query($sq);
                if(!$res){
                    echo "error";
                }else{
                    echo "<script>alert('Rejected Leave for Employee successfully.'); window.location.href = 'dashboard.php';</script>";
                }
            }
            
        }

// Fetch leave requests

?>