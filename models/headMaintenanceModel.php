<?php


function fetchProduct()
{
    $deviceType = $_GET['deviceType'];
    switch ($deviceType) {
        case 'computerParts':
            $category_id = 7;
            break;
        case 'printer':
            $category_id = 8;
            break;
        case 'wifi':
            $category_id = 9;
            break;
        case 'conveyor':
            $category_id = 10;
            break;
        case 'scale':
            $category_id = 11;
            break;
        case 'charger':
            $category_id = 12;
            break;
        case 'generator':
            $category_id = 13;
            break;
    }
    if (isset($_GET['brand'])) {
        $brand = $_GET['brand'];
        switch ($brand) {
            case 'HP':
                $manufacturer_id = 7;
                break;
            case 'Asus':
                $manufacturer_id = 8;
                break;
            case 'Samsung':
                $manufacturer_id = 9;
                break;
            case 'Lenovo':
                $manufacturer_id = 10;
                break;
            case 'LG':
                $manufacturer_id = 11;
                break;
            case 'Gigabyte':
                $manufacturer_id = 12; // Add the ID for Gigabyte
                break;
            case 'ViewSonic':
                $manufacturer_id = 13; // Add the ID for ViewSonic
                break;
            case 'AOC':
                $manufacturer_id = 14; // Add the ID for AOC
                break;
                // Add the rest of the brand cases with their respective IDs
            case 'Edra':
                $manufacturer_id = 15;
                break;
            case 'Lecoo':
                $manufacturer_id = 16;
                break;
            case 'Vortex':
                $manufacturer_id = 17;
                break;
            case 'Quadstellar':
                $manufacturer_id = 18;
                break;
            case 'Brother':
                $manufacturer_id = 19;
                break;
            case 'Canon':
                $manufacturer_id = 20;
                break;
            case 'Zebra':
                $manufacturer_id = 21;
                break;
            case 'A+':
                $manufacturer_id = 22;
                break;
            case 'Idea':
                $manufacturer_id = 23;
                break;
            case 'IKplus':
                $manufacturer_id = 24;
                break;
            case 'Xppro':
                $manufacturer_id = 25;
                break;
            case 'Epson':
                $manufacturer_id = 26;
                break;
            case 'Vention':
                $manufacturer_id = 27;
                break;
            case 'Orico':
                $manufacturer_id = 28;
                break;
            case 'Lention':
                $manufacturer_id = 29;
                break;
            case 'TP-Link':
                $manufacturer_id = 30;
                break;
            case 'Aptek':
                $manufacturer_id = 31;
                break;
            case 'Linksys':
                $manufacturer_id = 32;
                break;
            case 'Camry':
                $manufacturer_id = 33;
                break;
            case 'MSI':
                $manufacturer_id = 34;
                break;
            case 'N/a':
                $manufacturer_id = 34;
                break;
        }
    }
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        switch ($category) {
            case 'Màn hình':
                $type_id = 11;
                break;
            case 'Case':
                $type_id = 12;
                break;
            case 'Bàn phím':
                $type_id = 13;
                break;
            case 'Chuột':
                $type_id = 14;
                break;
            case 'Máy in':
                $type_id = 15;
                break;
            case 'Máy in tem':
                $type_id = 16;
                break;
            case 'Giấy in':
                $type_id = 17;
                break;
            case 'Giấy in tem':
                $type_id = 18;
                break;
            case 'Router':
                $type_id = 19;
                break;
            case 'Dây mạng LAN':
                $type_id = 20;
                break;
        }
    }
    if (isset($_GET['deviceDetail'])) {
        $deviceDetail = $_GET['deviceDetail'];
    }
    include_once "connections/openConnect.php";
    if (isset($_GET['brand']) && isset($_GET['deviceType']) && isset($_GET['category'])) {
        $sql = "SELECT * From equipment WHERE category_id = $category_id AND manufacturer_id =  $manufacturer_id AND type_id =  $type_id ";
    } else if (isset($_GET['brand']) && isset($_GET['deviceType'])) {
        $sql = "SELECT * From equipment WHERE category_id = $category_id AND manufacturer_id =  $manufacturer_id";
    } else if (isset($_GET['category']) && isset($_GET['deviceType'])) {
        $sql = "SELECT * From equipment WHERE type_id = $type_id AND category_id = $category_id";
    } else if (isset($_GET['deviceDetail']) && isset($_GET['deviceType'])) {
        $sql = "SELECT * From equipment WHERE equipment_id = $deviceDetail AND category_id = $category_id";
    } else {
        $sql = "SELECT * From equipment WHERE category_id = $category_id";
    }
    $products = mysqli_query($connect, $sql);
    return $products;
    include_once "connections/closeConnect.php";
}

