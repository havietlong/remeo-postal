<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet"
  />
  <link
    rel="preconnect"
    href="https://fonts.googleapis.com"
  />
  <link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
    rel="stylesheet"
  />
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
        <div class="inner-circle active"></div>
      </div>
      <div class="outter-circle">
        <div class="inner-circle active"></div>
      </div>
    </div>
    <div class="progress-status"></div>
    <div class="user-options">
      <img src="https://static.vecteezy.com/system/resources/previews/006/657/739/non_2x/payment-receipt-with-coin-cartoon-illustration-flat-isolated-object-free-vector.jpg">
    </div>

    <div class="footer">
      <b>Footer</b>
    </div>
  </div>
</body>
<style>
  .user-options img{
    border-radius: 200px;
    width: 300px;
    height: auto;
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
    top: 188px;
    left: 0;
    width: 10px;
    position: absolute;
    height: 10px;
    width: 100%;
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
    overflow-x: hidden;
  }

  .branch {
    margin-right: 20px;
    color: red;
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
    border-bottom: 10px solid red;
  }

  .user-options i {
    color: white;
    font-size: 75px;
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
    position: absolute;
    top: 0;
    right: 0;
    width: 300px; /* Adjust the width as needed */
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
