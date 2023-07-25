<?php


function fetchProduct()
{
    $deviceType = $_GET['deviceType'];
    switch ($deviceType) {
        case 'computerParts' :
            $category_id = 7;
            break;
        case 'printer' :
            $category_id = 8;
            break; 
        case 'wifi' :
            $category_id = 9;
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
        }
    }
    include_once "connections/openConnect.php";
    if(isset($_GET['brand'])&&isset($_GET['deviceType'])&&isset($_GET['category'])){
    $sql = "SELECT * From equipment WHERE category_id = $category_id AND manufacturer_id =  $manufacturer_id AND type_id =  $type_id ";    
    }else if(isset($_GET['brand'])&&isset($_GET['deviceType'])){
    $sql = "SELECT * From equipment WHERE category_id = $category_id AND manufacturer_id =  $manufacturer_id";
    }else if (isset($_GET['category'])&&isset($_GET['deviceType'])){
    $sql = "SELECT * From equipment WHERE type_id = $type_id AND category_id = $category_id";    
    }else{
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
    if ($deviceType == 'computerParts') {
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
}

function fetchBrand()
{
    include "connections/openConnect.php";
    $sql = "SELECT * FROM manufacturer";
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
    $sql = "INSERT INTO user_requests (staff_id, request_text, request_date, status,request_type) 
            VALUES ('$staff_id', '$reason', NOW(), 'Pending', $request_type)";
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
    include "connections/openConnect.php";

    // Build the SQL query string
    if (isset($_GET['requestType'])) {
        $requestType = $_GET['requestType'];
        switch ($requestType) {
            case 'install':
                $sql = "SELECT user_requests.*, postalstaff.*
                FROM `user_requests`
                INNER JOIN `postalstaff` ON `user_requests`.`staff_id` = `postalstaff`.`staff_id`
                WHERE `user_requests`.`staff_id` = $staff_id AND `user_requests`.`request_type`= 1";
                $request = mysqli_query($connect, $sql);
                include "connections/closeConnect.php";
                return $request;
                break;
            case 'maintenance':
                $sql = "SELECT user_requests.*, postalstaff.*
                FROM `user_requests`
                INNER JOIN `postalstaff` ON `user_requests`.`staff_id` = `postalstaff`.`staff_id`
                WHERE `user_requests`.`staff_id` = $staff_id AND `user_requests`.`request_type`= 2";
                $request = mysqli_query($connect, $sql);
                include "connections/closeConnect.php";
                return $request;
        }
    } else {
        $sql = "SELECT user_requests.*, postalstaff.*
    FROM `user_requests`
    INNER JOIN `postalstaff` ON `user_requests`.`staff_id` = `postalstaff`.`staff_id`
    WHERE `user_requests`.`staff_id` = $staff_id";

        // Execute the query
        $request = mysqli_query($connect, $sql);

        // Close the database connection
        include "connections/closeConnect.php";
        return $request;
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
        $_SESSION['role'] = $staff['role_id'];
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
        // case 'productPage':
        //     $product = productPage();
        //     break;
    case 'insertCart':
        insertCart();
        // $product = productPage();
        break;
    case 'verified':
        createUser_requests();
        insertEquipment_requests();
        // $product = productPage();
        break;
    case 'manage_requests':
        $requests = fetchUser_requests();
        $request_details = fetchEquipment_requests();
        break;
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
