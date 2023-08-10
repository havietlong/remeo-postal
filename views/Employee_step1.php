<?php
$role = $_GET['role'];
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
        <div class="siderBar_container">
          <?php
          if (isset($_SESSION['cart'])) {
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
              $image_product = $row['image_path'];
          ?>
              <div class="sideBarProduct" style="display: flex;align-items: center;">
                <div class="siderBar_img">
                  <img src="<?= $image_product ?>" alt="Ảnh sản phẩm" class="product-image" style="width: 100px;height: auto;">
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
          <?php }
          } ?>
        </div>
      </div>
      <?php
      switch ($role) {
        case 'staff': ?>
        <a href="index.php?role=staff&action=index">
            <button>
              <div class="option-box square">
                <h3>Trở lại</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=staff&action=install&deviceType=computerParts">
            <button>
              <div class="option-box rectangle">
                <i class="bx bx-laptop"></i>
                <h3>Máy tính</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=staff&action=install&deviceType=printer">
            <button>
              <div class="option-box square">
                <i class="bx bx-printer"></i>
                <h3>Máy in</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=staff&action=install&deviceType=wifi">
            <button>
              <div class="option-box square">
                <i class="bx bx-wifi"></i>
                <h3>Thiết bị mạng</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=staff&action=verifyRequest">
            <button>
              <div class="option-box square">
                <h3>Tiếp</h3>
              </div>
            </button>
          </a>

        <?php
          break;
        case 'maintenance': ?>
        <a href="index.php?role=maintenance&action=index">
            <button>
              <div class="option-box square">
                <h3>Trở lại</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=maintenance&action=install&deviceType=conveyor">
            <button>
              <div class="option-box rectangle">
                <i class='bx bx-broadcast'></i>
                <h3>Băng chuyền</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=maintenance&action=install&deviceType=scale">
            <button>
              <div class="option-box square">
                <i class='bx bx-hourglass'></i>
                <h3>Cân</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=maintenance&action=install&deviceType=charger">
            <button>
              <div class="option-box square">
                <i class='bx bx-plug'></i>
                <h3>Sạc</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=maintenance&action=install&deviceType=generator">
            <button>
              <div class="option-box square">
                <i class='bx bxs-bolt'></i>
                <h3>Máy phát điện</h3>
              </div>
            </button>
          </a>
          <a href="index.php?role=maintenance&action=verifyRequest">
            <button>
              <div class="option-box square">
                <h3>Tiếp</h3>
              </div>
            </button>
          </a>
      <?php
      } ?>

    </div>
    <div class="footer">
      <b>Footer</b>
    </div>
  </div>
</body>
<style>
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
    top: 188px;
    left: 0;
    width: 10px;
    position: absolute;
    height: 10px;
    width: 37%;
    background-color: <?php echo $role === 'maintenance' ? 'blue' : 'red'; ?>;
  }

  .active {
    background-color: <?php echo $role === 'maintenance' ? 'blue' : 'red'; ?>;
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
    overflow-x: hidden;
    overflow-y: hidden;
  }

  .branch {
    margin-right: 20px;
    color: <?php echo $role === 'maintenance' ? 'blue' : 'red'; ?>;
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
    border-bottom: 10px solid <?php echo $role === 'maintenance' ? 'blue' : 'red'; ?>;
  }

  .user-options i {
    color: white;
    font-size: 75px;
  }

  .option-box {
    background-color: <?php echo $role === 'maintenance' ? 'blue' : 'red'; ?>;
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
    position: fixed;
    bottom: 0;
    width: 100%;
  }

  /* Added styles for the sidebar */
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
    z-index: 2;
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

  /* Added styles for the sidebar close button */
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

</html>