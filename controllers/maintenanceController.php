<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (isset($_GET['deviceType'])) {
    $deviceType = $_GET['deviceType'];
}

if (isset($_GET['deviceDetail'])) {
    $deviceDetail = $_GET['deviceDetail'];
}

switch ($action) {
    case 'index':
        // $_SESSION['name_user'] = '';
        include_once 'views/index.php';
        break;
    case 'install':
        if (isset($deviceDetail)) {
            include_once 'models/maintenanceModel.php';
            include_once 'views/Employee_step2_detail.php';
        } else if (isset($deviceType)) {
            include_once 'models/maintenanceModel.php';
            include_once 'views/Employee_step2.php';
        } else {
            include_once 'views/Employee_step1.php';
        }
        break;
    case 'maintenance':
        include_once 'models/maintenanceModel.php';
        include_once 'views/Employee_maintenance_form.php';
        break;
        case 'maintenance_request':
            include_once 'models/staffModel.php';
            include_once 'views/Employee_maintenance_form.php';
            break;
    case 'manage_requests':
        include_once 'models/maintenanceModel.php';
        include_once 'views/Employee_manage_requests.php';
        break;
    case 'verifyRequest':
        include_once 'views/Employee_step3_showCard.php';
        break;
    case 'verified':
        include_once 'models/maintenanceModel.php';
        include_once 'views/Employee_step4.php';
        break;
        // case 'productPage':
        //     include_once 'model/customerModel.php';
        //     include_once 'views/customer/product.php';
        //     break;
    case 'insertCart':
        include_once 'models/maintenanceModel.php';
        include_once 'views/Employee_step2_detail.php';
        break;
    case 'finish_requests':
        include_once 'models/maintenanceModel.php';
        break;
    case 'replace_requests':
        include_once 'models/maintenanceModel.php';
        break;
        // case 'removeCart':
        //     include_once 'model/customerModel.php';
        //     break;  
        // case 'checkOut':
        //     if(!isset($_SESSION['user_name'])){
        //         header('Location:index.php?role=customer&action=login');
        //     }else{
        //         include_once 'model/customerModel.php';
        //         include_once 'views/customer/bill.php';
        //     }
        //     break; 
        // case 'dashboard':
        //     // include_once 'model/customerModel.php';
        //     include_once 'views/customer/dashboard.php';
        //     break;
        // case 'search':
        //     include_once 'model/customerModel.php';
        //     include_once 'views/customer/productTotal.php';
        //     break;
        // case 'logOut':
        //     unset($_SESSION['user_name']);
        //     unset($_SESSION['user_type']);
        //     header('Location:index.php?role=customer&action=index');
        //     break;
        // case 'viewReceipt':
        //     include_once 'model/customerModel.php';
        //     include_once 'views/customer/dashboard.php';
        //     break;
        // case 'billDetail':
        //     include_once 'model/customerModel.php';
        //     include_once 'views/customer/billDetail.php';
        //     break;
        // case 'cancelReceipt':
        //     include_once 'model/customerModel.php';
        //     $_SESSION['cancelSuccess']="Cancel Sucessful";
        //     include_once 'views/index.php';
        //     break;
}
