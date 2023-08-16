<?php include "views/components/head.php" ?>
<?php if (isset($_GET['action'])) {
    $action = $_GET['action'];
} ?>

<body>
    <div class="total-container">
        <?php
        include "views/components/navBar.php"
        ?>
        <div class="progress-bar">
            <div class="outter-circle">
                <div class="inner-circle active"></div>
            </div>
            <div class="outter-circle">
                <div class="inner-circle non-active"></div>
            </div>
            <div class="outter-circle">
                <div class="inner-circle non-active"></div>
            </div>
            <div class="outter-circle">
                <div class="inner-circle non-active"></div>
            </div>
        </div>
        <div class="progress-status">
        </div>
        <div class="user-options">

            <?php
            switch ($role) {
                case 'staff': ?>

                    <a href='index.php?role=staff&action=install'>
                        <button>
                            <div class="option-box">
                                <i class='bx bx-wrench'></i>
                                <h3>Lắp đặt</h3>
                            </div>
                        </button>
                    </a>
                    <a href="index.php?role=staff&action=maintenance">
                        <button>
                            <div class="option-box">
                                <i class='bx bx-cog'></i>
                                <h3>Bảo trì</h3>
                            </div>
                        </button>
                    </a>
                    <a href="index.php?role=staff&action=manage_requests">
                        <button>
                            <div class="option-box">
                                <i class='bx bx-list-ul'></i>
                                <h3>Quản lý yêu cầu</h3>
                            </div>
                        </button>
                    </a>

                <?php break;
                case 'maintenance': ?><a href='index.php?role=maintenance&action=install'>
                        <button>
                            <div class="option-box">
                                <i class='bx bx-wrench'></i>
                                <h3>Lắp đặt</h3>
                            </div>
                        </button>
                    </a>
                    <a href="index.php?role=maintenance&action=maintenance">
                        <button>
                            <div class="option-box">
                                <i class='bx bx-cog'></i>
                                <h3>Bảo trì</h3>
                            </div>
                        </button>
                    </a>
                    <a href="index.php?role=maintenance&action=manage_requests">
                        <button>
                            <div class="option-box">
                                <i class='bx bx-list-ul'></i>
                                <h3>Quản lý yêu cầu</h3>
                            </div>
                        </button>
                    </a>
                    <?php break;
                case 'manager':
                    if ($_SESSION['branch'] === '4' && $action != 'indexInstall') {
                    ?>
                        <a href="index.php?role=manager&action=manage_equipments">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-devices'></i>
                                    <h3>Quản lý thiết bị</h3>
                                </div>
                            </button>
                        </a>
                        <a href="index.php?role=manager&action=manage_requests">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-list-ul'></i>
                                    <h3>Quản lý yêu cầu</h3>
                                </div>
                            </button>
                        </a>
                        <!-- <a href="index.php?role=manager&action=manage_staffs">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-user'></i>
                                    <h3>Quản lý nhân viên</h3>
                                </div>
                            </button>
                        </a> -->
                        <a href="index.php?role=manager&action=manage_equipments_info">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-edit-alt'></i>
                                    <h3>Quản lý thông tin thiết bị</h3>
                                </div>
                            </button>
                        </a>
                    <?php } else if ($action === 'indexInstall') { ?>
                        <a href="index.php?role=manager&action=manage_equipments">
                            <button>
                                <div class="option-box">

                                    <h3>Quay lại</h3>
                                </div>
                            </button>
                        </a>
                        <a href="index.php?role=manager&action=installEquipmentIT&office_id=<?= $_GET['office_id'] ?>">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-devices'></i>
                                    <h3>Thiết bị văn phòng</h3>
                                </div>
                            </button>
                        </a>
                        <a href="index.php?role=manager&action=installEquipmentMaintenance&office_id=<?= $_GET['office_id'] ?>">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-cog'></i>
                                    <h3>Thiết bị bảo trì</h3>
                                </div>
                            </button>
                        </a>
                        <a href="index.php?role=manager&action=verifyRequest">
                            <button>
                                <div class="option-box">

                                    <h3>Tiếp</h3>
                                </div>
                            </button>
                        </a>
                    <?php } else { ?>
                        <a href="index.php?role=manager&action=manage_equipments">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-devices'></i>
                                    <h3>Quản lý thiết bị</h3>
                                </div>
                            </button>
                        </a>
                        <a href="index.php?role=manager&action=manage_requests">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-list-ul'></i>
                                    <h3>Quản lý yêu cầu</h3>
                                </div>
                            </button>
                        </a>
                        <a href="index.php?role=manager&action=manage_staffs">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-user'></i>
                                    <h3>Quản lý nhân viên</h3>
                                </div>
                            </button>
                        </a>
                    <?php  } ?>
                <?php break;
                case 'director':
                ?>
                    <a href="index.php?role=director&action=displayRequests">
                        <button>
                            <div class="option-box">
                                <i class='bx bxs-bar-chart-alt-2'></i>
                                <h3>Theo dõi thống kê</h3>
                            </div>
                        </button>
                    </a>
                    <a href="index.php?role=director&action=manage_equipments">
                        <button>
                            <div class="option-box">
                                <i class='bx bx-devices'></i>
                                <h3>Quản lý thiết bị</h3>
                            </div>
                        </button>
                    </a>
                    <a href="index.php?role=director&action=manage_requests">
                        <button>
                            <div class="option-box">
                                <i class='bx bx-list-ul'></i>
                                <h3>Quản lý yêu cầu</h3>
                            </div>
                        </button>
                    </a>
                    <a href="index.php?role=director&action=manage_staffs">
                        <button>
                            <div class="option-box">
                                <i class='bx bx-user'></i>
                                <h3>Quản lý nhân viên</h3>
                            </div>
                        </button>
                    </a>
                <?php break;
                case 'headMaintenance':
                ?>
                    <a href="index.php?role=<?= $_GET['role'] ?>&action=manage_requests">
                        <button>
                            <div class="option-box">
                            <i class='bx bx-list-ul'></i>
                                <h3>Quản lý Yêu Cầu</h3>
                            </div>
                        </button>
                    </a>
                    <a href="index.php?role=<?= $_GET['role'] ?>&action=manage_staffs">
                            <button>
                                <div class="option-box">
                                    <i class='bx bx-user'></i>
                                    <h3>Quản lý nhân viên</h3>
                                </div>
                            </button>
                        </a>
            <?php break;
            }
            ?>

        </div>

        <div class="footer">
            <b>Footer</b>
        </div>
    </div>