function fetchCategories()
{
    if (isset($_GET['deviceType'])) {
        $deviceType = $_GET['deviceType'];
    } else {
        $deviceType = '';
    }

    // if (isset($_GET['category'])) {
    //     $category = $_GET['category'];
    // } else {
    //     $category = '';
    // }

    include 'connections/openConnect.php';
    if ($deviceType == 'conveyor') {
        $sql = "SELECT * FROM equipmenttype WHERE type_id IN (22)";
        $categories = mysqli_query($connect, $sql);
        include 'connections/closeConnect.php';
        return $categories;
    }else if ($deviceType == 'computerParts') {
        $sql = "SELECT * FROM equipmenttype WHERE type_id IN (11,12,13,14)";
        $categories = mysqli_query($connect, $sql);
        include 'connections/closeConnect.php';
        return $categories;
    } else if ($deviceType == 'printer') {
        $sql = "SELECT * FROM equipmenttype WHERE type_id IN (15,16,17,18)";
        $categories = mysqli_query($connect, $sql);
        include 'connections/closeConnect.php';
        return $categories;
    } else if ($deviceType == 'wifi') {
        $sql = "SELECT * FROM equipmenttype WHERE type_id IN (19,20)";
        $categories = mysqli_query($connect, $sql);
        include 'connections/closeConnect.php';
        return $categories;
    }
     else if ($deviceType == 'scale') {
        $sql = "SELECT * FROM equipmenttype WHERE type_id IN (23)";
        $categories = mysqli_query($connect, $sql);
        include 'connections/closeConnect.php';
        return $categories;
    } else if ($deviceType == 'charger') {
        $sql = "SELECT * FROM equipmenttype ";
        $categories = mysqli_query($connect, $sql);
        include 'connections/closeConnect.php';
        return $categories;
    } else {
        $sql = "SELECT * FROM equipmenttype";
        $categories = mysqli_query($connect, $sql);
        include 'connections/closeConnect.php';
        return $categories;
    }
}

function fetchBrand()
{
    $deviceType = $_GET['deviceType'];
    switch ($deviceType) {
        case 'computerParts':
            $category_id = 7;
            break;
        case 'printer':
            $category_id = 8;
            break;
        case 'wifi':
            $category_id = 9;
            break;
        case 'conveyor':
            $category_id = 10;
            break;
        case 'scale':
            $category_id = 11;
            break;
        case 'charger':
            $category_id = 12;
            break;
        case 'generator':
            $category_id = 13;
            break;
    }
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        switch ($category) {
            case 'Màn hình':
                $type_id = 11;
                break;
            case 'Case':
                $type_id = 12;
                break;
            case 'Bàn phím':
                $type_id = 13;
                break;
            case 'Chuột':
                $type_id = 14;
                break;
            case 'Máy in':
                $type_id = 15;
                break;
            case 'Máy in tem':
                $type_id = 16;
                break;
            case 'Giấy in':
                $type_id = 17;
                break;
            case 'Giấy in tem':
                $type_id = 18;
                break;
            case 'Router':
                $type_id = 19;
                break;
            case 'Dây mạng LAN':
                $type_id = 20;
                break;
            case 'Mực in':
                $type_id = 21;
                break;
        }
        include "connections/openConnect.php";
        $sql = "SELECT distinct manufacturer.name
    FROM equipment 
    INNER JOIN manufacturer ON equipment.manufacturer_id = manufacturer.manufacturer_id where category_id = $category_id AND type_id = $type_id ";
        $brands = mysqli_query($connect, $sql);
        include "connections/closeConnect.php";
        return $brands;
    }
    include "connections/openConnect.php";
    $sql = "SELECT distinct manufacturer.name
    FROM equipment 
    INNER JOIN manufacturer ON equipment.manufacturer_id = manufacturer.manufacturer_id where category_id = $category_id;";
    $brands = mysqli_query($connect, $sql);
    include "connections/closeConnect.php";
    return $brands;
}


