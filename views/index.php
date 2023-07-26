<?php include "views/components/head.php"?>

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
            
            switch($role){
                case 'staff': echo "<a href='index.php?role=staff&action=install'>";
                break;
                case 'maintenance': echo "<a href='index.php?role=maintenance&action=install'>";
                break;
            }
            ?>
            
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
        }
        ?>
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
        ?>color: red;
        <?php
                break;
            case 'maintenance':
        ?>color: blue;
        <?php
                break;
        }
        ?>
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
        }
        ?>
    }

    .user-options i {
        color: white;
        font-size: 75px;
    }

    .option-box {
        <?php
        
        switch ($role) {
            case 'staff':
        ?>background-color: red;
        <?php
                break;
            case 'maintenance':
        ?>background-color: blue;
        <?php
                break;
        }
        ?>
        margin-right: 10px;
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