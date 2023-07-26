<?php
if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
    switch($role){
        case 1:
            $role='staff';
            break;
        case 2:
            $role='maintenance';
            break;
    }
}
if(isset($_GET['deviceType'])){
    $deviceType = $_GET['deviceType'];
}
if(isset($_GET['category'])){
    $categoryy = $_GET['category'];
}else{
    $categoryy=null;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <title>Document</title>
    <link href="css/E-step2.css" rel="stylesheet" />
</head>

<body>
    <div class="total-container">
        <?php include "views/components/navBar.php" ?> 
        <div class="progress-bar">
            <div class="outter-circle">
                <div class="inner-circle active"></div>
            </div>
            <div class="outter-circle">
                <div class="inner-circle active"></div>
            </div>
            <div class="outter-circle">
                <div class="inner-circle non-active"></div>
            </div>
            <div class="outter-circle">
                <div class="inner-circle non-active"></div>
            </div>
        </div>
        <div class="progress-status"></div>
        <div class="user-options">
            <button class="sidebar-toggle-btn">
                <i class="bx bx-menu"></i>
            </button>
            <div class="sidebar">
                <button class="sidebar-close-btn">
                    <i class="bx bx-x"></i>
                </button>
                <!-- Add your sidebar content here -->
            </div>
            <div class="cookieCrumb">
               <a href="index.php?role=staff&action=install"><i class='bx bx-home'></i></a>
                <div class="arrow">/</div>
                <div class="product"><?php if(isset($_GET['category'])){
                    echo $_GET['category'];
                }else{
                    echo 'Tất cả thiết bị';
                }
                
                ?></div>
            </div>
            <div class="shopping-container">
                <div class="categoriesTab">
                    <div class="label"><b>DANH MỤC</b></div>
                    <div class="label-content">
                        <?php

                        foreach ($categories as $category) {
                        ?>
                            <div class="type-label">
                                <div class="type" style="padding-left:10px;padding-top: 5px;">
                                    <a style="text-decoration: none; color:black;" href="index.php?role=staff&action=install&deviceType=<?= $deviceType?>&category=<?= $category['name'] ?>">
                                        <b><?= $category['name'] ?></b>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="right_section_step3">
                    <div class="filterTab">
                        <labe>Lọc theo hãng</labe>
                        <div class="brandOptions">
                            <?php foreach ($brands as $brand) { ?>
                                <div class="optionContainer">
                                    <input type="checkbox" class="brandCheckbox" data-url="<?php if(isset($_GET['category'])){ 
                                      echo  "index.php?role=".$role."&action=install&deviceType=". $deviceType."&category=".$categoryy."&brand=".$brand['name']."";
                                   }else{
                                    echo  "index.php?role=".$role."&action=install&deviceType=". $deviceType."&brand=".$brand['name']."";
                              } ?>" style="margin-right: 5px; cursor: pointer;">
                                    <?= $brand['name'] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="productsTab">
                        <div class="product">
                            <?php foreach ($products as $product) { 
                                ?>
                                <a href="index.php?role=staff&action=install&deviceType=computerParts&deviceDetail=<?= $product['equipment_id'] ?>">
                                    <div class="product-container">
                                        <div class="product-items">
                                            <img src="https://vietbis.vn/Image/Picture/Ricoh/ricoh-p-c200w.jpg" alt="Ảnh sản phẩm" class="product-image">
                                            <div class="product-name"><?= $product['name'] ?></div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <b>Footer</b>
    </div>
    </div>
    <script>
        const sidebarToggleBtn = document.querySelector('.sidebar-toggle-btn');
        const sidebarCloseBtn = document.querySelector('.sidebar-close-btn');
        const sidebar = document.querySelector('.sidebar');

        sidebarToggleBtn.addEventListener('click', () => {
            sidebar.classList.add('active');
        });

        sidebarCloseBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    </script>
    <script>
        // Get all the checkbox elements with the 'brandCheckbox' class
        const checkboxes = document.querySelectorAll('.brandCheckbox');

        // Add an event listener for each checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', function() {
                // Get the URL from the data-url attribute of the checkbox
                const url = this.getAttribute('data-url');

                // Redirect the user to the desired URL
                window.location.href = url;
            });
        });
    </script>