function createUser_requests()
{
    $reason = $_POST['reason'];
    $staff_id = $_POST['staff_id'];
    $request_type = $_POST['request_type'];
    include "connections/openConnect.php";

    // Sanitize user inputs to prevent SQL injection
    $reason = mysqli_real_escape_string($connect, $reason);
    $staff_id = mysqli_real_escape_string($connect, $staff_id);

    // Build the SQL query string
    $sql = "INSERT INTO user_requests (staff_id, request_text, request_date, status_id ,request_type) 
            VALUES ('$staff_id', '$reason', NOW(), 1, $request_type)";
    var_dump($sql);
    // Execute the query
    mysqli_query($connect, $sql);

    // Close the database connection
    include "connections/closeConnect.php";

    // Redirect back to the previous page
    // header("Location: " . $_SERVER['HTTP_REFERER']);
}

function insertEquipment_requests()
{
    $i = 0;
    foreach ($_SESSION['cart'] as $item) {
        if (!isset($count_by_id[$item])) {
            $count_by_id[$item] = 1;
        } else {
            $count_by_id[$item]++;
        }
    }
    $connect = mysqli_connect('localhost', 'root', '', 'remeo_postal');
    $sql = "SELECT * FROM user_requests ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connect, $sql);
    $latestRequest = mysqli_fetch_assoc($result);
    $request_id = $latestRequest['id'];
    foreach ($count_by_id as $id => $count) {
        $i++;
        $sql = "SELECT * FROM equipment WHERE equipment_id = $id";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $product_id = $row['equipment_id'];
        // $name_product = $row['name'];
        $sql = "INSERT INTO equipment_requests(request_id,equipment_id,quantity) VALUES ($request_id,'$product_id',$count)";
        // var_dump($sql);
        mysqli_query($connect, $sql);
    }
    mysqli_close($connect);
}

function fetchUser_requests()
{
    $staff_id = $_SESSION['user_id'];
    $staff_role = $_SESSION['role'];
    include "connections/openConnect.php";
    if ($staff_role == 1 || $staff_role == 2) {
        if (!isset($_GET['requestType'])) {
            // Build the SQL query string
            $sql = "SELECT user_requests.*, postalstaff.*
        FROM `user_requests`
        INNER JOIN `postalstaff` ON `user_requests`.`staff_id` = `postalstaff`.`staff_id`
        WHERE `user_requests`.`staff_id` = $staff_id";

            // Execute the query
            $request = mysqli_query($connect, $sql);

            // Close the database connection
            include "connections/closeConnect.php";
            return $request;
        } else {
            $request_type = $_GET['requestType'];
            switch ($request_type) {
                case 'maintenance':
                    $request_typee = 1;
                case 'install':
                    $request_typee = 2;
            }
            $sql = "SELECT user_requests.*, postalstaff.*
            FROM `user_requests`
            INNER JOIN `postalstaff` ON `user_requests`.`staff_id` = `postalstaff`.`staff_id`
            WHERE `user_requests`.`staff_id` = $staff_id AND `user_requests`.`request_type` = $request_typee";

            // Execute the query
            $request = mysqli_query($connect, $sql);

            // Close the database connection
            include "connections/closeConnect.php";
            return $request;
        }
    } else if ($staff_role == 3 || $staff_role == 5) {
        if (!isset($_GET['requestType'])) {
            $sql = "SELECT user_requests.*, postalstaff.*,postaloffice.*,request_status.*
            FROM `user_requests`
            INNER JOIN `postalstaff` ON `user_requests`.`staff_id` = `postalstaff`.`staff_id`
            INNER JOIN `postaloffice` ON `postalstaff`.`office_id` = `postaloffice`.`office_id`
            INNER JOIN `request_status` ON `user_requests`.`status_id` = `request_status`.`status_id`";

            // Execute the query
            $request = mysqli_query($connect, $sql);

            // Close the database connection
            include "connections/closeConnect.php";
            return $request;
        } else {
            $request_type = $_GET['requestType'];
            switch ($request_type) {
                case 'install':
                    $request_typee = 1;
                    $sql = "SELECT user_requests.*, postalstaff.*
            FROM `user_requests`
            INNER JOIN `postalstaff` ON `user_requests`.`staff_id` = `postalstaff`.`staff_id`
            WHERE `user_requests`.`request_type` = $request_typee";

                    // Execute the query
                    $request = mysqli_query($connect, $sql);

                    // Close the database connection
                    include "connections/closeConnect.php";
                    return $request;
                case 'maintenance':
                    $request_typee = 2;
                    $sql = "SELECT user_requests.*, postalstaff.*
            FROM `user_requests`
            INNER JOIN `postalstaff` ON `user_requests`.`staff_id` = `postalstaff`.`staff_id`
            WHERE `user_requests`.`request_type` = $request_typee";

                    // Execute the query
                    $request = mysqli_query($connect, $sql);

                    // Close the database connection
                    include "connections/closeConnect.php";
                    return $request;
            }
        }
    }
}

