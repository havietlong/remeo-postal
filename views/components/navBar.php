<div class="nav">
    <div class="logo-user">
        <i class='bx bx-user-circle' onclick="togglePopup()"></i>
    </div>
</div>
<div class="popup" id="popup">
    <div class="popup-item">
    <i class='bx bx-user-circle popup-icon'></i>
        Người dùng
    </div>
    <div class="popup-item">
    <i class='bx bx-git-branch popup-icon' ></i>
        Chi nhánh
    </div>
    <div class="popup-item">
    <i class='bx bx-slider-alt popup-icon' ></i>
        Bộ phận
    </div>
    <div class="popup-item">
    <i class='bx bx-bell popup-icon' ></i>
        Vai trò
    </div>
    <div class="popup-item">
    <a href="/remeo-postal/reset.php"><i class='bx bx-door-open popup-icon'></i>
    Đăng xuất</a>
    </div>
</div>
<style>
    .nav {
        background-color: white;
        height: 100px;
        /* position: fixed; */
        top: 0;
        width: 100%;
        display: flex;
        justify-content: right;
        align-items: center;
    }

    .logo-user {
        font-size: 30px;
        cursor: pointer;
        color: black;
        margin-right: 20px;
    }

    /* Cửa sổ popup */
    .popup {
        display: none;
        position: absolute;
        top: 2.5cm;
        right: 20px;
        background-color: white;

        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 999;
        width: 6cm;
        height: 5cm;

    }

    .popup-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        color: black;

    }

    .popup-icon {
        font-size: 20px;
        margin-right: 10px;
    }

    /* Hover hiển thị popup */
    .header:hover .popup {
        display: block;
    }
</style>
<script>
    function togglePopup() {
        var popup = document.getElementById("popup");
        if (popup.style.display === "block") {
            popup.style.display = "none";
        } else {
            popup.style.display = "block";
        }
    }
</script>