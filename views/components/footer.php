<div class="footer-column">
    <div class="footer-title">Về chúng tôi</div>
    <ul class="footer-list">
        <li>Giới thiệu</li>
        <li>Tin tức</li>
        <li>Sản phẩm</li>
        <li>Blog</li>
    </ul>
</div>
<div class="footer-column">
    <div class="footer-title">Công ty TNHH HVL</div>
    <ul class="footer-list footer-content">
        <li>96 Định Công, Thanh Xuân, Hà Nội</li>
        <li>098432421 - 098342384</li>
        <li>contact@hvl.com</li>
        <li>

            <img src="https://cdn.dangkywebsitevoibocongthuong.com/wp-content/uploads/2018/06/huong-dan-dang-ky-website-voi-Bo-Cong-Thuong-3.png" alt="Logo Bộ Công Thương" class="footer-logo">
        </li>
    </ul>
</div>
<div class="footer-column">
    <div class="footer-title">Đăng ký nhận dịch vụ từ HVL</div>
    <form class="footer-form">
        <label for="name"></label>
        <input type="text" id="name" name="name" placeholder="Nhập họ tên" required>
        <label for="phone"></label>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
        <label for="email"></label>
        <input type="email" id="email" name="email" placeholder="Nhập email" required>
        <label for="message"></label>
        <textarea id="message" name="message" rows="4" placeholder="Nhập nội dung yêu cầu" required></textarea>
        <button type="submit">Gửi yêu cầu</button>
    </form>
</div>
<style>
    .footer {
        background-color: #333;
        color: white;
        
        display: flex;
        justify-content: space-between;
       
      
    }
    .footer-logo {
        max-width: 50%;
        height: auto;
    }
    /* Định dạng cho cột trong footer */
    .footer-column {
        width: 30%; /* Điều chỉnh chiều rộng của cột tùy ý */
        margin-left: 140px;
        margin-right: 70px;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    /* Định dạng cho tiêu đề */
    .footer-title {
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 10px;
    }
    .footer-content {
        white-space: pre-line;
    }
    /* Định dạng cho danh sách */
    .footer-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-list li {
        margin-bottom: 5px;
    }

    /* Định dạng cho form */
    .footer-form {
        margin-top: 10px;
    }

    .footer-form label {
        display: block;
        margin-bottom: 5px;
    }

    .footer-form input,
    .footer-form textarea {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    .footer-form button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }
</style>