function fetchEquipment_requests()
{

    include "connections/openConnect.php";

    // Build the SQL query string
    $sql = "SELECT equipment_requests.*, equipment.*
    FROM `equipment_requests`
    INNER JOIN `equipment` ON `equipment_requests`.`equipment_id` = `equipment`.`equipment_id`";

    // Execute the query
    $equipment_request = mysqli_query($connect, $sql);

    // Close the database connection
    include "connections/closeConnect.php";
    return $equipment_request;
}

function fetchMaintenance_requests()
{

    include "connections/openConnect.php";

    // Build the SQL query string
    $sql = "SELECT maintenance_requests.*, item.*,equipment.*
    FROM `maintenance_requests`
    INNER JOIN `item` ON `maintenance_requests`.`serial_number` = `item`.`serial_number`
    INNER JOIN `equipment` ON `item`.`equipment_id` = `equipment`.`equipment_id`";

    // Execute the query
    $maintenance_requests = mysqli_query($connect, $sql);

    // Close the database connection
    include "connections/closeConnect.php";
    return $maintenance_requests;
}

function getProduct()
{
    $id_type = $_GET['productType'];
    if ($id_type == 'all') {
        $products_per_page = 12;
    } else {
        $products_per_page = 4;
    }
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start_index = ($current_page - 1) * $products_per_page;
    $product_limit = $products_per_page;
    // MAKE PAGE DIVIDER


    switch ($id_type) {
        case 'dualSport':
            include_once 'connection/openConnect.php';
            $sql = "SELECT * FROM product WHERE id_type = 1 LIMIT $start_index, $product_limit";
            $product = mysqli_query($connect, $sql);

            return $product;
            break;
        case 'domane':
            include_once 'connection/openConnect.php';
            $sql = "SELECT * FROM product WHERE id_type = 2 LIMIT $start_index, $product_limit";
            $product = mysqli_query($connect, $sql);
            return $product;
            break;
        case 'emonda':
            include_once 'connection/openConnect.php';
            $sql = "SELECT * FROM product WHERE id_type = 3 LIMIT $start_index, $product_limit";
            $product = mysqli_query($connect, $sql);
            return $product;
            break;
        case 'slash':
            include_once 'connection/openConnect.php';
            $sql = "SELECT * FROM product WHERE id_type = 4 LIMIT $start_index, $product_limit";
            $product = mysqli_query($connect, $sql);
            return $product;
            break;
        case '520':
            include_once 'connection/openConnect.php';
            $sql = "SELECT * FROM product WHERE id_type = 5 LIMIT $start_index, $product_limit";
            $product = mysqli_query($connect, $sql);
            return $product;
            break;
        case '820':
            include_once 'connection/openConnect.php';
            $sql = "SELECT * FROM product WHERE id_type = 6 LIMIT $start_index, $product_limit";
            $product = mysqli_query($connect, $sql);
            return $product;
            break;
        case 'all':
            include_once 'connection/openConnect.php';
            $sql = "SELECT * FROM product LIMIT $start_index, $product_limit";
            $product = mysqli_query($connect, $sql);
            return $product;
            break;
    }
}

function insertCart()
{
    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_POST['equipment_quantity'])) {
        $quantity_product = $_POST['equipment_quantity'];
    } else {
        $quantity_product = 1;
    }

    // $quantity_product = $_POST['quantityBuy'];
    for ($i = 1; $i <= $quantity_product; $i++) {
        array_push($_SESSION['cart'], $_GET['deviceID']);
    }
    $_SESSION['msg1'] = "Đã thêm vào giỏ hàng";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