</body>
<style>
    * {
        font-family: 'Roboto';
    }

    .progress-status {
        display: flex;
        z-index: 1;
        top: 188px;
        left: 0;
        width: 10px;
        position: absolute;
        height: 10px;
        width: 12%;
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
            case 'headMaintenance':
        ?>background-color: #9B59B6;
        <?php break;
        } ?>?>
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
            case 'headMaintenance':
        ?>background-color: #9B59B6;
        <?php break;
        } ?>
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
    }

    .branch {
        margin-right: 20px;
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
            case 'headMaintenance':
        ?>background-color: #9B59B6;
        <?php break;
        } ?>
    }

    .nav {
        background-color: white;
        height: 100px;
        position: fixed;
        top: 0;
        width: 100%;
        display: flex;
        justify-content: right;
        align-items: center;
    }

    .footer {
        background-color: rgb(26, 26, 47);
        height: 100px;
    }

    .total-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Align content vertically */
        align-items: center;
        /* Align content horizontally */
        height: 100vh;
        /* Use viewport height for full-page height */
    }


    .user-options {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        height: 400px;
        position: relative;
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
        ?>border-bottom: 10px solid #DBAB06;
        <?php
                break;
            case 'director':
        ?>border-bottom: 10px solid #0AC10A;
        <?php
                break;
            case 'headMaintenance':
        ?>border-bottom: 10px solid #9B59B6;
        <?php break;
        } ?>?>
    }

    .user-options i {
        color: white;
        font-size: 75px;
    }

    .option-box {
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
            case 'headMaintenance':
        ?>background-color: #9B59B6;
        <?php
                break;
        } ?>margin-right: 10px;
        border-radius: 10px;
        height: 200px;
        width: 200px;
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
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>

</html>