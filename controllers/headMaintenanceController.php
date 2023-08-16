<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (isset($_GET['deviceType'])) {
    $deviceType = $_GET['deviceType'];
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_GET['deviceDetail'])) {
    $deviceDetail = $_GET['deviceDetail'];
}

switch ($action) {
    case 'index':
        include_once 'views/index.php';
        break;
    case 'install':
        if (isset($deviceDetail)) {
            include_once 'models/headMaintenanceModel.php';
            include_once 'views/Employee_step2_detail.php';
        }else if (isset($deviceType)) {
            include_once 'models/headMaintenanceModel.php';
            include_once 'views/Employee_step2.php';
        } else {
            include_once 'views/Employee_step1.php';
        }
        break;
    case 'maintenance':
        include_once 'views/Employee_maintenance_form.php';
        break;
    case 'manage_requests':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_requests.php';
        break;
    case 'verifyRequest':
        include_once 'views/Employee_step3_showCard.php';
        break;
    case 'verified':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/Employee_step4.php';
        break;
    case 'insertCart':
        include_once 'models/staffModel.php';
        include_once 'views/Employee_step2_detail.php';
        break;  
    case 'cancle_maintenance':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_requests.php';
        break;
    case 'accept_maintenance':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_requests.php';
        break;
    case 'manage_equipments':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_equipments.php';
        break;
    
    case 'displayEquipments':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_equipments.php';
        break;

    case 'manage_staffs':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_staffs.php';
        break;
    case 'displayStaffs':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_staffs.php';
        break;
    case 'alterStaffs':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_staffs.php';
        break;
    case 'send_request':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_requests.php';
        break;
    case 'manage_equipments_info':
        include_once 'models/headMaintenanceModel.php';
        include_once 'views/manager/Manager_manage_equipments_info.php';
        break;
    case 'alter_equipments_info':
        include_once 'models/headMaintenanceModel.php';
        break;
    case 'add_equipments_info':
        include_once 'models/headMaintenanceModel.php';
        break;
    case 'add_serial_equipments_info':
        include_once 'models/headMaintenanceModel.php';
        break;
    case 'maintenance_request';
        include_once 'models/headMaintenanceModel.php';
        break;
    case 'indexInstall';
        include_once 'views/index.php';
        break;
    case 'installEquipmentIT':
        include_once 'views/Employee_step1.php';
        break;
    case 'installEquipmentMaintenance':
        include_once 'views/Employee_step1.php';
        break;
    case 'verifyInstallation':
        include_once 'models/headMaintenanceModel.php';
        break;
    case 'send_request_to_install':
        include_once 'models/headMaintenanceModel.php';
        break;
    }
?>