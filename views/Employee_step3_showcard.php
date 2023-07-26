<?php
$staff_id = $_SESSION['user_id'];
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
    <link href="css/Employee-step3-showcard.css" rel="stylesheet" />
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


            <div class="container">
                <div class="left-column" style="margin-bottom: 20px;">
                    <table>
                        <tr>
                            <th>Stt</th>
                            <th>Hình ảnh thiết bị</th>
                            <th>Tên thiết bị</th>
                            <th>Số lượng</th>
                        </tr>
                        <?php
                        $i = 0;
                        if (isset($_SESSION['cart'])) {
                            $_SESSION['noCart'] = "Không có thiết bị trong rỏ";
                    
                            foreach ($_SESSION['cart'] as $item) {
                                if (!isset($count_by_id[$item])) {
                                    $count_by_id[$item] = 1;
                                } else {
                                    $count_by_id[$item]++;
                                }
                            }
                        
                        $connect = mysqli_connect('localhost', 'root', '', 'remeo_postal');
                        
                        foreach ($count_by_id as $id => $count) {
                            $i++;
                            $sql = "SELECT * FROM equipment WHERE equipment_id = $id";
                            var_dump($sql);
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $product_id = $row['equipment_id'];
                            $name_product = $row['name'];

                        ?>

                            <tr>
                                <td><?= $i ?></td>
                                <td></td>
                                <td><?= $name_product ?></td>
                                <td><?= $count ?></td>
                            </tr>
                        <?php }
                         mysqli_close($connect);
                        }
                       
                        ?>
                    </table>
                </div>
                <div class="right-section" style="display: flex;flex-direction: column;">
                    <form action="index.php?role=staff&action=verified" method="post">
                        <input type="text" name="staff_id" value="<?= $staff_id ?> " hidden>
                        <input type="text" name="request_type" value="1" hidden>
                        <div class="right-column" style="margin-bottom: 30px;">
                            <h3>Xác nhận</h3>
                            <button type="submit">Xác nhận</button>
                        </div>
                        <div class="right-column">
                            <textarea name="reason" cols="43" rows="13" style="border: none;outline: none;padding-top: 10px;" placeholder="Điền nguyên nhân cho yêu cầu này"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="footer">
            <b>Footer</b>
        </div>
    </div>
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
</style> -->

</html>