<?php
$product = mysqli_fetch_assoc($products); 
$product_name = $product['name'];
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
    <link href="css/E-step2-detail.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="total-container">
        <div class="nav">
            <div class="branch"><b>Chi nhánh</b></div>
        </div>
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
            <div class="sidebar"  style="background-color: white;">
                <button class="sidebar-close-btn">
                    <i class="bx bx-x"></i>
                </button>
                <div class="siderBar_container">
                    <?php
                    if(isset($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $item) {
                        if (!isset($count_by_id[$item])) {
                          $count_by_id[$item] = 1;
                        } else {
                          $count_by_id[$item]++;
                        }
                      }
                      $connect = mysqli_connect('localhost', 'root', '', 'remeo_postal');
                      
                      foreach ($count_by_id as $id => $count) {
                        $sql = "SELECT * FROM equipment WHERE equipment_id = $id";
                        $result = mysqli_query($connect, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $name_product = $row['name'];
                    ?>
                    <div class="sideBarProduct" style="display: flex;align-items: center;">
                        <div class="siderBar_img">
                            <img src="https://vietbis.vn/Image/Picture/Ricoh/ricoh-p-c200w.jpg" alt="Ảnh sản phẩm" class="product-image" style="width: 100px;height: auto;">
                        </div>
                        <div class="siderBar_right" style="display: flex;flex-direction: column;">
                            <div class="sideBar_name">
                                <?= $name_product ?>
                            </div>
                            <div class="sideBar_quantity">
                                <input type="number" value="<?= $count ?>">
                            </div>

                        </div>
                        <div class="sideBar_delete" style="padding-left: 9px;">
                            <i class='bx bx-trash' style="font-size: 25px;position:relative;top:9px"></i>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
            <br>
            <div class="cookieCrumb">
                <a href="index.php?role=<?= $role ?>&action=indexInstall&deviceType=<?= $deviceType ?>&office_id=<?= $_GET['office_id'] ?>"><i class='bx bx-home'></i></a>
                <div class="arrow">/</div>
                <a href="index.php?role=<?= $role ?>&action=install&deviceType=<?= $deviceType ?>&office_id=<?= $_GET['office_id'] ?>">Danh mục</a>
                <div class="arrow">/</div>
                <div class="product"><?php if (isset($_GET['category'])) {
                                            echo $_GET['category'];
                                        } else {
                                            echo $product_name;
                                        }

                                        ?></div>
            </div>
            <div class="shopping-container">
                <div class="categoriesTab">
                    <div class="label"><b>DANH MỤC</b></div>
                    <div class="label-content">
                        <?php foreach ($categories as $category) { 
                            ?>
                            <div class="type-label">
                                <div class="type" style="padding-left:10px;">
                                    <a style="text-decoration: none; color:black" href="index.php?role=staff&action=install&deviceType=computerParts&category=<?= $category['name'] ?>">
                                        <b><?= $category['name'] ?></b>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="right_section_step3">
                    <?php foreach ($products as $product) { ?>
                        <div class="product-title"><?= $product['name'] ?></div>

                        <div class="productsTab">
                            <div class="product-container">
                                <img src="<?= $product['image_path'] ?>" alt="Ảnh sản phẩm" class="product-image">
                                <div>
                                    <form action="index.php?role=staff&action=insertCart&deviceID=<?= $product['equipment_id'] ?>" method="post">
                                        <div class="number-selector">
                                            <div class="soluong">Số lượng: </div>
                                            <input name="equipment_quantity" type="number" min="1" value="1">
                                        </div>
                                        <br>
                                        

                                        <input name="equipment_name" value="<?= $product['name'] ?>" hidden>
                                        <button class="active" type="submit" style="width:150px;height:50px;color:white;font-size: 20px; border-radius: 5px; cursor: pointer;">Thêm</button>
                                    </form>
                                </div>
                            </div>
                            <div class="info-container">
                                <div class="spec-title">Thông số kĩ thuật</div>
                                <div class="red-line"></div>
                                <div><?= $product['equipment_description'] ?></div>
                            </div>
                        </div>
                    <?php } ?>
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
</body>
<style>
    .label {
    
    <?php
        $role = $_GET['role'];
        switch ($role) {
            case 'staff':
        ?>
        border: 6px solid red;
        background-color: red;
        <?php
                break;
            case 'maintenance':
        ?>
        border: 6px solid blue;
        background-color: blue;
        <?php
                break;
            case 'manager':
        ?>
        border: 6px solid #DBAB06;
        background-color: #DBAB06;
        <?php
                break;
            case 'director':
        ?>
        border: 6px solid #0AC10A;
        background-color: #0AC10A;
        <?php
                break;
        }
        ?>
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
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
    <?php
        $role = $_GET['role'];
        switch ($role) {
            case 'staff':
        ?>background-color: red;
        <?php
                break;
            case 'maintenance':
        ?>background-color: blue;
        <?php
                break;
            case 'manager':
        ?>background-color: #DBAB06;
        <?php
                break;
            case 'director':
        ?>background-color: #0AC10A;
        <?php
                break;
        }
        ?>
}
.active {
    <?php
        $role = $_GET['role'];
        switch ($role) {
            case 'staff':
        ?>background-color: red;
        <?php
                break;
            case 'maintenance':
        ?>background-color: blue;
        <?php
                break;
            case 'manager':
        ?>background-color: #DBAB06;
        <?php
                break;
            case 'director':
        ?>background-color: #0AC10A;
        <?php
                break;
        }
        ?>
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
/* top: 140px; */
width: 100%;
border-top: 10px solid grey;
<?php
        $role = $_GET['role'];
        switch ($role) {
            case 'staff':
        ?>border-bottom: 10px solid red;
        <?php
                break;
            case 'maintenance':
        ?>border-bottom: 10px solid blue;
        <?php
                break;
            case 'manager':
        ?>
        border-bottom: 10px solid #DBAB06;
        <?php
                break;
            case 'director':
        ?>
        border-bottom: 10px solid #0AC10A;
        <?php
                break;
        }
        ?>

/* overflow: auto; */
/* Enable scrolling when content exceeds the container's height */
}
.product-title{
    font-size: 32px;
    <?php
        $role = $_GET['role'];
        switch ($role) {
            case 'staff':
        ?>color: red;
        <?php
                break;
            case 'maintenance':
        ?>color: blue;
        <?php
                break;
            case 'manager':
        ?>color: #DBAB06;
        <?php
                break;
            case 'director':
        ?>color: #0AC10A;
        <?php
                break;
        }
        ?>
}

.spec-title {
    <?php
        $role = $_GET['role'];
        switch ($role) {
            case 'staff':
        ?>color: red;
        <?php
                break;
            case 'maintenance':
        ?>color: blue;
        <?php
                break;
            case 'manager':
        ?>color: #DBAB06;
        <?php
                break;
            case 'director':
        ?>color: #0AC10A;
        <?php
                break;
        }
        ?>
    font-weight: bold;
    font-size: 24px;
}

.red-line {
    height: 1px;
    <?php
        $role = $_GET['role'];
        switch ($role) {
            case 'staff':
        ?>background-color: red;
        <?php
                break;
            case 'maintenance':
        ?>background-color: blue;
        <?php
                break;
            case 'manager':
        ?>background-color: #DBAB06;
        <?php
                break;
            case 'director':
        ?>background-color: #0AC10A;
        <?php
                break;
        }
        ?>
    margin-bottom: 10px;
}

</style>
</html>