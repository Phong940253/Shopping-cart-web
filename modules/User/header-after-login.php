<img class="profile-icon" src="/img/profile.png"/>
<span class="user-style-item-text">
    <span class="user-style-no-wrap">

    </span>
    <span class="account-label">
        <span>

        </span>
        <img class="arrow-icon" src="/img/arow.png"/>
    </span>
</span>
<div class="user-dropdown user-menu toggler">
    <?php
    if (isset($_POST['admin'])) {
        if ($_POST['admin'] == 1) {
            echo "<a rel='nofollow' href='/modules/Admin/index.html'>
                  <p title='Thông báo của tôi' class='user-drop-item'>
                  Quản trị
                  </p>
                  </a>";
        }
    }
    ?>
    <a rel="nofollow" href="/modules/QuanLyGioHang/QuanLyGioHang.html">
        <p title="Đơn hàng của tôi" class="user-drop-item">
            Đơn hàng của tôi
        </p>
    </a>
    <a rel="nofollow" href="/customer/notification?src=header_my_account">
        <p title="Thông báo của tôi" class="user-drop-item">
            Thông báo của tôi
            <span class="badge">1</span>
        </p>
    </a>
    <a rel="nofollow" href="/modules/QuanLyNguoiDung/QuanLyNguoiDung.php">
        <p title="Tài khoản của tôi" class="user-drop-item">
            Tài khoản của tôi
        </p>
    </a>
    <a rel="nofollow" href="/nhan-xet-san-pham-ban-da-mua?src=header_my_account"
       data-view-id="header_header_account_item">
        <p title="Nhận xét sản phẩm đã mua" class="user-drop-item">
            Nhận xét sản phẩm đã mua
        </p>
    </a>
    <a data-view-id="header_header_account_item">
        <p title="Thoát tài khoản" class="user-drop-item">Thoát tài khoản</p>
    </a>
</div>