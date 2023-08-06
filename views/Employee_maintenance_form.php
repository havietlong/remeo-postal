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
        <div class="user-options">
            <h1>Bảo hành thiết bị</h1>
            <br>
            <form id="maintenance-form" action="index.php?role=<?= $_GET['role'] ?>&action=maintenance_request" method="post">
                <label for="device-name">Serial thiết bị</label>
                <input type="text" name="request_type" id="device-name" value="2" hidden>
                <input type="text" name="staff_id" id="staff-id" value="<?= $_SESSION['user_id'] ?>" hidden>
                <div id="device-options" class="device-options">
                    <div class="device-serial-row">
                    <form method="post">
                        <select name="device-type" class="device-type" required disabled>
                            <option value="">Chọn loại thiết bị</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category['type_id'] ?>"><?= $category['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        
                        <!-- <input type="text" name="device-serial" class="device-name" required disabled> -->
                        <select name="device-serial" class="device-type" required disabled>
                            <option value="">Chọn serial thiết bị</option>
                            <?php foreach ($serials as $serial) { 
                                ?>
                                <option value="<?= $serial['serial_number'] ?>"><?= $serial['serial_number'] ?></option>
                            <?php } ?>
                        </select>
                        <button id="plus-button" onclick="addNewDeviceOption(event)"><i class='bx bxs-plus-circle'></i></button>
                    </div>
                </div>
                <br>
                <div>
                    <label for="issue-description">Miêu tả vấn đề</label>
                    <textarea name="reason" id="issue-description"></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="footer">
            <b>Footer</b>
        </div>
    </div>

    <script>
        // Variable to keep track of the index for generating unique names
        var dynamicIndex = 0;

        function getType() {

        }

        // Function to add a new product row to the array
        function addNewDeviceOption(event) {
            event.preventDefault(); // Prevent form submission or page refresh

            // Create a new .device-options element
            var deviceOptions = document.createElement('div');
            deviceOptions.classList.add('device-serial-row');

            // Copy the content of the first .device-options element
            var firstDeviceOptions = document.querySelector('.device-serial-row');
            deviceOptions.innerHTML = firstDeviceOptions.innerHTML;

            // Generate unique names for the select and input elements
            dynamicIndex++;
            var deviceTypeSelect = deviceOptions.querySelector('select[name="device-type"]');
            var deviceNameInput = deviceOptions.querySelector('select[name="device-serial"]');

            if (deviceTypeSelect) {
                deviceTypeSelect.name = "device-type-" + dynamicIndex;
                deviceTypeSelect.disabled = false; // Enable the new select
            }
            if (deviceNameInput) {
                deviceNameInput.name = "device-serial-" + dynamicIndex;
                deviceNameInput.disabled = false; // Enable the new input
            }

            // Remove the plus button from the new .device-options element
            var plusButton = deviceOptions.querySelector('#plus-button');
            plusButton.parentNode.removeChild(plusButton);

            // Append the new .device-options element to #maintenance-form
            document.getElementById('device-options').appendChild(deviceOptions);
        }

        
    </script>
</body>






<style>
    .device-options {
        display: flex;
        flex-direction: column;
        width: 110%;
    }

    .device-serial-row {
        display: flex;
    }

    .device-options i {
        font-size: 25px;
    }

    #device-type {
        width: 50%;
    }

    #device-name {
        width: 50%;
        height: 25px;
        border-radius: 5px;
        padding-left: 5px;
        box-sizing: border-box;
    }

    #issue-description {
        width: 100%;
        height: 100px;
        border-radius: 5px;
    }

    #maintenance-type {
        width: 100%;
        height: 25px;
    }

    #maintenance-form {
        width: 40%;
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
        position: fixed;
        bottom: 0;
        margin-top: 88px;
        width: 100%;
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
        padding: 50px;
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: white;
        height: 100%;
        /* Set height to 100% to fill the available space */
        /* position: relative; */
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