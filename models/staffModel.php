<?php


function productPage()
{
    $id_product = $_GET['id_product'];
    include_once 'connection/openConnect.php';
    $sql = "SELECT * FROM product WHERE id_product = $id_product";
    $product = mysqli_query($connect, $sql);
    return $product;
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
    if (isset($_POST['quantityBuy'])) {
        $quantity_product = $_POST['quantityBuy'];
    } else {
        $quantity_product = 1;
    }
    // $quantity_product = $_POST['quantityBuy'];
    for ($i = 1; $i <= $quantity_product; $i++) {
        array_push($_SESSION['cart'], $_GET['id_product']);
    }
    $_SESSION['msg1'] = "Đã thêm vào giỏ hàng";
    header("index.php?role=customer&action=productPage&id_product=" . $_GET['id_product'] . "");
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
    $result = mysqli_query($connect,$sql);
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
    $result = mysqli_query($connect,$sql);
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

    include_once 'connection/openConnect.php';
    // Check if user is a staff member
    $sql = "SELECT * FROM postalStaff WHERE email = '$email' AND password = '$password'";
    $staffs = mysqli_query($connect, $sql);
    $staff_rows = mysqli_num_rows($staffs);

    if ($staff_rows == 1) {
        $staff = mysqli_fetch_assoc($staffs);
        $_SESSION['user_name'] = $staff['name_staff'];
        $_SESSION['user_id'] = $staff['id_staff'];
        $_SESSION['user_type'] = 'staff';
        return 1;
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

foreach($invoiceItems as $item){
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
    case 'getProduct':
        $product = getProduct();
        break;
    case 'productPage':
        $product = productPage();
        break;
    case 'insertCart':
        insertCart();
        $product = productPage();
        break;
    case 'removeCart':
        removeCart();
        break;
    case 'checkOut':
        createInvoiceUser();
        checkOut();
        break;
    case 'search':
        $array = search();
        break;
    case 'viewReceipt':
        $receipt = viewReceipt();
        break;
    case 'cancelReceipt':
        cancelReceipt();
        break;
    case 'billDetail':
        $receipt = billDetail();
        break;
}