</body>
<!-- <style>
    .cookieCrumb {
        margin-top: 10px;
        width: 100%;
        padding-left: 65px;
        display: flex;
        font-size: 20px;
    }

    .cookieCrumb i {
        font-size: 23px;

    }

    .filterTab {
        background-color: lightgray;
        height: 100px;
        width: 70vw;
        border-radius: 5px;
        box-shadow: 0px 2px 15px 3px rgba(186, 200, 204, 0.598);
    }

    .productsTab {
        background-color: white;
        height: 1000px;
        width: 70vw;
        margin-top: 20px;
        margin-bottom: 50px;
        box-shadow: 0px 2px 15px 3px rgba(186, 200, 204, 0.598);
    }

    .label {
        border: 6px solid red;
        background-color: red;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .categoriesTab {
        box-shadow: 0px 2px 15px 3px rgba(186, 200, 204, 0.598);
        width: 300px;
        height: 100%;
        border-radius: 5px;
    }

    .shopping-container {
        display: flex;
        width: 100%;
        margin-top: 10px;
        justify-content: space-around;
    }

    * {
        font-family: 'Roboto', sans-serif;
    }

    .rectangle {
        height: 200px;
        width: 400px;
    }

    .square {
        height: 200px;
        width: 200px;
    }

    .progress-status {
        display: flex;
        z-index: 1;
        top: 190px;
        left: 0;
        width: 10px;
        position: absolute;
        height: 10px;
        width: 37%;
        background-color: red;
    }

    .active {
        background-color: red;
    }

    .non-active {
        background-color: lightgrey;
    }

    .progress-bar {
        z-index: 2;
        top: 29px;
        position: relative;
        display: flex;
        width: 100%;
        justify-content: space-around;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .outter-circle {
        height: 50px;
        width: 50px;
        background-color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 2px 15px 3px rgba(186, 200, 204, 0.598);
    }

    .inner-circle {
        height: 20px;
        width: 20px;
        /* background-color: red; */
        border-radius: 50%;
    }

    button {
        background-color: transparent;
        outline: none;
        border: none;
    }

    body {
        background-color: lightgrey;
        margin: 0;
        overflow-x: hidden;
    }

    .branch {
        margin-right: 20px;
        color: red;
    }

    .nav {
        background-color: white;
        color: white;
        width: 100%;
        height: 100px;
        padding: 20px;

    }

    .footer {
        background-color: rgb(26, 26, 47);
        height: 100px;
    }

    .total-container {
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        /* Align content vertically */
        align-items: center;
        /* Align content horizontally */
        min-height: 100vh;
        /* Use min-height instead of height */
    }

    .user-options {

        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        align-items: center;
        background-color: white;
        height: 100%;
        /* Set height to 100% to fill the available space */
        position: relative;
        width: 100%;
        border-top: 10px solid grey;
        border-bottom: 10px solid red;
        /* overflow: auto; */
        /* Enable scrolling when content exceeds the container's height */
    }



    .option-box {
        background-color: red;
        margin-right: 10px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 10px 15px 3px lightblue;
    }

    .option-box:hover {
        cursor: pointer;
    }

    .option-box h3 {
        color: white;
    }

    .footer {
        width: 100%;
    }

    .sidebar-toggle-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: transparent;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .sidebar-toggle-btn i {
        color: grey;
        font-size: 24px;
    }

    .sidebar {
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        /* Adjust the width as needed */
        height: 100%;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
    }

    .sidebar.active {
        transform: translateX(0%);
    }

    .sidebar-close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: transparent;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .sidebar-close-btn i {
        color: grey;
        font-size: 24px;
    }

    .product-container {
        margin-left:30px;
        width: 300px;
       display: flex;
        padding: 10px;
        text-align: center;

       
        padding: 10px;
    }

    .product-image {
        width: 200px;
        height: 200px;

        transition: transform 0.3s;
    }

    .product-image:hover {
        transform: scale(1.1);
    }

    .product-name {
        font-weight: bold;
    }

    .product {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        flex: 1;
        margin: 0 10px;
    }
</style> -->

</html>