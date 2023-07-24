<?php
    session_start();
    //Lấy controller đang làm việc
    $role = '';
    if(isset($_GET['role'])){
        $role = $_GET['role'];
    }

    //Kiểm tra đang làm việc với controller nào
    switch ($role){
        case '':
            header("Location:index.php?role=staff&action=login");
            break;
        case 'maintenance':
            include_once 'controllers/maintenanceController.php';
            break;
        case 'staff':
            include_once 'controllers/staffController.php';
            break;
        // case 'admin':
        //     include_once 'controller/adminController.php';
        //     break;
    }
    ?>
