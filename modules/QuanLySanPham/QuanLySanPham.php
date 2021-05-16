<html>
  <head>
    <link href="/css/QuanLySanPham.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/lib/jquery.min.js"></script>
  </head>
  <body>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/inc/header.php";
    ?>
    <div class="PhanChung">
      <div class="KhungChung">
        <aside class="MucTuyChon">
          <div class="TenNguoiDung">
            <img src="../../img/no_avatar.png" />
            <div class="info">
              Tài khoản
              <b></b>
            </div>
          </div>
          <ul class="ThongTinTuyChon">
            <li>
              <a class="Thong-tin-tai-khoan">
                  <img class="icon" src="/img/info.svg">
                <span>Thông tin sản phẩm</span>
              </a>
            </li>
            <li>
              <a class="Thong-bao-cua-toi">
                <img class="icon" src="/img/Thong-bao.svg">
                </svg>
                <span>Thông báo của tôi</span>
              </a>
            </li>
            <li>
              <a class="Quan-ly-don-hang">
                <img class="icon" src="/img/Quan-li-don-hang.svg">
                <span>Quản lý đơn hàng</span>
              </a>
            </li>
            <li>
              <a class="Dia-chi">
                <img class="icon" src="/img/Dia-chi.svg">
                <span>Địa chỉ</span>
              </a>
            </li>
            <li>
              <a class="Thong-tin-thanh-toan">
                <img class="icon" src="/img/Thong-tin-thanh-toan.svg">
                <span>Thông tin thanh toán</span>
              </a>
            </li>
            <li>
              <a class="Nhan-xet">
                <img class="icon" src="/img/Nhan-xet.svg">
                <span>Nhận xét sản phẩm đã mua</span>
              </a>
            </li>
            <li>
              <a class="San-pham-da-xem">
                <img class="icon" src="/img/Da-xem.svg">
                <span>Sản phẩm đã xem</span>
              </a>
            </li>
            <li>
              <a class="San-pham-yeu-thich">
                <img class="icon" src="/img/like.svg">
                <span>Sản phẩm yêu thích</span>
              </a>
            </li>
            <li>
              <a class="Mua-sau">
                  <img class="icon" src="/img/later.svg">
                <span>Mua sau</span>
              </a>
            </li>
            <li>
              <a class="Hoi-dap">
                <img class="icon" src="/img/Hoi-dap.svg">
                <span>Hỏi đáp</span>
              </a>
            </li>
            <li>
              <a class="Ma-giam-gia">
                  <img class="icon" src="/img/Sale.svg">
                <span>Mã giảm giá</span>
              </a>
            </li>
          </ul>
        </aside>
        <div class="ThongTinSanPham">
          <div class="KhungThongTinSanPham">
            <form>
              <div class="Khung-form">
                <label class="input-label">Tên Sản Phẩm: </label>
                <div>
                  <input
                    type="text"
                    name="TenSP"
                    maxlength="128"
                    class="TenSanPham"
                    value=""
                  />
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
                  <input
                    type="text"
                    name="namee"
                    maxlength="128"
                    class="MoTa"
                    value=""
                  />
                </div>
              </div>
              <div class="Khung-form">
                <label class="input-label">Giá bán: </label>
                <div>
                  <input
                    type="text"
                    name="namee"
                    maxlength="128"
                    class="GiaBan"
                    value=""
                  />
                </div>
              </div>
              <div class="Khung-form">
                <label class="input-label">Giá giảm: </label>
                <div>
                  <input
                    type="text"
                    name="namee"
                    maxlength="128"
                    class="Giagiam"
                    value=""
                  />
                </div>
              </div>
              <div class="Khung-form">
                <label class="input-label">&nbsp;</label>
                <button type="Them" class="margin30 btn-them">Thêm Ảnh</button>
                <button type="CapNhat" class="margin30 btn-capnhat">
                  Cập nhật
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
    ?>
  </body>
</html>
