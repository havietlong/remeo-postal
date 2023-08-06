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
                                $result = mysqli_query($connect, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $product_id = $row['equipment_id'];
                                $name_product = $row['name'];
                                $image_product = $row['image_path'];
                        ?>

                                <tr>
                                    <td><?= $i ?></td>
                                    <td><img style="width: 140px;height:auto;" src="<?= $image_product ?>"></td>
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
                    <form action="index.php?role=<?= $_GET['role'] ?>&action=verified" method="post">
                        <input type="text" name="staff_id" value="<?= $staff_id ?> " hidden>
                        <input type="text" name="request_type" value="1" hidden>
                        <div class="right-column" style="margin-bottom: 30px;">
                            <h3>Xác nhận</h3>
                            <?php if (isset($_SESSION['cart'])) { ?>
                                <button type="submit">Xác nhận</button>
                            <?php } else { ?>
                                <label>chưa có thiết bị được yêu cầu</label>
                            <?php } ?>
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
<style>
    .progress-status {
        display: flex;
        z-index: 1;
        top: 190px;
        left: 0;
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
        }
        ?>
        /* overflow: auto; */
        /* Enable scrolling when content exceeds the container's height */
    }
</style>

</html>