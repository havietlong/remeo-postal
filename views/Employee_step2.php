<?php
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    switch ($role) {
        case 1:
            $role = 'staff';
            break;
        case 2:
            $role = 'maintenance';
            break;
    }
}
if (isset($_GET['deviceType'])) {
    $deviceType = $_GET['deviceType'];
}
if (isset($_GET['category'])) {
    $categoryy = $_GET['category'];
} else {
    $categoryy = null;
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
                <a href="index.php?role=<?= $role ?>&action=install"><i class='bx bx-home'></i></a>
                <div class="arrow">/</div>
                <a href="index.php?role=<?= $role ?>&action=install&deviceType=<?= $deviceType ?>">Danh mục</a>
                <div class="arrow">/</div>
                <div class="product"><?php if (isset($_GET['category'])) {
                                            echo $_GET['category'];
                                        } else {
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
                                    <a style="text-decoration: none; color:black;" href="index.php?role=staff&action=install&deviceType=<?= $deviceType ?>&category=<?= $category['name'] ?>">
                                        <b><?= $category['name'] ?></b>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="right_section_step3" style="height: 100%;">
                    <div class="filterTab">
                        <labe>Lọc theo hãng</labe>
                        <div class="brandOptions">
                            <?php foreach ($brands as $brand) { ?>
                                <div class="optionContainer">
                                    <input type="checkbox" class="brandCheckbox" data-url="<?php if (isset($_GET['category'])) {
                                                                                                echo  "index.php?role=" . $role . "&action=install&deviceType=" . $deviceType . "&category=" . $categoryy . "&brand=" . $brand['name'] . "";
                                                                                            } else {
                                                                                                echo  "index.php?role=" . $role . "&action=install&deviceType=" . $deviceType . "&brand=" . $brand['name'] . "";
                                                                                            } ?>" style="margin-right: 5px; cursor: pointer;">
                                    <?= $brand['name'] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="productsTab">
                        <?php foreach ($products as $product) {
                        ?>
                            <div class="product">
                                <a href="index.php?role=<?= $role ?>&action=install&deviceType=<?= $deviceType ?>&deviceDetail=<?= $product['equipment_id'] ?>">
                                    <div class="product-container">
                                        <div class="product-items">
                                            <img src="<?= $product['image_path'] ?>" alt="Ảnh sản phẩm" class="product-image">
                                            <div class="product-name"><?= $product['name'] ?></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
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

</html>