function removeCart()
{
    $id_product = $_POST['id_product'];
    foreach ($_SESSION['cart'] as $key => $id) {
        if ($id == $id_product) {
            unset($_SESSION['cart'][$key]);
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function checkOut()
{
    $connect = mysqli_connect('localhost', 'root', '', 'trek');
    $quantities = array();
    include_once 'connection/openConnect.php';
    $sql = "SELECT * FROM invoiceuser ORDER BY id_invoiceuser DESC LIMIT 1";
    $result = mysqli_query($connect, $sql);
    $inVoice = mysqli_fetch_assoc($result);
    $id_invoiceUser = $inVoice['id_invoiceUser'];
    // Loop through each item in the cart 
    // var_dump($_SESSION['cart']);  
    // var_dump(end($_SESSION['cart']));
    // Iterate over the items in the cart and update the $quantities array
    foreach ($_SESSION['cart'] as $item_id) {
        // If the item id already exists in the quantities array, increment its value
        if (isset($quantities[$item_id])) {
            $quantities[$item_id]++;
        }
        // Otherwise, set its value to 1
        else {
            $quantities[$item_id] = 1;
        }
    }

    // Insert a single row into the invoiceitem table for each item in the cart
    $connect = mysqli_connect('localhost', 'root', '', 'trek');
    foreach ($quantities as $item_id => $quantity) {
        $sql = "INSERT INTO invoiceitem (quantity_product, id_invoiceUser, id_product) VALUES ($quantity, $id_invoiceUser, $item_id);";
        $result = mysqli_query($connect, $sql);
    }
}

function createInvoiceUser()
{
    include_once 'connection/openConnect.php';
    $sql = "INSERT INTO invoiceuser (date_invoiceUser, totalPrice_invoiceUser, id_customer, id_staff) VALUES ('" . date('Y-m-d H:i:s') . "', NULL , " . $_SESSION['user_id'] . ", NULL );";
    // var_dump($sql);
    mysqli_query($connect, $sql);
}

function cancelReceipt()
{
    include_once 'connection/openConnect.php';
    $sql = "SELECT * FROM invoiceuser ORDER BY id_invoiceUser DESC LIMIT 1";
    $result = mysqli_query($connect, $sql);
    $invoiceUser = mysqli_fetch_assoc($result);
    $id_invoiceUser = $invoiceUser['id_invoiceUser'];
    include_once 'connection/openConnect.php';
    $sql = "DELETE FROM invoiceitem WHERE id_invoiceUser = $id_invoiceUser";
    mysqli_query($connect, $sql);
    include_once 'connection/openConnect.php';
    $sql = "DELETE FROM invoiceuser WHERE id_invoiceuser = $id_invoiceUser";
    unset($_SESSION['cart']);
    mysqli_query($connect, $sql);
}

function validateRole()
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    include_once 'connections/openConnect.php';
    // Check if user is a staff member
    $sql = "SELECT * FROM postalstaff WHERE email = '$email' AND password = '$password'";
    $staffs = mysqli_query($connect, $sql);
    $staff_rows = mysqli_num_rows($staffs);

    if ($staff_rows == 1) {
        $staff = mysqli_fetch_assoc($staffs);
        $_SESSION['user_name'] = $staff['name'];
        $_SESSION['user_id'] = $staff['staff_id'];
        $_SESSION['user_type'] = 'staff';
        $staff_role = $staff['role_id'];
        if ($staff_role == 1) {
            return 1;
        } elseif ($staff_role == 2) {
            return 2;
        } elseif ($staff_role == 3) {
            return 3;
        } elseif ($staff_role == 4) {
            return 4;
        }
    }

    // If email and password do not match any records, return false
    $_SESSION['invalid'] = 'invalid password or username';
    return 0;
}

function cancleMaintenance()
{
    if (!isset($_POST['submit'])) {
        die("Phai nhap du lieu tu form");
    }
    (int)$idGet = $_POST['id'];
    $id = (int)$idGet;
    $conn = mysqli_connect('localhost', 'root', '', 'remeo_postal');
    $sql = " DELETE FROM maintenance_requests WHERE user_request_id = $id ";
    $rs = mysqli_query($conn, $sql);
    $sql = " DELETE FROM user_requests WHERE id = $id ";
    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        // echo "Thêm thành công!";
        header("location:index.php?role=manager&action=manage_requests");
    } else {
        echo "Xoá thất bại: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function acceptMaintenance()
{
    if (!isset($_POST['submit'])) {
        die("Phai nhap du lieu tu form");
    }
    (int)$idGet = $_POST['id'];
    $id = (int)$idGet;
    $conn = mysqli_connect('localhost', 'root', '', 'remeo_postal');
    $sql = " UPDATE user_requests
    SET status_id = '2'
    WHERE id = $id";
    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        // echo "Thêm thành công!";
        header("location:index.php?role=manager&action=manage_requests");
    } else {
        echo "Xoá thất bại: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function search()
{
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_POST['page'])) {
        $page = $_POST['page'];
    }
    include_once 'connection/openConnect.php';
    $sqlCountRecord = "SELECT COUNT(*) AS count_record FROM product WHERE name_product LIKE '%$search%'";
    $countRecords = mysqli_query($connect, $sqlCountRecord);
    foreach ($countRecords as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 3;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = $recordOnePage;
    $sql = "SELECT * FROM product WHERE name_product LIKE '%$search%' LIMIT $start, $end";
    $products = mysqli_query($connect, $sql);
    include_once 'connection/closeConnect.php';
    $array = array();
    $array['search'] = $search;
    $array['products'] = $products;
    $array['page'] = $countPage;
    return $array;
}

function viewReceipt()
{
    include_once 'connection/openConnect.php';
    $sql = "SELECT * FROM invoiceuser ORDER BY date_invoiceUser DESC";
    $receipt = mysqli_query($connect, $sql);
    return $receipt;
}

function billDetail()
{
    $id_invocieUser = $_GET['id_invoiceUser'];
    include_once 'connection/openConnect.php';
    $sql = "SELECT * FROM invoiceitem WHERE id_invoiceUser = $id_invocieUser";
    $invoiceItems = mysqli_query($connect, $sql);
    $receipt = array();

    foreach ($invoiceItems as $item) {
        include_once 'connection/openConnect.php';
        $id_product = $item['id_product'];
        $sql = "SELECT * FROM product WHERE id_product = $id_product";
        $result = mysqli_query($connect, $sql);
        $product = mysqli_fetch_assoc($result);
        $picture_product = $product['picture_product'];
        $price_product = $product['price_product'];
        $name_product = $product['name_product'];

        $receiptItem = array(
            'id_product' => $item['id_product'],
            'name' => $name_product,
            'quantity' => $item['quantity_product'],
            'price' => $price_product,
            'picture_product' => $picture_product
        );

        array_push($receipt, $receiptItem);
    }

    return $receipt;
}


if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

function fetchCentralOffices()
{
    $manager_id = $_SESSION['user_id'];
    include './connections/openConnect.php';
    $sql = "SELECT * FROM postaloffice WHERE manager_id = $manager_id AND isCentralOffice = 1";
    $result = mysqli_query($connect, $sql);
    return $result;
    include './connections/closeConnect.php';
}

function fetchRuralOffices()
{
    $manager_id = $_SESSION['user_id'];
    include './connections/openConnect.php';
    $sql = "SELECT * FROM postaloffice WHERE manager_id = $manager_id AND isCentralOffice = 0";
    $result = mysqli_query($connect, $sql);
    return $result;
    include './connections/closeConnect.php';
}

function fetchEquipmentsFromOffice()
{
    $office_id = $_POST['office'];
    include './connections/openConnect.php';
    $sql = "SELECT item.office_id,equipment.equipment_id, equipment.name, equipment.category_id, equipment.image_path,equipment.type_id, COUNT(item.equipment_id) AS quantity
    FROM equipment
    INNER JOIN item ON equipment.equipment_id = item.equipment_id
    WHERE item.office_id = $office_id
    GROUP BY item.equipment_id";
    $result = mysqli_query($connect, $sql);
    return $result;
    include './connections/closeConnect.php';
}

function fetchEquipmentsFromOfficeSerial()
{
    $office_id = $_POST['office'];
    include './connections/openConnect.php';
    $sql = "SELECT * FROM item WHERE office_id = $office_id  ";
    $result = mysqli_query($connect, $sql);
    return $result;
    include './connections/closeConnect.php';
}

function fetchStaffsByOffice()
{
    $office_id = $_POST['office'];
    include './connections/openConnect.php';
    $sql = "SELECT * FROM postalstaff WHERE office_id = $office_id  ";
    $result = mysqli_query($connect, $sql);
    return $result;
    include './connections/closeConnect.php';
}

function fetchStaffsByBranch()
{

    $branch_id = $_SESSION['branch'];

    include './connections/openConnect.php';
    $sql = "SELECT * FROM postalstaff WHERE branch_id = $branch_id  AND role_id IN (1,2)";
    $result = mysqli_query($connect, $sql);
    return $result;
    include './connections/closeConnect.php';
}


function fetchRoles()
{

    include './connections/openConnect.php';
    $sql = "SELECT * FROM roles WHERE role_id IN (1,2)";
    $result = mysqli_query($connect, $sql);
    return $result;
    include './connections/closeConnect.php';
}

function alterStaff()
{
    $id_staff = $_POST['id_staff'];
    $name = $_POST['name_staff'];
    $email = $_POST['email_staff'];
    $phone = $_POST['phone_staff'];
    $role_id = $_POST['role_staff'];
    $password = $_POST['password_staff'];
    include './connections/openConnect.php';
    $sql = "UPDATE postalstaff
    SET name = '$name', email = '$email', phone = $phone,role_id = $role_id,password = '$password'
    WHERE staff_id = $id_staff";
    var_dump($sql);
    $result = mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    header("Location: " . $_SERVER['HTTP_REFERER']);
    return $result;
}

function sendRequestToStaff()
{
    $id_staff = $_POST['staff_id'];
    $id = $_POST['id'];
    $request_estimate_time = new DateTime();
    $request_estimate_time->modify('+2 hours');
    $request_estimate_time = $request_estimate_time->format('Y-m-d H:i:s');
    include './connections/openConnect.php';
    $sql = "UPDATE user_requests
    SET installer_id = $id_staff, status_id = 6, request_estimate_time = '$request_estimate_time'
    WHERE id = $id";
    var_dump($sql);
    mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

function sendRequestToStaffToInstall()
{
    $id_staff = $_POST['staff_id'];
    $id = $_POST['id'];
    $request_estimate_time = new DateTime();
    $request_estimate_time->modify('+2 hours');
    $request_estimate_time = $request_estimate_time->format('Y-m-d H:i:s');
    include './connections/openConnect.php';
    $sql = "UPDATE user_requests
    SET installer_id = $id_staff, status_id = 3, request_estimate_time = '$request_estimate_time'
    WHERE id = $id";
    var_dump($sql);
    mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

function fetchOffices()
{
    if (!isset($office_id)) {

        include './connections/openConnect.php';
        $sql = "SELECT * FROM postaloffice ";
        $result = mysqli_query($connect, $sql);
        include './connections/closeConnect.php';
        return $result;
    } else {
        $office_id = $_POST['office'];
        include './connections/openConnect.php';
        $sql = "SELECT * FROM postaloffice WHERE office_id = $office_id";
        $result = mysqli_query($connect, $sql);
        include './connections/closeConnect.php';
        return $result;
    }
}

function fetchEquipments()
{
    include './connections/openConnect.php';
    $sql = "SELECT * FROM equipment ORDER BY equipment_id DESC";
    $result = mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    return $result;
}

function fetchEquipmentNums()
{
    include './connections/openConnect.php';
    $sql = "SELECT
    equipment_id,
    COUNT(*) AS equipment_count
FROM
    item
WHERE
    office_id IS NULL
GROUP BY
    equipment_id";
    $result = mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    return $result;
}

function fetchManufacturer()
{
    include './connections/openConnect.php';
    $sql = "SELECT * FROM manufacturer";
    $result = mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    return $result;
}

function fetchType()
{
    include './connections/openConnect.php';
    $sql = "SELECT * FROM equipmenttype";
    $result = mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    return $result;
}

function fetchCategoryTotal()
{
    include './connections/openConnect.php';
    $sql = "SELECT * FROM category";
    $result = mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    return $result;
}

function alterEquipmentInfo()
{
    $name = $_POST['name'];
    $equipment_id = $_POST['equipment_id'];
    $equipment_description = $_POST['equipment_description'];
    $image_path = $_POST['image_path'];
    $type_id = $_POST['type_id'];
    $manufacturer_id = $_POST['manufacturer_id'];
    $category_id = $_POST['category_id'];

    include './connections/openConnect.php';
    $sql = "UPDATE equipment
    SET type_id = $type_id, name = '$name', image_path = '$image_path', manufacturer_id = $manufacturer_id, category_id = $category_id, equipment_description = '$equipment_description'
    WHERE equipment_id = $equipment_id;
    ";

    mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

function addEquipmentInfo()
{
    include './connections/openConnect.php';
    $sql = "INSERT INTO equipment (type_id, name, image_path, manufacturer_id, category_id, equipment_description)
    VALUES (NULL,NULL,NULL,NULL,NULL,NULL);
    ";

    mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

function addSerialEquipmentInfo()
{
    include './connections/openConnect.php';
    $equipment_id = $_POST['equipment_id'];
    $serial_number = $_POST['serial'];
    $type_id = $_POST['type_id'];
    $sql = "INSERT INTO item (equipment_id, serial_number, office_id , type_id, status)
    VALUES ( $equipment_id,'$serial_number',NULL,$type_id,1)";
    mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    header("Location: " . $_SERVER['HTTP_REFERER']);
}


function insertMaintenance_requests()
{
    include "./connections/openConnect.php";
    $sql = "SELECT * FROM user_requests WHERE request_type = 2 ORDER BY id DESC LIMIT 1 ";
    $result = mysqli_query($connect, $sql);
    $latestRequest = mysqli_fetch_assoc($result);
    $request_id = $latestRequest['id'];
    $typeId = $_POST['type_id'];
    $serialNumber = $_POST['serial_number'];
    $sql = "INSERT INTO maintenance_requests(user_request_id, type_id, serial_number) VALUES ($request_id, $typeId, '$serialNumber')";
    mysqli_query($connect, $sql);
    mysqli_close($connect);
    header("Location:index.php?role=manager&action=manage_equipments");

}

function changeEquipmentStatus(){
    include './connections/openConnect.php';    
    $serial_number = $_POST['serial_number'];
    $sql = "UPDATE item SET status = 0 WHERE serial_number = '$serial_number'";
    mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
}

function verifyInstallation(){
    include './connections/openConnect.php';
    $id = $_POST['id'];    
    $sql = " UPDATE user_requests
    SET status_id = 3
    WHERE id = $id";
    mysqli_query($connect, $sql);
    include './connections/closeConnect.php';
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

function fetchStaff(){
    include './connections/openConnect.php';
    $office_id = $_SESSION['office_id'];
    $sql = " SELECT * FROM postalstaff WHERE office_id = $office_id";
    $rs = mysqli_query($connect, $sql);
    return $rs;
    include './connections/closeConnect.php';
}
//Kiểm tra hành động hiện tại
switch ($action) {
    case 'loginValidate':
        $test = validateRole();
        $_SESSION['test'] = $test;
        break;
    case 'install':
        $products = fetchProduct();
        $categories = fetchCategories();
        $brands = fetchBrand();
        break;
    case 'insertCart':
        insertCart();

        break;
    case 'verified':
        createUser_requests();
        insertEquipment_requests();

        break;
    case 'manage_requests':
        $requests = fetchUser_requests();
        $request_details = fetchEquipment_requests();
        $maintenance_details = fetchMaintenance_requests();
        $staffs = fetchStaffsByBranch();
        break;
    case 'cancle_maintenance':
        cancleMaintenance();
        break;
    case 'accept_maintenance':
        acceptMaintenance();
        break;
    case 'manage_equipments':
        $Offices = fetchOffices();
        break;
    case 'displayEquipments':
        $Offices = fetchOffices();
        $equipments = fetchEquipmentsFromOffice();
        $equipmentSerials = fetchEquipmentsFromOfficeSerial();
        break;
    case 'manage_staffs':
        $staffs = fetchStaff();
        break;
    case 'displayStaffs':
        $centralOffices = fetchCentralOffices();
        $ruralOffices = fetchRuralOffices();
        $staffs = fetchStaffsByOffice();
        $roles = fetchRoles();
        break;
    case 'alterStaffs':
        alterStaff();
        break;
    case 'send_request':
        sendRequestToStaff();
        break;
    case 'manage_equipments_info':
        $Equipments = fetchEquipments();
        $EquipmentNums = fetchEquipmentNums();
        $Manufacturers = fetchManufacturer();
        $Categories = fetchCategoryTotal();
        $Types = fetchType();
        break;
    case 'alter_equipments_info':
        alterEquipmentInfo();
        break;
    case 'add_equipments_info':
        addEquipmentInfo();
        break;
    case 'add_serial_equipments_info':
        addSerialEquipmentInfo();
        break;
    case 'maintenance_request':
        changeEquipmentStatus();
        createUser_requests();
        insertMaintenance_requests();
        break;
    case 'verifyInstallation':
        verifyInstallation();
        break;
    case 'send_request_to_install':
        sendRequestToStaffToInstall();
        break;
        // case 'data_report':
        //     $centralOffices = fetchCentralOffices();
        //     $ruralOffices = fetchRuralOffices();
        //     break;

        // case 'removeCart':
        //     removeCart();
        //     break;
        // case 'checkOut':
        //     createInvoiceUser();
        //     checkOut();
        //     break;
        // case 'search':
        //     $array = search();
        //     break;
        // case 'viewReceipt':
        //     $receipt = viewReceipt();
        //     break;
        // case 'cancelReceipt':
        //     cancelReceipt();
        //     break;
        // case 'billDetail':
        //     $receipt = billDetail();
        //     break;
}
