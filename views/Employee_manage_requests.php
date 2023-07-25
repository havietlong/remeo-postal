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
</head>

<body>
    <div class="total-container">
        <div class="nav">
            <div class="branch"><b>Chi nhánh</b></div>
        </div>
        <!-- <div class="progress-bar">
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
        </div> -->
        <!-- <div class="progress-status"></div> -->
        <div class="user-options">
            <div class="shopping-container">
                <div class="left_section_step3">
                    <div class="categoriesTab">
                        <div class="label"><b>DANH MỤC</b></div>
                        <div class="label-content">
                          
                                <a href="index.php?role=staff&action=manage_requests&requestType=install" style="color: black;text-decoration: none;"><div class="type" ><b>Lắp đặt</b></div></a>
                                <a href="index.php?role=staff&action=manage_requests&requestType=maintenance" style="color: black;text-decoration: none;"><div class="type"><b>Bảo hành</b></div></a>
                            
                        </div>
                    </div>
    
                </div>
                <div class="right_section_step3">
                    <div class="productsTab">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Loại yêu cầu</th>
                                    <th>Người yêu cầu</th>
                                    <th>Người thực hiện</th>
                                    <!-- <th>Ghi chú</th> -->
                                    <th>Tiến độ xử lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($requests as $request) {
                                    $i++ ?>
                                    <tr>
                                        <td><?= $request['id'] ?></td>
                                        <td><?php if ($request['request_type'] == 1) {
                                                echo "Lắp đặt";
                                            } else {
                                                echo "Bảo trì";
                                            } ?></td>
                                        <td><?= $request['name'] ?></td>
                                        <td>Người thực hiện 1</td>
                                        <!-- <td>Ghi chú 1</td> -->
                                        <td>Đang xử lí</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div class="panel">
                                                <!-- Content of the panel goes here -->
                                                <h3>Nội dung yêu cầu</h3>
                                                <table>
                                                    <tr>
                                            
                                                        <th>Hình ảnh thiết bị</th>
                                                        <th>Tên thiết bị</th>
                                                        <th>Số lượng</th>
                                                    </tr>
                                                    <tbody>
                                                        <?php foreach ($request_details as $request_detail) {
                                                            if ($request_detail['request_id'] == $request['id']) {    ?>
                                                                <tr>
                                                                  
                                                                    <td></td>
                                                                    <td><?= $request_detail['name'] ?></td>
                                                                    <td><?= $request_detail['quantity'] ?></td>
                                                                </tr>

                                                            <?php }} 
                                                             
                                                            ?>
                                                            <tr>
                                                            <td colspan="3"><b>Nguyên nhân yêu cầu</b</td>
                                                            </tr>
                                                            <tr>                                                                
                                                                <td colspan="3"><?= $request['request_text'] ?></td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <b>Footer</b>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".productsTab tbody tr").click(function() {
                var panel = $(this).next("tr").find(".panel");
                panel.slideToggle("slow");
            });
        });
    </script>
</body>
<style>
    .left_section_step3 {
        display: flex;
        flex-direction: column;
    }

    .productsTab table {
        width: 100%;
        border-collapse: collapse;
    }

    .productsTab th,
    .productsTab td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .productsTab th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .productsTab tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .panel {
        display: none;
        padding: 10px;
        background-color: #fff;
    }

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
        border-radius: 5px;
    }

    .shopping-container {
        display: flex;
        width: 100%;
        margin-top: 10px;
        justify-content: space-around;
    }

    * {
        font-family: "Roboto", sans-serif;
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
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        align-items: center;
        background-color: white;
        height: 100%;
        min-height: 58.4vh;
        /* Set height to 100% to fill the available space */
        position: relative;
        width: 100%;
        border-top: 10px solid red;
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
</style>

</html>