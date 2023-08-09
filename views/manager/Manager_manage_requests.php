
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <!-- <div class="progress-status_id"></div> -->
        <div class="user-options">
            <div class="shopping-container">
            
                <div class="right_section_step3">
                    <?php if ($_SESSION['branch'] == 4) { ?>
                        <h3>Nội bộ</h3>
                        <div id="maintenance" class="productsTab">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại yêu cầu</th>
                                        <th>Người yêu cầu</th>
                                        <th>Lệnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($requests as $request) {
                                        if ($request['branch_id'] == $_SESSION['branch'] && $request['status_id'] == 1 ){
                                            $i++ ?>
                                            <tr>
                                                <td><?= $request['id'] ?></td>
                                                <td><?php if ($request['request_type'] == 1) {
                                                        echo "Lắp đặt";
                                                    } else {
                                                        echo "Bảo trì";
                                                    } ?></td>
                                                <td><?= $request['name'] ?></td>
                                                <td>
                                                    <form action="index.php?role=<?= $_GET['role'] ?>&action=cancle_maintenance" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" name="id" value="<?= $request['id']; ?>" />
                                                        <button name="submit" type="submit">Hủy</button>
                                                    </form>
                                                    <form action="index.php?role=<?= $_GET['role'] ?>&action=accept_maintenance" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" name="id" value="<?= $request['id']; ?>" />
                                                        <button name="submit" type="submit">Chấp Thuận</button>
                                                    </form>
                                                </td>
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
                                                                <?php
                                                                if ($request['request_type'] == 2) {

                                                                    foreach ($maintenance_details as $maintenance_detail) {

                                                                        if ($maintenance_detail['user_request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $maintenance_detail['image_path'] ?>"></td>
                                                                                <td><?= $maintenance_detail['name'] ?></td>
                                                                                <td><?= $maintenance_detail['serial_number'] ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                                    foreach ($request_details as $request_detail) {

                                                                        if ($request_detail['request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $request_detail['image_path'] ?>"></td>
                                                                                <td><?= $request_detail['name'] ?></td>
                                                                                <td><?= $request_detail['quantity'] ?></td>
                                                                            </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                                <tr>
                                                                    <td colspan="3"><b>Nguyên nhân yêu cầu</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><?= $request['request_text'] ?></td>
                                                                </tr>
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
                        <h3>Đang xử lý</h3>
                        <div  class="productsTab">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại yêu cầu</th>
                                        <th>Người yêu cầu</th>
                                        <th>Bưu cục</th>
                                        <th>Tình trạng</th>
                                        <th>Thời gian dự tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($requests as $request) {
                                        if ($request['status_id'] == 2) {
                                    ?>
                                            <tr>
                                            <td><?= $request['id'] ?></td>
                                                <td><?php if ($request['request_type'] == 1) {
                                                        echo "Lắp đặt";
                                                    } else {
                                                        echo "Bảo trì";
                                                    } ?></td>
                                                <td><?= $request['name'] ?></td>
                                                <td><?= $request['office_name'] ?></td>
                                                <td>Chờ lắp đặt</td>
                                                <td><?= $request['request_estimate_time'] ?></td>
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
                                                                <?php
                                                                if ($request['request_type'] == 2) {

                                                                    foreach ($maintenance_details as $maintenance_detail) {

                                                                        if ($maintenance_detail['user_request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $maintenance_detail['image_path'] ?>"></td>
                                                                                <td><?= $maintenance_detail['name'] ?></td>
                                                                                <td><?= $maintenance_detail['serial_number'] ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                                    foreach ($request_details as $request_detail) {

                                                                        if ($request_detail['request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $request_detail['image_path'] ?>"></td>
                                                                                <td><?= $request_detail['name'] ?></td>
                                                                                <td><?= $request_detail['quantity'] ?></td>
                                                                            </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                                <tr>
                                                                    <td colspan="3"><b>Nguyên nhân yêu cầu</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><?= $request['request_text'] ?></td>
                                                                </tr>
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
                        <h3>Yêu cầu lắp đặt</h3>
                        <div id="maintenance" class="productsTab">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại yêu cầu</th>
                                        <th>Người yêu cầu</th>
                                        <th>Bưu cục</th>
                                        <th>Tình trạng</th>
                                        <th>Thời gian dự tính</th>
                                        <th>Lệnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($requests as $request) {
                                        if ($request['status_id'] == 3  ) {
                                    ?>
                                            <tr>
                                                <td><?= $request['id'] ?></td>
                                                <td><?php if ($request['request_type'] == 1) {
                                                        echo "Lắp đặt";
                                                    } else {
                                                        echo "Bảo trì";
                                                    } ?></td>
                                                <td><?= $request['name'] ?></td>
                                                <td><?= $request['office_name'] ?></td>
                                                <td>Chờ lắp đặt</td>
                                                <td>Đang xử lý</td>
                                                <td><!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter_<?= $request['id'] ?>">
                                                        Lắp đặt
                                                    </button>
                                                </td>
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
                                                                <?php
                                                                if ($request['request_type'] == 2) {

                                                                    foreach ($maintenance_details as $maintenance_detail) {

                                                                        if ($maintenance_detail['user_request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $maintenance_detail['image_path'] ?>"></td>
                                                                                <td><?= $maintenance_detail['name'] ?></td>
                                                                                <td><?= $maintenance_detail['serial_number'] ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                                    foreach ($request_details as $request_detail) {

                                                                        if ($request_detail['request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $request_detail['image_path'] ?>"></td>
                                                                                <td><?= $request_detail['name'] ?></td>
                                                                                <td><?= $request_detail['quantity'] ?></td>
                                                                            </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                                <tr>
                                                                    <td colspan="3"><b>Nguyên nhân yêu cầu</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><?= $request['request_text'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter_<?= $request['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Giạo nhiệm vụ</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="index.php?role=<?= $_GET['role'] ?>&action=send_request" method="post">
                                                        <div class="modal-body">
                                                            <label>Nhân viên</label>
                                                            <div class="div">
                                                                <input name="id" value="<?= $request['id'] ?>" hidden>
                                                                <select name="staff_id">
                                                                    <?php foreach ($staffs as $staff) {?>
                                                                       
                                                                            <option value="<?= $staff['staff_id'] ?>"><?= $staff['name'] ?> </option>
                                                                  
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            <button type="submit" class="btn btn-primary">Gửi</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        



                    <?php } else if ($_GET['role'] == 'director') { ?>
                        <h3>Yêu cầu</h3>
                        <div id="maintenance" class="productsTab">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại yêu cầu</th>
                                        <th>Người yêu cầu</th>
                                        <th>Lệnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($requests as $request) {
                                        if ($request['status_id'] == 2) {
                                            $i++ ?>
                                            <tr>
                                                <td><?= $request['id'] ?></td>
                                                <td><?php if ($request['request_type'] == 1) {
                                                        echo "Lắp đặt";
                                                    } else {
                                                        echo "Bảo trì";
                                                    } ?></td>
                                                <td><?= $request['name'] ?></td>

                                                <td>
                                                    <form action="index.php?role=director&action=cancle_maintenance" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" name="id" value="<?= $request['id']; ?>" />
                                                        <button name="submit" type="submit">Hủy</button>
                                                    </form>
                                                    <form action="index.php?role=director&action=accept_maintenance" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" name="id" value="<?= $request['id']; ?>" />
                                                        <button name="submit" type="submit">Chấp Thuận</button>
                                                    </form>
                                                </td>
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
                                                                <?php
                                                                if ($request['request_type'] == 2) {

                                                                    foreach ($maintenance_details as $maintenance_detail) {

                                                                        if ($maintenance_detail['user_request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $maintenance_detail['image_path'] ?>"></td>
                                                                                <td><?= $maintenance_detail['name'] ?></td>
                                                                                <td><?= $maintenance_detail['serial_number'] ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                                    foreach ($request_details as $request_detail) {

                                                                        if ($request_detail['request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $request_detail['image_path'] ?>"></td>
                                                                                <td><?= $request_detail['name'] ?></td>
                                                                                <td><?= $request_detail['quantity'] ?></td>
                                                                            </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                                <tr>
                                                                    <td colspan="3"><b>Nguyên nhân yêu cầu</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><?= $request['request_text'] ?></td>
                                                                </tr>
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
                        <h3>Chấp thuận</h3>
                        <div id="maintenance" class="productsTab">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại yêu cầu</th>
                                        <th>Người yêu cầu</th>
                                        <th>Tình trạng yêu cầu</th>
                                        <th>Thời gian dự tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($requests as $request) {
                                      
                                        if ($request['status_id'] == 3) {
                                    ?>
                                            <tr>
                                                <td><?= $request['id'] ?></td>
                                                <td><?php if ($request['request_type'] == 1) {
                                                        echo "Lắp đặt";
                                                    } else {
                                                        echo "Bảo trì";
                                                    } ?></td>
                                                <td><?= $request['name'] ?></td>

                                                <td><?= $request['name_status'] ?></td>

                                                <td>Đang xử lý</td>
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
                                                                <?php
                                                                if ($request['request_type'] == 2) {

                                                                    foreach ($maintenance_details as $maintenance_detail) {

                                                                        if ($maintenance_detail['user_request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $maintenance_detail['image_path'] ?>"></td>
                                                                                <td><?= $maintenance_detail['name'] ?></td>
                                                                                <td><?= $maintenance_detail['serial_number'] ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                                    foreach ($request_details as $request_detail) {

                                                                        if ($request_detail['request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $request_detail['image_path'] ?>"></td>
                                                                                <td><?= $request_detail['name'] ?></td>
                                                                                <td><?= $request_detail['quantity'] ?></td>
                                                                            </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                                <tr>
                                                                    <td colspan="3"><b>Nguyên nhân yêu cầu</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><?= $request['request_text'] ?></td>
                                                                </tr>
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
                    <?php } else { ?>
                        <h3>Yêu cầu</h3>
                        <div id="maintenance" class="productsTab">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại yêu cầu</th>
                                        <th>Người yêu cầu</th>
                                        <th>Lệnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($requests as $request) {
                                        if ($request['status_id'] === '1') {
                                            $i++ ?>
                                            <tr>
                                                <td><?= $request['id'] ?></td>
                                                <td><?php if ($request['request_type'] == 1) {
                                                        echo "Lắp đặt";
                                                    } else {
                                                        echo "Bảo trì";
                                                    } ?></td>
                                                <td><?= $request['name'] ?></td>

                                                <td>
                                                    <form action="index.php?role=<?= $_GET['role'] ?>&action=cancle_maintenance" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" name="id" value="<?= $request['id']; ?>" />
                                                        <button name="submit" type="submit">Hủy</button>
                                                    </form>
                                                    <form action="index.php?role=<?= $_GET['role'] ?>&action=accept_maintenance" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" name="id" value="<?= $request['id']; ?>" />
                                                        <button name="submit" type="submit">Chấp Thuận</button>
                                                    </form>
                                                </td>
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
                                                                <?php
                                                                if ($request['request_type'] == 2) {

                                                                    foreach ($maintenance_details as $maintenance_detail) {

                                                                        if ($maintenance_detail['user_request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $maintenance_detail['image_path'] ?>"></td>
                                                                                <td><?= $maintenance_detail['name'] ?></td>
                                                                                <td><?= $maintenance_detail['serial_number'] ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                                    foreach ($request_details as $request_detail) {

                                                                        if ($request_detail['request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $request_detail['image_path'] ?>"></td>
                                                                                <td><?= $request_detail['name'] ?></td>
                                                                                <td><?= $request_detail['quantity'] ?></td>
                                                                            </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                                <tr>
                                                                    <td colspan="3"><b>Nguyên nhân yêu cầu</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><?= $request['request_text'] ?></td>
                                                                </tr>
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
                        <h3>Đang xử lý</h3>
                        <div id="maintenance" class="productsTab">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại yêu cầu</th>
                                        <th>Người yêu cầu</th>
                                        <th>Tình trạng yêu cầu</th>
                                        <th>Thời gian dự tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($requests as $request) {
                                        if ($request['status_id'] == 2) {
                                    ?>
                                            <tr>
                                                <td><?= $request['id'] ?></td>
                                                <td><?php if ($request['request_type'] == 1) {
                                                        echo "Lắp đặt";
                                                    } else {
                                                        echo "Bảo trì";
                                                    } ?></td>
                                                <td><?= $request['name'] ?></td>

                                                <td><?= $request['name_status'] ?></td>
                                                <td>Đang xử lý</td>
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
                                                                <?php
                                                                if ($request['request_type'] == 2) {

                                                                    foreach ($maintenance_details as $maintenance_detail) {

                                                                        if ($maintenance_detail['user_request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $maintenance_detail['image_path'] ?>"></td>
                                                                                <td><?= $maintenance_detail['name'] ?></td>
                                                                                <td><?= $maintenance_detail['serial_number'] ?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                                    foreach ($request_details as $request_detail) {

                                                                        if ($request_detail['request_id'] == $request['id']) { ?>
                                                                            <tr>
                                                                                <td><img style="width: 140px;height:auto;" src="<?= $request_detail['image_path'] ?>"></td>
                                                                                <td><?= $request_detail['name'] ?></td>
                                                                                <td><?= $request_detail['quantity'] ?></td>
                                                                            </tr>
                                                                <?php
                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                                <tr>
                                                                    <td colspan="3"><b>Nguyên nhân yêu cầu</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><?= $request['request_text'] ?></td>
                                                                </tr>
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
                        
                    <?php } ?>
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
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

    .progress-status_id {
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
        min-height: 66.5vh;
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