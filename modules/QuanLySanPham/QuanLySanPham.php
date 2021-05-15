<html>
    <head>
        <link href="/css/QuanLySanPham.css" rel="stylesheet"/>
        <link rel="stylesheet" href="/css/style.css">
        <script src="/lib/jquery.min.js"></script>
    </head>
    <body>
    <?php
    include_once '../../vendor/autoload.php';
    require("../../inc/header.php");
    ?>
    <div class="PhanChung">
        <div class="KhungChung">
            <aside class="MucTuyChon">
                <div class="TenNguoiDung">
                    <img src="../../img/no_avatar.png">
                    <div class="info">
                        Tài khoản
                        <b></b>
                    </div>
                </div>
                <ul class="ThongTinTuyChon">
                    <li>
                        <a class="Thong-tin-tai-khoan">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                 viewBox="0 0 24 24" height="1em" width="1em"
                                 xmlns="http://www.w3.org/2000/svg">
                            </svg>
                            <span>Thông tin sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a class="Thong-bao-cua-toi">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                 viewBox="0 0 24 24" height="1em" width="1em"
                                 xmlns="http://www.w3.org/2000/svg">
                            </svg>
                            <span>Thông báo của  tôi</span>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="ThongTinSanPham">
                <h3 class="HeaderThongtinsanpham"></h3>
                <div class="KhungThongTinSanPham">
                    <form>
                        <div class="Khung-form">
                            <label class="input-label">Tên Sản Phẩm: </label>
                            <div>
                                <input type="text" name="TenSP" maxlength="128" class="TenSanPham" value="">
                            </div>
                        </div>
                        <div class="Khung-form">
                            <label class="input-label">Danh mục sản phẩm: </label>
                            <div class="DanhMucSanPham">
                                <select>
                                    <option value="0">Thời trang</option>
                                    <option value="1">Điện tử</option>
                                </select>
                            </div>
                        </div>
                        <div class="Khung-form">
                            <label class="input-label">Mô tả sản phẩm: </label>
                            <div>
                                <input type="text" name="namee" maxlength="128" class="MoTa" value="">
                            </div>
                        </div>
                        <div class="Khung-form">
                            <label class="input-label">Giá bán: </label>
                            <div>
                                <input type="text" name="namee" maxlength="128" class="GiaBan" value="">
                            </div>
                        </div>
                        <div class="Khung-form">
                            <label class="input-label">Giá giảm: </label>
                            <div>
                                <input type="text" name="namee" maxlength="128" class="Giagiam" value="">
                            </div>
                        </div>
                        <div class="Khung-form">
                                <label class="input-label">&nbsp;</label>
                                <button type="Them" class="margin30 btn-them">Thêm Ảnh</button>
                                <button type="CapNhat" class="margin30 btn-capnhat">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once '../../inc/footer.php';
    ?>
    </body>
</html>