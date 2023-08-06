
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
        <?php include "views/components/navBar.php" ?>
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
                            <label><i>Chi nhánh</i></label>
                            <form action="index.php?role=manager&action=displayEquipments" method="post">
                                <select name="office" onchange="this.form.submit()">
                                    <option value="">Chọn chi nhánh</option>
                                    <option disabled>CHI NHÁNH KHÁCH HÀNH LỚN</option>
                                    <?php foreach ($centralOffices as $centralOffice) { ?>
                                        <option value="<?= $centralOffice['office_id'] ?>"><?= $centralOffice['name'] ?></option>
                                    <?php } ?>
                                    <option disabled>CHI NHÁNH KHÁCH HÀNH NHỎ</option>
                                    <?php foreach ($ruralOffices as $ruralOffice) { ?>
                                        <option value="<?= $ruralOffice['office_id'] ?>"><?= $ruralOffice['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="right_section_step3">
                    <h3>Văn phòng</h3>
                    <div id="maintenance" class="productsTab">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thiết bị</th>
                                    <th>Tên</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if(isset($equipments))
                                foreach ($equipments as $equipment) {
                                    if ($equipment['category_id'] == 7 || $equipment['category_id'] == 8 || $equipment['category_id'] == 9){
                                ?>
                                    <tr>
                                        <td><?= $equipment['equipment_id'] ?></td>
                                        <td><img style="width: 120px;height:auto;" src="<?= $equipment['image_path'] ?>"></td>
                                        <td><?= $equipment['name'] ?></td>
                                        <td><?= $equipment['quantity'] ?></td>

                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div class="panel">
                                                <!-- Content of the panel goes here -->
                                                <h3>Serial</h3>
                                                <table>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Tình trạng</th>
                                                        <th>Lệnh</th>
                                                    </tr>
                                                    <tbody>
                                                        <?php
                                                        foreach ($equipmentSerials as $equipmentSerial) {
                                                            if ($equipmentSerial['equipment_id'] == $equipment['equipment_id']) { ?>
                                                                <tr>
                                                                    <td><?= $equipmentSerial['serial_number'] ?></td>
                                                                    <td><?= $equipmentSerial['status'] ?></td>
                                                                    <td>null</td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <h3>Bảo trì</h3>
                    <div id="maintenance" class="productsTab">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thiết bị</th>
                                    <th>Tên</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if(isset($equipments))
                                foreach ($equipments as $equipment) {
                                    if ($equipment['category_id'] == 10 || $equipment['category_id'] == 11 || $equipment['category_id'] == 12 || $equipment['category_id'] == 13){
                                ?>
                                    <tr>
                                        <td><?= $equipment['equipment_id'] ?></td>
                                        <td><img style="width: 120px;height:auto;" src="<?= $equipment['image_path'] ?>"></td>
                                        <td><?= $equipment['name'] ?></td>
                                        <td><?= $equipment['quantity'] ?></td>

                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div class="panel">
                                                <!-- Content of the panel goes here -->
                                                <h3>Serial</h3>
                                                <table>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Tình trạng</th>
                                                        <th>Lệnh</th>
                                                    </tr>
                                                    <tbody>
                                                        <?php
                                                        foreach ($equipmentSerials as $equipmentSerial) {
                                                            if ($equipmentSerial['equipment_id'] == $equipment['equipment_id']) { ?>
                                                                <tr>
                                                                    <td><?= $equipmentSerial['serial_number'] ?></td>
                                                                    <td><?= $equipmentSerial['status'] ?></td>
                                                                    <td>null</td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } ?>
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
        min-height: 63.8vh;
        /* Set height to 100% to fill the available space */
        position: relative;
        width: 100%;
        <?php
        $role = $_GET['role'];
        switch ($role) {
            case 'staff':
        ?>border-top: 10px solid red;
        <?php
                break;
            case 'maintenance':
        ?>border-top: 10px solid blue;
        <?php
                break;
            case 'manager':
        ?>
        border-top: 10px solid #DBAB06;
        <?php
                break;
            case 'director':
        ?>
        border-top: 10px solid #0AC10A;
        <?php
                break;
        }
        ?>
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